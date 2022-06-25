<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Admin_model', 'Adm');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = "Dashboard Admin";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$this->Adm->createLaporan();
		$data['totalKriteria'] = $this->Adm->CountKriteria();
		$data['totalAlternatif'] = $this->Adm->CountAlternatif();
		$data['totalUser'] = $this->Adm->CountUser();
		$data['totalHasil'] = $this->Adm->CountLaporan();
		$data['totalLayak'] = $this->Adm->CountLayak();
		$data['totalTidaklayak'] = $this->Adm->CountTidaklayak();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function profile()
	{
		$data['judul'] = "Dashboad Admin | Profile Admin";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['profile'] = $this->Adm->getAllProfile();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar', $data);
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/profile/index', $data);
		$this->load->view('templates/admin_footer');
		$this->load->view('admin/profile/modal_ubah_profile', $data);
		$this->load->view('admin/profile/modal_ubah_password', $data);
	}

	public function ubahAdmin()
	{
		if ($_FILES['gambar']['name'] == true) {
			$data['user'] = $this->db->get('tbl_user')->result_array();
			$upload_image = $_FILES['gambar']['name'];
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']      = 4096;
			$config['upload_path'] = './assets/images/';
			$this->load->library('upload', $config);
			$test = $this->upload->do_upload('gambar');
			$new_image = $this->upload->data('file_name');
			$this->db->set('image', $new_image);
		} else {
			$this->db->set('image', $this->input->post('namafile', true));
		}

		$this->Adm->ubahAdmin();
		$this->session->set_flashdata(
			'pesan',
			'<h3 class="alert alert-success text-center" role="alert">
				<b>Perubahan data berhasil disimpan.</b>
			</h3>'
		);
		redirect('admin/profile');
	}

	public function ubahPassword()
	{
		$data['user'] = $this->input->post('id_user', 1);
		$pswdbaru1 = $this->input->post('pswdbaru1', true);
		$pswdbaru2 = $this->input->post('pswdbaru2', true);
		if ($pswdbaru1 != $pswdbaru2) {
			$this->session->set_flashdata(
				'pesan',
				'<h3 class="alert alert-warning text-center" role="alert">
					<b>Password baru tidak sesuai dengan Konfirmasi Password, silahkan coba lagi!</b>
				</h3>'
			);
			redirect(base_url('admin/profile'));
		} else if (strlen($pswdbaru1) < 4) {
			$this->session->set_flashdata(
				'pesan',
				'<h3 class="alert alert-warning text-center" role="alert">
					<b>Password minimal harus lebih dari 4 karakter!</b>
				</h3>'
			);
			redirect(base_url('admin/profile'));
		} else {
			$data['pass_hash'] = password_hash($pswdbaru1, PASSWORD_DEFAULT);
			$this->Adm->ubahPassword($data);
			$this->session->set_flashdata(
				'pesan',
				'<h3 class="alert alert-success text-center" role="alert">
					<b>Password berhasil diubah</b>
				</h3>'
			);
			redirect(base_url('admin/profile'));
		}
	}
}
