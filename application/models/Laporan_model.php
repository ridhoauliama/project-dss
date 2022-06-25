<?php
class Laporan_model extends CI_model
{

	public function getAllLaporan()
	{
		if ($this->db->table_exists('tbl_hasil')) {
			$this->db->join('tbl_alternatif', 'tbl_alternatif.kode_alternatif=tbl_hasil.kode_alternatif', 'inner');
			return $this->db->get('tbl_hasil')->result_array();
		} else {
			return false;
		}
	}
}
