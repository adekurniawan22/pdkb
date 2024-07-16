<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Telegram extends CI_Controller
{
	private $telegram_token;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Rencana_operasi_model');

		$this->telegram_token = "7467043648:AAHp9TDGCypK9KNXZDwdbdYzdBBKGQpTEgo"; // Token dari environment variable
	}

	public function index()
	{
		$data = $this->data_laporan();
		$data2 = $this->data_laporan_anomali();

		$isEmpty = true;
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$isEmpty = false;
				break;
			}
		}

		$isEmpty2 = true;
		foreach ($data2 as $key => $value) {
			if (!empty($value)) {
				$isEmpty2 = false;
				break;
			}
		}

		if (!$isEmpty) {
			$content = $data['message'];
			$telegram_chat_id = 1375998661;

			// Send PDF via Telegram
			$this->sendTelegramMessage($telegram_chat_id, $content);
			// $this->sendTelegramMessage(5390004052, $content);
		}

		if (!$isEmpty2) {
			$content = $data2['message'];
			$telegram_chat_id = 1375998661;

			// Send PDF via Telegram
			$this->sendTelegramMessage($telegram_chat_id, $content);
			// $this->sendTelegramMessage(5390004052, $content);
		}

		exit();
	}

	private function sendTelegramMessage($chat_id, $message)
	{
		$url = "https://api.telegram.org/bot{$this->telegram_token}/sendMessage";

		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => [
				'chat_id' => $chat_id,
				'text' => $message,
				'parse_mode' => 'Markdown'
			]
		]);

		// Execute the cURL session
		$response = curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			// Handle error
			log_message('error', 'Telegram cURL request failed: ' . curl_error($ch));
		} else {
			// Check HTTP response code
			$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($http_code != 200) {
				log_message('error', 'Telegram API response HTTP code: ' . $http_code);
			} else {
				log_message('debug', 'Telegram message sent successfully');
			}
			// Close cURL session
			curl_close($ch);
		}
	}

	private function data_laporan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$current_year = date('Y');
		$current_month = date('m');
		$tanggal_mulai = date('Y-m-d');
		$tanggal_selesai = date('Y-m-d', strtotime('+1 month'));

		$data['p_rencana_operasi'] = $this->getRencanaOperasi($current_year, $current_month);
		$data['jp_rencana_operasi'] = count($data['p_rencana_operasi']);
		$data['p_alat_kerja'] = $this->getAlatKerja($tanggal_mulai, $tanggal_selesai);
		$data['jp_alat_kerja'] = count($data['p_alat_kerja']);
		$data['p_alat_tower_ers'] = $this->getAlatTowerErs($tanggal_mulai, $tanggal_selesai);
		$data['jp_alat_tower_ers'] = count($data['p_alat_tower_ers']);

		$this->db->select('t_sertifikat.*, t_personil.*');
		$this->db->from('t_sertifikat');
		$this->db->join('t_personil', 't_personil.id_personil = t_sertifikat.id_personil');
		$this->db->where('t_sertifikat.tanggal_kadaluarsa >=', $tanggal_mulai);
		$this->db->where('t_sertifikat.tanggal_kadaluarsa <=', $tanggal_selesai);
		$data['p_sertifikat'] = $this->db->get()->result();
		$data['jp_sertifikat'] = count($data['p_sertifikat']);

		$isEmpty = true;
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$isEmpty = false;
				break;
			}
		}

		if (!$isEmpty) {
			$content = $this->generateContent($data);
			$data['message'] = $content;
		} else {
			$data['message'] = "";
		}

		return $data;
	}

	private function data_laporan_anomali()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_mulai = date('Y-m-d');
		$tanggal_selesai = date('Y-m-d', strtotime('+1 month'));

		$data['p_gardu_induk'] = $this->getGarduInduk($tanggal_mulai, $tanggal_selesai);
		$data['jp_gardu_induk'] = count($data['p_gardu_induk']);
		$data['p_jaringan'] = $this->getJaringan($tanggal_mulai, $tanggal_selesai);
		$data['jp_jaringan'] = count($data['p_jaringan']);

		$isEmpty = true;
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$isEmpty = false;
				break;
			}
		}

		if (!$isEmpty) {
			$content = $this->generateContentAnomali($data);
			$data['message'] = $content;
		} else {
			$data['message'] = "";
		}

		return $data;
	}

	private function getRencanaOperasi($year, $month)
	{
		$this->db->where('YEAR(tanggal_dikerjakan)', $year);
		$this->db->where('MONTH(tanggal_dikerjakan)', $month);
		$this->db->where('status', '0');
		return $this->db->get('t_rencana_operasi')->result();
	}

	private function getAlatKerja($start_date, $end_date)
	{
		$this->db->where('tanggal_kadaluarsa >=', $start_date);
		$this->db->where('tanggal_kadaluarsa <=', $end_date);
		return $this->db->get('t_alat_kerja')->result();
	}

	private function getAlatTowerErs($start_date, $end_date)
	{
		$this->db->where('tanggal_kadaluarsa >=', $start_date);
		$this->db->where('tanggal_kadaluarsa <=', $end_date);
		return $this->db->get('t_alat_tower_ers')->result();
	}

	private function getGarduInduk($start_date, $end_date)
	{
		$this->db->where('status_dikerjakan', '0');
		$this->db->where('tanggal_ews =', $start_date);
		return $this->db->get('t_gardu_induk')->result();
	}

	private function getJaringan($start_date, $end_date)
	{
		$this->db->where('status_dikerjakan', '0');
		$this->db->where('tanggal_ews =', $start_date);
		return $this->db->get('t_jaringan')->result();
	}

	private function generateContent($data)
	{
		$content = "";
		$content .= "Halo 👋,\nSaya mengirimkan data peringatan untuk periode mendatang dari sistem.\n\n";

		if (!empty($data['p_sertifikat'])) {
			$content .= "*Terdapat " . $data['jp_sertifikat'] . " Notifikasi Sertifikat Personil :*\n";
			foreach ($data['p_sertifikat'] as $r) {
				$content .= "*[#]* Personil dengan nama _" . $r->nama . "_ dengan sertifikat berjenis _" . $r->jenis_sertifikat . '_ dan judul sertifikat _"' . $r->nama_sertifikat . '"_ akan kadaluarsa pada tanggal _' . date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) . "._ \n\n";
			}
			$content .= "\n";
		}

		// if (!empty($data['p_rencana_operasi'])) {
		// 	$content .= "*Terdapat " . $data['jp_rencana_operasi'] . " Notifikasi Rencana Pekerjaan :*\n";
		// 	foreach ($data['p_rencana_operasi'] as $r) {
		// 		$content .= "*[#]* Rencana pekerjaan _" . $r->nama_rencana . "_ dengan keterangan _" . '"' . $r->keterangan . '"_' . " direncanakan akan diselesaikan pada tanggal _" . date('d/m/Y', strtotime($r->tanggal_dikerjakan)) . "._ \n\n";
		// 	}
		// 	$content .= "\n";
		// }

		if (!empty($data['p_alat_kerja'])) {
			$content .= "*Terdapat " . $data['jp_alat_kerja'] . " Notifikasi dari Gudang PDKB Jaringan :*\n";
			foreach ($data['p_alat_kerja'] as $r) {
				$content .= "*[#]* Alat kerja _" . $r->nama_alat_kerja . "_ dengan _jenis " . $r->jenis . "_ dan _jumlah " . $r->jumlah . " " . $r->satuan . "_ akan kadaluarsa pada tanggal _" . date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) . "._ \n\n";
			}
			$content .= "\n";
		}

		if (!empty($data['p_alat_tower_ers'])) {
			$content .= "*Terdapat " . $data['jp_alat_tower_ers'] . " Notifikasi dari Gudang PDKB Gardu Induk :*\n";
			foreach ($data['p_alat_tower_ers'] as $r) {
				$content .= "*[#]* Alat kerja _" . $r->nama_alat_tower_ers . "_ dengan _jenis " . $r->jenis . "_ dan _jumlah " . $r->jumlah . " " . $r->satuan . "_ akan kadaluarsa pada tanggal _" . date('d/m/Y', strtotime($r->tanggal_kadaluarsa)) . "._ \n\n";
			}
			$content .= "\n";
		}

		return $content;
	}

	private function generateContentAnomali($data)
	{
		$content = "";
		$content .= "Halo 👋,\nSaya mengirimkan pemberitahuan perkembangan anomali dari sistem\n\n";

		if (!empty($data['p_gardu_induk'])) {
			$content .= "*Terdapat " . $data['jp_gardu_induk'] . " Notifikasi dari Anomali Gardu Induk :*\n";
			foreach ($data['p_gardu_induk'] as $r) {
				$content .= "*[#]* Gardu induk _" . $r->gardu_induk . "_ dengan _jenis anomali " . $r->jenis_anomali . "_ , _bay (" . str_replace("\n", ", ", $r->bay) . ")_ , _jumlah titik " . $r->jumlah_titik . "_ , tanggal inspeksi _" . date('d/m/Y', strtotime($r->tanggal_inspeksi)) . "_ lalu, diharapkan segera melakukan upaya preventif. \n\n";
			}
			$content .= "\n";
		}

		if (!empty($data['p_jaringan'])) {
			$content .= "*Terdapat " . $data['jp_jaringan'] . " Notifikasi dari Anomali Jaringan :*\n";
			foreach ($data['p_jaringan'] as $r) {
				$content .= "*[#]* Jaringan dengan _nomor tower " . $r->no_tower . "_ dengan _jenis anomali " . $r->jenis_anomali . "_ , _bay (" . str_replace("\n", ", ", $r->bay_line) . ")_ , _jumlah titik " . $r->jumlah_titik . "_ , tanggal inspeksi _" . date('d/m/Y', strtotime($r->tanggal_inspeksi)) . "_ lalu, diharapkan segera melakukan upaya preventif. \n\n";
			}
			$content .= "\n";
		}

		return $content;
	}
}
