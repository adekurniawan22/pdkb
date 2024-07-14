<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jsa extends CI_Controller
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
		$this->load->model('Jsa_model');
		$this->load->model('Personil_model');
		$this->load->library('pdfgenerator');
	}


	public function index()
	{
		unset(
			$_SESSION['id_view_jsa']
		);
		$data['temuan_jsa'] = $this->Jsa_model->dapat_temuan_jsa();
		$data['title'] = 'Laporan JSA';

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$data['jsa'] = $this->Jsa_model->dapat_jsa();
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/jsa/jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$data['jsa'] = $this->Jsa_model->dapat_jsa();
			$this->load->view('templates/header', $data);
			$this->load->view('admin/jsa/jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$data['jsa'] = $this->Jsa_model->dapat_jsa_jtc($this->session->userdata('id_personil'));
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/jsa/jsa', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_jsa()
	{
		$data['title'] = 'Laporan JSA';
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/jsa/tambah_jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/jsa/tambah_jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/jsa/tambah_jsa', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_jsa()
	{

		// Config JSA
		$config_jsa = array(
			'upload_path' => './assets/img/jsa',
			'allowed_types' => 'jpg|jpeg|png|pdf',
		);

		// Initialize upload for each file
		$this->upload->initialize($config_jsa);

		//Data aspek perencanaan
		$aspek_perencanaan = $this->input->post('aspek_perencanaan');

		foreach ($aspek_perencanaan as $index => $aspek) {
			foreach ($aspek['titik_anomali'] as $titik_index => $titik) {
				$file_key = "{$titik}_{$index}_file";

				if (isset($_FILES[$file_key])) {
					// Iterate through each file
					$total_files = count($_FILES[$file_key]['name']);
					for ($urutanFoto = 0; $urutanFoto < $total_files; $urutanFoto++) {
						$_FILES['userfile']['name'] = $_FILES[$file_key]['name'][$urutanFoto];
						$_FILES['userfile']['type'] = $_FILES[$file_key]['type'][$urutanFoto];
						$_FILES['userfile']['tmp_name'] = $_FILES[$file_key]['tmp_name'][$urutanFoto];
						$_FILES['userfile']['error'] = $_FILES[$file_key]['error'][$urutanFoto];
						$_FILES['userfile']['size'] = $_FILES[$file_key]['size'][$urutanFoto];

						if ($this->upload->do_upload('userfile')) {
							$upload_data = $this->upload->data();
							$aspek_perencanaan[$index]['foto'][$titik_index][] = $upload_data['file_name']; // Menambahkan file name ke array tanpa menentukan indeks
						} else {
							$upload_error = $this->upload->display_errors();
							echo "Upload error: " . $upload_error;
						}
					}
				} else if (isset($_POST[$file_key])) {
					// Jika ada file yang di-post
					foreach ($_POST[$file_key] as $urutanFoto => $data) {
						$aspek_perencanaan[$index]['foto'][$titik_index][] = $data; // Menambahkan data ke array tanpa menentukan indeks
					}
				}
			}
		}



		//Data aspek sdm
		$aspek_sdm = [
			'jumlah_personil_pdkb' => $this->input->post('jumlah_personil_pdkb'),
			'jumlah_tenaga_bantuan' => $this->input->post('jumlah_tenaga_bantuan'),
			'jumlah_driver' => $this->input->post('jumlah_driver'),
			'kendaraan_kerja' => $this->input->post('kendaraan_kerja'),
			'layanan_kesehatan_terdekat' => $this->input->post('layanan_kesehatan_terdekat'),
		];

		//Data aspek lingkungan
		$aspek_lingkungan = [
			'alamat_tower' => $this->input->post('alamat_tower'),
			'akses_menuju_tower' => $this->input->post('akses_menuju_tower'),
			'halaman_tower' => $this->input->post('halaman_tower'),
			'kondisi_lingkungan' => $this->input->post('kondisi_lingkungan'),
			'catatan_kondisi_lingkungan' => $this->input->post('catatan_kondisi_lingkungan'),
			'potensi_hewan' => $this->input->post('potensi_hewan'),
		];

		if ($this->upload->do_upload('foto_akses_menuju_tower')) {
			$upload_data = $this->upload->data();
			$aspek_lingkungan['foto_akses_menuju_tower'] = $upload_data['file_name'];
		}

		if ($this->upload->do_upload('foto_halaman_tower')) {
			$upload_data = $this->upload->data();
			$aspek_lingkungan['foto_halaman_tower'] = $upload_data['file_name'];
		}

		if (isset($_FILES['foto_potensi_hewan'])) {
			if ($this->upload->do_upload('foto_potensi_hewan')) {
				$upload_data = $this->upload->data();
				$aspek_lingkungan['foto_potensi_hewan'] = $upload_data['file_name'];
			} else {
				$aspek_lingkungan['foto_potensi_hewan'] = null;
			}
		}


		//Data aspek konstrksi
		$aspek_konstruksi = [
			'jenis_tower' => $this->input->post('jenis_tower'),
			'type_tower' => $this->input->post('type_tower'),
			'jenis_stringset_isolator' => $this->input->post('jenis_stringset_isolator'),
			'panjang_stringset_isolator' => $this->input->post('panjang_stringset_isolator'),
			'posisi_pin' => $this->input->post('posisi_pin'),
			'jumlah_konduktor' => $this->input->post('jumlah_konduktor'),
			'jenis_konduktor' => $this->input->post('jenis_konduktor'),
			'jarak_span' => $this->input->post('jarak_span'),
			'kondisi_stepbolt' => $this->input->post('kondisi_stepbolt'),
			'panjang_traves' => $this->input->post('panjang_traves'),
			'lebar_traves' => $this->input->post('lebar_traves'),
			'jarak_antar_traves' => $this->input->post('jarak_antar_traves'),
		];

		if ($this->upload->do_upload('foto_type_tower')) {
			$upload_data = $this->upload->data();
			$aspek_konstruksi['foto_type_tower'] = $upload_data['file_name'];
		}
		if ($this->upload->do_upload('foto_jenis_stringset_isolator')) {
			$upload_data = $this->upload->data();
			$aspek_konstruksi['foto_jenis_stringset_isolator'] = $upload_data['file_name'];
		}

		// Data aspek pelaksanaan
		$aspek_pelaksanaan = [
			'sop' => $this->input->post('sop'),
			'ik' => $this->input->post('ik'),
		];

		$data_jsa = [
			'judul_laporan' => $this->input->post('judul_laporan'),
			'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
			'mulai_pelaksanaan' => $this->input->post('mulai_pelaksanaan'),
			'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan'),
			'kesimpulan' => $this->input->post('kesimpulan'),
			'alasan' => ($this->input->post('kesimpulan') == "Tidak Dapat Dikerjakan Dengan Metode PDKB") ? $this->input->post('alasan') : null,
			'aspek_perencanaan' => $aspek_perencanaan,
			'aspek_sdm' => $aspek_sdm,
			'aspek_lingkungan' => $aspek_lingkungan,
			'aspek_konstruksi' => $aspek_konstruksi,
			'aspek_pelaksanaan' => $aspek_pelaksanaan,
		];

		$data_real = [
			'id_personil' => $this->session->userdata('id_personil'),
			'detail' => json_encode($data_jsa), // Convert $data_jsa to JSON string
		];

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$data_real['sudah_disetujui'] = '1';
			$data_real['id_atasan'] = $this->session->userdata('id_personil');
		} else {
			$data_real['sudah_disetujui'] = '0';
		}

		$result = $this->Jsa_model->tambah_jsa($data_real);
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Laporan JSA Berhasil Ditambahkan</strong>
															<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Laporan JSA Gagal Ditambahkan</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
		}

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/jsa');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/jsa');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/jsa');
		}
	}

	public function edit_jsa()
	{
		$data['jsa'] = $this->db->get_where('t_jsa', ['id_jsa' => $this->input->post('id_jsa')])->row();
		$data['title'] = 'Laporan JSA';

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/jsa/edit_jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/jsa/edit_jsa', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/jsa/edit_jsa', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_jsa()
	{
		// Config JSA
		$config_jsa = array(
			'upload_path' => './assets/img/jsa',
			'allowed_types' => 'jpg|jpeg|png|pdf',
		);

		// Initialize upload for each file
		$this->upload->initialize($config_jsa);

		//Data aspek perencanaan
		$aspek_perencanaan = $this->input->post('aspek_perencanaan');
		foreach ($aspek_perencanaan as $index => $aspek) {
			foreach ($aspek['titik_anomali'] as $titik_index => $titik) {
				$file_key = "{$titik}_{$index}_file";

				if (isset($_FILES[$file_key])) {
					// Iterate through each file
					$total_files = count($_FILES[$file_key]['name']);
					for ($urutanFoto = 0; $urutanFoto < $total_files; $urutanFoto++) {
						$_FILES['userfile']['name'] = $_FILES[$file_key]['name'][$urutanFoto];
						$_FILES['userfile']['type'] = $_FILES[$file_key]['type'][$urutanFoto];
						$_FILES['userfile']['tmp_name'] = $_FILES[$file_key]['tmp_name'][$urutanFoto];
						$_FILES['userfile']['error'] = $_FILES[$file_key]['error'][$urutanFoto];
						$_FILES['userfile']['size'] = $_FILES[$file_key]['size'][$urutanFoto];

						if ($this->upload->do_upload('userfile')) {
							$upload_data = $this->upload->data();
							$aspek_perencanaan[$index]['foto'][$titik_index][] = $upload_data['file_name']; // Menambahkan file name ke array tanpa menentukan indeks
						} else {
							$upload_error = $this->upload->display_errors();
							echo "Upload error: " . $upload_error;
						}

						unlink(FCPATH . 'assets/img/jsa/' . $upload_data['file_name']);
					}
				}

				if (isset($_POST[$file_key])) {
					// Jika ada file yang di-post
					foreach ($_POST[$file_key] as $urutanFoto => $data) {
						$aspek_perencanaan[$index]['foto'][$titik_index][] = $data; // Menambahkan data ke array tanpa menentukan indeks
					}
				}
			}
		}

		//Data aspek sdm
		$aspek_sdm = [
			'jumlah_personil_pdkb' => $this->input->post('jumlah_personil_pdkb'),
			'jumlah_tenaga_bantuan' => $this->input->post('jumlah_tenaga_bantuan'),
			'jumlah_driver' => $this->input->post('jumlah_driver'),
			'kendaraan_kerja' => $this->input->post('kendaraan_kerja'),
			'layanan_kesehatan_terdekat' => $this->input->post('layanan_kesehatan_terdekat'),
		];

		// Data aspek lingkungan
		$aspek_lingkungan = [
			'alamat_tower' => $this->input->post('alamat_tower'),
			'akses_menuju_tower' => $this->input->post('akses_menuju_tower'),
			'halaman_tower' => $this->input->post('halaman_tower'),
			'kondisi_lingkungan' => $this->input->post('kondisi_lingkungan'),
			'catatan_kondisi_lingkungan' => $this->input->post('catatan_kondisi_lingkungan'),
			'potensi_hewan' => $this->input->post('potensi_hewan'),
		];

		// Foto akses menuju tower
		if (!empty($_FILES['foto_akses_menuju_tower']['name'])) {
			if ($this->upload->do_upload('foto_akses_menuju_tower')) {
				$upload_data = $this->upload->data();
				$aspek_lingkungan['foto_akses_menuju_tower'] = $upload_data['file_name'];
				unlink(FCPATH . 'assets/img/jsa/' . $this->input->post('foto_lama_akses_menuju_tower'));
			}
		} else {
			$aspek_lingkungan['foto_akses_menuju_tower'] = $this->input->post('foto_lama_akses_menuju_tower');
		}

		// Foto halaman tower
		if (!empty($_FILES['foto_halaman_tower']['name'])) {
			if ($this->upload->do_upload('foto_halaman_tower')) {
				$upload_data = $this->upload->data();
				$aspek_lingkungan['foto_halaman_tower'] = $upload_data['file_name'];
				unlink(FCPATH . 'assets/img/jsa/' . $this->input->post('foto_lama_halaman_tower'));
			}
		} else {
			$aspek_lingkungan['foto_halaman_tower'] = $this->input->post('foto_lama_halaman_tower');
		}

		// Foto potensi hewan
		if (!empty($_FILES['foto_potensi_hewan']['name'])) {
			if ($this->upload->do_upload('foto_potensi_hewan')) {
				$upload_data = $this->upload->data();
				$aspek_lingkungan['foto_potensi_hewan'] = $upload_data['file_name'];
				unlink(FCPATH . 'assets/img/jsa/' . $this->input->post('foto_lama_potensi_hewan'));
			}
		} else {
			$aspek_lingkungan['foto_potensi_hewan'] = !empty($this->input->post('foto_lama_potensi_hewan')) ? $this->input->post('foto_lama_potensi_hewan') : null;
		}

		//Data aspek konstrksi
		$aspek_konstruksi = [
			'jenis_tower' => $this->input->post('jenis_tower'),
			'type_tower' => $this->input->post('type_tower'),
			'jenis_stringset_isolator' => $this->input->post('jenis_stringset_isolator'),
			'panjang_stringset_isolator' => $this->input->post('panjang_stringset_isolator'),
			'posisi_pin' => $this->input->post('posisi_pin'),
			'jumlah_konduktor' => $this->input->post('jumlah_konduktor'),
			'jenis_konduktor' => $this->input->post('jenis_konduktor'),
			'jarak_span' => $this->input->post('jarak_span'),
			'kondisi_stepbolt' => $this->input->post('kondisi_stepbolt'),
			'panjang_traves' => $this->input->post('panjang_traves'),
			'lebar_traves' => $this->input->post('lebar_traves'),
			'jarak_antar_traves' => $this->input->post('jarak_antar_traves'),
		];

		if (!empty($_FILES['foto_type_tower']['name'])) {
			if ($this->upload->do_upload('foto_type_tower')) {
				$upload_data = $this->upload->data();
				$aspek_konstruksi['foto_type_tower'] = $upload_data['file_name'];
				unlink(FCPATH . 'assets/img/jsa/' . $this->input->post('foto_lama_type_tower'));
			}
		} else {
			$aspek_konstruksi['foto_type_tower'] = $this->input->post('foto_lama_type_tower');
		}

		if (!empty($_FILES['foto_jenis_stringset_isolator']['name'])) {
			if ($this->upload->do_upload('foto_jenis_stringset_isolator')) {
				$upload_data = $this->upload->data();
				$aspek_konstruksi['foto_jenis_stringset_isolator'] = $upload_data['file_name'];
				unlink(FCPATH . 'assets/img/jsa/' . $this->input->post('foto_lama_jenis_stringset_isolator'));
			}
		} else {
			$aspek_konstruksi['foto_jenis_stringset_isolator'] = $this->input->post('foto_lama_jenis_stringset_isolator');
		}

		// Data aspek pelaksanaan
		$aspek_pelaksanaan = [
			'sop' => $this->input->post('sop'),
			'ik' => $this->input->post('ik'),
		];

		$data_jsa = [
			'judul_laporan' => $this->input->post('judul_laporan'),
			'lokasi_pekerjaan' => $this->input->post('lokasi_pekerjaan'),
			'mulai_pelaksanaan' => $this->input->post('mulai_pelaksanaan'),
			'selesai_pelaksanaan' => $this->input->post('selesai_pelaksanaan'),
			'kesimpulan' => $this->input->post('kesimpulan'),
			'alasan' => ($this->input->post('kesimpulan') == "Tidak Dapat Dikerjakan Dengan Metode PDKB") ? $this->input->post('alasan') : null,
			'aspek_perencanaan' => $aspek_perencanaan,
			'aspek_sdm' => $aspek_sdm,
			'aspek_lingkungan' => $aspek_lingkungan,
			'aspek_konstruksi' => $aspek_konstruksi,
			'aspek_pelaksanaan' => $aspek_pelaksanaan,
		];

		$data_real = [
			'detail' => json_encode($data_jsa), // Convert $data_jsa to JSON string
		];

		$result = $this->Jsa_model->edit_jsa($this->input->post('id_jsa'), $data_real);
		if ($result) {
			$this->session->set_flashdata('message', '<strong>Data Laporan JSA Berhasil Diedit</strong>
															<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Data Laporan JSA Gagal Diedit</strong>
															<i class="bi bi-exclamation-circle-fill"></i>');
		}

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/jsa');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/jsa');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/jsa');
		}
	}

	public function proses_hapus_jsa()
	{
		$query = $this->db->get_where('t_jsa', ['id_jsa' => $this->input->post('id_jsa')])->row();
		$detail_data = json_decode($query->detail, true);;
		foreach ($detail_data['aspek_perencanaan'] as $detail) {
			foreach ($detail['titik_anomali'] as $subIndex => $data) {
				foreach ($detail['foto'][$subIndex] as $data) {
					$foto_files = FCPATH . 'assets/img/jsa/' . $data;
					unlink($foto_files);
				}
			}
		}
		$foto_files = FCPATH . 'assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_akses_menuju_tower'];
		unlink($foto_files);
		$foto_files = FCPATH . 'assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_halaman_tower'];
		unlink($foto_files);
		$foto_files = FCPATH . 'assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_potensi_hewan'];
		unlink($foto_files);
		$foto_files = FCPATH . 'assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_type_tower'];
		unlink($foto_files);
		$foto_files = FCPATH . 'assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_jenis_stringset_isolator'];
		unlink($foto_files);

		$this->db->where('id_jsa', $this->input->post('id_jsa'));
		$this->db->delete('t_jsa');
		$this->session->set_flashdata('message', '<strong>Data Laporan JSA Berhasil Dihapus</strong>
		<i class="bi bi-check-circle-fill"></i>');
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/jsa');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/jsa');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/jsa');
		}
	}

	public function proses_edit_status_jsa()
	{
		$data = array(
			'sudah_disetujui' => ($this->input->post('sudah_disetujui') == 'on') ? '1' : '0',
			'id_atasan' => $this->session->userdata('id_personil')
		);
		$this->db->where('id_jsa', $this->input->post('id_jsa'));
		$this->db->update('t_jsa', $data);
		$this->session->set_flashdata('message', '<strong>Status Laporan JSA Berhasil Disetujui</strong>
                                                    <i class="bi bi-check-circle-fill"></i>');
		redirect('atasan/jsa');
	}

	public function cetak_jsa()
	{
		$id_jsa = $this->input->post('id_jsa');
		$id_atasan = $this->input->post('id_atasan');

		$atasan = $this->Personil_model->dapat_satu_personil_dan_jabatan($id_atasan);
		if ($atasan) {
			$nama_file_pdf = "JSA_" . $id_jsa;
		} else {
			$nama_file_pdf = "PREVIEW_JSA_" . $id_jsa;
		}

		$this->db->where('id_jsa =', $id_jsa);
		$query = $this->db->get('t_jsa')->row();

		$detail_data = json_decode($query->detail, true);
		foreach ($detail_data['aspek_perencanaan'] as $data) {
			foreach ($data['foto'] as $data2) {
				foreach ($data2 as $data3) {
					$foto_clean = str_replace(' ', '', $data3);
					// Encode image to base64 if needed (assuming you have this method)
					$this->encode_img_base64(base_url('assets/img/jsa/' . $foto_clean));
				}
			}
		}

		$this->encode_img_base64(base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_akses_menuju_tower']));
		$this->encode_img_base64(base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_halaman_tower']));
		$this->encode_img_base64(base_url('assets/img/jsa/' . $detail_data['aspek_lingkungan']['foto_potensi_hewan']));
		$this->encode_img_base64(base_url('assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_type_tower']));
		$this->encode_img_base64(base_url('assets/img/jsa/' . $detail_data['aspek_konstruksi']['foto_jenis_stringset_isolator']));

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
		$this->encode_img_base64(base_url('assets/img/sampul_pdf_jsa.png'));
		$this->encode_img_base64(base_url('assets/img/orang_jsa.png'));
		$this->encode_img_base64(base_url('assets/img/logo_pln.png'));

		if ($query) {
			$html = $this->load->view('admin/jsa/pdf', [
				'query' => $query,
				'atasan' => $atasan,
				'tanggal_sekarang' => $tanggal_sekarang,
			], true);
		} else {
			$this->load->view('admin/jsa/pdf', [
				'query' => $query,
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
