<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pekerjaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Laporan_pekerjaan_model');
		$this->load->model('SPKI_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['laporan_pekerjaan'] = $this->Laporan_pekerjaan_model->dapat_laporan_pekerjaan();
		$data['lampiran_laporan_pekerjaan'] = $this->Laporan_pekerjaan_model->dapat_lampiran_laporan_pekerjaan();
		$data['title'] = 'Laporan Pekerjaan';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/laporan_pekerjaan/laporan_pekerjaan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_laporan_pekerjaan()
	{
		$data['title'] = 'Tambah Laporan Pekerjaan';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/laporan_pekerjaan/tambah_laporan_pekerjaan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_laporan_pekerjaan()
	{
		$this->form_validation->set_rules('dasar_pelaksanaan', 'Dasar Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('lingkup_pekerjaan', 'Lingkup Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('hasil_pekerjaan', 'Hasil Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('penutup', 'Penutup', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->edit_laporan_pekerjaan();
		} else {
			$data = [
				'dasar_pelaksanaan' => $this->input->post('dasar_pelaksanaan'),
				'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
				'lingkup_pekerjaan' => $this->input->post('lingkup_pekerjaan'),
				'hasil_pekerjaan' => $this->input->post('hasil_pekerjaan'),
				'penutup' => $this->input->post('penutup'),
			];

			$result = $this->Laporan_pekerjaan_model->tambah_laporan_pekerjaan($data);
			$id_laporan_pekerjaan = $this->db->insert_id();

			if ($result) {
				$this->handleFileUpload('lampiran_sebelum', $_FILES['lampiran_sebelum'], $data_lampiran_sebelum);
				$this->handleFileUpload('lampiran_proses', $_FILES['lampiran_proses'], $data_lampiran_proses);
				$this->handleFileUpload('lampiran_setelah', $_FILES['lampiran_setelah'], $data_lampiran_setelah);

				$this->processLampiranData($id_laporan_pekerjaan, $_POST['judul_lampiran'], $data_lampiran_sebelum, $data_lampiran_proses, $data_lampiran_setelah);

				$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Berhasil Ditambahkan</strong>
															<i class="bi bi-check-circle-fill"></i>');
				redirect('laporan-pekerjaan');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Gagal Ditambahkan</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('laporan-pekerjaan');
			}
		}
	}
	public function edit_laporan_pekerjaan()
	{
		$data['lampiran_laporan_pekerjaan'] = $this->Laporan_pekerjaan_model->dapat_lampiran_laporan_pekerjaan();
		$data['title'] = 'Edit Laporan Pekerjaan';
		$data['laporan_pekerjaan'] = $this->db->get_where('t_laporan_pekerjaan', ['id_laporan_pekerjaan' => $this->input->post('id_laporan_pekerjaan')])->row();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/laporan_pekerjaan/edit_laporan_pekerjaan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_laporan_pekerjaan()
	{
		$this->form_validation->set_rules('dasar_pelaksanaan', 'Dasar Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('waktu_pelaksanaan', 'Waktu Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('lingkup_pekerjaan', 'Lingkup Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('hasil_pekerjaan', 'Hasil Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('penutup', 'Penutup', 'required|trim');


		if ($this->form_validation->run() == false) {
			$this->edit_laporan_pekerjaan();
		} else {
			$data = [
				'dasar_pelaksanaan' => $this->input->post('dasar_pelaksanaan'),
				'waktu_pelaksanaan' => $this->input->post('waktu_pelaksanaan'),
				'lingkup_pekerjaan' => $this->input->post('lingkup_pekerjaan'),
				'hasil_pekerjaan' => $this->input->post('hasil_pekerjaan'),
				'penutup' => $this->input->post('penutup'),
			];

			$id_laporan_pekerjaan = $this->input->post('id_laporan_pekerjaan');
			$result = $this->Laporan_pekerjaan_model->edit_laporan_pekerjaan($id_laporan_pekerjaan, $data);

			if ($id_laporan_pekerjaan or $_FILES['lampiran_sebelum'] != NULL and $_FILES['lampiran_proses'] != NULL and $_FILES['lampiran_setelah'] != NULL) {
				$this->handleFileUpload('lampiran_sebelum', $_FILES['lampiran_sebelum'], $data_lampiran_sebelum);
				$this->handleFileUpload('lampiran_proses', $_FILES['lampiran_proses'], $data_lampiran_proses);
				$this->handleFileUpload('lampiran_setelah', $_FILES['lampiran_setelah'], $data_lampiran_setelah);

				$this->processLampiranData($id_laporan_pekerjaan, $_POST['judul_lampiran'], $data_lampiran_sebelum, $data_lampiran_proses, $data_lampiran_setelah);

				$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Berhasil Diedit</strong>
															<i class="bi bi-check-circle-fill"></i>');
				redirect('laporan-pekerjaan');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Gagal Diedit</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('laporan-pekerjaan');
			}
		}
	}

	public function proses_hapus_laporan_pekerjaan()
	{
		$this->db->where('id_laporan_pekerjaan', $this->input->post('id_laporan_pekerjaan'));
		$lampiran = $this->db->get('t_lampiran_laporan_pekerjaan')->result();

		foreach ($lampiran as $l) {
			$lampiranSebelum = FCPATH . 'assets/img/lampiran-pekerjaan/' . $l->foto_sebelum;
			$lampiranproses = FCPATH . 'assets/img/lampiran-pekerjaan/' . $l->foto_proses;
			$lampiransetelah = FCPATH . 'assets/img/lampiran-pekerjaan/' . $l->foto_setelah;
			unlink($lampiranSebelum);
			unlink($lampiranproses);
			unlink($lampiransetelah);
		}

		$this->db->where('id_laporan_pekerjaan', $this->input->post('id_laporan_pekerjaan'));
		$this->db->delete('t_laporan_pekerjaan');
		$this->session->set_flashdata('message', '<strong>Data Laporan Pekerjaan Berhasil Dihapus</strong>
		<i class="bi bi-check-circle-fill"></i>');
		redirect('laporan-pekerjaan');
	}

	public function cetak_laporan_pekerjaan()
	{
		$id_laporan_pekerjaan = $this->input->post('id_laporan_pekerjaan');
		$nama_file_pdf = "laporan_pekerjaan_" . $id_laporan_pekerjaan;

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
			$html = $this->load->view('admin/laporan_pekerjaan/pdf', ['query' => $query, 'lampiran' => $lampiran, 'tanggal_sekarang' => $tanggal_sekarang, 'foto' => $foto], true);
		} else {
			$this->load->view('admin/laporan_pekerjaan/pdf', ['query' => $query], true);
		}

		$filename = $nama_file_pdf;
		$paper = 'A4';
		$orientation = 'portrait';
		$stream = true;

		if (!empty($query)) {
			$this->pdfgenerator->generate($html, $filename, $paper, $orientation, $stream);
		}
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

	private function handleFileUpload($uploadConfig, $fileData, &$dataArray)
	{
		$config_lampiran = array(
			'upload_path' => './assets/img/lampiran-pekerjaan',
			'allowed_types' => 'jpg|jpeg|png',
			'max_size' => 2048, // 2MB
		);

		$this->load->library('upload', $config_lampiran);

		for ($i = 0; $i < count($fileData['name']); $i++) {
			$_FILES[$uploadConfig]['name']     = $fileData['name'][$i];
			$_FILES[$uploadConfig]['type']     = $fileData['type'][$i];
			$_FILES[$uploadConfig]['tmp_name'] = $fileData['tmp_name'][$i];
			$_FILES[$uploadConfig]['error']    = $fileData['error'][$i];
			$_FILES[$uploadConfig]['size']     = $fileData['size'][$i];

			if ($this->upload->do_upload($uploadConfig)) {
				$uploadData = $this->upload->data();
				$nama_file = $uploadData['file_name'];
				$dataArray[] = $nama_file;
			}
		}
	}

	private function processLampiranData($id_laporan_pekerjaan, $judul_lampiran, $data_lampiran_sebelum, $data_lampiran_proses, $data_lampiran_setelah)
	{
		for ($i = 0; $i < count($data_lampiran_sebelum); $i++) {
			$data = [
				'id_laporan_pekerjaan' => $id_laporan_pekerjaan,
				'judul_lampiran' => $judul_lampiran[$i],
				'foto_sebelum' => $data_lampiran_sebelum[$i],
				'foto_proses' => $data_lampiran_proses[$i],
				'foto_setelah' => $data_lampiran_setelah[$i],
			];

			$this->Laporan_pekerjaan_model->tambah_lampiran_laporan_pekerjaan($data);
		}
	}
}
