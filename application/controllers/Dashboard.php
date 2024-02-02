<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jumlah_personil'] = $this->Personil_model->jumlah_personil();
		$data['jumlah_alat_kerja'] = $this->Alat_kerja_model->jumlah_alat_kerja();
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
