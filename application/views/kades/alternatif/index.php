<style type="text/css">
	.vertical-center {
		position: relative !important;
		vertical-align: middle !important;
	}
</style>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title pull-right">
			<p><a href="<?= base_url('kades'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a> | Data Penerima Bantuan</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>List Penerima Bantuan</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row mt-3"></div>
					<?= $this->session->flashdata('pesan'); ?>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="vertical-center" style="text-align: center;">No</th>
								<th class="vertical-center" style="text-align: center;">Kode</th>
								<th class="vertical-center" style="text-align: center;">Nama</th>
								<th class="vertical-center" style="text-align: center;">Alamat</th>
								<th class="vertical-center" style="text-align: center;">Pekerjaan</th>
								<th class="vertical-center" style="text-align: center;">Status Keluarga</th>
								<th class="vertical-center" style="text-align: center;">Tanggungan</th>
								<th class="vertical-center" style="text-align: center;">Kondisi Rumah</th>
								<th class="vertical-center" style="text-align: center;">Penghasilan</th>
								<th class="vertical-center" style="text-align: center;">Status Rumah</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($tbl_alternatif as $alternatif) : ?>
								<tr>
									<td class="vertical-center" style="text-align: center;"><?= $i; ?></td>
									<td class="vertical-center" style="text-align: center;"><?= $alternatif['kode_alternatif']; ?></td>
									<td class="vertical-center"><?= $alternatif['nama_alternatif']; ?></td>
									<td class="vertical-center"><?= $alternatif['alamat']; ?></td>
									<td class="vertical-center" style="text-align: center;"><?= $alternatif['pekerjaan']; ?></td>
									<?php if ($alternatif['statuskeluarga'] == "pkh") {
										$statuskeluarga = "PKH";
									} elseif ($alternatif['statuskeluarga'] == "non") {
										$statuskeluarga = "Non-PKH";
									} else {
										$statuskeluarga = "-";
									} ?>
									<td class="vertical-center" style="text-align: center;"><?= $statuskeluarga ?></td>
									<td class="vertical-center" style="text-align: center;"><?= $alternatif['jmlhtanggungan']; ?></td>
									<?php if ($alternatif['kondisirumah'] == "batupermanen") {
										$kondisirumah = "Batu Permanen";
									} elseif ($alternatif['kondisirumah'] == "papan") {
										$kondisirumah = "Papan";
									} elseif ($alternatif['kondisirumah'] == "bambuanyam") {
										$kondisirumah = "Bambu Anyam";
									} else {
										$kondisirumah = "-";
									} ?>
									<td class="vertical-center" style="text-align: center;"><?= $kondisirumah ?></td>
									<td class="vertical-center" style="text-align: center;"><?= "Rp. " . $alternatif['penghasilan']; ?></td>
									<?php if ($alternatif['statusrumah'] == "sendiri") {
										$statusrumah = "Rumah Sendiri";
									} elseif ($alternatif['statusrumah'] == "sewa") {
										$statusrumah = "Rumah Sewa";
									} else {
										$statusrumah = "-";
									} ?>
									<td class="vertical-center" style="text-align: center;"><?= $statusrumah ?></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>