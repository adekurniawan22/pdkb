<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personil extends CI_Controller
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
		$data['title'] = 'Personil';
		$data['personil'] = $this->Personil_model->dapat_personil();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/personil', $data);
		$this->load->view('templates/footer');
	}

	public function get_sertifikat()
	{
		$data['title'] = 'Personil';
		$data['sertifikat'] = $this->Personil_model->get_sertifikat_detail($this->input->post('id_personil'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/personil/view_sertifikat', $data);
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
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|integer|is_unique[t_personil.nip]');
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|is_unique[t_personil.username]|regex_match[/^[a-z0-9_\.]+$/]'
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('foto', 'Foto', 'callback_file_selected_test');

		if ($this->form_validation->run() == false) {
			$this->tambah_personil();
		} else {
			if (!empty($_FILES['foto']['name'])) {
				$config_foto = array(
					'upload_path' => './assets/img/profil',
					'allowed_types' => 'jpg|jpeg|png',
					'max_size' => 2048, // 2MB
				);

				$this->load->library('upload', $config_foto);

				if ($this->upload->do_upload('foto')) {
					$foto_data = $this->upload->data();
					$foto = $foto_data['file_name'];
					unset($this->upload);
				} else {
					$error = $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>');
					$this->session->set_flashdata('message', $error);
					redirect('personil/proses-tambah-personil');
				}
			} else {
				$foto = 'default.jpg';
			}

			$data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'id_jabatan' => $this->input->post('id_jabatan'),
				'foto' => $foto,
			);

			$result = $this->Personil_model->tambah_personil($data);
			$new_id = $this->db->insert_id();

			$config_sertifikat = array(
				'upload_path' => './assets/img/sertifikat',
				'allowed_types' => 'jpg|jpeg|png|pdf',
			);
			if (!$_FILES['s_diklat']['name'][0] == "") {
				$s_diklat = $_FILES['s_diklat'];
				$this->load->library('upload', $config_sertifikat);

				for ($i = 0; $i < count($s_diklat['name']); $i++) {
					$_FILES['s_diklat']['name']     = $s_diklat['name'][$i];
					$_FILES['s_diklat']['type']     = $s_diklat['type'][$i];
					$_FILES['s_diklat']['tmp_name'] = $s_diklat['tmp_name'][$i];
					$_FILES['s_diklat']['error']    = $s_diklat['error'][$i];
					$_FILES['s_diklat']['size']     = $s_diklat['size'][$i];

					if ($this->upload->do_upload('s_diklat')) {
						$sertifikat_data = $this->upload->data();
						$sertifikat = $sertifikat_data['file_name'];

						$dataSertifikat = [
							'id_personil' => $new_id,
							'jenis_sertifikat' => 'Sertifikat Diklat', // Sesuaikan jenis sertifikat
							'nama_file' => $sertifikat,
						];
						$this->db->insert('t_sertifikat', $dataSertifikat);
					} else {
						$error = $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>');
						$this->session->set_flashdata('message', $error);
						redirect('personil/proses-tambah-personil');
					}
				}
			}

			if (!$_FILES['s_kompetensi']['name'][0] == "") {
				$s_kompetensi = $_FILES['s_kompetensi'];
				$this->load->library('upload', $config_sertifikat);

				for ($i = 0; $i < count($s_kompetensi['name']); $i++) {
					$_FILES['s_kompetensi']['name']     = $s_kompetensi['name'][$i];
					$_FILES['s_kompetensi']['type']     = $s_kompetensi['type'][$i];
					$_FILES['s_kompetensi']['tmp_name'] = $s_kompetensi['tmp_name'][$i];
					$_FILES['s_kompetensi']['error']    = $s_kompetensi['error'][$i];
					$_FILES['s_kompetensi']['size']     = $s_kompetensi['size'][$i];

					if ($this->upload->do_upload('s_kompetensi')) {
						$sertifikat_data = $this->upload->data();
						$sertifikat = $sertifikat_data['file_name'];

						unset($this->upload);
						$dataSertifikat = [
							'id_personil' => $new_id,
							'jenis_sertifikat' => 'Sertifikat Kompetensi', // Sesuaikan jenis sertifikat
							'nama_file' => $sertifikat,
						];
						$this->db->insert('t_sertifikat', $dataSertifikat);
					} else {
						$error = $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>');
						$this->session->set_flashdata('message', $error);
						redirect('personil/proses-tambah-personil');
					}
				}
			}

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Personil Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
				redirect('personil');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Personil Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('personil');
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
		$check_data_user = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));
		if ($this->input->post('nip') != $check_data_user->nip) {
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim|integer|is_unique[t_personil.nip]');
		}
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
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
				$this->session->set_flashdata('message', '<i class="bi bi-exclamation-circle-fill"></i> 
												<strong>Kesalahan saat mengedit foto personil :' . $error . '</strong>');
				redirect('personil');
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
				$this->session->set_flashdata('message', '<strong>Data Personil Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
				redirect('personil');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Personil Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('personil');
			}
		}
	}

	public function proses_hapus_personil()
	{
		$sertifikat = $this->Personil_model->get_sertifikat_detail($this->input->post('id_personil'));

		foreach ($sertifikat as $s) {
			$sertifikatPath = FCPATH . 'assets/img/sertifikat/' . $s->nama_file;
			unlink($sertifikatPath);
		}

		$personil = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));
		unlink(FCPATH . 'assets/img/profil/' . $personil->foto);

		$this->db->where('id_personil', $this->input->post('id_personil'));
		$this->db->delete('t_personil');
		$this->session->set_flashdata('message', '<strong>Data Personil Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('personil');
	}

	function file_selected_test()
	{

		$this->form_validation->set_message('file_selected_test', 'Foto tidak boleh kosong');
		if (empty($_FILES['foto']['name'])) {
			return false;
		} else {
			return true;
		}
	}
}
