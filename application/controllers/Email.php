<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Rencana_operasi_model');
		$this->load->library('email');
	}

	public function index()
	{
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'appcilogin@gmail.com',
			'smtp_pass' => 'iakd gazx zkva ghrk	',
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

			$this->email->subject('Pesan dari SIMPATI PDKB');


			$content = "";

			if (!empty($p_rencana_operasi)) {
				$content .= "<hr>";
				$content .= "<h2>Pengingat Rencana Operasi :</h2>";
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
	}
}
