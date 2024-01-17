<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('login', $data);
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->login();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->db->where('username', $username);
			$user = $this->db->get('t_pegawai')->row_array();

			if ($user) {
				if ($user['status_aktif'] == 1 && password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'id_role' => $user['id_role'],
						'id_pegawai' => $user['id_pegawai']
					];
					$this->session->set_userdata($data);

					switch ($user['id_role']) {
						case 1:
							redirect('admin/dashboard');
							break;
						case 2:
							redirect('pegawai');
							break;
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color:white">
		                <div class="d-flex justify-content-between align-items-center">
		                    <strong>Password kamu salah!</strong>
		                    <i class="bi bi-exclamation-circle-fill"></i>
		                </div>
		                </div>');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" style="color:white">
		            <div class="d-flex justify-content-between align-items-center">
						<strong>Akun tidak ditemukan!</strong>
		                <i class="bi bi-exclamation-circle-fill"></i>
		            </div>
		            </div>');
				redirect(base_url());
			}
		}
	}

	public function logout()
	{
		unset(
			$_SESSION['username'],
			$_SESSION['id_role'],
			$_SESSION['id_pegawai'],
		);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" style="color:white">
            <div class="d-flex justify-content-between align-items-center">
				<strong>Kamu berhasil Logout!</strong>
                <i class="bi bi-check-circle-fill"></i>
            </div>
        </div>
        ');
		redirect(base_url());
	}
}
