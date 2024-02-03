<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jsa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('Laporan_pekerjaan_model');
		$this->load->model('SPKI_model');
		$this->load->model('Jsa_model');
		$this->load->model('Personil_model');
		$this->load->library('pdfgenerator');
	}


	public function index()
	{
		unset(
			$_SESSION['id_view_laporan']
		);
		$data['jsa'] = $this->Jsa_model->dapat_jsa();
		$data['temuan_jsa'] = $this->Jsa_model->dapat_temuan_jsa();
		$data['foto_jsa'] = $this->Jsa_model->dapat_foto_jsa();
		$data['title'] = 'Laporan JSA';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/jsa/jsa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_jsa()
	{
		$data['title'] = 'Laporan JSA';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/jsa/tambah_jsa', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_jsa()
	{
		$this->form_validation->set_rules('dasar_pelaksanaan', 'Dasar Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('lingkup_pekerjaan', 'Lingkup Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('hasil_pekerjaan', 'Hasil Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('kesimpulan', 'Kesimpulan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_jsa();
		} else {

			$data_jsa = [
				'id_personil' => $this->session->userdata('id_personil'),
				'dasar_pelaksanaan' => $this->input->post('dasar_pelaksanaan'),
				'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
				'lingkup_pekerjaan' => $this->input->post('lingkup_pekerjaan'),
				'hasil_pekerjaan' => $this->input->post('hasil_pekerjaan'),
				'kesimpulan' => $this->input->post('kesimpulan'),
				'sudah_disetujui' => '0',
			];
			$result = $this->Jsa_model->tambah_jsa($data_jsa);
			$id_jsa = $this->db->insert_id();

			for ($i = 0; $i < count($_POST['temuan']); $i++) {
				$data = array(
					'id_jsa' => $id_jsa,
					'temuan' => $_POST['temuan'][$i],
					'keterangan' => $_POST['keterangan'][$i]
				);
				$this->Jsa_model->tambah_temuan_jsa($data);
			}

			$config = array(
				'upload_path' => './assets/img/jsa',
				'allowed_types' => 'jpg|jpeg|png|pdf',
			);

			$foto_files = $_FILES['foto'];
			$this->upload->initialize($config);
			for ($i = 0; $i < count($foto_files['name']); $i++) {
				$_FILES['foto']['name']     = $foto_files['name'][$i];
				$_FILES['foto']['type']     = $foto_files['type'][$i];
				$_FILES['foto']['tmp_name'] = $foto_files['tmp_name'][$i];
				$_FILES['foto']['error']    = $foto_files['error'][$i];
				$_FILES['foto']['size']     = $foto_files['size'][$i];

				if ($this->upload->do_upload('foto')) {
					$fotodata = $this->upload->data();
					$foto = $fotodata['file_name'];
					$data = array(
						'id_jsa' =>  $id_jsa,
						'foto' => $foto,
					);
					$this->Jsa_model->tambah_foto_jsa($data);
				}
			}

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Laporan JSA Berhasil Ditambahkan</strong>
															<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Laporan JSA Gagal Ditambahkan</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/jsa');
		}
	}

	public function edit_laporan_pekerjaan()
	{
		if ($this->session->userdata('id_view_laporan')) {
			$data['laporan_pekerjaan'] = $this->db->get_where('t_laporan_pekerjaan', ['id_laporan_pekerjaan' => $this->session->userdata('id_view_laporan')])->row();
		} else {
			$data['laporan_pekerjaan'] = $this->db->get_where('t_laporan_pekerjaan', ['id_laporan_pekerjaan' => $this->input->post('id_laporan_pekerjaan')])->row();
		}
		$data['lampiran_laporan_pekerjaan'] = $this->Laporan_pekerjaan_model->dapat_lampiran_laporan_pekerjaan();
		$data['title'] = 'Laporan JSA';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/laporan_pekerjaan/edit_laporan_pekerjaan', $data);
		$this->load->view('templates/footer');
	}

	// public function proses_edit_laporan_pekerjaan()
	// {
	// 	$this->form_validation->set_rules('dasar_pelaksanaan', 'Dasar Pelaksanaan', 'required|trim');
	// 	$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
	// 	$this->form_validation->set_rules('lingkup_pekerjaan', 'Lingkup Pekerjaan', 'required|trim');
	// 	$this->form_validation->set_rules('hasil_pekerjaan', 'Hasil Pekerjaan', 'required|trim');
	// 	$this->form_validation->set_rules('penutup', 'Penutup', 'required|trim');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->edit_laporan_pekerjaan();
	// 	} else {

	// 		$data = [
	// 			'dasar_pelaksanaan' => $this->input->post('dasar_pelaksanaan'),
	// 			'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
	// 			'lingkup_pekerjaan' => $this->input->post('lingkup_pekerjaan'),
	// 			'hasil_pekerjaan' => $this->input->post('hasil_pekerjaan'),
	// 			'penutup' => $this->input->post('penutup'),
	// 		];

	// 		$id_laporan_pekerjaan = $this->input->post('id_laporan_pekerjaan');
	// 		$result = $this->Laporan_pekerjaan_model->edit_laporan_pekerjaan($id_laporan_pekerjaan, $data);

	// 		if ($_FILES['lampiran_sebelum'] != NULL and $_FILES['lampiran_proses'] != NULL and $_FILES['lampiran_setelah'] != NULL) {
	// 			$this->handleFileUpload('lampiran_sebelum', $_FILES['lampiran_sebelum'], $data_lampiran_sebelum);
	// 			$this->handleFileUpload('lampiran_proses', $_FILES['lampiran_proses'], $data_lampiran_proses);
	// 			$this->handleFileUpload('lampiran_setelah', $_FILES['lampiran_setelah'], $data_lampiran_setelah);

	// 			$this->processLampiranData($id_laporan_pekerjaan, $_POST['judul_lampiran'], $data_lampiran_sebelum, $data_lampiran_proses, $data_lampiran_setelah);

	// 			$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Berhasil Diedit</strong>
	// 														<i class="bi bi-check-circle-fill"></i>');
	// 		} else {
	// 			$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Gagal Diedit</strong>
	// 														<i class="bi bi-exclamation-circle-fill"></i>');
	// 		}
	// 		redirect('admin/laporan-pekerjaan');
	// 	}
	// }

	public function proses_hapus_jsa()
	{
		$this->db->where('id_jsa', $this->input->post('id_jsa'));
		$foto = $this->db->get('t_foto_jsa')->result();

		foreach ($foto as $f) {
			$foto_files = FCPATH . 'assets/img/jsa/' . $f->foto;
			unlink($foto_files);
		}

		$this->db->where('id_jsa', $this->input->post('id_jsa'));
		$this->db->delete('t_jsa');
		$this->session->set_flashdata('message', '<strong>Data Laporan JSA Berhasil Dihapus</strong>
		<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/jsa');
	}

	public function proses_hapus_lampiran()
	{
		$this->db->where('id_lampiran', $this->input->post('id_lampiran'));
		$lampiran = $this->db->get('t_lampiran_laporan_pekerjaan')->row();

		$lampiranSebelum = FCPATH . 'assets/img/lampiran-pekerjaan/' . $lampiran->foto_sebelum;
		$lampiranproses = FCPATH . 'assets/img/lampiran-pekerjaan/' . $lampiran->foto_proses;
		$lampiransetelah = FCPATH . 'assets/img/lampiran-pekerjaan/' . $lampiran->foto_setelah;
		unlink($lampiranSebelum);
		unlink($lampiranproses);
		unlink($lampiransetelah);

		$this->db->where('id_lampiran', $this->input->post('id_lampiran'));
		$this->db->delete('t_lampiran_laporan_pekerjaan');
		$this->session->set_userdata(['id_view_laporan' => $lampiran->id_laporan_pekerjaan]);
		$this->session->set_flashdata('message', '<strong>Lampiran Laporan Pekerjaan Berhasil Dihapus</strong>
		<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/laporan-pekerjaan/edit-laporan-pekerjaan');
	}

	public function cetak_laporan_pekerjaan()
	{
		$id_laporan_pekerjaan = $this->input->post('id_laporan_pekerjaan');
		$id_atasan = $this->input->post('id_atasan');

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		$nama_file_pdf = "Laporan_Pekerjaan" . $id_laporan_pekerjaan;

		$this->db->where('id_laporan_pekerjaan =', $id_laporan_pekerjaan);
		$query = $this->db->get('t_laporan_pekerjaan')->row();

		$this->db->where('id_laporan_pekerjaan =', $id_laporan_pekerjaan);
		$lampiran = $this->db->get('t_lampiran_laporan_pekerjaan')->result();

		foreach ($lampiran as $l) {
			$this->encode_img_base64(base_url('assets/img/lampiran-pekerjaan/' . $l->foto_sebelum));
			$this->encode_img_base64(base_url('assets/img/lampiran-pekerjaan/' . $l->foto_proses));
			$this->encode_img_base64(base_url('assets/img/lampiran-pekerjaan/' . $l->foto_setelah));
		}

		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('d F Y');
		$foto = $this->encode_img_base64(base_url('assets/img/logo_pln.png'));

		if ($query) {
			$html = $this->load->view('admin/laporan_pekerjaan/pdf', [
				'atasan' => $atasan,
				'query' => $query,
				'lampiran' => $lampiran,
				'tanggal_sekarang' => $tanggal_sekarang,
				'foto' => $foto
			], true);
		} else {
			$this->load->view('admin/laporan_pekerjaan/pdf', ['query' => $query], true);
		}

		$filename = $nama_file_pdf;
		$paper = 'A4';
		$orientation = 'portrait';
		$stream = true;

		$this->pdfgenerator->generate($html, $filename, $paper, $orientation, $stream);
	}

	function encode_img_base64($img_path = false): string
	{
		if ($img_path) {
			$path = $img_path;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			return 'data:image/' . $type . ';base64,' . base64_encode($data);
		}
		return '';
	}
}
