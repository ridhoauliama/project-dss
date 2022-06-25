<?php

class Alternatif_model extends CI_model
{
	public function KodeAlternatif()
	{
		// Membuat kode alternatif menjadi generate AI (Auto Increment)
		$query = $this->db->query("select max(kode_alternatif) as max_id from tbl_alternatif");
		$rows = $query->row();
		$kode = $rows->max_id;
		$noUrut = (int) substr($kode, 1, 2);
		$noUrut++;
		$char = "A";
		$kode = $char . sprintf("%02s", $noUrut);
		return $kode;
	}

	// CRUD Alternatif
	// menampilkan seluruh data Alternatif yang ada di tabel Alternatif.
	public function getAllAlternatif()
	{
		return $this->db->get('tbl_alternatif')->result_array();
	}

	// Tambah data Alternatif
	public function tambahAlternatif()
	{
		$data = [
			// Data yang ada di modal
			'kode_alternatif' => $this->KodeAlternatif(),
			'nama_alternatif' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			"statuskeluarga" => $this->input->post('statuskeluarga', true),
			"jmlhtanggungan" => $this->input->post('jmlhtanggungan', true),
			"kondisirumah" => $this->input->post('kondisirumah', true),
			"penghasilan" => $this->input->post('penghasilan', true),
			"statusrumah" => $this->input->post('statusrumah', true)
		];
		$this->db->insert('tbl_alternatif', $data);
	}

	// Ubah Data Alternatif
	public function ubahAlternatif()
	{
		$id = $this->input->post('id');
		// Mengubah data alternatif
		$data = [
			'nama_alternatif' => $this->input->post('nama', true),
			'alamat' => $this->input->post('alamat', true),
			'pekerjaan' => $this->input->post('pekerjaan', true),
			"statuskeluarga" => $this->input->post('statuskeluarga', true),
			"jmlhtanggungan" => $this->input->post('jmlhtanggungan', true),
			"kondisirumah" => $this->input->post('kondisirumah', true),
			"penghasilan" => $this->input->post('penghasilan', true),
			"statusrumah" => $this->input->post('statusrumah', true)
		];
		$this->db->where('id_alternatif', $id);
		$this->db->update('tbl_alternatif', $data);
	}

	// Hapus Data Alternatif
	public function hapusAlternatif($id)
	{
		$this->db->delete('tbl_alternatif', ['id_alternatif' => $id]);
	}
	// END CRUD Alternatif
}
