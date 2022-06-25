<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?= base_url('assets/images/') . $user['image']; ?>"><?= $user['nama_user']; ?>
						<span class=" fas fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li>
							<a href="<?= base_url('kades/profile'); ?>">
								<i class="fas fa-user-cog pull-right"></i> Pengaturan Akun
							</a>
						</li>
						<li>
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
<!-- /top navigation -->