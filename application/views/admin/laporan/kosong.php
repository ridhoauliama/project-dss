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
					<h2>Data Laporan</h2>
					<div class="clearfix"></div>
				</div>
				<h4 class="text-center">
					<div class="alert alert-warning alert-dismissible <?= $this->session->flashdata('hide'); ?>" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Data Laporan masih kosong!</strong> Harap lakukan proses penilaian terlebih dahulu pada menu,
						<a href="<?= base_url('penilaian'); ?>">
							<strong>Data Penilaian.</strong></a>
					</div>
					<?= $this->session->flashdata('pesan'); ?>
				</h4>
			</div>
		</div>
	</div>
</div>