<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_gudang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Personil_model');
		$this->load->model('Jabatan_model');
		$this->load->model('Alat_tower_ers_model');
		$this->load->model('Riwayat_gudang_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['riwayat_gudang'] = $this->Riwayat_gudang_model->dapat_riwayat_gudang();
		$data['title'] = 'Riwayat Gudang';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/riwayat_gudang/riwayat_gudang', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_riwayat_gudang()
	{
		$data['alat_tower_ers'] = $this->Alat_tower_ers_model->dapat_alat_tower_ers();
		$data['title'] = 'Riwayat Gudang';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/riwayat_gudang/tambah_riwayat_gudang', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_riwayat_gudang()
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
			$this->tambah_riwayat_gudang();
		} else {
			$data_riwayat_gudang = [
				'id_personil' => $this->session->userdata('id_personil'),
				'penanggung_jawab' => $this->input->post('penanggung_jawab'),
				'tanggal_keluar' => $this->input->post('tanggal_keluar'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => 'keluar',
				'sudah_disetujui' => '0',
				'tanda_tangan' => $fileName
			];


			$result = $this->Riwayat_gudang_model->tambah_riwayat_gudang($data_riwayat_gudang);
			$id_riwayat_gudang = $this->db->insert_id();


			for ($i = 0; $i < count($_POST["select_alat_kerja"]); $i++) {
				$this->db->where('id_alat_tower_ers', $_POST["select_alat_kerja"][$i]);
				$satuan = $this->db->get('t_alat_tower_ers')->row_array();
				$data = [
					'id_riwayat_gudang' => $id_riwayat_gudang,
					'id_alat_tower_ers' => $_POST["select_alat_kerja"][$i],
					'jumlah' => $_POST["select_jumlah"][$i] . ' ' . $satuan['satuan'],
				];

				$this->db->insert('t_detail_riwayat_gudang', $data);

				$this->Alat_tower_ers_model->edit_alat_tower_ers($_POST["select_alat_kerja"][$i], ['sedang_dipinjam' => $satuan['sedang_dipinjam'] + $_POST["select_jumlah"][$i]]);
			}

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Riwayat Gudang Tower ERS Kerja Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Riwayat Gudang Tower ERS Kerja Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/riwayat-gudang');
		}
	}

	public function proses_edit_status_riwayat()
	{
		$status = ($this->input->post('status') == 'on') ? 'masuk' : 'keluar';
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('Y-m-d H:i:s');
		$this->db->where('id_riwayat_gudang', $this->input->post('id_riwayat_gudang'));
		$this->db->update('t_riwayat_gudang', ['status' => $status, 'tanggal_masuk' => $tanggal_sekarang]);

		$this->db->where('id_riwayat_gudang =', $this->input->post('id_riwayat_gudang'));
		$query = $this->db->get('t_detail_riwayat_gudang')->result();

		foreach ($query as $row) {
			$id_alat_tower_ers = $row->id_alat_tower_ers;
			$jumlah = $row->jumlah;
			$angka = preg_replace("/[^0-9]/", '', $jumlah);

			$this->db->set('sedang_dipinjam', 'sedang_dipinjam - ' . $angka, false);
			$this->db->where('id_alat_tower_ers', $id_alat_tower_ers);
			$this->db->update('t_alat_tower_ers');
		}

		$this->session->set_flashdata('message', '<strong>Status Riwayat Gudang Alat Tower ERS Berhasil Diedit</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/riwayat-gudang');
	}

	public function proses_hapus_riwayat_gudang()
	{
		$riwayat_gudang = $this->Riwayat_gudang_model->dapat_satu_riwayat_gudang($this->input->post('id_riwayat_gudang'));
		$this->db->where('id_riwayat_gudang =', $this->input->post('id_riwayat_gudang'));
		$query = $this->db->get('t_detail_riwayat_gudang')->result();

		if ($riwayat_gudang->status == 'keluar') {
			foreach ($query as $row) {
				$id_alat_tower_ers = $row->id_alat_tower_ers;
				$jumlah = $row->jumlah;
				$angka = preg_replace("/[^0-9]/", '', $jumlah);

				$this->db->set('sedang_dipinjam', 'sedang_dipinjam - ' . $angka, false);
				$this->db->where('id_alat_tower_ers', $id_alat_tower_ers);
				$this->db->update('t_alat_tower_ers');
			}
		}

		$this->db->where('id_riwayat_gudang', $this->input->post('id_riwayat_gudang'));
		$result = $this->db->delete('t_riwayat_gudang');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Riwayat Gudang Tower ERS Kerja Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Riwayat Gudang Tower ERS Kerja Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		redirect('admin/riwayat-gudang');
	}

	public function cetak_riwayat_gudang()
	{
		$id_riwayat_gudang = $this->input->post('id_riwayat_gudang');
		$id_atasan = $this->input->post('id_atasan');
		$nama_file_pdf = "riwayat_gudang_" . $id_riwayat_gudang;

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		$riwayat_gudang = $this->Riwayat_gudang_model->dapat_satu_riwayat_gudang($id_riwayat_gudang);

		$this->db->select('t_detail_riwayat_gudang.*, t_detail_riwayat_gudang.jumlah as jumlah_barang_keluar, t_alat_tower_ers.*');
		$this->db->from('t_detail_riwayat_gudang');
		$this->db->join('t_alat_tower_ers', 't_detail_riwayat_gudang.id_alat_tower_ers = t_alat_tower_ers.id_alat_tower_ers');
		$this->db->where('id_riwayat_gudang =', $id_riwayat_gudang);
		$query = $this->db->get()->result_array();

		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('Y-M-d');
		$foto = $this->encode_img_base64(base_url('assets/img/logo.png'));

		if ($query) {
			$html = $this->load->view('admin/warehouse/riwayat_gudang/pdf', [
				'riwayat_gudang' => $riwayat_gudang,
				'atasan' => $atasan,
				'query' => $query,
				'tanggal_sekarang' => $tanggal_sekarang,
				'foto' => $foto
			], true);
		} else {
			$this->load->view('admin/warehouse/riwayat_gudang/pdf', $query);
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
