<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Penilaian_model', 'PM');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard Admin | Menu Penilaian (Metode PSI)';
		$data['tabel'] = 'Data Penilaian';

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$data['alternatif'] = $this->PM->getAllData();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/penilaian/index', $data);
		$this->load->view('templates/Admin_footer');
	}
}
