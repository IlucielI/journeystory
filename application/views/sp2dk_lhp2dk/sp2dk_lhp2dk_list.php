<!-- Begin Page Content -->
<div class="container-fluid">

	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4">
			<?php if ($this->session->userdata('level') == 1) : ?>
				<a href="<?= site_url('sp2dk_lhp2dk/create') ?>" class="btn btn-primary">Tambah</a>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Import</button>
			<?php endif; ?>
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#eksporModal">Export</button>
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
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>NPWP</th>
							<th>Nama</th>
							<th>Tanggal LHPT</th>
							<th>Tanggal SP2DK</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
									$no = 0;
									foreach ($data as $row) {
									?>
							<tr>
								<td align="center"><?php echo ++$no ?></td>
								<td align="center"><?php echo $row->npwpl ?></td>
								<td align="center"><?php echo $row->nama ?></td>
								<td align="center"><?php echo date("d-m-Y", strtotime($row->tanggal_lhpt)); ?></td>
								<td align="center"><?php echo date("d-m-Y", strtotime($row->tanggal_sp2dk)); ?></td>
								<td align="center" width="130px">
									<button type="button" id="detail" class="btn btn-sm btn-primary detail" data-id="<?= $row->id ?> " data-toggle="modal" data-target="#detailModal" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>
									<?php
										// echo anchor(site_url('sp2dk_lhp2dk/read/' . $row->id), '<button type="button" data-toggle="modal" data-target="#exampleModal"class="btn btn-sm btn-primary" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>');
										if ($this->session->userdata('level') == 1) {
											echo ' ';
											echo anchor(site_url('sp2dk_lhp2dk/update/' . $row->id), '<button class="btn btn-sm btn-success btn-flat" data-tooltip="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button>');
											echo ' ';
											echo anchor(site_url('sp2dk_lhp2dk/delete/' . $row->id), '<button class="btn btn-sm btn-danger btn-flat remove" data-tooltip="tooltip" data-placement="bottom" title="Hapus" style="color: white">
                                    <i class="fa fa-trash" style="color: white"></i></button>');
										}
									?>
									<!-- <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalKonfirmasi">Disable</button> -->
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
				<form method="POST" action="<?= base_url() ?>cetak/sp2dk_lhp2dk" target="_blank">
					<div class="form-group">
						<label for="exampleInputEmail1">Pilih Tanggal SP2DK</label>
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

<!-- MODAL VIEW DETAILS -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" id="detailModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><b>Detail Data SP2DK LHP2DK</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>NPWP</td>
									<td id="npwp-dd">: </td>
								</tr>
								<tr>
									<td>Nama</td>
									<td id="nama-dd">: </td>
								</tr>
								<tr>
									<td>Nomor LHPT</td>
									<td id="no_lhpt-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal LHPT</td>
									<td id="tgl_lhpt-dd">: </td>
								</tr>
								<tr>
									<td>Nomor SP2DK</td>
									<td id="no_sp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal SP2DK</td>
									<td id="tgl_sp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Tahun Pajak</td>
									<td id="th_pjk-dd">: </td>
								</tr>
								<tr>
									<td>Estimasi Potensi Awal</td>
									<td id="estimasi1-dd">: </td>
								</tr>
								<tr>
									<td>Nomor LHP2DK</td>
									<td id="no_lhp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal LHP2DK</td>
									<td id="tgl_lhp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Keputusan LHP2DK</td>
									<td id="kep_lhp2dk-dd">: </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>Kesimpulan LHP2DK</td>
									<td id="kes_lhp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Estimasi Potensi LHP2DK</td>
									<td id="estimasi_lhp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Realisasi LHP2DK</td>
									<td id="rel_lhp2dk-dd">: </td>
								</tr>
								<tr>
									<td>Nomor DSPP</td>
									<td id="no_dspp-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal DSPP</td>
									<td id="tgl_dspp-dd">: </td>
								</tr>
								<tr>
									<td>Nomor NP2</td>
									<td id="no_np2-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal NP2</td>
									<td id="tgl_np2-dd">: </td>
								</tr>
								<tr>
									<td>Nomor SP2</td>
									<td id="no_sp2-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal SP2</td>
									<td id="tgl_sp2-dd">: </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>

<!-- MODAL VIEW DETAILS -->

<!-- Modal  Import -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content ">
			<div class="modal-header">
				<h5 class="modal-title mb-0" id="addModalLabel">Import CSV</h5>
			</div>
			<div class="modal-body">
				<!-- Card body -->
				<form role="form" action="<?php echo base_url('sp2dk_lhp2dk/import'); ?>" method="POST" enctype="multipart/form-data">
					<!-- Input groups with icon -->
					<div class="col-md-12 text-center">
						<h5 class="h2 card-title mb-2">Langkah-Langkah Upload File</h5>
						<div class="col-12 img-import-area">
							<img src="<?php echo base_url('assets/img/sp2dk-format-csv.PNG') ?>" class="img-fluid mb-4" width="auto">
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
								<p class="font-weight-semibold text-gray mb-0">3. Jika sudah sesuai pilih file</p>
							</div>
						</div>
						<div class="d-flex py-2 mb-4">
							<div class="wrapper">
								<p class="font-weight-semibold text-gray mb-0">4. Klik import, maka data otomatis tersimpan</p>
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

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var id = $(this).data('id');
			$.ajax({
				url: "<?php echo base_url(); ?>sp2dk_lhp2dk/read_ajax",
				method: "POST",
				data: {
					id: id
				},
				dataType: 'json',
				success: function(datas) {
					var data = datas[0];
					data['tanggal_lhpt'] = (moment(data['tanggal_lhpt'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_lhpt']).format('DD-MM-YYYY') : '';
					data['tanggal_sp2dk'] = (moment(data['tanggal_sp2dk'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_sp2dk']).format('DD-MM-YYYY') : '';
					data['tanggal_lhp2dk'] = (moment(data['tanggal_lhp2dk'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_lhp2dk']).format('DD-MM-YYYY') : '';
					data['tanggal_dspp'] = (moment(data['tanggal_dspp'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_dspp']).format('DD-MM-YYYY') : '';
					data['tanggal_np2'] = (moment(data['tanggal_np2'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_np2']).format('DD-MM-YYYY') : '';
					data['tanggal_sp2'] = (moment(data['tanggal_sp2'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_sp2']).format('DD-MM-YYYY') : '';
					$('#npwp-dd').text(': ' + data['npwpl']);
					$('#nama-dd').text(': ' + data['nama']);
					$('#no_lhpt-dd').text(': ' + data['nomor_lhpt']);
					$('#tgl_lhpt-dd').text(': ' + data['tanggal_lhpt']);
					$('#no_sp2dk-dd').text(': ' + data['nomor_sp2dk']);
					$('#tgl_sp2dk-dd').text(': ' + data['tanggal_sp2dk']);
					$('#th_pjk-dd').text(': ' + data['tahun_pajak_sp2dk']);
					$('#estimasi1-dd').text(': Rp ' + data['estimasi_potensi_awal_sp2dk']);
					$('#no_lhp2dk-dd').text(': ' + data['nomor_lhp2dk']);
					$('#tgl_lhp2dk-dd').text(': ' + data['tanggal_lhp2dk']);
					$('#kep_lhp2dk-dd').text(': ' + data['keputusan_lhp2dk']);
					$('#kes_lhp2dk-dd').text(': ' + data['kesimpulan_lhp2dk']);
					$('#estimasi_lhp2dk-dd').text(': Rp ' + data['estimasi_potensi_lhp2dk']);
					$('#rel_lhp2dk-dd').text(': Rp ' + data['realisasi_lhp2dk']);
					$('#no_dspp-dd').text(': ' + data['nomor_dspp']);
					$('#tgl_dspp-dd').text(': ' + data['tanggal_dspp']);
					$('#no_np2-dd').text(': ' + data['nomor_np2']);
					$('#tgl_np2-dd').text(': ' + data['tanggal_np2']);
					$('#no_sp2-dd').text(': ' + data['nomor_sp2']);
					$('#tgl_sp2-dd').text(': ' + data['tanggal_sp2']);
				}
			});
		});
	});
</script>
