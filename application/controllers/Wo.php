<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wo extends CI_Controller
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
		$this->load->model('Wo_model');
		$this->load->model('Personil_model');
		$this->load->library('pdfgenerator');
	}


	public function index()
	{
		$this->db->where('id_partnership', $this->session->userdata('id_partnership'));
		$data['wo'] = $this->db->get('t_wo')->result();
		$data['title'] = 'Dokumen WO';
		$this->load->view('templates/header', $data);
		$this->load->view('partnership/wo/wo', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_wo()
	{
		$data['title'] = 'Dokumen WO';
		$this->load->view('templates/header', $data);
		$this->load->view('partnership/wo/tambah_wo', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_wo()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->tambah_wo();
		} else {
			date_default_timezone_set('Asia/Jakarta');

			$data_wo = [
				'pekerjaan' => $this->input->post('pekerjaan'),
				'tanggal_pelaporan' => date('Y-m-d H:i:s'),
				'sudah_disetujui' => '0',
				'id_partnership' => $this->session->userdata('id_partnership'),
			];

			$result = $this->Wo_model->tambah_wo($data_wo);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Dokumen WO Berhasil Ditambahkan</strong>
															<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Dokumen WO Gagal Ditambahkan</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('partnership/wo');
		}
	}

	public function edit_wo()
	{
		$data['title'] = 'Dokumen WO';
		$data['wo'] = $this->Wo_model->dapat_satu_wo($this->input->post('id_wo'));
		$this->load->view('templates/header', $data);
		$this->load->view('partnership/wo/edit_wo', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_wo()
	{
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->edit_wo();
		} else {
			$result = $this->Wo_model->edit_wo($this->input->post('id_wo'), ['pekerjaan' => $this->input->post('pekerjaan')]);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Dokumen WO Berhasil Diedit</strong>
															<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Dokumen WO Gagal Diedit</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('partnership/wo');
		}
	}

	public function proses_hapus_wo()
	{
		$this->db->where('id_wo', $this->input->post('id_wo'));
		$this->db->delete('t_wo');
		$this->session->set_flashdata('message', '<strong>Data Dokumen WO Berhasil Dihapus</strong>
		<i class="bi bi-check-circle-fill"></i>');

		redirect('partnership/wo');
	}

	// public function proses_edit_status_wo()
	// {
	// 	$data = array(
	// 		'sudah_disetujui' => ($this->input->post('sudah_disetujui') == 'on') ? '1' : '0',
	// 		'id_atasan' => $this->session->userdata('id_personil')
	// 	);
	// 	$this->db->where('id_wo', $this->input->post('id_wo'));
	// 	$this->db->update('t_wo', $data);
	// 	$this->session->set_flashdata('message', '<strong>Status Dokumen WO Berhasil Disetujui</strong>
	//                                                 <i class="bi bi-check-circle-fill"></i>');
	// 	redirect('atasan/wo');
	// }

	public function cetak_wo()
	{
		$id_wo = $this->input->post('id_wo');
		$id_atasan = $this->input->post('id_atasan');

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		$nama_file_pdf = "wo_" . $id_wo;

		$this->db->where('id_wo =', $id_wo);
		$query = $this->db->get('t_wo')->row();

		$this->db->where('id_wo =', $id_wo);
		$temuan_wo = $this->db->get('t_temuan_wo')->result();

		$this->db->where('id_wo =', $id_wo);
		$foto_wo = $this->db->get('t_foto_wo')->result();

		foreach ($foto_wo as $foto) {
			$this->encode_img_base64(base_url('assets/img/wo/' . $foto->foto));
			$this->encode_img_base64(base_url('assets/img/wo/' . $foto->foto));
			$this->encode_img_base64(base_url('assets/img/wo/' . $foto->foto));
		}

		date_default_timezone_set('Asia/Jakarta');
		$bulan = [
			1 => "Januari",
			2 => "Februari",
			3 => "Maret",
			4 => "April",
			5 => "Mei",
			6 => "Juni",
			7 => "Juli",
			8 => "Agustus",
			9 => "September",
			10 => "Oktober",
			11 => "November",
			12 => "Desember"
		];
		$tanggal_sekarang = date('d') . ' ' . $bulan[date('n')] . ' ' . date('Y');
		$foto = $this->encode_img_base64(base_url('assets/img/logo_pln.png'));

		if ($temuan_wo) {
			$html = $this->load->view('admin/wo/pdf', [
				'query' => $query,
				'atasan' => $atasan,
				'temuan_wo' => $temuan_wo,
				'foto_wo' => $foto_wo,
				'tanggal_sekarang' => $tanggal_sekarang,
				'foto' => $foto
			], true);
		} else {
			$this->load->view('admin/wo/pdf', [
				'query' => $query,
				'temuan_wo' => $temuan_wo,
				'foto_wo' => $foto_wo, true
			]);
		}

		$filename = $nama_file_pdf;
		$paper = 'A4';
		$orientation = 'portrait';
		$stream = true;

		$this->pdfgenerator->generate($html, $filename, $paper, $orientation, $stream);
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
