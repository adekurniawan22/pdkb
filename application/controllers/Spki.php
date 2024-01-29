<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spki extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('SPKI_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Histori_alat_kerja_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['spki'] = $this->SPKI_model->dapat_spki();
		$data['title'] = 'SPKI';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/spki/spki', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_spki()
	{
		$data['title'] = 'SPKI';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/spki/tambah_spki', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_spki()
	{
		$this->form_validation->set_rules('kepada', 'Kepada', 'required|trim');
		$this->form_validation->set_rules('dari', 'Dari', 'required|trim');
		$this->form_validation->set_rules('macam_pekerjaan', 'Macam Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('lokasi_pekerjaan', 'Lokasi Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('mulai_pelaksanaan', 'Mulai Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('selesai_pelaksanaan', 'Selesai Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('pj', 'PJ', 'required|trim');
		$this->form_validation->set_rules('pengawas', 'Pengawas', 'required|trim');
		$this->form_validation->set_rules('pengawas_k3', 'Pengawas K3', 'required|trim');
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|trim');
		$this->form_validation->set_rules('alat_kerja', 'Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required|trim');
		$this->form_validation->set_rules('uraian_kerja', 'Uraian Kerja', 'required|trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_spki();
		} else {
			echo "<pre>";
			echo var_dump($_POST);
			echo "<pre>";
			$data = array(
				'kepada' => $this->input->post('kepada'),
				'dari' => $this->input->post('dari'),
				'macam_pekerjaan' => $this->input->post('macam_pekerjaan'),
				'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
				'mulai_pelaksanaan' => $this->input->post('mulai_pelaksanaan'),
				'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan'),
				'pj' => $this->input->post('pj'),
				'pengawas' => $this->input->post('pengawas'),
				'pengawas_k3' => $this->input->post('pengawas_k3'),
				'pelaksana' => $this->input->post('pelaksana'),
				'alat_kerja' => $this->input->post('alat_kerja'),
				'kendaraan' => $this->input->post('kendaraan'),
				'uraian_kerja' => $this->input->post('uraian_kerja'),
				'catatan' => $this->input->post('catatan'),
			);

			$result = $this->SPKI_model->tambah_spki($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data SPKI Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data SPKI Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('spki');
		}
	}

	public function edit_spki()
	{
		$data['title'] = 'SPKI';
		$this->db->where('id_spki', $this->input->post('id_spki'));
		$data['spki'] = $this->db->get('t_spki')->row();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/spki/edit_spki', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_spki()
	{
		$this->form_validation->set_rules('kepada', 'Kepada', 'required|trim');
		$this->form_validation->set_rules('dari', 'Dari', 'required|trim');
		$this->form_validation->set_rules('macam_pekerjaan', 'Macam Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('lokasi_pekerjaan', 'Lokasi Pekerjaan', 'required|trim');
		$this->form_validation->set_rules('mulai_pelaksanaan', 'Mulai Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('selesai_pelaksanaan', 'Selesai Pelaksanaan', 'required|trim');
		$this->form_validation->set_rules('pj', 'PJ', 'required|trim');
		$this->form_validation->set_rules('pengawas', 'Pengawas', 'required|trim');
		$this->form_validation->set_rules('pengawas_k3', 'Pengawas K3', 'required|trim');
		$this->form_validation->set_rules('pelaksana', 'Pelaksana', 'required|trim');
		$this->form_validation->set_rules('alat_kerja', 'Alat Kerja', 'required|trim');
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'required|trim');
		$this->form_validation->set_rules('uraian_kerja', 'Uraian Kerja', 'required|trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->edit_spki();
		} else {
			$data = array(
				'kepada' => $this->input->post('kepada'),
				'dari' => $this->input->post('dari'),
				'macam_pekerjaan' => $this->input->post('macam_pekerjaan'),
				'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
				'mulai_pelaksanaan' => $this->input->post('mulai_pelaksanaan'),
				'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan'),
				'pj' => $this->input->post('pj'),
				'pengawas' => $this->input->post('pengawas'),
				'pengawas_k3' => $this->input->post('pengawas_k3'),
				'pelaksana' => $this->input->post('pelaksana'),
				'alat_kerja' => $this->input->post('alat_kerja'),
				'kendaraan' => $this->input->post('kendaraan'),
				'uraian_kerja' => $this->input->post('uraian_kerja'),
				'catatan' => $this->input->post('catatan'),
			);

			$result = $this->SPKI_model->edit_spki($this->input->post('id_spki'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data SPKI Berhasil Diedit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data SPKI Gagal Diedit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('spki');
		}
	}


	public function proses_hapus_spki()
	{
		$this->db->where('id_spki', $this->input->post('id_spki'));
		$this->db->delete('t_spki');
		$this->session->set_flashdata('message', '<strong>Data SPKI Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('spki');
	}

	public function cetak_spki()
	{
		$id_spki = $this->input->post('id_spki');
		$nama_file_pdf = "SPKI_" . $id_spki;

		$this->db->where('id_spki =', $id_spki);
		$query = $this->db->get('t_spki')->result_array();
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_sekarang = date('d F Y');
		$foto = $this->encode_img_base64(base_url('assets/img/logo_pln.png'));

		if ($query) {
			$html = $this->load->view('admin/spki/pdf', ['query' => $query, 'tanggal_sekarang' => $tanggal_sekarang, 'foto' => $foto], true);
		} else {
			$this->load->view('admin/spki/pdf', ['query' => $query], true);
		}

		$filename = $nama_file_pdf;
		$paper = 'A4';
		$orientation = 'portrait';
		$stream = true;

		if (!empty($query)) {
			$this->pdfgenerator->generate($html, $filename, $paper, $orientation, $stream);
		}
	}

	function encode_img_base64($img_path = false): string
	{
		if ($img_path) {
			$path = $img_path;
			$type = pathinfo($path, PATHINFO_EXTENSION);
			$data = file_get_contents($path);
			return 'data:image/' . $type . ';base64,' . base64_encode($data);
		}
		return '';
	}
}
