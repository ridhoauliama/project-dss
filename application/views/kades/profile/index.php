<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Profile Kepala Desa</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?= $this->session->flashdata('pesan') ?>;
					<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
						<div class="profile_img">
							<div id="crop-avatar">
								<img class="img-responsive avatar-view" src="<?= base_url('assets/images/') . $user['image']; ?>" alt="Avatar" title="<?= $user['image']; ?>">
							</div>
						</div>
						<ul class="list-unstyled user_data">
							<li class="m-top-xs">
								<i class="fas fa-user-circle fa-fw"></i>
								<span> Nama : </span><?= $user['nama_user']; ?>
							</li>
							<li>
								<i class="fas fa-user-tie fa-fw"></i>
								<span> Username : </span><?= $user['username']; ?>
							</li>
							<li class="m-top-xs">
								<i class="far fa-calendar-alt fa-fw"></i>
								<span> Tanggal Dibuat : </span><?= date('d F Y', $user['date_created']); ?>
							</li>
						</ul>
						<div class="row">
							<div class="col-md-6">
								<a href="" data-toggle="modal" data-target="#ubahProfile<?= $user['id_user']; ?>" class="btn btn-primary">
									<i class="fas fa-user-cog"></i> Kelola Akun
								</a>
							</div>
							<div class="col-md-6">
								<a href="" data-toggle="modal" data-target="#ubahPassword" class="btn btn-primary">
									<i class="fas fa-lock"></i> Ubah Password
								</a>
							</div>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>