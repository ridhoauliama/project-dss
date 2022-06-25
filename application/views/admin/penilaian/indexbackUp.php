<style type="text/css">
	.vertical-center {
		position: relative !important;
		vertical-align: middle !important;
	}
</style>
<!-- page content -->
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title pull-right">
			<p><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a> | Proses Penilaian
			</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Proses Penilaian | Metode PSI</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row mt-3">
						<div class="col-md-6">
							<button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#prosesData">
								<i class="fa fa-hourglass-start"></i> Proses Data (Perhitungan)</button>
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
								<th class="vertical-center" style="text-align: center;">Action</th>
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
									<td class="vertical-center" style="text-align: center;">
										<input type="text" name="kode_<?= $i ?>" value="<?= $key['kode_alternatif'] ?>" hidden>
										<input type="text" name="c1_<?= $i ?>" value="<?= $c1 ?>" hidden>
										<input type="text" name="c2_<?= $i ?>" value="<?= $c2 ?>" hidden>
										<input type="text" name="c3_<?= $i ?>" value="<?= $c3 ?>" hidden>
										<input type="text" name="c4_<?= $i ?>" value="<?= $c4 ?>" hidden>
										<input type="text" name="c5_<?= $i ?>" value="<?= $c5 ?>" hidden>
										<!-- <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAlternatif<?= $key['id_alternatif']; ?>">
							<i class="fa fa-eye"></i> Detail</a> -->
										<!-- <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target=".ubahAlternatif<?= $key['id_alternatif']; ?>"><i class="fa fa-edit"></i> Edit</a> -->
										<a href="<?= base_url('alternatif/hapus/') . $key['id_alternatif']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa fa-trash-o"></i> Hapus</a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal Tambah -->
	<div class="modal fade" id="prosesData" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="modal-title" id="apasih">Konfirmasi Proses Data</h5>
				</div>
				<?= form_open(base_url('proses_penilaian')); ?>
				<div class="modal-body">
					<?php $a = 1;
					foreach ($alternatif as $key) : ?>
						<?php
						if ($key['pendidikan'] == 'smk') {
							$c1 = 1;
						} else if ($key['pendidikan'] == 'd3') {
							$c1 = 2;
						} else if ($key['pendidikan'] == 's1') {
							$c1 = 3;
						} else {
							$c1 = 0;
						}
						if ($key['usia'] >= 27 && $key['usia'] <= 30) {
							$c2 = 3;
						} else if ($key['usia'] >= 23 && $key['usia'] <= 26) {
							$c2 = 2;
						} else if ($key['usia'] >= 20 && $key['usia'] <= 22) {
							$c2 = 1;
						} else {
							$c2 = 0;
						}
						$pengalaman = floor($key['pengalaman'] / 12);
						if ($pengalaman >= 3) {
							$c3 = 3;
						} else if ($pengalaman >= 1) {
							$c3 = 2;
						} else if ($pengalaman >= 0) {
							$c3 = 1;
						} else {
							$c3 = 0;
						}
						if ($key['latarbelakang'] == 'mk') {
							$c4 = 5;
						} else if ($key['latarbelakang'] == 'ap') {
							$c4 = 4;
						} else if ($key['latarbelakang'] == 'si') {
							$c4 = 3;
						} else if ($key['latarbelakang'] == 'akuntansi') {
							$c4 = 2;
						} else if ($key['latarbelakang'] == 'mi') {
							$c4 = 1;
						} else {
							$c4 = 0;
						}
						if ($key['kemampuan'] == 'sangatmenguasai') {
							$c5 = 3;
						} else if ($key['kemampuan'] == 'menguasai') {
							$c5 = 2;
						} else if ($key['kemampuan'] == 'tidak') {
							$c5 = 1;
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
					<?php $a++;
					endforeach; ?>
					<div>Data akan diproses untuk penilaian. Lanjutkan?</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-round btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-round btn-primary">OK</button>
					</div>
					</form>
				</div>
			</div>
		</div>


	</div>
	<!-- /page content -->
