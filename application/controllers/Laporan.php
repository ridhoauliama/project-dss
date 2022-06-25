<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Laporan_model', 'ML');
	}

	public function index()
	{
		$data['tabel'] = 'Laporan Hasil Status Kelayakan';
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['laporan'] = $this->ML->getAllLaporan();
		if ($this->session->userdata('role_id') == 1) {
			$data['judul'] = 'Dashboard Admin | Laporan Hasil Status Kelayakan';
			$this->load->view('templates/Admin_header', $data);
			$this->load->view('templates/Admin_sidebar', $data);
			$this->load->view('templates/Admin_topbar');
			if ($data['laporan'] == false) {
				$this->load->view('admin/laporan/kosong');
			} else {
				$this->load->view('admin/laporan/index', $data);
			}
			$this->load->view('templates/Admin_footer');
		} else {
			$data['judul'] = 'Dashboard Kepala Desa | Laporan Hasil Status Kelayakan';
			$this->load->view('templates/Kades_header', $data);
			$this->load->view('templates/Kades_sidebar', $data);
			$this->load->view('templates/Kades_topbar');
			if ($data['laporan'] == false) {
				$this->load->view('kades/laporan/kosong');
			} else {
				$this->load->view('kades/laporan/index', $data);
			}
			$this->load->view('templates/Kades_footer');
		}
	}

	public function hapusLaporan()
	{
		$this->db->truncate('tbl_hasil');
		$this->session->set_flashdata('hide', 'hide');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button><strong>Data Laporan Berhasil Dihapus.</strong>
			</div>'
		);
		redirect('laporan');
	}
}
