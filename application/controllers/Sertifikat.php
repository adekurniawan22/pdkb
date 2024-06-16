<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
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
		$this->load->model('Sertifikat_model');
		$this->load->library('upload');
	}

	public function get_sertifikat()
	{
		$data['title'] = 'Personil';
		if ($this->session->userdata('id_view_sertifikat')) {
			$data['sertifikat'] = $this->Sertifikat_model->dapat_sertifikat($this->session->userdata('id_view_sertifikat'));
		} else {
			$data['sertifikat'] = $this->Sertifikat_model->dapat_sertifikat($this->input->post('id_personil'));
		}

		if ($this->session->userdata('id_personil_sertifikat')) {
			$data['id_personil'] = $this->session->userdata('id_personil_sertifikat');
		} else {
			$data['id_personil'] = $this->input->post('id_personil');
		}

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/personil/view_sertifikat', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/personil/view_sertifikat', $data);
			$this->load->view('templates/footer');
		}
	}

	public function get_sertifikat_sendiri()
	{
		$data['title'] = 'Profil';
		if ($this->session->userdata('id_view_sertifikat')) {
			$data['sertifikat'] = $this->Sertifikat_model->dapat_sertifikat($this->session->userdata('id_view_sertifikat'));
		} else {
			$data['sertifikat'] = $this->Sertifikat_model->dapat_sertifikat($this->session->userdata('id_personil'));
		}
		$data['id_personil'] = $this->input->post('id_personil');
		$this->load->view('templates/header', $data);
		$this->load->view('profil/view_sertifikat', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_sertifikat_sendiri()
	{
		$this->form_validation->set_rules('nama_sertifikat_baru', 'Nama Sertifikat Baru', 'required');
		$this->form_validation->set_rules('jenis_sertifikat', 'Jenis Sertifikat', 'required');

		if ($this->form_validation->run() == false) {
			$this->session->set_userdata(['id_view_sertifikat' => $this->input->post('id_personil')]);
			$this->get_sertifikat();
		} else {
			if (isset($_FILES['sertifikat_baru'])) {
				$config_sertifikat = array(
					'upload_path' => './assets/img/sertifikat',
					'allowed_types' => 'jpg|jpeg|png',
				);
				$this->upload->initialize($config_sertifikat);

				$this->upload->do_upload('sertifikat_baru');
				$sertifikat_data = $this->upload->data();
				$nama_file = $sertifikat_data['file_name'];
			} else {
				$nama_file = null;
			}

			$data = [
				'id_personil' => $this->input->post('id_personil'),
				'nama_sertifikat' => $_POST['nama_sertifikat_baru'],
				'jenis_sertifikat' => $_POST['jenis_sertifikat'],
				'tanggal_kadaluarsa' => $_POST['tanggal_kadaluarsa'] === "" ? null : $_POST['tanggal_kadaluarsa'],
				'nama_file' => $nama_file
			];

			$this->db->insert('t_sertifikat', $data);

			$this->session->set_userdata(['id_view_sertifikat' => $this->input->post('id_personil')]);
			$this->session->set_flashdata('message', '<strong>Sertifikat Personil Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			redirect('profil/lihat-sertifikat');
		}
	}

	public function proses_tambah_sertifikat()
	{
		$this->form_validation->set_rules('nama_sertifikat_baru', 'Nama Sertifikat Baru', 'required');
		$this->form_validation->set_rules('jenis_sertifikat', 'Jenis Sertifikat', 'required');

		if ($this->form_validation->run() == false) {
			$id_personil = $this->input->post('id_personil');
			$this->session->set_userdata(['id_view_sertifikat' => $id_personil]);
			$this->session->set_userdata(['id_personil_sertifikat' => $id_personil]);
			$this->get_sertifikat();
		} else {
			$id_personil = $this->session->userdata('id_personil_sertifikat');
			if (!$id_personil) {
				$id_personil = $this->input->post('id_personil');
			}

			if (isset($_FILES['sertifikat_baru'])) {
				$config_sertifikat = array(
					'upload_path' => './assets/img/sertifikat',
					'allowed_types' => 'jpg|jpeg|png',
				);
				$this->upload->initialize($config_sertifikat);

				$this->upload->do_upload('sertifikat_baru');
				$sertifikat_data = $this->upload->data();
				$nama_file = $sertifikat_data['file_name'];
			} else {
				$nama_file = null;
			}

			$data = [
				'id_personil' => $id_personil,
				'nama_sertifikat' => $_POST['nama_sertifikat_baru'],
				'jenis_sertifikat' => $_POST['jenis_sertifikat'],
				'tanggal_kadaluarsa' => $_POST['tanggal_kadaluarsa'] === "" ? null : $_POST['tanggal_kadaluarsa'],
				'nama_file' => $nama_file
			];

			$this->db->insert('t_sertifikat', $data);

			$this->session->set_userdata(['id_view_sertifikat' => $id_personil]);
			$this->session->set_userdata(['id_personil_sertifikat' => $this->input->post('id_personil')]);
			$this->session->set_flashdata('message', '<strong>Sertifikat Personil Berhasil Ditambahkan</strong> <i class="bi bi-check-circle-fill"></i>');
			redirect('admin/personil/lihat-sertifikat');
		}
	}

	public function proses_hapus_sertifikat()
	{

		$sertifikat = $this->Sertifikat_model->dapat_satu_sertifikat($this->input->post('id_sertifikat'));
		unlink(FCPATH . 'assets/img/sertifikat/' . $sertifikat->nama_file);

		$this->db->where('id_sertifikat', $this->input->post('id_sertifikat'));
		$this->db->delete('t_sertifikat');
		$this->session->set_userdata(['id_view_sertifikat' => $sertifikat->id_personil]);
		$this->session->set_userdata(['id_personil_sertifikat' => $this->input->post('id_personil')]);
		$this->session->set_flashdata('message', '<strong>Sertifikat Personil Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/personil/lihat-sertifikat');
	}

	public function proses_hapus_sertifikat_Sendiri()
	{

		$sertifikat = $this->Sertifikat_model->dapat_satu_sertifikat($this->input->post('id_sertifikat'));
		unlink(FCPATH . 'assets/img/sertifikat/' . $sertifikat->nama_file);

		$this->db->where('id_sertifikat', $this->input->post('id_sertifikat'));
		$this->db->delete('t_sertifikat');
		$this->session->set_userdata(['id_view_sertifikat' => $sertifikat->id_personil]);

		$this->session->set_flashdata('message', '<strong>Sertifikat Personil Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('profil/lihat-sertifikat');
	}
}
