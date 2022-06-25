<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses_penilaian extends CI_Controller
{
	public function index()
	{
		$this->load->model('Penilaian_model', 'PM');

		$jumlahData = $this->PM->hitungJumlahAlt();
		$data['jumlah_data'] = $jumlahData;
		for ($i = 1; $i <= $jumlahData; $i++) :
			$data['kode_' . $i] = $this->input->post('kode_' . $i, 1);
			echo $this->input->post('kode_' . $i, 1) . ' ';
			echo $this->input->post('c1_' . $i, 1) . ' ';
			echo $this->input->post('c2_' . $i, 1) . ' ';
			echo $this->input->post('c3_' . $i, 1) . ' ';
			echo $this->input->post('c4_' . $i, 1) . ' ';
			echo $this->input->post('c5_' . $i, 1) . '</br>';
		endfor;
		echo '</br>';

		/* [START] HITUNG DATA MENGGUNAKAN METODE PSI*/
		// 1. Matriks Keputusan & Nilai Min-Max
		$data['jumlahData'] = $jumlahData;
		$max_c1 = 0;
		$min_c1 = 3;
		$max_c2 = 0;
		$min_c2 = 4;
		$max_c3 = 0;
		$min_c3 = 3;
		$max_c4 = 0;
		$min_c4 = 4;
		$max_c5 = 0;
		$min_c5 = 3;
		for ($i = 1; $i <= $jumlahData; $i++) :
			${'kode' . $i} = $this->input->post('kode_' . $i, 1);

			${'c1_' . $i} = $this->input->post('c1_' . $i, 1);
			if (${'c1_' . $i} > $max_c1) {
				$max_c1 = ${'c1_' . $i};
			}
			if (${'c1_' . $i} < $min_c1) {
				$min_c1 = ${'c1_' . $i};
			}

			${'c2_' . $i} = $this->input->post('c2_' . $i, 1);
			if (${'c2_' . $i} > $max_c2) {
				$max_c2 = ${'c2_' . $i};
			}
			if (${'c2_' . $i} < $min_c2) {
				$min_c2 = ${'c2_' . $i};
			}

			${'c3_' . $i} = $this->input->post('c3_' . $i, 1);
			if (${'c3_' . $i} > $max_c3) {
				$max_c3 = ${'c3_' . $i};
			}
			if (${'c3_' . $i} < $min_c3) {
				$min_c3 = ${'c3_' . $i};
			}

			${'c4_' . $i} = $this->input->post('c4_' . $i, 1);
			if (${'c4_' . $i} > $max_c4) {
				$max_c4 = ${'c4_' . $i};
			}
			if (${'c4_' . $i} < $min_c4) {
				$min_c4 = ${'c4_' . $i};
			}

			${'c5_' . $i} = $this->input->post('c5_' . $i, 1);
			if (${'c5_' . $i} > $max_c5) {
				$max_c5 = ${'c5_' . $i};
			}
			if (${'c5_' . $i} < $min_c5) {
				$min_c5 = ${'c5_' . $i};
			}
		endfor;
		echo '<b>Max: </b>' . $max_c1 . ' ' . $max_c2 . ' ' . $max_c3 . ' ' . $max_c4 . ' ' . $max_c5 . '</br>';
		echo '<b>Min: </b>' . $min_c1 . ' ' . $min_c2 . ' ' . $min_c3 . ' ' . $min_c4 . ' ' . $min_c5 . '</br></br>';

		// 2. Normalisasi Matriks
		$step2_1 = 0;
		$step2_2 = 0;
		$step2_3 = 0;
		$step2_4 = 0;
		$step2_5 = 0;
		echo '<b>Hasil normalisasi</b></br>';
		for ($i = 1; $i <= $jumlahData; $i++) :
			// Benefit
			$hitung['c1_' . $i] = ${'c1_' . $i} / $max_c1;
			// Benefit
			$hitung['c2_' . $i] = ${'c2_' . $i} / $max_c2;
			// Cost
			$hitung['c3_' . $i] = $min_c3 / ${'c3_' . $i};
			// Cost
			$hitung['c4_' . $i] = $min_c4 / ${'c4_' . $i};
			// Benefit
			$hitung['c5_' . $i] = ${'c5_' . $i} / $max_c5;

			echo round($hitung['c1_' . $i], 2) . ' ';
			echo round($hitung['c2_' . $i], 2) . ' ';
			echo round($hitung['c3_' . $i], 2) . ' ';
			echo round($hitung['c4_' . $i], 2) . ' ';
			echo round($hitung['c5_' . $i], 2) . '</br>';

			// SUM Normalisasi
			$step2_1 = $step2_1 + $hitung['c1_' . $i];
			$step2_2 = $step2_2 + $hitung['c2_' . $i];
			$step2_3 = $step2_3 + $hitung['c3_' . $i];
			$step2_4 = $step2_4 + $hitung['c4_' . $i];
			$step2_5 = $step2_5 + $hitung['c5_' . $i];

		endfor;
		echo '</br>';
		echo '<b>SUM normalisasi (' . $jumlahData . ' data)</b></br>';
		echo $step2_1 . ' ';
		echo $step2_2 . ' ';
		echo $step2_3 . ' ';
		echo $step2_4 . ' ';
		echo $step2_5 . '</br></br>';

		// 3. Rata-Rata Matriks
		echo '<b>Rata2 matriks (SUM/' . $jumlahData . ')</b></br>';
		$step3_1 = $step2_1 / $jumlahData;
		echo round($step3_1, 2) . ' ';
		$step3_2 = $step2_2 / $jumlahData;
		echo round($step3_2, 2) . ' ';
		$step3_3 = $step2_3 / $jumlahData;
		echo round($step3_3, 2) . ' ';
		$step3_4 = $step2_4 / $jumlahData;
		echo round($step3_4, 2) . ' ';
		$step3_5 = $step2_5 / $jumlahData;
		echo $step3_5 . '</br></br>';

		// 4. Nilai Variasi Preferensi
		echo "<b>Nilai variasi preverensi</b></br>";
		$x_1 = 0;
		$x_2 = 0;
		$x_3 = 0;
		$x_4 = 0;
		$x_5 = 0;
		for ($i = 1; $i <= $jumlahData; $i++) :
			$step4_1 = pow($hitung['c1_' . $i] - $step3_1, 2);
			$x_1 = $x_1 + $step4_1;
			$step4_2 = pow($hitung['c2_' . $i] - $step3_2, 2);
			$x_2 = $x_2 + $step4_2;
			$step4_3 = pow($hitung['c3_' . $i] - $step3_3, 2);
			$x_3 = $x_3 + $step4_3;
			$step4_4 = pow($hitung['c4_' . $i] - $step3_4, 2);
			$x_4 = $x_4 + $step4_4;
			$step4_5 = pow($hitung['c5_' . $i] - $step3_5, 2);
			$x_5 = $x_5 + $step4_5;

			echo str_pad(round($step4_1, 4), 6, '0') . ' ';
			echo str_pad(round($step4_2, 4), 6, '0') . ' ';
			echo str_pad(round($step4_3, 4), 6, '0') . ' ';
			echo str_pad(round($step4_4, 4), 6, '0') . ' ';
			echo str_pad(round($step4_5, 4), 6, '0') . '</br>';
		endfor;
		echo '</br>';
		echo '<b>SUM Nilai variasi preverensi</b></br>';
		echo str_pad(round($x_1, 2), 6, '0') . ' ';
		echo str_pad(round($x_2, 2), 6, '0') . ' ';
		echo str_pad(round($x_3, 2), 6, '0') . ' ';
		echo str_pad(round($x_4, 2), 6, '0') . ' ';
		echo str_pad(round($x_5, 2), 6, '0') . '</br></br>';

		// 5. Penyimpangan (Deviasi) Nilai Variasi Preferensi
		echo '<b>Rata2 penyimpangan (deviasi)</b></br>';
		$dev_1 = 1 - $x_1;
		echo str_pad(round($dev_1, 4), 6, '0') . ' ';
		$dev_2 = 1 - $x_2;
		echo str_pad(round($dev_2, 4), 6, '0') . ' ';
		$dev_3 = 1 - $x_3;
		echo str_pad(round($dev_3, 4), 6, '0') . ' ';
		$dev_4 = 1 - $x_4;
		echo str_pad(round($dev_4, 4), 6, '0') . ' ';
		$dev_5 = 1 - $x_5;
		echo str_pad(round($dev_5, 4), 6, '0') . '</br></br>';
		$total_dev = $dev_1 + $dev_2 + $dev_3 + $dev_4 + $dev_5;

		echo '<b>SUM rata2 penyimpangan : </b>' . str_pad(round($total_dev, 4), 6, '0') . '</br></br>';

		// 6. Bobot Kriteria
		echo '<b>Bobot kriteria</b></br>';
		$bobot_1 = $dev_1 / $total_dev;
		echo str_pad(round($bobot_1, 4), 6, '0') . ' ';
		$bobot_2 = $dev_2 / $total_dev;
		echo str_pad(round($bobot_2, 4), 6, '0') . ' ';
		$bobot_3 = $dev_3 / $total_dev;
		echo str_pad(round($bobot_3, 4), 6, '0') . ' ';
		$bobot_4 = $dev_4 / $total_dev;
		echo str_pad(round($bobot_4, 4), 6, '0') . ' ';
		$bobot_5 = $dev_5 / $total_dev;
		echo str_pad(round($bobot_5, 4), 6, '0') . '</br></br>';

		// 7. Indeks Preferensi
		echo '<b>Indeks Preferensi</b></br>';
		$sum_index = 0;
		for ($i = 1; $i <= $jumlahData; $i++) :
			${'index_1_' . $i} = $hitung['c1_' . $i] * $bobot_1;
			echo str_pad(round(${'index_1_' . $i}, 4), 6, '0') . ' ';
			${'index_2_' . $i} = $hitung['c2_' . $i] * $bobot_2;
			echo str_pad(round(${'index_2_' . $i}, 4), 6, '0') . ' ';
			${'index_3_' . $i} = $hitung['c3_' . $i] * $bobot_3;
			echo str_pad(round(${'index_3_' . $i}, 4), 6, '0') . ' ';
			${'index_4_' . $i} = $hitung['c4_' . $i] * $bobot_4;
			echo str_pad(round(${'index_4_' . $i}, 4), 6, '0') . ' ';
			${'index_5_' . $i} = $hitung['c5_' . $i] * $bobot_5;
			echo str_pad(round(${'index_5_' . $i}, 4), 6, '0') . ' | ';
			$data['total_i_' . $i] = ${'index_1_' . $i} + ${'index_2_' . $i} + ${'index_3_' . $i} + ${'index_4_' . $i} + ${'index_5_' . $i};
			echo '<b>Sub total : </b>' . str_pad(round($data['total_i_' . $i], 4), 6, '0') . '</br>';

			$sum_index = $sum_index + $data['total_i_' . $i];
		endfor;
		echo '<b>Total Indeks : </b>' . str_pad(round($sum_index, 4), 6, '0') . '</br></br>';

		// 8. Penentuan Kelayakan
		echo '<b>Batas Prioritas (Total Indeks / ' . $jumlahData . ' data)</b></br>';
		$prior = $sum_index / $jumlahData;
		echo str_pad(round($prior, 4), 6, '0') . '</br></br>';

		for ($i = 1; $i <= $jumlahData; $i++) :
			if ($data['total_i_' . $i] >= $prior) {
				$data['status_' . $i] = 'Layak';
			} else {
				$data['status_' . $i] = 'Tidak Layak';
			}
		endfor;

		// /* [END] HITUNG DATA MENGGUNAKAN METODE PSI */
		$simpan = $this->PM->simpanHasil($data);
		redirect(base_url('laporan'));
	}
}
