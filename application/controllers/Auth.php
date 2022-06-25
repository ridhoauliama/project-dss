<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
	}

	// Halaman Auth
	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if (!empty($this->session->userdata('username'))) {
			if ($this->session->userdata('role_id') == 1) {
				redirect('Admin');
			} else if ($this->session->userdata('role_id') == 2) {
				redirect('Kades');
			} else {
				redirect('auth/blocked');
			}
		}
		if ($this->form_validation->run() == false) {
			$data['judul'] = "Auth - Form Login & Registrasi";
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}

	// Validasi Login
	private function _login()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');

		$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($pass, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('Admin');
				} else {
					redirect('Kades');
				}
			} else {
				$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger text-center" role="alert">Password yang anda masukkan salah, silahkan coba kembali.</div>'
				);
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger text-center" role="alert">Username tidak ditemukan, silahkan lakukan registrasi akun!</div>'
			);
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'min_length' => 'Password minimal 4 karakter',
			'matches' => 'Password tidak sesuai'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false) {

			$data['judul'] = "Halaman Registrasi";
			$this->load->view('auth', $data);
		} else {
			$this->Auth_model->registrasiAkun();
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success text-center" role="alert">Registrasi akun berhasil, silahkan login</div>'
			);
			redirect('auth');
		}
	}

	// Logout
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Anda telah keluar.</div>');
		redirect('auth');
	}

	// Halaman Akses Ditolak/block
	public function blocked()
	{
		$data['judul'] = "Block Access";
		$this->load->view('auth/blocked', $data);
	}
}
