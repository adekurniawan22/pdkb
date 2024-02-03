<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alat_kerja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Alat_kerja_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_alat_kerja();
		$data['title'] = 'Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/alat_kerja', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/tambah_alat_kerja', $data);
		$this->load->view('templates/footer');
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
			redirect('admin/alat-kerja');
		}
	}

	public function edit_alat_kerja()
	{
		$data['title'] = 'Alat Kerja';
		$data['alat_kerja'] = $this->Alat_kerja_model->dapat_satu_alat_kerja($this->input->post('id_alat_kerja'));
		$this->load->view('templates/header', $data);
		$this->load->view('admin/warehouse/alat_kerja/edit_alat_kerja', $data);
		$this->load->view('templates/footer');
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
			redirect('admin/alat-kerja');
		}
	}

	public function proses_hapus_alat_kerja()
	{
		$this->db->where('id_alat_kerja', $this->input->post('id_alat_kerja'));
		$this->db->delete('t_alat_kerja');
		$this->session->set_flashdata('message', '<strong>Data Alat Kerja Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		redirect('admin/alat-kerja');
	}

	public function kirim_email_ke_atasan()
	{

		echo "<pre>";
		echo var_dump($_POST);
		echo "<pre>";
		// $kuesioner = $this->Kuesioner_model->dapat_satu_kuesioner($this->input->post('id_kuesioner'));
		// $this->load->library('email');
		// $config = array(
		// 	'protocol'  => 'smtp',
		// 	'smtp_host' => 'ssl://smtp.googlemail.com',
		// 	'smtp_port' => 465,
		// 	'smtp_user' => 'appcilogin@gmail.com',
		// 	'smtp_pass' => 'iakd gazx zkva ghrk	',
		// 	'mailtype'  => 'html',
		// 	'charset'   => 'utf-8',
		// 	'newline'   => "\r\n"
		// );

		// $this->email->initialize($config);

		// $this->db->where('jabatan', 'Manajer');
		// $query = $this->db->get('t_pegawai')->result();

		// foreach ($query as $q) {
		// 	$this->email->from('appcilogin@gmail.com', 'CV. Abell');
		// 	$this->email->to($q->email);

		// 	$this->email->subject('Kuesioner Telah Berakhir');
		// 	$content = "Kuesioner : $kuesioner->judul_kuesioner <br>	
		//             Tanggal Mulai : $kuesioner->mulai <br>
		//             Tanggal Selesai : $kuesioner->selesai <br>";

		// 	$this->email->message("$content<br> Silahkan periksa dan evaluasi jawaban dari pelanggan &#128512;");
		// 	$this->email->send();
		// }
		// $this->session->set_userdata('email_sent', true);
		// $this->session->set_flashdata('message', '<strong>Kirim Email Ke Manajer Telah Berhasil</strong>
		// <i class="bi bi-check-circle-fill"></i>');
		// redirect('admin/data-kuesioner');
	}
}
