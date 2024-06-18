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

			$this->db->where('status_dikerjakan', '0');
			$this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
			$this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
			$data['p_gardu_induk'] = $this->db->get('t_gardu_induk')->result();
			$data['jp_gardu_induk'] = count($data['p_gardu_induk']);

			$this->db->where('status_dikerjakan', '0');
			$this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
			$this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
			$data['p_jaringan'] = $this->db->get('t_jaringan')->result();
			$data['jp_jaringan'] = count($data['p_jaringan']);

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

	public function kirim_email_ke_atasan()
	{
		$nama_pengirim = $this->session->userdata('nama');
		$this->load->library('email');
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'appcilogin@gmail.com',
			'smtp_pass' => 'zfzx feer tkeb kltl',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		);

		$this->email->initialize($config);

		$this->db->where('YEAR(tanggal_dikerjakan)', date('Y'));
		$this->db->where('MONTH(tanggal_dikerjakan)', date('m'));
		$this->db->where('status', '0');
		$p_rencana_operasi = $this->db->get('t_rencana_operasi')->result();
		$jp_rencana_operasi = count($p_rencana_operasi);

		$tanggal_mulai = date('Y-m-d');
		$tanggal_selesai = date('Y-m-d', strtotime('+1 month'));
		$this->db->where('tanggal_kadaluarsa <=', $tanggal_selesai);
		$p_alat_kerja = $this->db->get('t_alat_kerja')->result();
		$jp_alat_kerja = count($p_alat_kerja);

		$this->db->where('tanggal_kadaluarsa <=', $tanggal_selesai);
		$p_alat_tower_ers = $this->db->get('t_alat_tower_ers')->result();
		$jp_alat_tower_ers = count($p_alat_tower_ers);

		$this->db->where('status_dikerjakan', '0');
		$this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
		$this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
		$p_gardu_induk = $this->db->get('t_gardu_induk')->result();
		$jp_gardu_induk = count($p_gardu_induk);

		$this->db->where('status_dikerjakan', '0');
		$this->db->where('tanggal_eksekusi >=', $tanggal_mulai);
		$this->db->where('tanggal_eksekusi <=', $tanggal_selesai);
		$p_jaringan = $this->db->get('t_jaringan')->result();
		$jp_jaringan = count($p_jaringan);

		$this->db->where_in('id_jabatan', array(1, 2, 3));
		$query = $this->db->get('t_personil')->result();

		foreach ($query as $q) {
			$this->email->from('appcilogin@gmail.com', 'Admin PDKB');
			$this->email->to($q->email);

			$this->email->subject('Pesan dari ' . $nama_pengirim);


			$content = "";

			if (!empty($p_rencana_operasi)) {
				$content .= "<hr>";
				$content .= "<h2>Pengingat Rencana Pekerjaan :</h2>";
				$content .= "Terdapat <strong>" . $jp_rencana_operasi . "</strong> rencana operasi yang belum dikerjakan dalam bulan ini.<br>";
				$content .= "<ul>";
				foreach ($p_rencana_operasi as $r) {
					$content .= "<li>";
					$content .= "<strong>" . $r->nama_rencana . "</strong><br>";
					$content .= "" . "Rencana diselesaikan pada tanggal " . date('d/m/Y', strtotime($r->tanggal_dikerjakan));
					$content .= "</li>";
				}
				$content .= "</ul>";
				$content .= "<hr>";
			}


			if (!empty($p_gardu_induk)) {
				$content .= "<h2>Pengingat Gardu Induk :</h2>";
				$content .= "Terdapat <strong>" . $jp_gardu_induk . "</strong> gardu induk yang akan dikerjakan dalam rentang waktu hari ini hingga 1 bulan kedepan.<br>";
				$content .= "<ul>";
				foreach ($p_gardu_induk as $r) {
					$content .= "<li>";
					$content .= "<strong>" . $r->gardu_induk . "</strong><br>";
					$content .= "" . nl2br($r->bay) . "<br>";
					$content .= "" . "Rencana dieksekusi pada tanggal " . date('d/m/Y', strtotime($r->tanggal_eksekusi)) . "<br>";
					$content .= "</li>";
					$content .= "<br>";
				}
				$content .= "</ul>";
				$content .= "<hr>";
			}

			if (!empty($p_jaringan)) {
				$content .= "<h2>Pengingat Jaringan :</h2>";
				$content .= "Terdapat <strong>" . $jp_jaringan . "</strong> jaringan yang akan dikerjakan dalam rentang waktu hari ini hingga 1 bulan kedepan.<br>";
				$content .= "<ul>";
				foreach ($p_jaringan as $r) {
					$content .= "<li>";
					$content .= "<strong>Tower nomor " . $r->no_tower . "</strong><br>";
					$content .= "" . "Rencana dieksekusi pada tanggal " . date('d/m/Y', strtotime($r->tanggal_eksekusi)) . "<br>";
					$content .= "</li>";
					$content .= "<br>";
				}
				$content .= "</ul>";
				$content .= "<hr>";
			}

			if (!empty($p_alat_kerja)) {
				$content .= "<h2>Pengingat Alat Kerja :</h2>";
				$content .= "Terdapat <strong>" . $jp_alat_kerja . "</strong> alat kerja yang akan kedaluarsa dalam satu bulan ke depan.<br>";
				$content .= "<ul>";
				foreach ($p_alat_kerja as $r) {
					$content .= "<li>";
					$content .= "<strong>" . $r->nama_alat_kerja . "</strong><br>";
					$content .= "" . "Akan kadaluarsa pada tanggal " . date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) . "<br>";
					$content .= "</li>";
					$content .= "<br>";
				}
				$content .= "</ul>";
				$content .= "<hr>";
			}

			if (!empty($p_alat_tower_ers)) {
				$content .= "<h2>Pengingat Alat Kerja Tower ERS :</h2>";
				$content .= "Terdapat <strong>" . $jp_alat_tower_ers . "</strong> alat kerja yang akan kedaluarsa dalam satu bulan ke depan.<br>";
				$content .= "<ul>";
				foreach ($p_alat_tower_ers as $r) {
					$content .= "<li>";
					$content .= "<strong>" . $r->nama_alat_tower_ers . "</strong><br>";
					$content .= "" . "Akan kadaluarsa pada tanggal " . date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) . "<br>";
					$content .= "</li>";
					$content .= "<br>";
				}
				$content .= "</ul>";
				$content .= "<hr>";
			}

			$this->email->message($content);
			$this->email->send();
		}
		$this->session->set_flashdata('message', '<strong>Kirim Email Ke Atasan Telah Berhasil</strong>
		<i class="bi bi-check-circle-fill"></i>');
		redirect('dashboard');
	}
}
