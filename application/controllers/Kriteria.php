<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Kriteria_model', 'KM');
		$this->load->library('form_validation');
	}

	// Halaman Kriteria
	public function index()
	{
		$data['judul'] = 'Dashboard Admin | Data Kriteria';
		$data['tabel'] = 'List Kriteria Penerima Bantuan';

		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['kriteria'] = $this->KM->getAllKriteria();
		$data['kode'] = $this->KM->KodeKriteria();

		$this->load->view('templates/Admin_header', $data);
		$this->load->view('templates/Admin_sidebar', $data);
		$this->load->view('templates/Admin_topbar');
		$this->load->view('admin/kriteria/index', $data);
		$this->load->view('templates/Admin_footer');
		$this->load->view('admin/kriteria/modal_ubah');
		$this->load->view('admin/kriteria/modal_tambah', $data);
	}

	// Tambah Kriteria
	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/kriteria/index');
		} else {
			$this->KM->tambahKriteria();
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-success text-center" role="alert">Data Kriteria Berhasil ditambahkan!</div>'
			); //buat pesan akun berhasil dibuat
			redirect('kriteria');
		}
	}

	// Ubah Kriteria
	public function ubah()
	{
		$this->KM->ubahKriteria();
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success text-center" role="alert">Data Kriteria Berhasil diubah!</div>'
		); //buat pesan akun berhasil dibuat
		redirect('kriteria');
	}

	//Hapus Kriteria
	public function hapus($id)
	{
		$this->KM->hapusKriteria($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-danger text-center" role="alert">Data Kriteria Berhasil dihapus!</div>'
		); //buat pesan akun berhasil dibuat
		redirect('kriteria');
	}
}
