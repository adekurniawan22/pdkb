<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_kerja extends CI_Controller
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
		$this->load->model('Alat_kerja_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_alat_kerja();
		$data['title'] = 'Alat Kerja';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/warehouse/alat_kerja/alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/warehouse/alat_kerja/alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/warehouse/alat_kerja/alat_kerja', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/warehouse/alat_kerja/tambah_alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/warehouse/alat_kerja/tambah_alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/warehouse/alat_kerja/tambah_alat_kerja', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_alat_kerja()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_kerja', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');

		if ($this->form_validation->run() == false) {
			$this->tambah_alat_kerja();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_kerja' => $this->input->post('nama_alat_kerja'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
			);

			if ($this->input->post('tanggal_kadaluarsa')) {
				$data['tanggal_kadaluarsa'] = $this->input->post('tanggal_kadaluarsa');
			}

			$result = $this->Alat_kerja_model->tambah_alat_kerja($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
				redirect('atasan/alat-kerja');
			} else if ($this->session->userdata('id_jabatan') == '3') {
				redirect('admin/alat-kerja');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('jtc/alat-kerja');
			}
		}
	}

	public function edit_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_satu_alat_kerja($this->input->post('id_alat_kerja'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/warehouse/alat_kerja/edit_alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/warehouse/alat_kerja/edit_alat_kerja', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/warehouse/alat_kerja/edit_alat_kerja', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_alat_kerja()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Alat kerja', 'required');
		$this->form_validation->set_rules('nama_alat_kerja', 'Nama Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah Alat', 'required|trim|integer');
		$this->form_validation->set_rules('satuan', 'Satuan Alat', 'required');

		if ($this->form_validation->run() == false) {
			$this->edit_alat_kerja();
		} else {
			$data = array(
				'jenis' => $this->input->post('jenis'),
				'nama_alat_kerja' => $this->input->post('nama_alat_kerja'),
				'spesifikasi' => $this->input->post('spesifikasi'),
				'jumlah' => $this->input->post('jumlah'),
				'satuan' => $this->input->post('satuan'),
			);

			if ($this->input->post('tanggal_kadaluarsa')) {
				$data['tanggal_kadaluarsa'] = $this->input->post('tanggal_kadaluarsa');
			}

			$result = $this->Alat_kerja_model->edit_alat_kerja($this->input->post('id_alat_kerja'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Alat Kerja Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
				redirect('atasan/alat-kerja');
			} else if ($this->session->userdata('id_jabatan') == '3') {
				redirect('admin/alat-kerja');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('jtc/alat-kerja');
			}
		}
	}

	public function proses_hapus_alat_kerja()
	{
		$this->db->where('id_alat_kerja', $this->input->post('id_alat_kerja'));
		$this->db->delete('t_alat_kerja');
		$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2') {
			redirect('atasan/alat-kerja');
		} else if ($this->session->userdata('id_jabatan') == '3') {
			redirect('admin/alat-kerja');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('jtc/alat-kerja');
		}
	}
}
