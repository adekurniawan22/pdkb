<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
		$data['id_personil'] = $this->input->post('id_personil');

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/personil/view_sertifikat', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '3') {
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
		$this->form_validation->set_rules('jenis_sertifikat', 'Jenis Sertifikat', 'required');
		$this->form_validation->set_rules('sertifikat_baru', 'Sertifikat Baru', 'callback_validasi_sertifikat');

		if ($this->form_validation->run() == false) {
			$this->session->set_userdata(['id_view_sertifikat' => $this->input->post('id_personil')]);
			$this->get_sertifikat();
		} else {
			$nama_file = $this->validasi_sertifikat('asa');

			$data = [
				'id_personil' => $this->input->post('id_personil'),
				'jenis_sertifikat' => $this->input->post('jenis_sertifikat'),
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
		$this->form_validation->set_rules('jenis_sertifikat', 'Jenis Sertifikat', 'required');
		$this->form_validation->set_rules('sertifikat_baru', 'Sertifikat Baru', 'callback_validasi_sertifikat');

		if ($this->form_validation->run() == false) {
			$this->session->set_userdata(['id_view_sertifikat' => $this->input->post('id_personil')]);
			$this->get_sertifikat();
		} else {
			$nama_file = $this->validasi_sertifikat('asa');

			$data = [
				'id_personil' => $this->input->post('id_personil'),
				'jenis_sertifikat' => $this->input->post('jenis_sertifikat'),
				'nama_file' => $nama_file
			];

			$this->db->insert('t_sertifikat', $data);

			$this->session->set_userdata(['id_view_sertifikat' => $this->input->post('id_personil')]);
			$this->session->set_flashdata('message', '<strong>Sertifikat Personil Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
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


	function validasi_sertifikat($param)
	{
		if (empty($_FILES['sertifikat_baru']['name'])) {
			$this->form_validation->set_message('validasi_sertifikat', 'Sertifikat tidak boleh kosong');
			return false;
		} else {
			$config_sertifikat = array(
				'upload_path' => './assets/img/sertifikat',
				'allowed_types' => 'jpg|jpeg|png|pdf',
				'max_size'      => 5120,
			);
			$this->upload->initialize($config_sertifikat);

			if ($this->upload->do_upload('sertifikat_baru')) {
				// Proses upload berhasil, lanjutkan dengan logika yang diinginkan
				$sertifikat_data = $this->upload->data();
				$sertifikat = $sertifikat_data['file_name'];

				if ($param == null) {
					unlink(FCPATH . 'assets/img/sertifikat/' . $sertifikat);
					return true; // Kembalikan true jika semuanya berjalan dengan baik
				} else {
					return $sertifikat;
				}
			} else {
				// Proses upload gagal, set pesan kesalahan
				$this->form_validation->set_message('validasi_sertifikat', 'Upload Sertifikat gagal. ' . $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>'));
				return false; // Kembalikan false jika ada kesalahan
			}
		}
	}
}
