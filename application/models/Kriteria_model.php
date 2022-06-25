<?php

class Kriteria_model extends CI_model
{
	public function KodeKriteria()
	{
		// Membuat kode Kriteria menjadi AI (Auto Increment)
		$query = $this->db->query("select max(kode_kriteria) as max_id from tbl_kriteria");
		$rows = $query->row();
		$kode = $rows->max_id;
		$noUrut = (int) substr($kode, 1, 2);
		$noUrut++;
		$char = "C";
		$kode = $char . sprintf("%02s", $noUrut);
		return $kode;
	}
	// CRUD Kriteria
	// menampilkan seluruh data Kriteria yang ada di tabel Kriteria.
	public function getAllKriteria()
	{
		return $this->db->get('tbl_kriteria')->result_array();
	}

	// Tambah data Kriteria
	public function tambahKriteria()
	{
		$data = [
			'id_kriteria' => $this->input->post('id'),
			'kode_kriteria' => $this->KodeKriteria(),
			"nama_kriteria" => $this->input->post('nama', true),
			"jenis_kriteria" => $this->input->post('jenis', true)
		];
		$this->db->insert('tbl_kriteria', $data);
	}

	// Ubah Data Kriteria
	public function ubahKriteria()
	{
		$id = $this->input->post('id');
		// Mengubah data Kriteria
		$data = [
			"kode_kriteria" => $this->input->post('kode'),
			"nama_kriteria" => $this->input->post('nama', true),
			"jenis_kriteria" => $this->input->post('jenis', true)
		];
		$this->db->where('id_kriteria', $id);
		$this->db->update('tbl_kriteria', $data);
	}

	// Menghapus Data Kriteria
	public function hapusKriteria($id)
	{
		// Hapus Kriteria berdasarkan id yang dipilih.
		$this->db->delete('tbl_kriteria', ['id_kriteria' => $id]);
	}
	// End CRUD Kriteria
}
