<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
	<!-- Display status message -->

	<?php
	if ($this->session->flashdata('message') != '') :
	?>
		<div class="col-md-4 text-center">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>
		</div>
	<?php endif; ?>


	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-6">
			<div class="row">
				<div class="col">
					<?php if ($this->session->userdata('level') == 1) : ?>
						<a href="<?= site_url('data/penugasan_create') ?>" class="btn btn-primary">Tambah</a>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Import</button>
						<!-- <a href="javascript:void(0);" class="btn btn-danger" onclick="formToggle('importFrm');">Import</a> -->
					<?php endif; ?>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#eksporModal">Export</button>
				</div>
			</div>
		</div>

		<!-- <div class="col-md-12" id="importFrm" style="display: none;">
			<form action="<?php echo base_url('Penugasan/import'); ?>" method="post" enctype="multipart/form-data">
				<input type="file" name="file" />
				<input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
			</form>
		</div> -->

	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">

					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>No. ST</th>
							<th>Tanggal</th>
							<th>Mulai Tugas</th>
							<th>Akhir Tugas</th>
							<th>Nama</th>
							<th>IP</th>
							<th>Lokasi</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($data as $row) {
						?>
							<tr>
								<td align="center"><?= ++$no ?></td>
								<td align="center"><?php echo $row->no_st ?></td>
								<td align="center"><?php echo date("d-m-Y", strtotime($row->tanggal)); ?></td>
								<td align="center"><?php echo date("d-m-Y", strtotime($row->tgl_mulai_tugas)); ?></td>
								<td align="center"><?php echo date("d-m-Y", strtotime($row->tgl_akhir_tugas)); ?></td>
								<td align="center"><?php echo $row->nama ?></td>
								<td align="center"><?php echo $row->ip ?></td>
								<td align="center"><?php echo $row->lokasi ?></td>
								<td align="center" width="150px">
									<div class="row">
										<div class="col">
											<?php
											if ($this->session->userdata('level') == 1) {
												echo anchor(site_url('data/rekam_penugasan_delete/' . $row->rekam_id), '<button type="button" class="btn btn-sm btn-danger btn-flat remove" data-tooltip="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o "></i></button>', array('class' => ''));
												echo ' ';
												echo anchor(site_url('data/penugasan_update/' . $row->rekam_id), '<button type="button" class="btn btn-sm btn-success btn-flat d-inline" data-tooltip="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button>', array('class' => ''));
											} ?>
											<form target="_blank" action="<?= base_url('cetak/rekam_penugasan_tagging/') ?>" method="post" class="d-inline">
												<input type="hidden" name="no_st" value="<?= $row->no_st ?>">
												<button class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="bottom" title="Cetak" type="submit"><i class="fa fa-print"></i></button>
											</form>
										</div>
									</div>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- /.container-fluid -->

	<!-- Modal  Import -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title mb-0" id="addModalLabel">Import CSV</h5>
				</div>
				<div class="modal-body">
					<!-- Card body -->
					<form role="form" action="<?php echo base_url('Penugasan/import'); ?>" method="POST" enctype="multipart/form-data">
						<!-- Input groups with icon -->
						<div class="col-md-12 text-center">
							<h5 class="h2 card-title mb-2">Langkah-Langkah Upload File</h5>
							<div class="col-12 img-import-area">
								<img src="<?php echo base_url('assets/img/penugasan1-format-csv.PNG') ?>" class="img-fluid mb-4" width="auto">
							</div>
							<div class="d-flex py-2 border-bottom">
								<div class="wrapper">
									<p class="font-weight-semibold text-gray mb-0">1. Siapkan data dengan format Excel (.csv), gunakan fitur SaveAS pada MS.Excel (jangan di rename).</p>
								</div>
							</div>
							<div class="d-flex py-2 border-bottom">
								<div class="wrapper">
									<p class="font-weight-semibold text-gray mb-0">2. Atur nama kolom seperti pada gambar.</p>
								</div>
							</div>
							<div class="d-flex py-2 border-bottom">
								<div class="wrapper">
									<p class="font-weight-semibold text-gray mb-0">3. IP pegawai harus sudah terdaftar pada tabel pegawai.</p>
								</div>
							</div>
							<div class="d-flex py-2 border-bottom">
								<div class="wrapper">
									<p class="font-weight-semibold text-gray mb-0">4. Jika sudah sesuai pilih file</p>
								</div>
							</div>
							<div class="d-flex py-2 mb-4">
								<div class="wrapper">
									<p class="font-weight-semibold text-gray mb-0">5. Klik import, maka data otomatis tersimpan</p>
								</div>
							</div>
						</div>
						<div class="form-group row ">
							<label for="kode_barang" class="col-md-2 col-form-label form-control-label text-center">Upload file<span class="text-danger">*</span></label>
							<div class="col-md-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="file" name="file" required="required">
									<label class="custom-file-label" for="customFileLang">Pilih File</label>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-danger" name="importSubmit" value="IMPORT">
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ============ END MODAL SALE =============== -->


	<!-- ============ MODAL Konfirmasi =============== -->
	<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-primary" id="modalKonfirmasi"><b>Konfirmasi <?= $row->id ?></b></h4>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<form class="form-horizontal" method="post" action="<?php echo site_url('pegawai/delete/' . $row->id) ?>">
					<div class="modal-body">
						<h5><b>Apakah yakin ingin menonaktifkan ini?</b></h5>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" type="submit">Ya</button>
						|
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ============ END MODAL SALE =============== -->


	<!-- Modal Eksport -->
	<div class="modal fade" id="eksporModal" tabindex="-1" role="dialog" aria-labelledby="eksporModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="eksporModalLabel"><b> Export Data </b></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="<?= base_url() ?>cetak/rekam_penugasan" target="_blank">
						<div class="form-group">
							<label for="exampleInputEmail1">Pilih Tanggal</label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
								</div>
								<input type="text" class="form-control" id="reservation" name="date_range" required>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success" name="print">Eksport Data</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- <script>
	<script>
		function formToggle(ID) {
			var element = document.getElementById(ID);
			if (element.style.display === "none") {
				element.style.display = "block";
			} else {
				element.style.display = "none";
			}
		}
	</script> -->
