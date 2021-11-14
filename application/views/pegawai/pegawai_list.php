<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4" style="margin-bottom: 10px">
			<?php if ($this->session->userdata('level') == 1) : ?>
				<?php echo anchor(site_url('pegawai/create'), 'Tambah', 'class="btn btn-primary"'); ?>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Import</button>
			<?php endif; ?>
			<?php echo anchor(site_url('cetak/pegawai'), 'Export', 'class="btn btn-success" target="_blank"'); ?>
		</div>
		<?php
		if ($this->session->flashdata('message') != '') :
		?>
			<div class="col-md-4 text-center">
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>
			</div>
		<?php endif; ?>
	</div>
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
					<!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>IP</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Seksi</th>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
									$no = 0;
									foreach ($data as $row) {
									?>
							<tr>
								<td align="center"><?php echo ++$no ?></td>
								<td align="center"><?php echo $row->ip ?></td>
								<td align="left" width="230px"><?php echo $row->nip ?></td>
								<td align="left"><?php echo $row->nama ?></td>
								<td align="center"><?php echo $row->seksi ?></td>
								<td align="center"><?php echo $row->jabatan ?></td>
								<td align="center" width="150px">
									<button type="button" id="detail" class="btn btn-sm btn-primary detail" data-toggle="modal" data-target="#detailModal" data-tooltip="tooltip" data-placement="bottom" title="Detail" data-ip="<?= $row->ip ?>" data-nip="<?= $row->nip ?>" data-nama="<?= $row->nama ?>" data-handphone="<?= $row->handphone ?>" data-email="<?= $row->email ?>" data-kecamatan="<?= $row->kecamatan_nama ?>" data-kelurahan="<?= $row->kelurahan_nama ?>" data-seksi="<?= $row->seksi ?>" data-jabatan="<?= $row->jabatan ?>" data-role="<?= $row->status_role ?>" data-fungsi="<?= $row->fungsi ?>"><i class="fa fa-eye"></i></button>
									<?php
										if ($this->session->userdata('level') == 1) {
											echo ' ';
											echo anchor(site_url('pegawai/update/' . $row->user_id), '<button class="btn btn-sm btn-success btn-flat" data-tooltip="tooltip" data-placement="bottom" title="edit"><i class="fa fa-edit"></i></button>');
											echo ' ';
											echo anchor(site_url('pegawai/delete/' . $row->user_id), '<button class="btn btn-sm btn-danger btn-flat remove" id="deletedata" data-tooltip="tooltip" data-placement="bottom" title="hapus"><i class="fa fa-trash"></i></button>');
											echo ' ';
											echo anchor(site_url('pegawai/reset_password/' . $row->user_id), '<button class="btn btn-sm btn-warning btn-flat reset"  data-tooltip="tooltip" data-placement="bottom" title="reset password"><i class="fas fa-cogs"></i></button>');
										}
									?>
									<!-- <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalReset" id="modalReset<?= $row->user_id; ?>" data-tooltip="tooltip" data-placement="bottom" title="Reset Password"><i class="fas fa-cogs"></i></button> -->

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

<!-- MODAL VIEW DETAILS -->

<div class="modal" tabindex="-1" id="detailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><b>Detail Data Pegawai</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td>IP</td>
							<td id="ip-dd">: </td>
						</tr>
						<tr>
							<td>NIP</td>
							<td id="nip-dd">: </td>
						</tr>
						<tr>
							<td>Nama</td>
							<td id="nama-dd">: </td>
						</tr>
						<tr>
							<td>No. Handphone</td>
							<td id="handphone-dd">: </td>
						</tr>
						<tr>
							<td>Email</td>
							<td id="email-dd">: </td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td id="kecamatan-dd">: </td>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td id="kelurahan-dd">: </td>
						</tr>
						<tr>
							<td>Seksi</td>
							<td id="seksi-dd">: </td>
						</tr>
						<tr>
							<td>Jabatan</td>
							<td id="jabatan-dd">: </td>
						</tr>
						<tr>
							<td>Fungsi</td>
							<td id="fungsi-dd">: </td>
						</tr>
						<tr>
							<td>Role</td>
							<td id="role-dd">: </td>
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

<!-- <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary" id="modalKonfirmasi"><b>Detail Data Pegawai</b></h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
           
			
		</div>
	</div>
</div> -->

<!-- Modal  Impor -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title mb-0" id="addModalLabel">Import CSV</h5>
			</div>
			<div class="modal-body">
				<!-- Card body -->
				<form role="form" action="<?php echo base_url('pegawai/import'); ?>" method="POST" enctype="multipart/form-data">
					<!-- Input groups with icon -->
					<div class="col-md-12 text-center">
						<h5 class="h2 card-title mb-2">Langkah-Langkah Upload File</h5>
						<div class="col-12 img-import-area">
							<img src="<?php echo base_url('assets/img/pegawai-format-csv.PNG') ?>" class="img-fluid mb-4" width="auto">
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
								<p class="font-weight-semibold text-gray mb-0">3. Penulisan isi kolom jabatan, Unit Organisasi, Fungsi, dan Role harus sesuai dengan database.</p>
							</div>
						</div>
						<div class="d-flex py-2 border-bottom">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">4. Jika sudah sesuai pilih file.</p>
							</div>
						</div>
						<div class="d-flex py-2 mb-4">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">5. Klik import, maka data otomatis tersimpan.</p>
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

<script>
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var ip = $(this).data('ip');
			var nip = $(this).data('nip');
			var nama = $(this).data('nama');
			var handphone = $(this).data('handphone');
			var email = $(this).data('email');
			var kecamatan = $(this).data('kecamatan');
			var kelurahan = $(this).data('kelurahan');
			var seksi = $(this).data('seksi');
			var jabatan = $(this).data('jabatan');
			var role = $(this).data('role');
			var fungsi = $(this).data('fungsi');
			$('#ip-dd').text(': ' + ip);
			$('#nip-dd').text(': ' + nip);
			$('#nama-dd').text(': ' + nama);
			$('#handphone-dd').text(': ' + handphone);
			$('#email-dd').text(': ' + email);
			$('#kecamatan-dd').text(': ' + kecamatan);
			$('#kelurahan-dd').text(': ' + kelurahan);
			$('#seksi-dd').text(': ' + seksi);
			$('#jabatan-dd').text(': ' + jabatan);
			$('#role-dd').text(': ' + role);
			$('#fungsi-dd').text(': ' + fungsi);
			$('#modal-item').modal('hide');
		})
	});
</script>


<!-- ============ MODAL Konfirmasi =============== -->
<!-- <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
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
					
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
				</div>
			</form>
		</div>
	</div>
</div> -->
<!-- ============ END MODAL SALE =============== -->
