<style type="text/css">
	.vertical-center {
		position: relative !important;
		vertical-align: middle !important;
	}
</style>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title pull-right">
			<p><a href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a> | Data Penilaian</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Proses Penilaian | Metode <i>Preference Selection Index</i> (PSI)</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row mt-3">
						<div class="col-md-6">
							<button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#prosesData">
								<i class="fas fa-drafting-compass"></i> Proses Data</button>
						</div>
					</div>
					<br>
					<?= $this->session->flashdata('pesan'); ?>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="vertical-center" style="text-align: center;">No</th>
								<th class="vertical-center" style="text-align: center;">Kode Alternatif</th>
								<th class="vertical-center" style="text-align: center;">Nama Alternatif</th>
								<th class="vertical-center" style="text-align: center;">C1</th>
								<th class="vertical-center" style="text-align: center;">C2</th>
								<th class="vertical-center" style="text-align: center;">C3</th>
								<th class="vertical-center" style="text-align: center;">C4</th>
								<th class="vertical-center" style="text-align: center;">C5</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($alternatif as $key) : ?>
								<tr>
									<td class="vertical-center" style="text-align: center;"><?= $i ?></td>
									<td class="vertical-center" style="text-align: center;"><?= $key['kode_alternatif'] ?></td>
									<td class="vertical-center"><?= $key['nama_alternatif'] ?></td>
									<?php
									if ($key['statuskeluarga'] == 'non') {
										$c1 = 1;
									} else if ($key['statuskeluarga'] == 'pkh') {
										$c1 = 2;
									} else {
										$c1 = 0;
									}
									?>
									<td class="vertical-center" style="text-align: center;"><?= $c1 ?></td>
									<?php
									if ($key['jmlhtanggungan'] <= 2) {
										$c2 = 1;
									} else if ($key['jmlhtanggungan'] <= 5) {
										$c2 = 2;
									} else if ($key['jmlhtanggungan'] > 5) {
										$c2 = 3;
									} else {
										$c2 = 0;
									}
									?>
									<td class="vertical-center" style="text-align: center;"><?= $c2 ?></td>
									<?php
									if ($key['kondisirumah'] == 'batupermanen') {
										$c3 = 3;
									} else if ($key['kondisirumah'] == 'papan') {
										$c3 = 2;
									} else if ($key['kondisirumah'] == 'bambuanyam') {
										$c3 = 1;
									} else {
										$c3 = 0;
									}
									?>
									<td class="vertical-center" style="text-align: center;"><?= $c3 ?></td>
									<?php
									if ($key['penghasilan'] <= 1500000) {
										$c4 = 1;
									} else if ($key['penghasilan'] < 3500000) {
										$c4 = 2;
									} else if ($key['penghasilan'] > 3500000) {
										$c4 = 3;
									} else {
										$c4 = 0;
									}
									?>
									<td class="vertical-center" style="text-align: center;"><?= $c4 ?></td>
									<?php
									if ($key['statusrumah'] == 'sendiri') {
										$c5 = 1;
									} else if ($key['statusrumah'] == 'sewa') {
										$c5 = 2;
									} else {
										$c5 = 0;
									}
									?>
									<td class="vertical-center" style="text-align: center;"><?= $c5 ?></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Proses -->
	<div class="modal fade" id="prosesData" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="apasih">Konfirmasi Proses Data Penilaian</h4>
				</div>
				<div class="modal-body">
					<?= form_open(base_url('proses_penilaian'), 'id="form_nilai"'); ?>
					<?php
					$a = 1;
					foreach ($alternatif as $key) :
						$cek = 'hide';
						$pesan = '<p style="margin-bottom: 0px;">Data Nilai belum lengkap.</p><p>Mohon lengkapi penilaian pada menu Data Alternatif.</p>';
						if ($key['statuskeluarga'] == 'non') {
							$c1 = 1;
						} else if ($key['statuskeluarga'] == 'pkh') {
							$c1 = 2;
						} else {
							$c1 = 0;
						}
						if ($key['jmlhtanggungan'] <= 2) {
							$c2 = 1;
						} else if ($key['jmlhtanggungan'] <= 5) {
							$c2 = 2;
						} else if ($key['jmlhtanggungan'] > 5) {
							$c2 = 3;
						} else {
							$c2 = 0;
						}
						if ($key['kondisirumah'] == 'batupermanen') {
							$c3 = 3;
						} else if ($key['kondisirumah'] == 'papan') {
							$c3 = 2;
						} else if ($key['kondisirumah'] == 'bambuanyam') {
							$c3 = 1;
						} else {
							$c3 = 0;
						}
						if ($key['penghasilan'] <= 1500000) {
							$c4 = 1;
						} else if ($key['penghasilan'] < 3500000) {
							$c4 = 2;
						} else if ($key['penghasilan'] > 3500000) {
							$c4 = 3;
						} else {
							$c4 = 0;
						}
						if ($key['statusrumah'] == 'sendiri') {
							$c5 = 1;
						} else if ($key['statusrumah'] == 'sewa') {
							$c5 = 2;
						} else {
							$c5 = 0;
						}
					?>
						<input type="text" name="kode_<?= $a ?>" value="<?= $key['kode_alternatif'] ?>" hidden>
						<input type="text" name="c1_<?= $a ?>" value="<?= $c1 ?>" hidden>
						<input type="text" name="c2_<?= $a ?>" value="<?= $c2 ?>" hidden>
						<input type="text" name="c3_<?= $a ?>" value="<?= $c3 ?>" hidden>
						<input type="text" name="c4_<?= $a ?>" value="<?= $c4 ?>" hidden>
						<input type="text" name="c5_<?= $a ?>" value="<?= $c5 ?>" hidden>
					<?php
						if ($c1 == 0 || $c2 == 0 || $c3 == 0 || $c4 == 0 || $c5 == 0) {
							$cek = 'hide';
							$pesan = '<p style="margin-bottom: 0px;">Data belum lengkap.</p><p>Mohon lengkapi data pada menu Data Alternatif.</p>';
						} else {
							$cek = '';
							$pesan = '<p style="font-size: 16px;"> Data penilaian akan diproses menggunakan Metode<strong> Preference Selection Index (PSI)</strong>. Lanjutkan?</p>';
						}
						$a++;
					endforeach;
					?>
					<div><?= $pesan ?></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary <?= $cek ?>" onclick="submit_form();">OK</button>
					</div>
					</form>
					<?= form_open(base_url('perhitungan'), 'id="form_hitung" target="_blank"'); ?>
					<?php
					$a = 1;
					foreach ($alternatif as $key) :
						if ($key['statuskeluarga'] == 'non') {
							$c1 = 1;
						} else if ($key['statuskeluarga'] == 'pkh') {
							$c1 = 2;
						} else {
							$c1 = 0;
						}
						if ($key['jmlhtanggungan'] <= 2) {
							$c2 = 1;
						} else if ($key['jmlhtanggungan'] <= 5) {
							$c2 = 2;
						} else if ($key['jmlhtanggungan'] > 5) {
							$c2 = 3;
						} else {
							$c2 = 0;
						}
						if ($key['kondisirumah'] == 'batupermanen') {
							$c3 = 3;
						} else if ($key['kondisirumah'] == 'papan') {
							$c3 = 2;
						} else if ($key['kondisirumah'] == 'bambuanyam') {
							$c3 = 1;
						} else {
							$c3 = 0;
						}
						if ($key['penghasilan'] <= 1500000) {
							$c4 = 1;
						} else if ($key['penghasilan'] < 3500000) {
							$c4 = 2;
						} else if ($key['penghasilan'] > 3500000) {
							$c4 = 3;
						} else {
							$c4 = 0;
						}
						if ($key['statusrumah'] == 'sendiri') {
							$c5 = 1;
						} else if ($key['statusrumah'] == 'sewa') {
							$c5 = 2;
						} else {
							$c5 = 0;
						}
					?>
						<input type="text" name="kode_<?= $a ?>" value="<?= $key['kode_alternatif'] ?>" hidden>
						<input type="text" name="c1_<?= $a ?>" value="<?= $c1 ?>" hidden>
						<input type="text" name="c2_<?= $a ?>" value="<?= $c2 ?>" hidden>
						<input type="text" name="c3_<?= $a ?>" value="<?= $c3 ?>" hidden>
						<input type="text" name="c4_<?= $a ?>" value="<?= $c4 ?>" hidden>
						<input type="text" name="c5_<?= $a ?>" value="<?= $c5 ?>" hidden>
					<?php
						$a++;
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function submit_form() {
		$('#form_nilai').submit();
		$('#form_hitung').submit();
	}
</script>