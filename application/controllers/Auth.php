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
		$this->form_validation->set_rules('username', 'Username', 'required|trim|regex_match[/^[a-z0-9_]+$/]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->login();
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->db->where('username', $username);
			$personil = $this->db->get('t_personil')->row();

			if ($personil) {
				if ($personil->status_aktif == '1') {

					if (password_verify($password, $personil->password)) {
						$data = [
							'username' => $personil->username,
							'nama' => $personil->nama,
							'id_jabatan' => $personil->id_jabatan,
							'id_personil' => $personil->id_personil
						];
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<strong>Login Berhasil</strong>
																<i class="bi bi-check-circle-fill"></i><br>
																Selamat Datang Kembali <strong>' . $personil->nama . '</strong>');

						switch ($personil->id_jabatan) {
							case 1:
							case 2:
								redirect('atasan/dashboard');
								break;
							case 3:
								redirect('admin/dashboard');
								break;
							case 4:
								redirect('jtc/dashboard');
								break;
						}
					} else {
						$this->session->set_flashdata('message', '<strong>Maaf, password anda salah!</strong>
		                    <i class="bi bi-exclamation-circle-fill"></i>');
						redirect(base_url());
					}
				} else {
					$this->session->set_flashdata('message', '<strong>Maaf, akun anda dinonaktifkan!</strong>
		                    <i class="bi bi-exclamation-circle-fill"></i>');
					redirect(base_url());
				}
			} else {
				$this->session->set_flashdata('message', '<strong>Akun anda tidak ditemukan!</strong>
		                <i class="bi bi-exclamation-circle-fill"></i>');
				redirect(base_url());
			}
		}
	}

	public function logout()
	{
		unset(
			$_SESSION['username'],
			$_SESSION['nama'],
			$_SESSION['id_jabatan'],
			$_SESSION['id_personil'],
		);
		$this->session->set_flashdata('logout', '<strong>Kamu Berhasil Logout</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect(base_url());
	}
}
