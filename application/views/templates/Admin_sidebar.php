<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="profile clearfix">
					<div class="profile_pic">
						<img src="<?= base_url('assets/images/') . $user['image']; ?>" class="img-circle profile_img">
					</div>
					<div class="profile_info">
						<span>Selamat Datang,</span>
						<h2 style="font-weight: bold;">
							<a style="color: silver;" href="<?= base_url('admin/profile'); ?>"><?= $user['nama_user']; ?></a>
						</h2>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
					<div class="menu_section">
						<ul class="nav side-menu">
							<li><a href="<?= base_url('admin'); ?>"><i class="fas fa-tachometer-alt fa-fw"></i> Dashboard</a></li>
							<li><a href="<?= base_url('kriteria'); ?>"><i class="far fa-clipboard fa-fw"></i></i> Data Kriteria</a></li>
							<li><a href="<?= base_url('alternatif'); ?>"><i class="fas fa-users fa-fw"></i> Data Penerima Bantuan</a></li>
							<li><a href="<?= base_url('penilaian'); ?>"><i class="fas fa-calculator fa-fw"></i> Data Penilaian</a></li>
							<li><a href="<?= base_url('laporan'); ?>"><i class="far fa-file-archive fa-fw"></i> Laporan Hasil</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>