<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori_alat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Personil_model');
		$this->load->model('Jabatan_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Histori_alat_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['histori_alat'] = $this->Histori_alat_model->dapat_histori_alat();
		$data['title'] = 'Riwayat Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/histori_alat_kerja/histori_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_histori_alat()
	{
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_alat_kerja();
		$data['title'] = 'Riwayat Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/histori_alat_kerja/tambah_histori_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_histori_alat()
	{
		$signatureData = $this->input->post('signature_image');
		if (!empty($signatureData)) {
			$randomBytes = random_bytes(16); // Mendapatkan 16 byte nilai acak
			$fileName = 'signature_' . bin2hex($randomBytes) . '.png';
			file_put_contents('./assets/img/tanda-tangan/' . $fileName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData)));
		}

		$this->form_validation->set_rules('select_alat_kerja[]', 'Daftar Alat Kerja', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar Alat Kerja', 'required');

		if ($this->form_validation->run() == false) {
			$this->tambah_histori_alat();
		} else {
			$data_histori_alat = [
				'id_personil' => $this->session->userdata('id_personil'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'tanggal_keluar' => $this->input->post('tanggal_keluar'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => 'keluar',
				'sudah_disetujui' => '0',
				'tanda_tangan' => $fileName
			];


			$result = $this->Histori_alat_model->tambah_histori_alat($data_histori_alat);
			$id_histori_alat = $this->db->insert_id();


			for ($i = 0; $i < count($_POST["select_alat_kerja"]); $i++) {
				$this->db->where('id_alat_kerja', $_POST["select_alat_kerja"][$i]);
				$satuan = $this->db->get('t_alat_kerja')->row_array();
				$data = [
					'id_histori_alat' => $id_histori_alat,
					'id_alat_kerja' => $_POST["select_alat_kerja"][$i],
					'jumlah' => $_POST["select_jumlah"][$i] . ' ' . $satuan['satuan'],
				];

				$this->db->insert('t_detail_histori_alat', $data);

				$this->Alat_kerja_model->edit_alat_kerja($_POST["select_alat_kerja"][$i], ['sedang_dipinjam' => $satuan['sedang_dipinjam'] + $_POST["select_jumlah"][$i]]);
			}

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/histori-alat-kerja');
		}
	}

	public function proses_edit_status_histori()
	{
		$status = ($this->input->post('status') == 'on') ? 'masuk' : 'keluar';
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('Y-m-d H:i:s');
		$this->db->where('id_histori_alat', $this->input->post('id_histori_alat'));
		$this->db->update('t_histori_alat', ['status' => $status, 'tanggal_masuk' => $tanggal_sekarang]);

		$this->db->where('id_histori_alat =', $this->input->post('id_histori_alat'));
		$query = $this->db->get('t_detail_histori_alat')->result();

		foreach ($query as $row) {
			$id_alat_kerja = $row->id_alat_kerja;
			$jumlah = $row->jumlah;
			$angka = preg_replace("/[^0-9]/", '', $jumlah);

			$this->db->set('sedang_dipinjam', 'sedang_dipinjam - ' . $angka, false);
			$this->db->where('id_alat_kerja', $id_alat_kerja);
			$this->db->update('t_alat_kerja');
		}

		$this->session->set_flashdata('message', '<strong>Status Histori Alat Kerja Berhasil Diedit</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/histori-alat-kerja');
	}

	public function proses_hapus_histori_alat()
	{
		$histori_alat = $this->Histori_alat_model->dapat_satu_histori_alat($this->input->post('id_histori_alat'));
		$this->db->where('id_histori_alat =', $this->input->post('id_histori_alat'));
		$query = $this->db->get('t_detail_histori_alat')->result();

		if ($histori_alat->status == 'keluar') {
			foreach ($query as $row) {
				$id_alat_kerja = $row->id_alat_kerja;
				$jumlah = $row->jumlah;
				$angka = preg_replace("/[^0-9]/", '', $jumlah);

				$this->db->set('sedang_dipinjam', 'sedang_dipinjam - ' . $angka, false);
				$this->db->where('id_alat_kerja', $id_alat_kerja);
				$this->db->update('t_alat_kerja');
			}
		}

		$this->db->where('id_histori_alat', $this->input->post('id_histori_alat'));
		$result = $this->db->delete('t_histori_alat');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		redirect('admin/histori-alat-kerja');
	}

	public function cetak_histori_alat_kerja()
	{
		$id_histori_alat = $this->input->post('id_histori_alat');
		$id_atasan = $this->input->post('id_atasan');
		$nama_file_pdf = "Histori_Alat_" . $id_histori_alat;

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		$histori_alat = $this->Histori_alat_model->dapat_satu_histori_alat($id_histori_alat);

		$this->db->select('t_detail_histori_alat.*, t_detail_histori_alat.jumlah as jumlah_barang_keluar, t_alat_kerja.*');
		$this->db->from('t_detail_histori_alat');
		$this->db->join('t_alat_kerja', 't_detail_histori_alat.id_alat_kerja = t_alat_kerja.id_alat_kerja');
		$this->db->where('id_histori_alat =', $id_histori_alat);
		$query = $this->db->get()->result_array();

		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('Y-M-d');
		$foto = $this->encode_img_base64(base_url('assets/img/logo.png'));

		if ($query) {
			$html = $this->load->view('admin/warehouse/histori_alat_kerja/pdf', [
				'histori_alat' => $histori_alat,
				'atasan' => $atasan,
				'query' => $query,
				'tanggal_sekarang' => $tanggal_sekarang,
				'foto' => $foto
			], true);
		} else {
			$this->load->view('admin/warehouse/histori_alat_kerja/pdf', $query);
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
}
