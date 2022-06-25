<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_laporan extends CI_Controller
{

	public function index()
	{
		$this->load->model('Laporan_model', 'ML');
		$laporan = $this->ML->getAllLaporan();

		require('assets/fpdf/alphapdf.php');
		$pdf = new AlphaPDF();
		// $pdf = new AlphaPDF('P', 'mm', 'A4');
		$pdf->SetTitle('Laporan Kelayakan Penerima Bantuan');

		$pdf->AddPage();
		$pdf->SetAlpha(1);
		// $pdf->SetFont('Times', 'B', 16);
		// $pdf->WriteHTML("<link rel='icon' type='image/png' href='assets2/logo.png'>");
		// $pdf->Image('assets2/img/logoDesa.png', 10, 10, 25, 25, 'png');
		$pdf->Image('assets2/logo.png', 25, 11, 24, 27);
		$pdf->Cell(190, 6, '', 0, 1, 'C');
		$pdf->SetFont('Times', 'B', 16);
		$pdf->Cell(20, 6, '', 0, 0, 'C');
		$pdf->Cell(170, 6, 'PEMERINTAH KABUPATEN DELI SERDANG', 0, 1, 'C');
		$pdf->Cell(20, 6, '', 0, 0, 'C');
		$pdf->Cell(170, 6, 'KECAMATAN TANJUNG MORAWA', 0, 1, 'C');
		$pdf->Cell(20, 6, '', 0, 0, 'C');
		$pdf->Cell(170, 6, 'DESA TANJUNG MORAWA A', 0, 1, 'C');
		$pdf->Cell(190, 6, '', 0, 1, 'C');
		$pdf->Cell(190, 0, '', 1, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(190, 6, 'Alamat : Jl. Dahlan Tanjung No.56 Tanjung Morawa Kode Pos 20362', 0, 1, 'C');
		$pdf->Cell(190, 0, '', 1, 1, 'C');
		$pdf->Cell(190, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'U', 14);

		// $pdf->Cell(76, 5, '', 0, 0, 'C');
		// $pdf->Cell(44, 5, 'SURAT KETERANGAN', '', 0, 'C');
		// $pdf->Cell(76, 5, '', 0, 1, 'C');
		$pdf->Cell(190, 5, 'SURAT KETERANGAN', '', 1, 'C');
		$pdf->SetFont('Times', '', 12);
		$pdf->Cell(190, 5, 'Nomor : 470/891/' . date('Y') . '', '', 1, 'C');

		$pdf->Cell(190, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 12);
		$pdf->SetFillColor(254, 23, 22);
		$pdf->Cell(12, 8, 'No', 1, 0, 'C');
		$pdf->Cell(45, 8, 'Nama', 1, 0, 'C');
		$pdf->Cell(78, 8, 'Alamat', 1, 0, 'C');
		$pdf->Cell(25, 8, 'Nilai', 1, 0, 'C');
		$pdf->Cell(30, 8, 'Status', 1, 1, 'C');


		$pdf->SetFont('Times', '', 11);
		$i = 1;
		foreach ($laporan as $key) :

			$pdf->Cell(12, 8, $i, 'LR', 0, 'C');
			$pdf->Cell(45, 8, ' ' . $key['nama_alternatif'], 'LR', 0, 'L');
			$pdf->Cell(78, 8, ' ' . $key['alamat'], 'LR', 0, 'L');
			$pdf->Cell(25, 8, str_pad($key['nilai'], 6, '0'), 'LR', 0, 'C');
			$pdf->Cell(30, 8, ' ' . $key['status'], 'LR', 1, 'C');

			$i++;
		endforeach;

		$pdf->Cell(12, 0, '', 'T', 0, 'C');
		$pdf->Cell(45, 0, '', 'T', 0, 'C');
		$pdf->Cell(78, 0, '', 'T', 0, 'C');
		$pdf->Cell(25, 0, '', 'T', 0, 'C');
		$pdf->Cell(30, 0, '', 'T', 1, 'C');

		$pdf->Cell(190, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', '', 12);

		$pdf->Cell(113, 5, '', 0, 0, 'C');
		$pdf->Cell(20, 5, 'Diperbuat', '', 0, 'L');
		$pdf->Cell(2, 5, ':', 0, 0, 'L');
		$pdf->Cell(55, 5, 'di Desa Tanjung Morawa A', '', 1, 'L');

		$pdf->Cell(113, 5, '', 0, 0, 'C');
		$pdf->Cell(20, 8, 'Tanggal', '', 0, 'L');
		$pdf->Cell(2, 8, ':', 0, 0, 'L');
		$pdf->Cell(55, 8, '', '', 1, 'L');

		$pdf->Cell(114, 5, ':', 0, 0, 'L');
		$pdf->Cell(76, 0, '', 1, 1, 'L');

		$pdf->SetFont('Times', 'B', 12);

		$pdf->Cell(113, 7, '', 0, 0, 'L');
		$pdf->Cell(77, 7, 'KEPALA DESA TANJUNG MORAWA A', 0, 1, 'L');

		$pdf->Cell(190, 22, '', 0, 1, 'C');

		$pdf->Cell(113, 5, '', 0, 0, 'C');
		$pdf->Cell(2, 5, '(', '', 0, 'C');
		$pdf->Cell(73, 5, '', 0, 0, 'L');
		$pdf->Cell(2, 5, ')', '', 1, 'C');

		$pdf->Cell(113, 0, '', 0, 0, 'C');
		$pdf->Cell(2, 0, '', '', 0, 'L');
		$pdf->Cell(73, 0, '', 1, 0, 'L');
		$pdf->Cell(2, 0, '', '', 1, 'L');

		$pdf->Output('I', 'Laporan Hasil Penerima Bantuan ' . date('Y/m/d') . '.pdf');
	}
}
