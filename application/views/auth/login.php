<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" href="<?= base_url('assets2'); ?>/img/logoDesa.png">
	<title><?= $judul; ?></title>
	<link href="<?= base_url('assets3'); ?>/vendor/fonts/css/all.min.css" rel="stylesheet">
	<link href="<?= base_url('assets3'); ?>/vendor/fonts/css/fontawesome.min.css" rel="stylesheet">
	<link href="<?= base_url('assets3'); ?>/css/style.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="forms-container">
			<div class="signin-signup">
				<form method="POST" action="<?= base_url('auth'); ?>" class="sign-in-form">
					<h2 class="title">FORM Login</h2>
					<small>**Silahkan login untuk melanjutkan**</small>
					<strong class="text-danger"><?= $this->session->flashdata('pesan'); ?></strong>
					<div class="input-field">
						<i class="fas fa-user-circle"></i>
						<input type="text" placeholder="Username" name="username" />
					</div>
					<strong class="text-danger"><?= form_error('username'); ?></strong>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" name="password" />
					</div>
					<strong class="text-danger"><?= form_error('password'); ?></strong>
					<input type="submit" class="btn solid" value="Masuk">
					<button class="btnHome"></button>
				</form>

				<form method="post" action="<?= base_url('auth/registrasi') ?>" class="sign-up-form">
					<h2 class="title">FORM Registrasi</h2>
					<small style="text-align: center;">**Anda akan terdaftar sebagai salah satu Anggota KAUR Keuangan**</small>
					<div class="input-field">
						<i class="fas fa-spell-check"></i>
						<input type="text" placeholder="Nama" id="nama" name="nama" required />
					</div>
					<div class="input-field">
						<i class="fas fa-user-circle"></i>
						<input type="text" placeholder="Username" id="username" name="username" required />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Password" id="password" name="password" required />
					</div>
					<div class="input-field">
						<i class="fas fa-lock"></i>
						<input type="password" placeholder="Konfirmasi Password" id="password2" name="password2" required />
					</div>
					<input type="submit" class="btn" value="Daftar" />
				</form>
			</div>
		</div>
		<div class="panels-container">
			<div class="panel left-panel">
				<div class="content">
					<h3>Belum Punya Akun ?</h3>
					<p>
						<i class="fas fa-arrow-alt-circle-down"></i>
						<i class="fas fa-arrow-alt-circle-down"></i>
						<i class="fas fa-arrow-alt-circle-down"></i>
					</p>
					<button class="btn transparent" id="sign-up-btn">Daftar</button>
				</div>
				<img src="<?= base_url('assets3'); ?>/img/log.svg" class="image" alt="" />
			</div>
			<div class="panel right-panel">
				<div class="content">
					<h3>Sudah Punya Akun ?</h3>
					<p>
						<i class="fas fa-arrow-alt-circle-down"></i>
						<i class="fas fa-arrow-alt-circle-down"></i>
						<i class="fas fa-arrow-alt-circle-down"></i>
					</p>
					<button class="btn transparent" id="sign-in-btn">Login</button>
				</div>
				<img src="<?= base_url('assets3'); ?>/img/hello2.svg" class="image" alt="" />
			</div>
		</div>
	</div>
	<script src="<?= base_url('assets3'); ?>/js/app.js"></script>
</body>

</html>