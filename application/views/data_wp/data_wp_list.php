<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4">
			<?php if ($this->session->userdata('level') == 1) : ?>
				<a href="<?= site_url('data_wp/create') ?>" class="btn btn-primary">Tambah</a>
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

							} else if ($this->session->userdata('errmsg') != '') {
								?>
                <div class="alert alert-danger" role="alert" id="errmsg">
                    <?php echo $this->session->userdata('errmsg'); ?>
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
					<!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Tanggal Daftar</th>
							<th>NPWP</th>
							<th>Nama</th>
							<th>Status</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody><?php
									$no = 0;
									foreach ($data as $row) {
									?>
							<tr>
								<td align="center"><?php echo ++$no ?></td>
								<td align="center" width="150px"><?php echo date('d-m-Y', strtotime($row->tanggal_daftar)) ?></td>
								<td align="center"><?php echo $row->npwp ?></td>
								<td align="center"><?php echo $row->nama ?></td>
								<td align="center"><?php echo $row->status ?></td>
								<td align="center"><?php echo $row->jenis ?></td>

								<td align="center">
									<button type="button" id="detail" class="btn btn-sm btn-primary detail" data-id="<?= $row->data_id ?> " data-toggle="modal" data-target="#detailModal" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>
									<?php
										// echo anchor(site_url('data_wp/read/' . $row->data_id), '<button type="button" class="btn btn-sm btn-primary" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>');
										if ($this->session->userdata('level') == 1) {
											echo ' ';
											echo anchor(site_url('data_wp/update/' . $row->data_id), '<button class="btn btn-sm btn-success btn-flat" data-tooltip="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></button>');
											echo ' ';
											echo anchor(site_url('data_wp/delete/' . $row->data_id), '<button class="btn btn-sm btn-danger btn-flat remove" id="deletedata" data-tooltip="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></button>');
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


<!-- Modal  Impor -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content ">
                <div class="modal-header">
                  <h5 class="modal-title mb-0" id="addModalLabel">Import CSV</h5>
                </div>
              <div class="modal-body">
                 <!-- Card body -->
                <form role="form" action="<?php echo base_url('data_wp/import'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- Input groups with icon -->
                  <div class="col-md-12 text-center">
                    <h5 class="h2 card-title mb-2">Langkah-Langkah Upload File</h5>
                    <div class="col-12 img-import-area">
                      <img src="<?php echo base_url('assets/img/data_wp-format-csv.PNG')?>" class="img-fluid mb-4" width="auto">
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
				<form method="POST" action="<?= base_url() ?>cetak/data_wp" target="_blank">
					<div class="form-group">
						<label for="exampleInputEmail1">Pilih Tanggal Daftar</label>
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
				<h5 class="modal-title"><b>Detail Data WP</b></h5>
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
									<td>Tanggal Daftar</td>
									<td id="tgl_daftar-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal Pindah</td>
									<td id="tgl_pindah-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td id="tgl_lahir-dd">: </td>
								</tr>
								<tr>
									<td>Kode KPP</td>
									<td id="kd_kpp-dd">: </td>
								</tr>
								<tr>
									<td>Kode Cabang</td>
									<td id="kode_cabang-dd">: </td>
								</tr>
								<tr>
									<td>NPWP Full</td>
									<td id="npwp_full-dd">: </td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td id="alamat-dd">: </td>
								</tr>
								<tr>
									<td>RW</td>
									<td id="rw-dd">: </td>
								</tr>
								<tr>
									<td>Kota</td>
									<td id="kota-dd">: </td>
								</tr>
								<tr>
									<td>Kode Pos</td>
									<td id="kode_pos-dd">: </td>
								</tr>
								<tr>
									<td>Nomor Telepon</td>
									<td id="no_telp-dd">: </td>
								</tr>
								<tr>
									<td>Nomor Fax</td>
									<td id="no_fax-dd">: </td>
								</tr>
								<tr>
									<td>Email</td>
									<td id="email-dd">: </td>
								</tr>
								<tr>
									<td>NIK</td>
									<td id="nik-dd">: </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>Status</td>
									<td id="status-dd">: </td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td id="jenis-dd">: </td>
								</tr>
								<tr>
									<td>Kode KLU</td>
									<td id="kd_klu-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal PKP</td>
									<td id="tgl_pkp-dd">: </td>
								</tr>
								<tr>
									<td>Kelurahan</td>
									<td id="kel-dd">: </td>
								</tr>
								<tr>
									<td>Kecamatan</td>
									<td id="kec-dd">: </td>
								</tr>
								<tr>
									<td>Provinsi</td>
									<td id="prov-dd">: </td>
								</tr>
								<tr>
									<td>Bentuk Hukum</td>
									<td id="bentukhk-dd">: </td>
								</tr>
								<tr>
									<td>Mata Uang</td>
									<td id="mtuang-dd">: </td>
								</tr>
								<tr>
									<td>No. SKT</td>
									<td id="no_skt-dd">: </td>
								</tr>
								<tr>
									<td>No. PKP</td>
									<td id="no_pkp-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal PKP Cabut</td>
									<td id="tgl_pkpcbt-dd">: </td>
								</tr>
								<tr>
									<td>Metode Perhitungan</td>
									<td id="met_prhit-dd">: </td>
								</tr>
								<tr>
									<td>Nama PJ</td>
									<td id="nm_pj-dd">: </td>
								</tr>
								<tr>
									<td>Nama JS</td>
									<td id="nama_js-dd">: </td>
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

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var id = $(this).data('id');
			$.ajax({
				url: "<?php echo base_url(); ?>data_wp/read_ajax",
				method: "POST",
				data: {
					id: id
				},
				dataType: 'json',
				success: function(datas) {
					var data = datas[0];
					console.log(data);
					data['tanggal_daftar'] = (moment(data['tanggal_pindah'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_pindah']).format('DD-MM-YYYY') : '';
					data['tanggal_pindah'] = (moment(data['tanggal_pindah'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_pindah']).format('DD-MM-YYYY') : '';
					data['tanggal_lahir'] = (moment(data['tanggal_lahir'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_lahir']).format('DD-MM-YYYY') : '';
					data['tanggal_pkp'] = (moment(data['tanggal_pkp'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_pkp']).format('DD-MM-YYYY') : '';
					data['tanggal_pkp_cabut'] = (moment(data['tanggal_pkp_cabut'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal_pkp_cabut']).format('DD-MM-YYYY') : '';
					$('#npwp-dd').text(': ' + data['npwp']);
					$('#nama-dd').text(': ' + data['nama']);
					$('#tgl_daftar-dd').text(': ' + data['tanggal_daftar']);
					$('#tgl_pindah-dd').text(': ' + data['tanggal_pindah']);
					$('#tgl_lahir-dd').text(': ' + data['tanggal_lahir']);
					$('#kd_kpp-dd').text(': ' + data['kd_kpp']);
					$('#kode_cabang-dd').text(': ' + data['kd_cabang']);
					$('#npwp_full-dd').text(': ' + data['npwpl']);
					$('#alamat-dd').text(': ' + data['alamat']);
					$('#rw-dd').text(': ' + data['rw']);
					$('#kota-dd').text(': ' + data['kota']);
					$('#kode_pos-dd').text(': ' + data['kode_pos']);
					$('#no_telp-dd').text(': ' + data['nomor_telepon']);
					$('#no_fax-dd').text(': ' + data['nomor_fax']);
					$('#email-dd').text(': ' + data['email']);
					$('#nik-dd').text(': ' + data['nomor_identitas']);
					$('#status-dd').text(': ' + data['status']);
					$('#jenis-dd').text(': ' + data['jenis']);
					$('#kd_klu-dd').text(': ' + data['kode_klu']);
					$('#tgl_pkp-dd').text(': ' + data['tanggal_pkp']);
					$('#kel-dd').text(': ' + data['kelurahan']);
					$('#kec-dd').text(': ' + data['kecamatan']);
					$('#prov-dd').text(': ' + data['provinsi']);
					$('#bentukhk-dd').text(': ' + data['bentuk_hukum']);
					$('#mtuang-dd').text(': ' + data['mata_uang']);
					$('#no_skt-dd').text(': ' + data['no_skt']);
					$('#no_pkp-dd').text(': ' + data['no_pkp']);
					$('#tgl_pkpcbt-dd').text(': ' + data['tanggal_pkp_cabut']);
					$('#met_prhit-dd').text(': ' + data['metode_perhitungan']);
					$('#nm_pj-dd').text(': ' + data['nama_pj']);
					$('#nama_js-dd').text(': ' + data['nama_js']);
				}
			});
		});
	});
</script>
