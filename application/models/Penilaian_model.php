<?php

class Penilaian_model extends CI_model
{
	public function getAllData()
	{
		return $this->db->get('tbl_alternatif')->result_array();
	}

	public function hitungJumlahAlt()
	{
		$q = $this->db->get('tbl_alternatif');
		return $q->num_rows();
	}

	public function simpanHasil($data)
	{
		$jumlahData = $data['jumlahData'];
		if ($this->db->table_exists('tbl_hasil')) {
			$this->db->truncate('tbl_hasil');
		} else {
			$q = "CREATE TABLE `tbl_hasil` (
				`id_hasil` int(11) PRIMARY KEY AUTO_INCREMENT,
				`kode_alternatif` varchar(3),
				`nilai` float(8),
				`status` varchar(12)
				)";
			$this->db->query($q);
		}

		for ($i = 1; $i <= $jumlahData; $i++) :
			$db = $this->load->database('default', TRUE);
			$db->set('kode_alternatif', $data['kode_' . $i]);
			$db->set('nilai', str_pad(round($data['total_i_' . $i], 4), 6, '0'));
			$db->set('status', $data['status_' . $i]);
			$db->insert('tbl_hasil');
		endfor;
	}
}
