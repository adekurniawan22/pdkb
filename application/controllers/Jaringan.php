<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaringan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Jaringan_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['jaringan'] = $this->Jaringan_model->dapat_jaringan();
		$data['title'] = 'Jaringan';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/jaringan/jaringan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_jaringan()
	{
		$data['title'] = 'Jaringan';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/jaringan/tambah_jaringan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_jaringan();
		} else {
			$data_jaringan = [
				'id_personil' => $this->session->userdata('id_personil'),
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
			];

			$result = $this->Jaringan_model->tambah_jaringan($data_jaringan);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/jaringan');
		}
	}
	public function edit_jaringan()
	{
		$data['title'] = 'Jaringan';
		$data['jaringan'] = $this->Jaringan_model->dapat_satu_jaringan($this->input->post('id_jaringan'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/anomali/jaringan/edit_jaringan', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$status_dikerjakan = ($this->input->post('status_dikerjakan') == 'on') ? '1' : '0';

		if ($this->form_validation->run() == false) {
			$this->edit_jaringan();
		} else {
			$data_jaringan = [
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
				'status_dikerjakan' => $status_dikerjakan,
			];

			$result = $this->Jaringan_model->edit_jaringan($this->input->post('id_jaringan'), $data_jaringan);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('admin/jaringan');
		}
	}


	public function proses_hapus_jaringan()
	{
		$this->db->where('id_jaringan', $this->input->post('id_jaringan'));
		$result = $this->db->delete('t_jaringan');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		redirect('admin/jaringan');
	}
}
