<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4">
			<?php if ($this->session->userdata('level') == 1) : ?>
				<a href="<?= site_url('wilayah/create') ?>" class="btn btn-primary">Tambah</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Import</button>
			<?php endif; ?>
			<?php echo anchor(site_url('cetak/wilayah'), 'Export', 'class="btn btn-success" target="_blank"'); ?>
		</div>
		<!-- <div class="col-md-4 text-center">
			<?php
			if ($this->session->userdata('message') != '') {
			?>
				<div class="alert alert-success" role="alert" id="message">
					<?php echo $this->session->userdata('message'); ?>
				</div>
			<?php

			}
			?>


		</div> -->

		<div class="col-md-4 text-center">
			<div class="flash-data" data-flashdata="<?= $this->session->userdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>
		</div>

	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
					<!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Kecamatan</th>
							<th>Kelurahan</th>
							<th>RW</th>
							<th>Nama AR</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
									$no = 0;
									foreach ($data as $row) {
									?>
							<tr>
								<td align="center"><?php echo ++$no ?></td>
								<td align="center"><?php echo $row->kecamatan_nama ?></td>
								<td align="center"><?php echo $row->kelurahan_nama ?></td>
								<td align="center"><?php echo $row->rw ?></td>
								<td align="center"><?php echo $row->nama ?></td>
								<td align="center" width="130px">
									<?php if ($this->session->userdata('level') == 1) : ?>
										<?php
											echo anchor(site_url('wilayah/update/' . $row->id), '<button class="btn btn-sm btn-success btn-flat" data-tooltip="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button>');
											echo ' ';
											echo anchor(site_url('wilayah/delete/' . $row->id), '<button class="btn btn-sm btn-danger btn-flat remove" id="deletedata" data-tooltip="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></button>');
										?>
										<!-- <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalKonfirmasi">Disable</button> -->
									<?php endif; ?>
									<button type="button" id="detail" class="btn btn-sm btn-primary detail" data-id="<?= $row->id ?> " data-toggle="modal" data-target="#detailModal" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>
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

</div>
<!-- /.container-fluid -->

<!-- Modal  Impor -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title mb-0" id="addModalLabel">Import CSV</h5>
			</div>
			<div class="modal-body">
				<!-- Card body -->
				<form role="form" action="<?php echo base_url('wilayah/import'); ?>" method="POST" enctype="multipart/form-data">
					<!-- Input groups with icon -->
					<div class="col-md-12 text-center">
						<h5 class="h2 card-title mb-2">Langkah-Langkah Upload File</h5>
						<div class="col-12 img-import-area">
							<img src="<?php echo base_url('assets/img/wilayah-format-csv.PNG') ?>" class="img-fluid mb-4" width="auto">
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
								<p class="font-weight-semibold text-gray mb-0">3. Penulisan isi kolom kecamatan dan kelurahan harus sesuai dengan database</p>
							</div>
						</div>
						<div class="d-flex py-2 border-bottom">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">4. IP pegawai harus sudah terdaftar pada tabel pegawai.</p>
							</div>
						</div>
						<div class="d-flex py-2 border-bottom">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">5. Jika sudah sesuai pilih file</p>
							</div>
						</div>
						<div class="d-flex py-2 mb-4">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">6. Klik import, maka data otomatis tersimpan</p>
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

<!-- MODAL VIEW DETAILS -->
<div class="modal fade" tabindex="-1" id="detailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><b>Detail Data Wilayah</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td>Kecamatan</td>
							<td id="kecamatan-dd">: </td>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td id="kelurahan-dd">: </td>
						</tr>
						<tr>
							<td>Rw</td>
							<td id="rw-dd">: </td>
						</tr>
						<tr>
							<td>Seksi</td>
							<td id="seksi-dd">: </td>
						</tr>
						<tr>
							<td>Nama</td>
							<td id="nama-dd">: </td>
						</tr>
						<tr>
							<td>Ip</td>
							<td id="ip-dd">: </td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>

<!-- MODAL VIEW DETAILS -->
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var id = $(this).data('id');
			$.ajax({
				url: "<?php echo base_url(); ?>wilayah/read_ajax",
				method: "POST",
				data: {
					id: id
				},
				dataType: 'json',
				success: function(datas) {
					var data = datas[0];
					$('#kecamatan-dd').text(': ' + data['kecamatan_nama']);
					$('#kelurahan-dd').text(': ' + data['kelurahan_nama']);
					$('#rw-dd').text(': ' + data['rw']);
					$('#seksi-dd').text(': ' + data['seksi']);
					$('#nama-dd').text(': ' + data['nama']);
					$('#ip-dd').text(': ' + data['ip']);
					$('#modal-item').modal('hide');
				}
			});
		});
	});
</script>
