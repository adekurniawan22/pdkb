<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{
	private $telegram_token = '7145757655:AAGunuRk1_KDf-A8UrJZq_9ahsNbFXWyogo';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personil_model');
		$this->load->model('Alat_kerja_model');
		$this->load->model('Rencana_operasi_model');
		$this->load->library('email');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data = $this->data_laporan();
		$isEmpty = true;
		foreach ($data as $key => $value) {
			if (!empty($value)) {
				$isEmpty = false;
				break;
			}
		}

		if (!$isEmpty) {
			date_default_timezone_set('Asia/Jakarta');
			$nama_file_pdf = 'data_laporan_simpati_pdkb_' . date('YmdHis') . '.pdf';
			$html = $this->load->view('cetak', $data, true);

			$this->pdfgenerator->savePDF($html, 'A4', 'portrait', $nama_file_pdf);

			$content = "Halo,\n\nSaya adalah BOT Telegram dari SIMPATI-PDKB\n(https://simpati-pdkb.id/).\n\nBerikut adalah laporan data untuk periode 1 bulan mendatang dari sistem kami dalam format PDF.\n\nTerima kasih.";

			$telegram_chat_id = 1375998661;

			// Send PDF via Telegram
			$this->send_telegram_message($telegram_chat_id, $content, base_url('assets/data_laporan/' . $nama_file_pdf));

			$pdf_file_path = FCPATH . 'assets/data_laporan/' . $nama_file_pdf;
			if (file_exists($pdf_file_path)) {
				unlink($pdf_file_path);
			}
		}

		exit();
	}

	private function send_telegram_message($chat_id, $message, $document_url)
	{
		$url = "https://api.telegram.org/bot{$this->telegram_token}/sendDocument";

		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt_array($ch, [
			CURLOPT_URL => $url,
			CURLOPT_POST => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => [
				'chat_id' => $chat_id,
				'document' => new CURLFile($document_url),
				'caption' => $message,
				'parse_mode' => 'HTML'
			]
		]);

		// Execute the cURL session
		curl_exec($ch);

		// Check for cURL errors
		if (curl_errno($ch)) {
			// Handle error
			log_message('error', 'Telegram cURL request failed: ' . curl_error($ch));
		} else {
			// Close cURL session
			curl_close($ch);

			// Handle success
			log_message('debug', 'Telegram message sent successfully');
		}
	}

	private function data_laporan()
	{
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

		return $data;
	}
}
