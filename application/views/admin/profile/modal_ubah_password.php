<div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="apasih">Ubah Password Akun</h4>
			</div>
			<?= form_open_multipart('admin/ubahPassword'); ?>
			<input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
			<input type="hidden" class="form-control" id="password" name="password" value="<?= $user['password']; ?>">
			<div class="modal-body">
				<div class="form-group">
					<label for="pswdbaru1"> Password Baru : </label>
					<input type="password" class="form-control" id="pswdbaru1" name="pswdbaru1" value="">
				</div>
				<div class="form-group">
					<label for="pswdbaru2"> Konfirmasi Password Baru : </label>
					<input type="password" class="form-control" id="pswdbaru2" name="pswdbaru2" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary" onclick="return confirm('Perubahan password akan disimpan. Lanjutkan?');">
					<i class="fas fa-save"></i> Ubah Password
				</button>
			</div>
			</form>
		</div>
	</div>
</div>