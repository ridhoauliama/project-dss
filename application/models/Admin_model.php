<?php

class Admin_model extends CI_model
{
	// menampilkan seluruh data admin yang ada di tabel admin.
	public function getAllProfile()
	{
		return $this->db->get('tbl_user')->result_array();
	}

	// Menghitung jumlah data kriteria
	public function CountKriteria()
	{
		$query = $this->db->get('tbl_kriteria');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	// Menghitung jumlah data penerima bantuan
	public function CountAlternatif()
	{
		$query = $this->db->get('tbl_alternatif');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	// Menghitung jumlah data user dalam dalam tabel hasil
	public function CountLaporan()
	{
		$query = $this->db->get('tbl_hasil');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	// Menghitung jumlah data penerima yang layak dalam tabel hasil
	public function CountLayak()
	{
		if ($this->db->table_exists('tbl_hasil')) {
			$this->db->select('status');
			$this->db->from('tbl_hasil');
			$this->db->where('status', 'Layak');
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->num_rows();
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	// Menghitung jumlah data penerima yang layak dalam tabel hasil
	public function CountTidaklayak()
	{
		if ($this->db->table_exists('tbl_hasil')) {
			$this->db->select('status');
			$this->db->from('tbl_hasil');
			$this->db->where('status', 'Tidak Layak');
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->num_rows();
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}

	// Menghitung jumlah user dalam tabel user
	public function CountUser()
	{
		$query = $this->db->get('tbl_user');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	// Mengubah data admin
	public function ubahAdmin()
	{
		$id = $this->input->post('id_user');
		$data = [
			"nama_user" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true)
		];
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);
	}

	public function ubahPassword($data)
	{
		$this->db->set('password', $data['pass_hash']);
		$this->db->where('id_user', $data['user']);
		$this->db->update('tbl_user');
	}

	public function createLaporan()
	{
		if ($this->db->table_exists('tbl_hasil')) {
		} else {
			$q = "CREATE TABLE `tbl_hasil` (
				  `id_hasil` int(11) PRIMARY KEY AUTO_INCREMENT,
				  `kode_alternatif` varchar(3),
				  `nilai` float(8),
				  `status` varchar(12)
				)";
			$this->db->query($q);
		}
	}
}
