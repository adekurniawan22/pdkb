<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Rencana_operasi_model');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jumlah_personil'] = $this->Personil_model->jumlah_personil();
		$data['jumlah_alat_kerja'] = $this->Alat_kerja_model->jumlah_alat_kerja();

		$data['jumlah_semua_rencana_operasi_selesai'] = $this->Rencana_operasi_model->jumlah_semua_rencana_operasi_selesai();

		$data['jumlah_rencana_selesai_perbulan'] = $this->Rencana_operasi_model->jumlah_rencana_selesai_perbulan();
		$data['dapat_persentase_rencana_tahun_ini'] = $this->Rencana_operasi_model->dapat_persentase_rencana_tahun_ini();

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/dashboard', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/dashboard', $data);
			$this->load->view('templates/footer');
		}
	}
}
