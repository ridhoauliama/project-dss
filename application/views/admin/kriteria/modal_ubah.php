<?php foreach ($kriteria as $krit) : ?>
	<div class="modal fade ubahKriteria<?= $krit['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">Edit Data Kriteria</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('kriteria/ubah'); ?>" method="post">
						<input type="hidden" name="id" value="<?= $krit['id_kriteria']; ?>">
						<div class="form-group">
							<label for="kode">Kode Kriteria</label>
							<input type="text" class="form-control" id="kode" name="kode" value="<?= $krit['kode_kriteria']; ?>" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Kriteria</label>
							<input id="nama" class="form-control" name="nama" value="<?= $krit['nama_kriteria']; ?>">
						</div>
						<div class="form-group">
							<label for="jenis">Jenis Kriteria</label>
							<input id="jenis" class="form-control" name="jenis" value="<?= $krit['jenis_kriteria']; ?>">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary" onclick="return confirm('Perubahan data akan disimpan. Yakin ingin mengubah data?');">
						<i class="fas fa-save"></i> Update & Simpan
					</button>
				</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach; ?>