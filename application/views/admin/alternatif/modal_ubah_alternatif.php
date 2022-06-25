<?php foreach ($tbl_alternatif as $alternatif) : ?>
	<div class="modal fade ubahAlternatif<?= $alternatif['id_alternatif']; ?>" tabindex="-1" role="dialog" aria-labelledby="forModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="modal-title" id="apasih">Edit Penerima Bantuan</h5>
				</div>
				<?= form_open_multipart('alternatif/ubahAlternatif'); ?>
				<input type="hidden" name="id" value="<?= $alternatif['id_alternatif']; ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode">Kode Alternatif</label>
						<input type="text" class="form-control" id="kode" name="kode" value="<?= $alternatif['kode_alternatif']; ?>" readonly />
					</div>
					<div class="form-group">
						<label for="nama">Nama Alternatif</label>
						<input type="text" class="form-control" id="nama" name="nama" value="<?= $alternatif['nama_alternatif']; ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea id="alamat" class="form-control" name="alamat"><?= $alternatif['alamat']; ?></textarea>
					</div>
					<div class="form-group">
						<label for="pekerjaan">Pekerjaan</label>
						<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $alternatif['pekerjaan']; ?>">
					</div>
					<div class="form-group">
						<label for="statuskeluarga"> Status Keluarga : </label>
						<select class="form-control" id="statuskeluarga" name="statuskeluarga" required>
							<option <?php if ($alternatif['statuskeluarga'] == '') {
										echo "selected";
									} ?> value="">--Status Keluarga--</option>
							<option <?php if ($alternatif['statuskeluarga'] == 'pkh') {
										echo "selected";
									} ?> value="pkh">PKH</option>
							<option <?php if ($alternatif['statuskeluarga'] == 'non') {
										echo "selected";
									} ?> value="non">Non-PKH</option>
						</select>
					</div>
					<div class="form-group">
						<label for="jmlhtanggungan">Jumlah Tanggungan :</label>
						<input type="text" class="form-control" id="jmlhtanggungan" name="jmlhtanggungan" value="<?= $alternatif['jmlhtanggungan']; ?>">
					</div>
					<div class=" form-group">
						<label for="kondisirumah"> Kondisi Rumah : </label>
						<select class="form-control" id="kondisirumah" name="kondisirumah" required>
							<option <?php if ($alternatif['kondisirumah'] == '') {
										echo "selected";
									} ?> value="">--Kondisi Rumah--</option>
							<option <?php if ($alternatif['kondisirumah'] == 'batupermanen') {
										echo "selected";
									} ?> value="batupermanen">Batu Permanen</option>
							<option <?php if ($alternatif['kondisirumah'] == 'papan') {
										echo "selected";
									} ?> value="papan">Papan</option>
							<option <?php if ($alternatif['kondisirumah'] == 'bambuanyam') {
										echo "selected";
									} ?> value="bambuanyam">Bambu Anyam</option>
						</select>
					</div>
					<div class="form-group">
						<label for="penghasilan">Jumlah Penghasilan :</label>
						<input type="text" class="form-control" id="penghasilan" name="penghasilan" value="<?= $alternatif['penghasilan']; ?>">
					</div>
					<div class="form-group">
						<label for="statusrumah"> Status Kepemilikan Rumah : </label>
						<select class="form-control" id="statusrumah" name="statusrumah" required>
							<option <?php if ($alternatif['statusrumah'] == '') {
										echo "selected";
									} ?> value="">--Status Kepemilikan Rumah--</option>
							<option <?php if ($alternatif['statusrumah'] == 'sendiri') {
										echo "selected";
									} ?> value="sendiri">Rumah Sendiri</option>
							<option <?php if ($alternatif['statusrumah'] == 'sewa') {
										echo "selected";
									} ?> value="sewa">Rumah Sewa</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary" onclick="return confirm('Perubahan data akan disimpan. Yakin ingin merubah data?');">
						<i class="fas fa-save"></i> Update & Simpan
					</button>
				</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>