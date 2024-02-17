<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk extends CI_Controller
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
		$this->load->library('upload');
		$this->load->model('Personil_model');
		$this->load->model('Gardu_induk_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['gardu_induk'] = $this->Gardu_induk_model->dapat_gardu_induk();
		$data['title'] = 'Gardu Induk';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/gardu_induk/gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/gardu_induk/gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/gardu_induk/gardu_induk', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_gardu_induk()
	{
		$data['title'] = 'Gardu Induk';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/gardu_induk/tambah_gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/gardu_induk/tambah_gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/gardu_induk/tambah_gardu_induk', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_gardu_induk()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('gardu_induk', 'Gardu Induk', 'required|trim');
		$this->form_validation->set_rules('bay', 'Bay', 'required|trim');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');

		if ($this->form_validation->run() == false) {
			$this->tambah_gardu_induk();
		} else {
			$foto = $this->validasi_foto('ambil_foto');
			$data_gardu_induk = [
				'id_personil' => $this->session->userdata('id_personil'),
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'gardu_induk' => $this->input->post('gardu_induk'),
				'bay' => $this->input->post('bay'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'foto' => $foto,
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
			];

			$result = $this->Gardu_induk_model->tambah_gardu_induk($data_gardu_induk);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/gardu-induk');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/gardu-induk');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/gardu-induk');
			}
		}
	}
	public function edit_gardu_induk()
	{
		$data['title'] = 'Gardu Induk';
		$data['gardu_induk'] = $this->Gardu_induk_model->dapat_satu_gardu_induk($this->input->post('id_gardu_induk'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/gardu_induk/edit_gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/gardu_induk/edit_gardu_induk', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/gardu_induk/edit_gardu_induk', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_gardu_induk()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('gardu_induk', 'Gardu Induk', 'required|trim');
		$this->form_validation->set_rules('bay', 'Bay', 'required|trim');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$status_dikerjakan = ($this->input->post('status_dikerjakan') == 'on') ? '1' : '0';

		if (!empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');
			$foto = $this->validasi_foto('ambil_foto');
		} else {
			$foto = $this->input->post('foto_lama');
		}


		if ($this->form_validation->run() == false) {
			$this->edit_gardu_induk();
		} else {
			$data_gardu_induk = [
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'gardu_induk' => $this->input->post('gardu_induk'),
				'bay' => $this->input->post('bay'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
				'foto' => $foto,
				'status_dikerjakan' => $status_dikerjakan,
			];



			$result = $this->Gardu_induk_model->edit_gardu_induk($this->input->post('id_gardu_induk'), $data_gardu_induk);

			if ($result) {
				if ($_FILES['foto']['name']) {
					unlink(FCPATH . 'assets/img/gardu-induk/' . $this->input->post('foto_lama'));
				}
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/gardu-induk');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/gardu-induk');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/gardu-induk');
			}
		}
	}


	public function proses_hapus_gardu_induk()
	{
		$this->db->where('id_gardu_induk', $this->input->post('id_gardu_induk'));
		$result = $this->db->delete('t_gardu_induk');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Gardu Induk Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Gardu Induk Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/gardu-induk');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/gardu-induk');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/gardu-induk');
		}
	}

	function validasi_foto($param)
	{
		if (empty($_FILES['foto']['name'])) {
			$this->form_validation->set_message('validasi_foto', 'Foto tidak boleh kosong');
			return false;
		} else {
			$config_foto = array(
				'upload_path' => './assets/img/gardu-induk',
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => 2048, // 2MB
			);
			$this->upload->initialize($config_foto);

			if ($this->upload->do_upload('foto')) {
				// Proses upload berhasil, lanjutkan dengan logika yang diinginkan
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];

				if ($param == null) {
					unlink(FCPATH . 'assets/img/gardu-induk/' . $foto);
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
