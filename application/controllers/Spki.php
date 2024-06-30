<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spki extends CI_Controller
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
		$this->load->model('SPKI_model');
		$this->load->model('Personil_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['title'] = 'SPKI';

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$data['spki'] = $this->SPKI_model->dapat_spki();
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/spki/spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$data['spki'] = $this->SPKI_model->dapat_spki();
			$this->load->view('templates/header', $data);
			$this->load->view('admin/spki/spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$data['spki'] = $this->SPKI_model->dapat_spki_jtc($this->session->userdata('id_personil'));
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/spki/spki', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_spki()
	{
		$data['title'] = 'SPKI';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/spki/tambah_spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/spki/tambah_spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/spki/tambah_spki', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_spki()
	{
		$this->form_validation->set_rules('nomor', 'Nomor SPKI', 'required|trim|integer');
		$this->form_validation->set_rules('bulan', 'Bulan SPKI', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun SPKI', 'required|callback_validate_year');
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
			$data = array(
				'id_personil' => $this->session->userdata('id_personil'),
				'nomor' => $this->input->post('nomor'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
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

			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				$data['sudah_disetujui'] = '1';
				$data['id_atasan'] = $this->session->userdata('id_personil');
			} else {
				$data['sudah_disetujui'] = '0';
			}

			$result = $this->SPKI_model->tambah_spki($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data SPKI Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data SPKI Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}

			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/spki');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/spki');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/spki');
			}
		}
	}

	public function edit_spki()
	{
		$data['title'] = 'SPKI';
		$data['spki'] = $this->SPKI_model->dapat_satu_spki($this->input->post('id_spki'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/spki/edit_spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/spki/edit_spki', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/spki/edit_spki', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_spki()
	{
		$this->form_validation->set_rules('nomor', 'Nomor SPKI', 'required|trim|integer');
		$this->form_validation->set_rules('bulan', 'Bulan SPKI', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun SPKI', 'required|callback_validate_year');
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
				'nomor' => $this->input->post('nomor'),
				'bulan' => $this->input->post('bulan'),
				'tahun' => $this->input->post('tahun'),
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
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/spki');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/spki');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/spki');
			}
		}
	}

	public function proses_hapus_spki()
	{
		$this->db->where('id_spki', $this->input->post('id_spki'));
		$this->db->delete('t_spki');
		$this->session->set_flashdata('message', '<strong>Data SPKI Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/spki');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/spki');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/spki');
		}
	}

	public function proses_edit_status_spki()
	{
		$data = array(
			'sudah_disetujui' => ($this->input->post('sudah_disetujui') == 'on') ? '1' : '0',
			'id_atasan' => $this->session->userdata('id_personil')
		);
		$this->db->where('id_spki', $this->input->post('id_spki'));
		$this->db->update('t_spki', $data);
		$this->session->set_flashdata('message', '<strong>Status SPKI Berhasil Disetujui</strong>
                                                    <i class="bi bi-check-circle-fill"></i>');
		redirect('atasan/spki');
	}

	public function cetak_spki()
	{
		$id_spki = $this->input->post('id_spki');
		$id_atasan = $this->input->post('id_atasan');

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		$query = $this->SPKI_model->dapat_satu_spki($id_spki);

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
		$nama_file_pdf = 'SPKI_NO_' . $query->nomor . '_PDKB-TT_' . $query->bulan . '_' . $query->tahun;

		if ($query and $atasan) {
			$html = $this->load->view('admin/spki/pdf', ['query' => $query, 'atasan' => $atasan, 'tanggal_sekarang' => $tanggal_sekarang, 'foto' => $foto], true);
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

	public function validate_year($str)
	{
		if (!preg_match('/^\d{4}$/', $str)) {
			$this->form_validation->set_message('validate_year', 'Format tahun harus YYYY.');
			return FALSE;
		}
		return TRUE;
	}
}
