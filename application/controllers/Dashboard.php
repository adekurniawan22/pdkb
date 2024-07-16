<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('id_jabatan'))) {
			$this->session->set_flashdata('message', '<strong>Akses ditolak, silahkan login terlebih dahulu!</strong>
		                <i class="bi bi-exclamation-circle-fill"></i>');
			redirect(base_url());
		}
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Rencana_operasi_model');
	}
	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['jumlah_personil'] = $this->Personil_model->jumlah_personil();
		$data['jumlah_alat_kerja'] = $this->Alat_kerja_model->jumlah_alat_kerja();

		$data['jumlah_semua_rencana_operasi_selesai'] = $this->Rencana_operasi_model->jumlah_semua_rencana_operasi_selesai();

		$data['jumlah_rencana_selesai_perbulan'] = $this->Rencana_operasi_model->jumlah_rencana_selesai_perbulan();
		$data['dapat_persentase_rencana_tahun_ini'] = $this->Rencana_operasi_model->dapat_persentase_rencana_tahun_ini();

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/dashboard', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			date_default_timezone_set('Asia/Jakarta');
			$this->db->where('YEAR(tanggal_dikerjakan)', date('Y'));
			$this->db->where('MONTH(tanggal_dikerjakan)', date('m'));
			$this->db->where('status', '0');
			$data['p_rencana_operasi'] = $this->db->get('t_rencana_operasi')->result();
			$data['jp_rencana_operasi'] = count($data['p_rencana_operasi']);

			$tanggal_mulai = date('Y-m-d');
			$tanggal_selesai = date('Y-m-d', strtotime('+1 month'));
			$this->db->where('tanggal_kadaluarsa >=', $tanggal_mulai);
			$this->db->where('tanggal_kadaluarsa <=', $tanggal_selesai);
			$data['p_alat_kerja'] = $this->db->get('t_alat_kerja')->result();
			$data['jp_alat_kerja'] = count($data['p_alat_kerja']);

			$this->db->where('tanggal_kadaluarsa >=', $tanggal_mulai);
			$this->db->where('tanggal_kadaluarsa <=', $tanggal_selesai);
			$data['p_alat_tower_ers'] = $this->db->get('t_alat_tower_ers')->result();
			$data['jp_alat_tower_ers'] = count($data['p_alat_tower_ers']);

			// $this->db->where('status_dikerjakan', '0');
			// $this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
			// $this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
			// $data['p_gardu_induk'] = $this->db->get('t_gardu_induk')->result();
			// $data['jp_gardu_induk'] = count($data['p_gardu_induk']);

			// $this->db->where('status_dikerjakan', '0');
			// $this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
			// $this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
			// $data['p_jaringan'] = $this->db->get('t_jaringan')->result();
			// $data['jp_jaringan'] = count($data['p_jaringan']);

			$this->db->select('t_sertifikat.*, t_personil.*');
			$this->db->from('t_sertifikat');
			$this->db->join('t_personil', 't_personil.id_personil = t_sertifikat.id_personil');
			$this->db->where('t_sertifikat.tanggal_kadaluarsa >=', $tanggal_mulai);
			$this->db->where('t_sertifikat.tanggal_kadaluarsa <=', $tanggal_selesai);
			$data['p_sertifikat'] = $this->db->get()->result();
			$data['jp_sertifikat'] = count($data['p_sertifikat']);

			// Menghitung total jp_*
			$data['total_jp'] = $data['jp_rencana_operasi'] + $data['jp_alat_kerja'] + $data['jp_alat_tower_ers'] +
				$data['jp_gardu_induk'] + $data['jp_jaringan'] + $data['jp_sertifikat'];

			$this->load->view('templates/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/dashboard', $data);
			$this->load->view('templates/footer');
		}
	}

	public function partnership()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('templates/header', $data);
		$this->load->view('partnership/dashboard', $data);
		$this->load->view('templates/footer');
	}

	public function ik()
	{
		$data['title'] = 'Intruksi Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('panduan/ik', $data);
		$this->load->view('templates/footer');
	}

	public function sop()
	{
		$data['title'] = 'Standar Operasional Prosedur';
		$this->load->view('templates/header', $data);
		$this->load->view('panduan/sop', $data);
		$this->load->view('templates/footer');
	}

	public function sld_gi()
	{
		$data['title'] = 'Single Line Diagram GI';
		$this->load->view('templates/header', $data);
		$this->load->view('panduan/sld_gi', $data);
		$this->load->view('templates/footer');
	}
}
