<div class="modal fade tambah" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h5 class="modal-title" id="apasih">Tambah Kriteria</h5>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('kriteria/tambah'); ?>" method="post">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label for="kode">Kode Kriteria</label>
						<input type="text" class="form-control" id="kode" name="kode" value="<?= $kode; ?>" readonly>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="nama">Nama Kriteria</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Kriteria">
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							<label for="jenis">Jenis Kriteria</label>
							<input type="text" class="form-control" id="jenis" name="jenis" placeholder="Masukkan jenis Kriteria">
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