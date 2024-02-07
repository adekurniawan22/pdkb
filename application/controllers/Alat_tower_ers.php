<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_tower_ers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Alat_tower_ers_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['alat_tower_ers'] = $this->Alat_tower_ers_model->dapat_alat_tower_ers();
		$data['title'] = 'Alat Tower ERS';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_tower_ers/alat_tower_ers', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_alat_tower_ers()
	{
		$data['title'] = 'Alat Tower ERS';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_tower_ers/tambah_alat_tower_ers', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_alat_tower_ers()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_tower_ers', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('merk', 'Merk', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');
		$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'required|callback_validate_year');

		if ($this->form_validation->run() == false) {
			$this->tambah_alat_tower_ers();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_tower_ers' => $this->input->post('nama_alat_tower_ers'),
				'merk' => $this->input->post('merk'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
			);

			if ($this->input->post('tanggal_kadaluarsa')) {
				$data['tanggal_kadaluarsa'] = $this->input->post('tanggal_kadaluarsa');
			}

			$result = $this->Alat_tower_ers_model->tambah_alat_tower_ers($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Tower ERS Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Tower ERS Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/alat-tower-ers');
		}
	}

	public function edit_alat_tower_ers()
	{
		$data['title'] = 'Alat Tower ERS';
		$data['alat_tower_ers'] = $this->Alat_tower_ers_model->dapat_satu_alat_tower_ers($this->input->post('id_alat_tower_ers'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_tower_ers/edit_alat_tower_ers', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_alat_tower_ers()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_tower_ers', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('merk', 'Merk', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');
		$this->form_validation->set_rules('tahun_pengadaan', 'Tahun Pengadaan', 'required|callback_validate_year');

		if ($this->form_validation->run() == false) {
			$this->tambah_alat_tower_ers();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_tower_ers' => $this->input->post('nama_alat_tower_ers'),
				'merk' => $this->input->post('merk'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
				'tahun_pengadaan' => $this->input->post('tahun_pengadaan'),
			);

			if ($this->input->post('tanggal_kadaluarsa')) {
				$data['tanggal_kadaluarsa'] = $this->input->post('tanggal_kadaluarsa');
			}

			$result = $this->Alat_tower_ers_model->edit_alat_tower_ers($this->input->post('id_alat_tower_ers'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Tower ERS Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Tower ERS Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/alat-tower-ers');
		}
	}

	public function proses_hapus_alat_tower_ers()
	{
		$this->db->where('id_alat_tower_ers', $this->input->post('id_alat_tower_ers'));
		$this->db->delete('t_alat_tower_ers');
		$this->session->set_flashdata('message', '<strong>Data Alat Tower ERS Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/alat-tower-ers');
	}

	public function validate_year($str)
	{
		if (!preg_match('/^\d{4}$/', $str)) {
			$this->form_validation->set_message('validate_year', 'Format tahun harus YYYY.');
			return FALSE;
		}
		return TRUE;
	}
}
