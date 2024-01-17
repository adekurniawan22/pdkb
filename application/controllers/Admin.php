<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function dashboard()
	{
		$data['title'] = 'Login';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function personil()
	{
		$data['title'] = 'Personil';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/personil', $data);
		$this->load->view('templates/footer');
	}
	public function rencana_operasi()
	{
		$data['title'] = 'Personil';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
