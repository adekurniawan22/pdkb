<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Personil_model');
		$this->load->model('Jabatan_model');
	}

	public function index()
	{
		$data['title'] = 'Profil';
		$data['profil'] = $this->Personil_model->dapat_satu_personil_dan_jabatan($this->session->userdata('id_personil'));
		$this->load->view('templates/header', $data);
		$this->load->view('profil/profil', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_profil()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|integer');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');

		$data = array(
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'username' => $this->input->post('username'),
		);

		if (!empty($_FILES['foto']['name'])) {
			// Konfigurasi upload
			$config['upload_path'] = './assets/img/profil';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048; // 2MB

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				// Jika berhasil diupload, ambil nama file
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];
				$data['foto'] = $foto;
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<i class="bi bi-exclamation-circle-fill"></i> 
												<strong>Kesalahan saat mengedit foto profil :' . $error . '</strong>');
				redirect('profil');
			}
		}

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {

			$result = $this->Profil_model->edit_profil($this->session->userdata('id_personil'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<strong>Profil Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
				redirect('profil');
			} else {
				$this->session->set_flashdata('message', '<strong>Profil Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('profil');
			}
		}
	}

	public function proses_edit_password()
	{
		if ($this->input->post('password_lama')) {
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'callback_check_current_password');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|callback_check_new_password');
			$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru]');
		}

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data = array(
				'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
			);

			$result = $this->Profil_model->edit_profil($this->session->userdata('id_personil'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Ganti Password Berhasil</strong>
															<i class="bi bi-check-circle-fill"></i>');
				redirect('profil');
			} else {
				$this->session->set_flashdata('message', '<strong>Ganti Password Gagal</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('profil');
			}
		}
	}

	public function check_current_password($current_password)
	{
		$id_personil = $this->session->userdata('id_personil'); // Gantilah dengan cara Anda menyimpan ID personil
		$db_password = $this->db
			->select('password')
			->where('id_personil', $id_personil)
			->get('t_personil')
			->row()
			->password;

		if (!password_verify($current_password, $db_password)) {
			$this->form_validation->set_message('check_current_password', 'Password saat ini salah!');
			return false;
		}
		return true;
	}

	public function check_new_password($password_baru)
	{
		$password_lama = $this->input->post('password_lama'); // Ambil nilai dari form

		if ($password_lama === $password_baru) {
			$this->form_validation->set_message('check_new_password', 'Password baru harus berbeda dengan password saat ini!');
			return false;
		}
		return true;
	}
}
