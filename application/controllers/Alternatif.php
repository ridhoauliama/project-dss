<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Alternatif_model', 'AM');
		$this->load->library('form_validation');
	}

	// Halaman Alternatif
	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['tbl_alternatif'] = $this->AM->getAllAlternatif();
		$data['kode'] = $this->AM->KodeAlternatif();

		if ($this->session->userdata('role_id') == 1) {
			$data['judul'] = "Dashboard Admin | Data Penerima Bantuan";
			$this->load->view('templates/Admin_header', $data);
			$this->load->view('templates/Admin_sidebar', $data);
			$this->load->view('templates/Admin_topbar');
			$this->load->view('admin/alternatif/index', $data);
			$this->load->view('templates/Admin_footer');
			$this->load->view('admin/alternatif/modal_tambah_alternatif', $data);
			$this->load->view('admin/alternatif/modal_ubah_alternatif');
		} else {
			$data['judul'] = "Dashboard Kepala Desa | Data Penerima Bantuan";
			$this->load->view('templates/Kades_sidebar', $data);
			$this->load->view('templates/Kades_header', $data);
			$this->load->view('templates/Kades_topbar');
			$this->load->view('kades/alternatif/index', $data);
			$this->load->view('templates/Kades_footer');
		}
	}

	// Tambah Alternatif
	public function tambah()
	{
		$data['tbl_alternatif'] = $this->db->get('tbl_alternatif')->result_array();
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$this->AM->tambahAlternatif();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Data penerima bantuan berhasil ditambahkan.</div>');
		redirect('alternatif');
	}

	// Ubah alternatif
	public function ubahAlternatif()
	{
		$data['tbl_alternatif'] = $this->db->get_where('tbl_alternatif')->result_array();
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$this->AM->ubahAlternatif();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success text-center" role="alert">Data penerima bantuan yang dipilih berhasil diubah.</div>');
		redirect('alternatif');
	}

	// Hapus alternatif
	public function hapus($id)
	{
		$this->AM->hapusAlternatif($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center" role="alert">Data penerima bantuan berhasil dihapus.</div>');
		redirect('alternatif');
	}
}
