<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Halaman Utama
class Home extends CI_Controller
{
	public function index()
	{
		if (!empty($this->session->userdata('username'))) {
			$user = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
			$data['nama'] = $user['nama_user'];
		}
		$data['judul'] = "Program Penentuan Kelayakan Bantuan";
		$this->load->view('templates/Home_Header', $data);
		$this->load->view('home/index');
		$this->load->view('templates/Home_Footer');
	}
}
