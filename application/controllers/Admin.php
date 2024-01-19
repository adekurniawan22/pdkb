<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Personil_model');
		$this->load->model('Jabatan_model');
	}
	public function dashboard()
	{
		$data['title'] = 'Dashboard';
		$data['jumlah_personil'] = $this->Personil_model->jumlah_personil();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function personil()
	{
		$data['title'] = 'Personil';
		$data['personil'] = $this->Personil_model->dapat_personil();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/personil', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_personil()
	{
		$data['title'] = 'Personil';
		$data['jabatan'] = $this->Jabatan_model->dapat_jabatan();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/tambah_personil', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_personil()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[t_personil.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');

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
			} else {
				// Jika gagal upload, tampilkan error
				$error = $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>');
				$this->session->set_flashdata('message', $error);
				redirect('admin/proses_tambah_personil');
			}
		} else {
			$foto = 'default.jpg';
		}

		if ($this->form_validation->run() == false) {
			$this->tambah_personil();
		} else {

			$data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'foto' => $foto,
			);

			$result = $this->Personil_model->tambah_personil($data);
			if ($result) {
				$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-success" role="alert" style="color:white; display: inline-block;">
													<strong>Data Personil Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>
												</div>
											</div>');
				redirect('admin/personil');
			} else {
				$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-danger" role="alert" style="color:white; display: inline-block;">
													<strong>Data Personil Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>
												</div>
											</div>');
				redirect('admin/personil');
			}
		}
	}

	public function edit_personil()
	{
		$data['title'] = 'Personil';
		$data['jabatan'] = $this->Jabatan_model->dapat_jabatan();
		$data['personil'] = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/edit_personil', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_personil()
	{
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');

		$status_aktif = ($this->input->post('status_aktif') == 'on') ? '1' : '0';

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
			} else {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-danger" role="alert" style="color:white; display: inline-block;">
												<i class="bi bi-exclamation-circle-fill"></i>
													<strong>Kesalahan saat mengedit foto personil :' . $error . '</strong>
												</div>
											</div>');
				redirect('admin/personil');
			}
		} else {
			$getDataPersonil = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));
			$fotoLama = $getDataPersonil->foto;
			$foto = $fotoLama;
		}

		if ($this->form_validation->run() == false) {
			$this->edit_personil();
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'status_aktif' => $status_aktif,
				'foto' => $foto,
			);

			$result = $this->Personil_model->edit_personil($this->input->post('id_personil'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-success" role="alert" style="color:white; display: inline-block;">
													<strong>Data Personil Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>
												</div>
											</div>');
				redirect('admin/personil');
			} else {
				$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-danger" role="alert" style="color:white; display: inline-block;">
													<strong>Data Personil Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>
												</div>
											</div>');
				redirect('admin/personil');
			}
		}
	}

	public function proses_hapus_personil()
	{
		$this->db->where('id_personil', $this->input->post('id_personil'));
		$this->db->delete('t_personil');
		$this->session->set_flashdata('message', '<div class="mx-3 p-0">
												<div class="alert alert-success" role="alert" style="color:white; display: inline-block;">
													<strong>Data Personil Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>
												</div>
											</div>');
		redirect('admin/personil');
	}

	public function rencana_operasi()
	{
		$data['title'] = 'Personil';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
