<?php

class Kades_model extends CI_model
{
	// menampilkan seluruh data admin yang ada di tabel admin.
	public function getAllProfile()
	{
		return $this->db->get('tbl_user')->result_array();
	}
	// Menghitung jumlah data penerima dalam tabel alternatif
	public function CountAlternatif()
	{
		$query = $this->db->get('tbl_alternatif');
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

	// Mengubah data kepala desa
	public function ubahKades()
	{
		$id = $this->input->post('id_user');
		$data = [
			"nama_user" => $this->input->post('nama', true),
			"username" => $this->input->post('username', true)
		];
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);
	}

	// Ubah Password
	public function ubahPassword($data)
	{
		$this->db->set('password', $data['pass_hash']);
		$this->db->where('id_user', $data['user']);
		$this->db->update('tbl_user');
	}
}
