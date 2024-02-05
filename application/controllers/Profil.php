<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('upload');
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
		$check_data_personil = $this->Personil_model->dapat_satu_personil($this->session->userdata('id_personil'));

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if ($this->input->post('email') != $check_data_personil->email) {
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|trim|is_unique[t_personil.email]|valid_email'
			);
		}
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|integer');
		if ($this->input->post('username') != $check_data_personil->username) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'required|trim|is_unique[t_personil.username]|regex_match[/^[a-z0-9_]+$/]'
			);
		}
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if (!empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');
			$foto = $this->validasi_foto('ambil_foto');
		} else {
			$foto = $this->input->post('foto_lama');
		}

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'alamat' => $this->input->post('alamat'),
			);

			if (!empty($_FILES['foto']['name'])) {

				$data['foto'] = $foto;
			}

			$result = $this->Personil_model->edit_personil($this->session->userdata('id_personil'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<strong>Profil Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Profil Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('profil');
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

	function validasi_foto($param)
	{
		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_message('validasi_foto', 'Foto tidak boleh kosong');
			return false;
		} else {
			$config_foto = array(
				'upload_path' => './assets/img/profil',
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => 2048, // 2MB
			);
			$this->upload->initialize($config_foto);

			if ($this->upload->do_upload('foto')) {
				// Proses upload berhasil, lanjutkan dengan logika yang diinginkan
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];

				if ($param == null) {
					unlink(FCPATH . 'assets/img/profil/' . $foto);
					return true; // Kembalikan true jika semuanya berjalan dengan baik
				} else {
					return $foto;
				}
			} else {
				// Proses upload gagal, set pesan kesalahan
				$this->form_validation->set_message('validasi_foto', 'Upload foto gagal. ' . $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>'));
				return false; // Kembalikan false jika ada kesalahan
			}
		}
	}
}
