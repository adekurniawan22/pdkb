<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jaringan extends CI_Controller
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
		$this->load->model('Jaringan_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['jaringan'] = $this->Jaringan_model->dapat_jaringan();
		$data['title'] = 'Jaringan';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_jaringan()
	{
		$data['title'] = 'Jaringan';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');

		if ($this->form_validation->run() == false) {
			$this->tambah_jaringan();
		} else {
			$foto = $this->validasi_foto('ambil_foto');
			$data_jaringan = [
				'id_personil' => $this->session->userdata('id_personil'),
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'foto' => $foto,
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
			];

			$result = $this->Jaringan_model->tambah_jaringan($data_jaringan);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		}
	}
	public function edit_jaringan()
	{
		$data['title'] = 'Jaringan';
		$data['jaringan'] = $this->Jaringan_model->dapat_satu_jaringan($this->input->post('id_jaringan'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('tanggal_eksekusi', 'Tanggal Eksekusi', 'required|trim');
		$status_dikerjakan = ($this->input->post('status_dikerjakan') == 'on') ? '1' : '0';

		if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');
			$foto = $this->validasi_foto('ambil_foto');
		} else {
			$foto = $this->input->post('foto_lama');
		}

		if ($this->form_validation->run() == false) {
			$this->edit_jaringan();
		} else {
			$data_jaringan = [
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'tanggal_eksekusi' => $this->input->post('tanggal_eksekusi'),
				'foto' => $foto,
				'status_dikerjakan' => $status_dikerjakan,
			];

			$result = $this->Jaringan_model->edit_jaringan($this->input->post('id_jaringan'), $data_jaringan);

			if ($result) {
				if ($_FILES['foto']['name']) {
					unlink(FCPATH . 'assets/img/jaringan/' . $this->input->post('foto_lama'));
				}
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		}
	}


	public function proses_hapus_jaringan()
	{
		$this->db->where('id_jaringan', $this->input->post('id_jaringan'));
		$result = $this->db->delete('t_jaringan');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/jaringan');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/jaringan');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/jaringan');
		}
	}

	function validasi_foto($param)
	{
		if (isset($_FILES['foto']) && empty($_FILES['foto']['name'])) {
			$this->form_validation->set_message('validasi_foto', 'Foto tidak boleh kosong');
			return false;
		} else {
			$config_foto = array(
				'upload_path' => './assets/img/jaringan',
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => 2048, // 2MB
			);
			$this->upload->initialize($config_foto);

			if ($this->upload->do_upload('foto')) {
				// Proses upload berhasil, lanjutkan dengan logika yang diinginkan
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];

				if ($param == null) {
					unlink(FCPATH . 'assets/img/jaringan/' . $foto);
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
