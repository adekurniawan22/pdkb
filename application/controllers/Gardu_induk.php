<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Gardu_induk_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['gardu_induk'] = $this->Gardu_induk_model->dapat_gardu_induk();
		$data['title'] = 'Gardu Induk';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/gardu_induk/gardu_induk', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_gardu_induk()
	{
		$data['title'] = 'Gardu Induk';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/gardu_induk/tambah_gardu_induk', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_gardu_induk()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay', 'Bay', 'required|trim');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_gardu_induk();
		} else {
			$data_gardu_induk = [
				'id_personil' => $this->session->userdata('id_personil'),
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay' => $this->input->post('bay'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
			];

			$result = $this->Gardu_induk_model->tambah_gardu_induk($data_gardu_induk);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/gardu-induk');
		}
	}
	public function edit_gardu_induk()
	{
		$data['title'] = 'Gardu Induk';
		$data['gardu_induk'] = $this->Gardu_induk_model->dapat_satu_gardu_induk($this->input->post('id_gardu_induk'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/gardu_induk/edit_gardu_induk', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_gardu_induk()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay', 'Bay', 'required|trim');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$status_dikerjakan = ($this->input->post('status_dikerjakan') == 'on') ? '1' : '0';


		if ($this->form_validation->run() == false) {
			$this->edit_gardu_induk();
		} else {
			$data_gardu_induk = [
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay' => $this->input->post('bay'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
				'status_dikerjakan' => $status_dikerjakan,
			];

			$result = $this->Gardu_induk_model->edit_gardu_induk($this->input->post('id_gardu_induk'), $data_gardu_induk);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/gardu-induk');
		}
	}


	public function proses_hapus_gardu_induk()
	{
		$this->db->where('id_gardu_induk', $this->input->post('id_gardu_induk'));
		$result = $this->db->delete('t_gardu_induk');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		redirect('admin/gardu-induk');
	}
}
