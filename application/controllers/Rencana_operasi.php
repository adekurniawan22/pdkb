<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rencana_operasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Rencana_operasi_model');
	}

	public function index()
	{
		$data['rencana_operasi'] = $this->Rencana_operasi_model->dapat_rencana_operasi();
		$data['title'] = 'Rencana Operasi';
		$this->load->view('templates/header', $data);
		$this->load->view('atasan/rencana_operasi/rencana_operasi', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_rencana_operasi()
	{
		$data['title'] = 'Rencana Operasi';
		$this->load->view('templates/header', $data);
		$this->load->view('atasan/rencana_operasi/tambah_rencana_operasi', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_rencana_operasi()
	{
		$this->form_validation->set_rules('nama_rencana', 'Nama Rencana Operasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_dikerjakan', 'Tanggal Dikerjakan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_rencana_operasi();
		} else {
			$data = array(
				'nama_rencana' => $this->input->post('nama_rencana'),
				'tanggal_dikerjakan' => $this->input->post('tanggal_dikerjakan'),
				'status' => '0'
			);

			$result = $this->Rencana_operasi_model->tambah_rencana_operasi($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Rencana Operasi Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Rencana Operasi Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('atasan/rencana-operasi');
		}
	}

	public function edit_rencana_operasi()
	{
		$data['title'] = 'Rencana Operasi';
		$data['rencana_operasi'] = $this->Rencana_operasi_model->dapat_satu_rencana_operasi($this->input->post('id_rencana_operasi'));
		$this->load->view('templates/header', $data);
		$this->load->view('atasan/rencana_operasi/edit_rencana_operasi', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_rencana_operasi()
	{
		$this->form_validation->set_rules('nama_rencana', 'Nama Rencana Operasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_dikerjakan', 'Tanggal Dikerjakan', 'required|trim');
		if ($this->input->post('tanggal_selesai')) {
			$this->form_validation->set_rules('tanggal_selesai', 'Tanggal Selesai', 'required|trim');
		}

		if ($this->form_validation->run() == false) {
			$this->tambah_rencana_operasi();
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$tahun_sekarang = date('Y');
			$data = array(
				'nama_rencana' => $this->input->post('nama_rencana'),
				'tanggal_dikerjakan' => $this->input->post('tanggal_dikerjakan'),
			);

			if ($this->input->post('tanggal_selesai')) {
				$data['tanggal_selesai'] = $this->input->post('tanggal_selesai');
			}

			$result = $this->Rencana_operasi_model->edit_rencana_operasi($this->input->post('id_rencana_operasi'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Rencana Operasi Berhasil Diedit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Rencana Operasi Gagal Diedit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('atasan/rencana-operasi');
		}
	}

	public function prose_edit_status_rencana_operasi()
	{
		$status = ($this->input->post('status') == 'on') ? '1' : '0';
		$tanggal_sekarang = date('Y-m-d H:i:s');
		$this->db->where('id_rencana_operasi', $this->input->post('id_rencana_operasi'));
		$this->db->update('t_rencana_operasi', ['status' => $status, 'tanggal_selesai' => $tanggal_sekarang]);

		$this->session->set_flashdata('message', '<strong>Status Rencana Operasi Berhasil Diedit</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('atasan/rencana-operasi');
	}

	public function proses_hapus_rencana_operasi()
	{
		$this->db->where('id_rencana_operasi', $this->input->post('id_rencana_operasi'));
		$this->db->delete('t_rencana_operasi');
		$this->session->set_flashdata('message', '<strong>Data Rencana Operasi Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('atasan/rencana-operasi');
	}
}
