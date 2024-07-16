<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jaringan extends CI_Controller
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
		$this->load->model('Personil_model');
		$this->load->model('Jaringan_model');
		$this->load->library('pdfgenerator');
	}

	public function index()
	{
		$data['jaringan'] = $this->Jaringan_model->dapat_jaringan();
		$data['title'] = 'Jaringan';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_jaringan()
	{
		$data['title'] = 'Jaringan';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/tambah_jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('fasa', 'Fasa', 'required|trim');
		$this->form_validation->set_rules('tanggal_inspeksi', 'Tanggal Inspeksi', 'required|trim');
		$this->form_validation->set_rules('tanggal_ews', 'Tanggal EWS', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');

		if ($this->form_validation->run() == false) {
			$this->tambah_jaringan();
		} else {
			$foto = $this->validasi_foto('ambil_foto');
			$data_jaringan = [
				'id_personil' => $this->session->userdata('id_personil'),
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'fasa' => $this->input->post('fasa'),
				'foto' => $foto,
				'tanggal_inspeksi' => $this->input->post('tanggal_inspeksi'),
				'tanggal_ews' => $this->input->post('tanggal_ews'),
			];

			$result = $this->Jaringan_model->tambah_jaringan($data_jaringan);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		}
	}
	public function edit_jaringan()
	{
		$data['title'] = 'Jaringan';
		$data['jaringan'] = $this->Jaringan_model->dapat_satu_jaringan($this->input->post('id_jaringan'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/anomali/jaringan/edit_jaringan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_jaringan()
	{
		$this->form_validation->set_rules('jenis_anomali', 'Jenis Anomali', 'required|trim');
		$this->form_validation->set_rules('bay_line', 'Bay Line', 'required|trim');
		$this->form_validation->set_rules('no_tower', 'Nomor Tower', 'required|trim|integer');
		$this->form_validation->set_rules('jumlah_titik', 'Jumlah Titik', 'required|trim|integer');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
		$this->form_validation->set_rules('klasifikasi', 'Klasifikasi', 'required|trim');
		$this->form_validation->set_rules('fasa', 'Fasa', 'required|trim');
		$this->form_validation->set_rules('tanggal_inspeksi', 'Tanggal Inspeksi', 'required|trim');
		$this->form_validation->set_rules('tanggal_ews', 'Tanggal EWS', 'required|trim');
		$status_dikerjakan = ($this->input->post('status_dikerjakan') == 'on') ? '1' : '0';

		if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
			$this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_foto');
			$foto = $this->validasi_foto('ambil_foto');
		} else {
			$foto = $this->input->post('foto_lama');
		}

		if ($this->form_validation->run() == false) {
			$this->edit_jaringan();
		} else {
			$data_jaringan = [
				'jenis_anomali' => $this->input->post('jenis_anomali'),
				'bay_line' => $this->input->post('bay_line'),
				'no_tower' => $this->input->post('no_tower'),
				'jumlah_titik' => $this->input->post('jumlah_titik'),
				'keterangan' => $this->input->post('keterangan'),
				'klasifikasi' => $this->input->post('klasifikasi'),
				'fasa' => $this->input->post('fasa'),
				'tanggal_inspeksi' => $this->input->post('tanggal_inspeksi'),
				'tanggal_ews' => $this->input->post('tanggal_ews'),
				'foto' => $foto,
				'status_dikerjakan' => $status_dikerjakan,
			];

			$result = $this->Jaringan_model->edit_jaringan($this->input->post('id_jaringan'), $data_jaringan);

			if ($result) {
				if ($_FILES['foto']['name']) {
					unlink(FCPATH . 'assets/img/jaringan/' . $this->input->post('foto_lama'));
				}
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		}
	}


	public function proses_hapus_jaringan()
	{
		$this->db->where('id_jaringan', $this->input->post('id_jaringan'));
		$result = $this->db->delete('t_jaringan');
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Dihapus</strong>
												<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Dihapus</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
		}
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/jaringan');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/jaringan');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/jaringan');
		}
	}

	function validasi_foto($param)
	{
		if (isset($_FILES['foto']) && empty($_FILES['foto']['name'])) {
			$this->form_validation->set_message('validasi_foto', 'Foto tidak boleh kosong');
			return false;
		} else {
			$config_foto = array(
				'upload_path' => './assets/img/jaringan',
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => 2048, // 2MB
			);
			$this->upload->initialize($config_foto);

			if ($this->upload->do_upload('foto')) {
				// Proses upload berhasil, lanjutkan dengan logika yang diinginkan
				$foto_data = $this->upload->data();
				$foto = $foto_data['file_name'];

				if ($param == null) {
					unlink(FCPATH . 'assets/img/jaringan/' . $foto);
					return true; // Kembalikan true jika semuanya berjalan dengan baik
				} else {
					return $foto;
				}
			} else {
				// Proses upload gagal, set pesan kesalahan
				$this->form_validation->set_message('validasi_foto', 'Upload foto gagal. ' . $this->upload->display_errors('<p style="font-size: 12px; color: red;" class="my-2">', '</p>'));
				return false; // Kembalikan false jika ada kesalahan
			}
		}
	}


	public function import_data_excel()
	{
		// Konfigurasi upload
		$config = array(
			'upload_path' => './assets/excel/',
			'allowed_types' => 'xlsx|xls',
			'remove_spaces' => TRUE,
		);
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('excel')) {
			$error = $this->upload->display_errors();
			echo "Error in uploading file: " . $error;
			return; // Hentikan eksekusi jika upload gagal
		}

		$data = $this->upload->data();
		$inputFileName = './assets/excel/' . $data['file_name'];

		// Membaca file Excel
		$inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
		$spreadsheet = $reader->load($inputFileName);
		$sheet = $spreadsheet->getActiveSheet();

		$countRows = 0;
		$errors = []; // Array untuk menyimpan pesan kesalahan

		foreach ($sheet->getRowIterator(2) as $row) {
			// Inisialisasi variabel di dalam loop
			$jenis_anomali = $sheet->getCell('A' . $row->getRowIndex())->getValue();
			$bay_line = $sheet->getCell('B' . $row->getRowIndex())->getFormattedValue();
			$nomor_tower = $sheet->getCell('C' . $row->getRowIndex())->getValue();
			$jumlah_titik = $sheet->getCell('D' . $row->getRowIndex())->getValue();
			$keterangan = $sheet->getCell('E' . $row->getRowIndex())->getFormattedValue();
			$klasifikasi = $sheet->getCell('F' . $row->getRowIndex())->getFormattedValue();
			$fasa = $sheet->getCell('G' . $row->getRowIndex())->getFormattedValue();
			$tanggal_inspeksi = $sheet->getCell('H' . $row->getRowIndex())->getFormattedValue();
			$tanggal_ews = $sheet->getCell('I' . $row->getRowIndex())->getFormattedValue();
			$status = $sheet->getCell('J' . $row->getRowIndex())->getValue();

			// Validasi jenis anomali
			if (empty($jenis_anomali)) {
				$errors[$row->getRowIndex()][] = 'Jenis anomali kosong';
			}

			// Validasi bay_line
			if (empty($bay_line)) {
				$errors[$row->getRowIndex()][] = 'Bay line kosong';
			}

			// Validasi nomor_tower
			if (empty($nomor_tower)) {
				$errors[$row->getRowIndex()][] = 'Nomor tower kosong';
			}
			if (!is_numeric($nomor_tower)) {
				$errors[$row->getRowIndex()][] = 'Nomor tower harus angka';
			}

			// Validasi jumlah_titik
			if (empty($jumlah_titik)) {
				$errors[$row->getRowIndex()][] = 'Jumlah titik kosong';
			}
			if (!is_numeric($jumlah_titik)) {
				$errors[$row->getRowIndex()][] = 'Jumlah titik harus angka';
			}

			// Validasi keterangan
			if (empty($keterangan)) {
				$errors[$row->getRowIndex()][] = 'Keterangan kosong';
			}

			// Validasi klasifikasi
			if (empty($klasifikasi)) {
				$errors[$row->getRowIndex()][] = 'Klasifikasi kosong';
			}

			// Validasi fasa
			if (empty($fasa)) {
				$errors[$row->getRowIndex()][] = 'Fasa kosong';
			}

			// Validasi tanggal_eksekusi
			if (empty($tanggal_inspeksi)) {
				$errors[$row->getRowIndex()][] = 'Tanggal inspeksi kosong';
			} else {
				// Ubah format tanggal_langganan ke format 'Y-m-d'
				$mulai_berlangganan_obj = date_create_from_format('d/m/Y', $tanggal_inspeksi);

				if (!$mulai_berlangganan_obj) {
					$errors[$row->getRowIndex()][] = 'Format tanggal langganan tidak sesuai';
				}
			}

			// Validasi tanggal_ews
			if (empty($tanggal_ews)) {
				$errors[$row->getRowIndex()][] = 'Tanggal ews kosong';
			} else {
				// Ubah format tanggal_langganan ke format 'Y-m-d'
				$mulai_berlangganan_obj = date_create_from_format('d/m/Y', $tanggal_ews);

				if (!$mulai_berlangganan_obj) {
					$errors[$row->getRowIndex()][] = 'Format tanggal langganan tidak sesuai';
				}
			}

			// Validasi status
			if (empty($status)) {
				$errors[$row->getRowIndex()][] = 'Status dikerjakan kosong';
			}

			// Jika ada kolom yang tidak valid, tambahkan ke dalam array $errors
			if (!empty($errors[$row->getRowIndex()])) {
				$countRows++; // Tambahkan jumlah baris yang memiliki kesalahan
			}
		}

		if ($countRows > 0) {
			// Jika ada baris dengan kesalahan, set pesan kesalahan
			$this->session->set_flashdata('error_add_excel', $errors);
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		} else {
			// Jika tidak ada kesalahan, lakukan operasi tambah data
			foreach ($sheet->getRowIterator(2) as $row) {
				$tanggal_inspeksi = $sheet->getCell('H' . $row->getRowIndex())->getFormattedValue();
				$tanggal_inspeksi_obj = date_create_from_format('m/d/Y', $tanggal_inspeksi);
				$tanggal_inspeksi_formatted = $tanggal_inspeksi_obj->format('Y-m-d');

				$tanggal_ews = $sheet->getCell('I' . $row->getRowIndex())->getFormattedValue();
				$tanggal_ews_obj = date_create_from_format('m/d/Y', $tanggal_ews);
				$tanggal_ews_formatted = $tanggal_ews_obj->format('Y-m-d');

				$status = strtolower($sheet->getCell('J' . $row->getRowIndex())->getValue());

				// Data sekarang diperoleh dalam loop
				$data1 = [
					'id_personil' => $this->session->userdata('id_personil'),
					'jenis_anomali' => $sheet->getCell('A' . $row->getRowIndex())->getValue(),
					'bay_line' => $sheet->getCell('B' . $row->getRowIndex())->getFormattedValue(),
					'no_tower' => $sheet->getCell('C' . $row->getRowIndex())->getValue(),
					'jumlah_titik' => $sheet->getCell('D' . $row->getRowIndex())->getValue(),
					'keterangan' => $sheet->getCell('E' . $row->getRowIndex())->getFormattedValue(),
					'klasifikasi' => $sheet->getCell('F' . $row->getRowIndex())->getFormattedValue(),
					'fasa' => $sheet->getCell('G' . $row->getRowIndex())->getFormattedValue(),
					'tanggal_inspeksi' => $tanggal_inspeksi_formatted,
					'tanggal_ews' => $tanggal_ews_formatted,
					'status_dikerjakan' => $status  === "sudah" ? "1" : "0",
				];

				$this->Jaringan_model->tambah_jaringan($data1);
				$countRows++;
			}

			if ($countRows > 0) {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Jaringan Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			unlink($inputFileName);
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/jaringan');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/jaringan');
			}
		}
	}
}
