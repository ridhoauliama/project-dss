<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fas fa-bars"></i></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?= base_url('assets/images/') . $user['image']; ?>"><?= $user['nama_user']; ?>
						<span class=" fas fa-chevron-circle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li class="nav-item">
							<a href="<?= base_url('admin/profile'); ?>" class="nav-link">
								<i class="fas fa-cogs pull-right"></i> Pengaturan Akun
							</a>
						</li>
						<li class="nav-item" class="nav-link">
							<a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Yakin ingin keluar?');">
								<i class="fas fa-sign-out-alt pull-right"></i> Keluar
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>