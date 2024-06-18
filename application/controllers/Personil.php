<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('id_jabatan'))) {
			$this->session->set_flashdata('message', '<strong>Akses ditolak, silahkan login terlebih dahulu!</strong>
		                <i class="bi bi-exclamation-circle-fill"></i>');
			redirect(base_url());
		}
		$this->load->library('form_validation');
		$this->load->model('Jabatan_model');
		$this->load->model('Sertifikat_model');
		$this->load->model('Personil_model');
		$this->load->library('upload');
	}

	public function index()
	{
		unset(
			$_SESSION['id_view_sertifikat']
		);
		$data['title'] = 'Personil';
		$data['jabatan'] = $this->Jabatan_model->dapat_jabatan();
		$data['personil'] = $this->Personil_model->dapat_personil();
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/personil/personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/personil/personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/personil/personil', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_personil()
	{
		$data['title'] = 'Personil';
		$data['jabatan'] = $this->Jabatan_model->dapat_jabatan();

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/personil/tambah_personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/personil/tambah_personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/personil/tambah_personil', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_personil()
	{
		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|is_unique[t_personil.nip]');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|is_unique[t_personil.email]|valid_email'
		);
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|integer');
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|is_unique[t_personil.username]|regex_match[/^[a-z0-9_]+$/]'
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_personil();
		} else {
			if (isset($_FILES['foto'])) {
				$config_foto = array(
					'upload_path' => './assets/img/profil',
					'allowed_types' => 'jpg|jpeg|png|pdf',
				);
				$this->upload->initialize($config_foto);

				$this->upload->do_upload('foto');
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];
			} else {
				$foto = null;
			}

			$data = array(
				'id_jabatan' => $this->input->post('id_jabatan'),
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'alamat' => $this->input->post('alamat'),
				'foto' => $foto,
			);

			$result = $this->Personil_model->tambah_personil($data);
			$id_personil = $this->db->insert_id();

			// Tambah Sertifikat
			$config_sertifikat = array(
				'upload_path'   => './assets/img/sertifikat',
				'allowed_types' => 'jpg|jpeg|png|pdf',
			);
			$this->upload->initialize($config_sertifikat);
			for ($i = 0; $i < count($_FILES['file_sertifikat']['name']); $i++) {
				$_FILES['single_sertifikat']['name'] = $_FILES['file_sertifikat']['name'][$i];
				$_FILES['single_sertifikat']['type'] = $_FILES['file_sertifikat']['type'][$i];
				$_FILES['single_sertifikat']['tmp_name'] = $_FILES['file_sertifikat']['tmp_name'][$i];
				$_FILES['single_sertifikat']['error'] = $_FILES['file_sertifikat']['error'][$i];
				$_FILES['single_sertifikat']['size'] = $_FILES['file_sertifikat']['size'][$i];

				if ($this->upload->do_upload('single_sertifikat')) {
					$sertifikat_data = $this->upload->data();
					$file = $sertifikat_data['file_name'];
					$dataSertifikat = [
						'id_personil' => $id_personil,
						'nama_sertifikat' => $_POST['nama_sertifikat'][$i],
						'jenis_sertifikat' => $_POST['jenis_sertifikat'][$i],
						'tanggal_kadaluarsa' => $_POST['tanggal_kadaluarsa'][$i] === "" ? null : $_POST['tanggal_kadaluarsa'][$i],
						'nama_file' => $file,
					];
					$this->db->insert('t_sertifikat', $dataSertifikat);
				}
			}

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Personil Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Personil Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}

			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/personil');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/personil');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/personil');
			}
		}
	}

	public function edit_personil()
	{
		$data['title'] = 'Personil';
		$data['jabatan'] = $this->Jabatan_model->dapat_jabatan();
		$data['personil'] = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/personil/edit_personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/personil/edit_personil', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/personil/edit_personil', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_personil()
	{
		$check_data_personil = $this->Personil_model->dapat_satu_personil($this->input->post('id_personil'));

		$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		if ($this->input->post('nip') != $check_data_personil->nip) {
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|is_unique[t_personil.nip]');
		}
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
		if ($this->input->post('password_baru')) {
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[8]');
			$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru]');
		}
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');
			$foto = $this->validasi_foto('ambil_foto');
		} else {
			$foto = $this->input->post('foto_lama');
		}

		$status_aktif = ($this->input->post('status_aktif') == 'on') ? '1' : '0';

		if ($this->form_validation->run() == false) {
			$this->edit_personil();
		} else {

			$data = array(
				'id_jabatan' => $this->input->post('id_jabatan'),
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'username' => $this->input->post('username'),
				'alamat' => $this->input->post('alamat'),
				'status_aktif' => $status_aktif,
				'foto' => $foto,
			);

			if ($this->input->post('password_baru')) {
				$data['password'] = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
			}

			$result = $this->Personil_model->edit_personil($this->input->post('id_personil'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Personil Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
				if ($_FILES['foto']['name']) {
					unlink(FCPATH . 'assets/img/profil/' . $this->input->post('foto_lama'));
				}
			} else {
				$this->session->set_flashdata('message', '<strong>Data Personil Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/personil');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/personil');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/personil');
			}
		}
	}

	public function proses_hapus_personil()
	{
		$sertifikat = $this->Sertifikat_model->dapat_sertifikat_detail($this->input->post('id_personil'));

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

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/personil');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/personil');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/personil');
		}
	}

	public function proses_edit_status_akun()
	{
		$data = array(
			'status_aktif' => ($this->input->post('status_aktif') == 'on') ? '1' : '0',
		);
		$this->db->where('id_personil', $this->input->post('id_personil'));
		$this->db->update('t_personil', $data);
		$this->session->set_flashdata('message', '<strong>Status Akun Berhasil Diedit</strong>
                                                    <i class="bi bi-check-circle-fill"></i>');
		redirect('atasan/personil');
	}

	function validasi_foto($param)
	{
		if (isset($_FILES['foto']) && !$_FILES['foto']['name']) {
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
