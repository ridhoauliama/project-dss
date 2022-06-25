<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cekLogin();
		$this->load->model('Kades_model', 'KM');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = "Dashboard Kepala Desa";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();

		$data['totalAlternatif'] = $this->KM->CountAlternatif();
		$data['totalLayak'] = $this->KM->CountLayak();
		$data['totalTidaklayak'] = $this->KM->CountTidaklayak();

		$this->load->view('templates/kades_header', $data);
		$this->load->view('templates/kades_sidebar', $data);
		$this->load->view('templates/kades_topbar', $data);
		$this->load->view('kades/index', $data);
		$this->load->view('templates/kades_footer');
	}

	public function profile()
	{
		$data['judul'] = "Dashboard Kepala Desa | Profile Kepala Desa";
		$data['user'] = $this->db->get_where('tbl_user', [
			'username' => $this->session->userdata('username')
		])->row_array();
		$data['profile'] = $this->KM->getAllProfile();

		$this->load->view('templates/kades_header', $data);
		$this->load->view('templates/kades_sidebar', $data);
		$this->load->view('templates/kades_topbar', $data);
		$this->load->view('kades/profile/index', $data);
		$this->load->view('templates/kades_footer');
		$this->load->view('kades/profile/modal_ubah_profile', $data);
		$this->load->view('kades/profile/modal_ubah_password', $data);
	}

	public function ubahKades()
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

		$this->KM->ubahKades();
		$this->session->set_flashdata(
			'pesan',
			'<h3 class="alert alert-success text-center" role="alert">
				<b>Perubahan akun telah disimpan.</b>
			</h3>'
		);
		redirect('Kades/Profile');
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
			redirect(base_url('kades/profile'));
		} else if (strlen($pswdbaru1) < 4) {
			$this->session->set_flashdata(
				'pesan',
				'<h3 class="alert alert-warning text-center" role="alert">
					<b>Password minimal harus lebih dari 4 karakter!</b>
				</h3>'
			);
			redirect(base_url('kades/profile'));
		} else {
			$data['pass_hash'] = password_hash($pswdbaru1, PASSWORD_DEFAULT);
			$this->KM->ubahPassword($data);
			$this->session->set_flashdata(
				'pesan',
				'<h3 class="alert alert-success text-center" role="alert">
					<b>Password berhasil diubah.</b>
				</h3>'
			);
			redirect(base_url('kades/profile'));
		}
	}
}
