<div class="modal fade" id="tambahAlternatif" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="apasih">Tambah Penerima Bantuan</h5>
			</div>
			<?= form_open_multipart('alternatif/tambah'); ?>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label for="kode">Kode Alternatif</label>
					<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Alternatif" value="<?= $kode; ?>" readonly />
				</div>

				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penerima Bantuan">
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea id="alamat" class="form-control" name="alamat" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="255" data-parsley-minlength-alamat="Masukkan Alamat..." data-parsley-validation-threshold="10"></textarea>
				</div>

				<div class="form-group">
					<label for="pekerjaan">Pekerjaan</label>
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Jenis Pekerjaan">
				</div>

				<div class="form-group">
					<label for="statuskeluarga"> Status Keluarga : </label>
					<select class="form-control" id="statuskeluarga" name="statuskeluarga">
						<option value="">--Pilih Status Keluarga--</option>
						<option value="pkh">PKH</option>
						<option value="non">Non-PKH</option>
					</select>
				</div>

				<div class="form-group">
					<label for="jmlhtanggungan">Jumlah Tanggungan :</label>
					<input type="text" class="form-control" id="jmlhtanggungan" name="jmlhtanggungan" placeholder="Jumlah Tanggungan">
				</div>

				<div class="form-group">
					<label for="kondisirumah"> Kondisi Rumah : </label>
					<select class="form-control" id="kondisirumah" name="kondisirumah">
						<option value="">--Pilih Kondisi Rumah--</option>
						<option value="batupermanen">Batu Permanen</option>
						<option value="papan">Papan</option>
						<option value="bambuanyam">Bambu Anyam</option>
					</select>
				</div>

				<div class="form-group">
					<label for="penghasilan">Jumlah Penghasilan :</label>
					<input type="text" class="form-control" id="penghasilan" name="penghasilan" placeholder="Jumlah Penghasilan/Bulan">
				</div>

				<div class="form-group">
					<label for="statusrumah"> Status Kepemilikan Rumah : </label>
					<select class="form-control" id="statusrumah" name="statusrumah">
						<option value="">--Pilih Status Kepemilikan Rumah--</option>
						<option value="sendiri">Rumah Sendiri</option>
						<option value="sewa">Rumah Sewa</option>
					</select>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>