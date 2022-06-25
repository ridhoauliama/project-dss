<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light" aria-label="Eleventh navbar example">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">
				<img src="<?= base_url('assets2'); ?>/img/logoDesa.png" width="50" alt="logo" class="inline">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsExample09">
				<ul class="navbar-nav me-auto">
				</ul>
				<!-- <a href="<?= base_url('home'); ?>" class="btn btn-dark me-2" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><i class="fas fa-home"></i> Beranda</a> -->
				<?php
				if (!empty($this->session->userdata('username'))) {
					if ($this->session->userdata('role_id') == 1) {
				?>
						<a href="<?= base_url('Admin'); ?>" class="btn btn-outline-dark" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><i class="fas fa-user-tie"></i> <?= $nama; ?></a>
					<?php
					} elseif ($this->session->userdata('role_id') == 2) {
					?>
						<a href="<?= base_url('Kades'); ?>" class="btn btn-outline-dark" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><i class="fas fa-user-tie"></i> <?= $nama; ?></a>
					<?php
					}
				} else {
					?>
					<a href="<?= base_url('auth'); ?>" class="btn btn-outline-dark" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><i class="fas fa-sign-in-alt"></i> Masuk | Daftar</a>
				<?php } ?>
			</div>
		</div>
	</nav>

	<div class="py-2 mt-auto rounded">
		<img src="<?= base_url('assets2'); ?>/img/bg.jpg" class="img-fluid" width="100%" alt="background">
		<div class=" text-center">
			<h5 style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
				Penerapan Metode <i>Preference Selection Index</i> (PSI) Dalam Menentukan <br>
				Kelayakan Penerimaan Bantuan Bahan Pangan dan Material <br> pada Masa Pandemi di Desa Tanjung Morawa A
			</h5>
		</div>
	</div>
</div>