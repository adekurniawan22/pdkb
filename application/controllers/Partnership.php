<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partnership extends CI_Controller
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
		$this->load->model('Partnership_model');
		$this->load->library('upload');
	}

	public function index()
	{

		$data['title'] = 'Partnership';
		$data['partnership'] = $this->Partnership_model->dapat_partnership();
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/partnership/partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/partnership/partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/partnership/partnership', $data);
			$this->load->view('templates/footer');
		}
	}

	public function tambah_partnership()
	{
		$data['title'] = 'Partnership';

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/partnership/tambah_partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/partnership/tambah_partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/partnership/tambah_partnership', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_tambah_partnership()
	{
		$this->form_validation->set_rules('nama_ultg', 'Nama ULTG', 'required|trim');
		$this->form_validation->set_rules('manajer', 'Nama Manajer', 'required|trim');
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|trim|is_unique[t_partnership.username]|regex_match[/^[a-z0-9_]+$/]'
		);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|is_unique[t_partnership.nip]');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|is_unique[t_partnership.email]|valid_email'
		);
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|integer');


		if ($this->form_validation->run() == false) {
			$this->tambah_partnership();
		} else {
			$data = array(
				'nama_ultg' => $this->input->post('nama_ultg'),
				'manajer' => $this->input->post('manajer'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nip' => $this->input->post('nip'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'status_aktif' => '1',
				'id_personil' => $this->session->userdata('id_personil'),
			);

			$result = $this->Partnership_model->tambah_partnership($data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Partnership Berhasil Ditambahkan</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Partnership Gagal Ditambahkan</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}

			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/partnership');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/partnership');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/partnership');
			}
		}
	}

	public function edit_partnership()
	{
		$data['title'] = 'Partnership';
		$data['partnership'] = $this->Partnership_model->dapat_satu_partnership($this->input->post('id_partnership'));
		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			$this->load->view('templates/header', $data);
			$this->load->view('atasan/partnership/edit_partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/partnership/edit_partnership', $data);
			$this->load->view('templates/footer');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			$this->load->view('templates/header', $data);
			$this->load->view('jtc/partnership/edit_partnership', $data);
			$this->load->view('templates/footer');
		}
	}

	public function proses_edit_partnership()
	{
		$check_data_partnership = $this->Partnership_model->dapat_satu_partnership($this->input->post('id_partnership'));

		$this->form_validation->set_rules('nama_ultg', 'Nama ULTG', 'required|trim');
		$this->form_validation->set_rules('manajer', 'Nama Manajer', 'required|trim');
		if ($this->input->post('username') != $check_data_partnership->username) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'required|trim|is_unique[t_partnership.username]|regex_match[/^[a-z0-9_]+$/]'
			);
		}
		if ($this->input->post('nip') != $check_data_partnership->nip) {
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|is_unique[t_partnership.nip]');
		}
		if ($this->input->post('email') != $check_data_partnership->email) {
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|trim|is_unique[t_partnership.email]|valid_email'
			);
		}
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|integer');

		if ($this->input->post('password_baru')) {
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[8]');
			$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru]');
		}

		$status_aktif = ($this->input->post('status_aktif') == 'on') ? '1' : '0';

		if ($this->form_validation->run() == false) {
			$this->edit_partnership();
		} else {

			$data = array(
				'nama_ultg' => $this->input->post('nama_ultg'),
				'manajer' => $this->input->post('manajer'),
				'username' => $this->input->post('username'),
				'nip' => $this->input->post('nip'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'status_aktif' => $status_aktif,
				'id_personil' => $this->session->userdata('id_personil'),
			);

			if ($this->input->post('password_baru')) {
				$data['password'] = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
			}

			$result = $this->Partnership_model->edit_partnership($this->input->post('id_partnership'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Partnership Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Partnership Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
			}
			if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
				redirect('atasan/partnership');
			} else if ($this->session->userdata('id_jabatan') == '4') {
				redirect('admin/partnership');
			} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
				redirect('jtc/partnership');
			}
		}
	}

	public function proses_hapus_partnership()
	{
		$this->db->where('id_partnership', $this->input->post('id_partnership'));
		$this->db->delete('t_partnership');
		$this->session->set_flashdata('message', '<strong>Data Partnership Berhasil Dihapus</strong>
													<i class="bi bi-check-circle-fill"></i>');

		if ($this->session->userdata('id_jabatan') == '1' or $this->session->userdata('id_jabatan') == '2' or $this->session->userdata('id_jabatan') == '3') {
			redirect('atasan/partnership');
		} else if ($this->session->userdata('id_jabatan') == '4') {
			redirect('admin/partnership');
		} else if ($this->session->userdata('id_jabatan') == '5' or $this->session->userdata('id_jabatan') == '6') {
			redirect('jtc/partnership');
		}
	}

	public function profil_partnership()
	{
		$data['title'] = 'Profil';
		$data['profil'] = $this->Partnership_model->dapat_satu_partnership($this->session->userdata('id_partnership'));
		$this->load->view('templates/header', $data);
		$this->load->view('partnership/profil/profil', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_profil_partnership()
	{
		$check_data_partnership = $this->Partnership_model->dapat_satu_partnership($this->session->userdata('id_partnership'));

		$this->form_validation->set_rules('nama_ultg', 'Nama ULTG', 'required|trim');
		$this->form_validation->set_rules('manajer', 'Nama Manajer', 'required|trim');
		if ($this->input->post('username') != $check_data_partnership->username) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'required|trim|is_unique[t_partnership.username]|regex_match[/^[a-z0-9_]+$/]'
			);
		}
		if ($this->input->post('nip') != $check_data_partnership->nip) {
			$this->form_validation->set_rules('nip', 'NIP', 'required|trim|alpha_numeric|is_unique[t_partnership.nip]');
		}
		if ($this->input->post('email') != $check_data_partnership->email) {
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|trim|is_unique[t_partnership.email]|valid_email'
			);
		} else {
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|trim|valid_email'
			);
		}
		$this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|trim|integer');

		if ($this->form_validation->run() == false) {
			$this->profil_partnership();
		} else {

			$data = array(
				'nama_ultg' => $this->input->post('nama_ultg'),
				'manajer' => $this->input->post('manajer'),
				'username' => $this->input->post('username'),
				'nip' => $this->input->post('nip'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
			);

			$result = $this->Partnership_model->edit_partnership($this->session->userdata('id_partnership'), $data);
			if ($result) {
				$this->session->set_flashdata('message', '<strong>Data Partnership Berhasil Di edit</strong>
												<i class="bi bi-check-circle-fill"></i>');
			} else {
				$this->session->set_flashdata('message', '<strong>Data Partnership Gagal Di edit</strong>
												<i class="bi bi-exclamation-circle-fill"></i>');
			}

			redirect('partnership/profil-partnership');
		}
	}

	public function proses_edit_password()
	{
		if ($this->input->post('password_lama')) {
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'callback_check_current_password');
			$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|callback_check_new_password');
			$this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'required|trim|matches[password_baru]');
		}

		if ($this->form_validation->run() == false) {
			$this->profil_partnership();
		} else {
			$data = array(
				'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
			);

			$result = $this->Partnership_model->edit_partnership($this->session->userdata('id_partnership'), $data);

			if ($result) {
				$this->session->set_flashdata('message', '<strong>Ganti Password Berhasil</strong>
															<i class="bi bi-check-circle-fill"></i>');
				redirect('partnership/profil-partnership');
			} else {
				$this->session->set_flashdata('message', '<strong>Ganti Password Gagal</strong>
				<i class="bi bi-exclamation-circle-fill"></i>');
				redirect('partnership/profil-partnership');
			}
		}
	}

	public function check_current_password($current_password)
	{
		$id_partnership = $this->session->userdata('id_partnership'); // Gantilah dengan cara Anda menyimpan ID personil
		$db_password = $this->db
			->select('password')
			->where('id_partnership', $id_partnership)
			->get('t_partnership')
			->row()
			->password;

		if (!password_verify($current_password, $db_password)) {
			$this->form_validation->set_message('check_current_password', 'Password saat ini salah!');
			return false;
		}
		return true;
	}

	public function check_new_password($password_baru)
	{
		$password_lama = $this->input->post('password_lama'); // Ambil nilai dari form

		if ($password_lama === $password_baru) {
			$this->form_validation->set_message('check_new_password', 'Password baru harus berbeda dengan password saat ini!');
			return false;
		}
		return true;
	}

	public function edit_tanda_tangan()
	{
		$signatureData = $this->input->post('signature_image');
		if (!empty($signatureData)) {
			$randomBytes = random_bytes(16); // Mendapatkan 16 byte nilai acak
			$fileName = 'signature_' . bin2hex($randomBytes) . '.png';
			file_put_contents('./assets/img/tanda-tangan/' . $fileName, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData)));
		}

		$this->db->where('id_partnership', $this->input->post('id_partnership'));
		$result =  $this->db->update('t_partnership', ['tanda_tangan' => $fileName]);

		if ($result) {
			unlink(FCPATH . 'assets/img/tanda-tangan/' . $this->input->post('tanda_tangan_lama'));
			$this->session->set_flashdata('message', '<strong>Tanda tangan Berhasil Di edit</strong>
													<i class="bi bi-check-circle-fill"></i>');
		} else {
			$this->session->set_flashdata('message', '<strong>Tanda tangan Gagal Di edit</strong>
													<i class="bi bi-exclamation-circle-fill"></i>');
		}
		redirect('partnership/profil-partnership');
	}
}
