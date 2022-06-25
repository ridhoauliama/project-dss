<div class="right_col" role="main">
	<div class="page-title">
		<div class="title pull-right">
			<p><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a> | Data Kriteria</p>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?= $tabel; ?></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row mt-3">
						<div class="col-md-6">
							<a href="" class="btn btn-round btn-primary mb-3" data-toggle="modal" data-target=".tambah">
								<i class="fa fa-plus-circle"></i> Kriteria</a>
						</div>
					</div>
					<?= $this->session->flashdata('pesan'); ?>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="text-align: center;">No</th>
								<th style="text-align: center;">Kode Kriteria</th>
								<th style="text-align: center;">Nama Kriteria</th>
								<th style="text-align: center;">Jenis Kriteria</th>
								<th style="text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($kriteria as $krit) : ?>
								<tr>
									<td style="text-align: center"><?= $i; ?></td>
									<td style="text-align: center"><?= $krit['kode_kriteria']; ?></td>
									<td style="text-align: center;"><?= $krit['nama_kriteria']; ?></td>
									<td style="text-align: center;"><?= $krit['jenis_kriteria']; ?></td>
									<td style="text-align: center;">
										<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target=".ubahKriteria<?= $krit['id_kriteria']; ?>">
											<i class="fas fa-edit"></i> Edit
										</a>
										<a href="<?= base_url('kriteria/hapus/') . $krit['id_kriteria']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Data yang telah dihapus tidak dapat dikembalikan. Yakin ingin menghapus data?');">
											<i class="far fa-trash-alt"></i> Hapus
										</a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>