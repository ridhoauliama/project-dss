<style type="text/css">
	.vertical-center {
		position: relative !important;
		vertical-align: middle !important;
	}
</style>
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title pull-right">
			<p><a href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a> | Laporan Hasil</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?= $tabel; ?></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row mt-3">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<a href="<?= base_url('cetak_laporan'); ?>" target="_blank" class="btn btn-round btn-primary mb-3">
								<i class="fas fa-print"></i> Cetak Laporan
							</a>
							<a href="<?= base_url('laporan/hapusLaporan'); ?>" class="btn btn-round btn-danger mb-3" onclick="return confirm('Data yang telah dihapus tidak dapat dikembalikan, yakin ingin menghapus data?');">
								<i class="far fa-trash-alt"></i> Hapus Laporan
							</a>
						</div>
					</div>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="vertical-center" style="text-align: center;">No.</th>
								<th class="vertical-center" style="text-align: center;">Nama</th>
								<th class="vertical-center" style="text-align: center;">Alamat</th>
								<th class="vertical-center" style="text-align: center;">Nilai</th>
								<th class="vertical-center" style="text-align: center;">Status Kelayakan</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($laporan as $key) : ?>
								<tr>
									<td class="vertical-center" style="text-align: center"><?= $i ?></td>
									<td class="vertical-center"><?= $key['nama_alternatif'] ?></td>
									<td class="vertical-center"><?= $key['alamat'] ?></td>
									<td class="vertical-center" style="text-align: center"><?= $key['nilai'] ?></td>
									<td class="vertical-center" style="text-align: center"><?= $key['status'] ?></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>