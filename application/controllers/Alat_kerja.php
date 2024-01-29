<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_kerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Personil_model');
		$this->load->model('Jabatan_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Histori_alat_kerja_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_alat_kerja();
		$data['title'] = 'Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/tambah_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_alat_kerja()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_kerja', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');

		if ($this->form_validation->run() == false) {
			$this->tambah_alat_kerja();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_kerja' => $this->input->post('nama_alat_kerja'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
			);

			$result = $this->Alat_kerja_model->tambah_alat_kerja($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
				redirect('alat-kerja');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('alat-kerja');
			}
		}
	}

	public function edit_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_satu_alat_kerja($this->input->post('id_alat_kerja'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/edit_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_alat_kerja()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_kerja', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit_alat_kerja();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_kerja' => $this->input->post('nama_alat_kerja'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
			);

			$result = $this->Alat_kerja_model->edit_alat_kerja($this->input->post('id_alat_kerja'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
				redirect('alat-kerja');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('alat-kerja');
			}
		}
	}

	public function proses_hapus_alat_kerja()
	{
		$this->db->where('id_alat_kerja', $this->input->post('id_alat_kerja'));
		$this->db->delete('t_alat_kerja');
		$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('alat-kerja');
	}

	public function histori_alat_kerja()
	{
		$data['histori'] = $this->Histori_alat_kerja_model->dapat_histori_alat_kerja();
		$data['daftar_alat'] = $this->Histori_alat_kerja_model->dapat_daftar_alat_kerja();
		$data['title'] = 'Histori Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/histori_alat_kerja/histori_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_histori_alat_kerja()
	{
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_alat_kerja();
		$data['title'] = 'Histori Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/histori_alat_kerja/tambah_histori_alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_histori_alat_kerja()
	{
		$this->form_validation->set_rules('select_alat_kerja[]', 'Daftar Alat Kerja', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
		$this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar Alat Kerja', 'required');

		if ($this->form_validation->run() == false) {
			$this->tambah_histori_alat_kerja();
		} else {
			$this->db->select_max('id_histori_alat_kerja');
			$query = $this->db->get('t_histori_alat_kerja')->row_array();
			$id_histori_alat_kerja = $query['id_histori_alat_kerja'] + 1;

			for ($i = 0; $i < count($_POST["select_alat_kerja"]); $i++) {
				$this->db->where('id_alat_kerja', $_POST["select_alat_kerja"][$i]);
				$satuan = $this->db->get('t_alat_kerja')->row_array();
				$data = [
					'id_histori_alat_kerja' => $id_histori_alat_kerja,
					'id_alat_kerja' => $_POST["select_alat_kerja"][$i],
					'jumlah' => $_POST["select_jumlah"][$i] . ' ' . $satuan['satuan'],
					'keterangan' => $this->input->post('keterangan'),
					'penanggung_jawab' => $this->input->post('penanggung_jawab'),
					'tanggal_keluar' => $this->input->post('tanggal_keluar'),
					'status' => 'keluar'
				];

				$this->db->insert('t_histori_alat_kerja', $data);

				$this->Alat_kerja_model->edit_alat_kerja($_POST["select_alat_kerja"][$i], ['sedang_dipinjam' => $satuan['sedang_dipinjam'] + $_POST["select_jumlah"][$i]]);
			}

			$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			redirect('histori-alat-kerja');
		}
	}

	public function proses_edit_status_histori()
	{
		$status = ($this->input->post('status') == 'on') ? 'masuk' : 'keluar';
		$tanggal_sekarang = date('Y-m-d H:i:s');
		$this->db->where('id_histori_alat_kerja', $this->input->post('id_histori_alat_kerja'));
		$this->db->update('t_histori_alat_kerja', ['status' => $status, 'tanggal_masuk' => $tanggal_sekarang]);

		$this->db->where('id_histori_alat_kerja =', $this->input->post('id_histori_alat_kerja'));
		$query = $this->db->get('t_histori_alat_kerja')->result();

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
		redirect('histori-alat-kerja');
	}

	public function proses_hapus_histori_alat_kerja()
	{
		$this->db->where('id_histori_alat_kerja =', $this->input->post('id_histori_alat_kerja'));
		$query = $this->db->get('t_histori_alat_kerja')->result();

		if ($query->status == 'keluar') {
			foreach ($query as $row) {
				$id_alat_kerja = $row->id_alat_kerja;
				$jumlah = $row->jumlah;
				$angka = preg_replace("/[^0-9]/", '', $jumlah);

				$this->db->set('sedang_dipinjam', 'sedang_dipinjam - ' . $angka, false);
				$this->db->where('id_alat_kerja', $id_alat_kerja);
				$this->db->update('t_alat_kerja');
			}
		}

		$this->db->where('id_histori_alat_kerja', $this->input->post('id_histori_alat_kerja'));
		$this->db->delete('t_histori_alat_kerja');
		$this->session->set_flashdata('message', '<strong>Data Histori Alat Kerja Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('histori-alat-kerja');
	}

	public function cetak_histori_alat_kerja()
	{
		$id_histori_alat_kerja = $this->input->post('id_histori_alat_kerja');
		$nama_file_pdf = "Histori_Alat_Kerja_" . $id_histori_alat_kerja;

		$this->db->select('t_histori_alat_kerja.*, t_histori_alat_kerja.jumlah as jumlah_barang_keluar, t_alat_kerja.*');
		$this->db->from('t_histori_alat_kerja');
		$this->db->join('t_alat_kerja', 't_histori_alat_kerja.id_alat_kerja = t_alat_kerja.id_alat_kerja');
		$this->db->where('id_histori_alat_kerja =', $id_histori_alat_kerja);
		$query = $this->db->get()->result_array();
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('Y-M-d');
		$foto = $this->encode_img_base64(base_url('assets/img/logo.png'));

		if ($query) {
			$html = $this->load->view('admin/warehouse/histori_alat_kerja/pdf', ['query' => $query, 'tanggal_sekarang' => $tanggal_sekarang, 'foto' => $foto], true);
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
