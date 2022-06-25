<div class="modal fade" id="ubahProfile<?= $user['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="apasih">Kelola Akun</h4>
			</div>
			<?= form_open_multipart('kades/ubahKades'); ?>
			<input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
			<div class="modal-body">
				<div class="form-group">
					<label for="username"> Username : </label>
					<input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama"> Nama : </label>
					<input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama_user']; ?>">
				</div>
				<div class="form-group">
					<label for="gambar"> Gambar Profil : </label>
					<br />
					<img style="width: 100px;" src=" <?= base_url('assets/images/') . $user['image']; ?>">
					<input type="file" class="form-control" id="gambar" name="gambar" value="">
					<input type="hidden" class="form-control" id="namafile" name="namafile" value="<?= $user['image']; ?>">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary" onclick="return confirm('Perubahan data akan disimpan, Apakah anda yakin ingin melanjutkan perubahan?');"><i class="fas fa-save"></i> Ubah & Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>