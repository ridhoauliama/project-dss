<style type="text/css">
	.vertical-center {
		position: relative !important;
		vertical-align: middle !important;
	}
</style>
<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Dashboard KAUR Keuangan</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row top_tiles">
						<div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<a href="<?= base_url('alternatif'); ?>">
									<div class="icon"><i class="fas fa-users fa-fw"></i></div>
									<div class="count"><?= $totalAlternatif; ?></div>
									<h3>Jumlah data Penerima</h3>
								</a>
							</div>
						</div>
						<div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<a href="<?= base_url('laporan'); ?>">
									<div class="icon"><i class="fas fa-user-check"></i></div>
									<div class="count"><?= $totalLayak; ?></div>
									<h3>Status layak</h3>
								</a>
							</div>
						</div>
						<div class="animated flipInY col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<a href="<?= base_url('laporan'); ?>">
									<div class="icon"><i class="fas fa-user-alt-slash"></i></div>
									<div class="count"><?= $totalTidaklayak; ?></div>
									<h3>Status tidak layak</h3>
								</a>
							</div>
						</div>
						<div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<a href="<?= base_url('kriteria'); ?>">
									<div class="icon"><i class="fas fa-clipboard-list"></i></div>
									<div class="count"><?= $totalKriteria; ?></div>
									<h3>Kriteria</h3>
								</a>
							</div>
						</div>
						<div class="animated flipInY col-lg-6 col-md-12 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fas fa-user-tie"></i></div>
								<div class="count"><?= $totalUser; ?></div>
								<h3>User</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>