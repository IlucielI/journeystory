<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#eksporModal">Export</button>
		</div>
		<div class="col d-flex justify-content-end">
			<div class="form-group form-inline p-2 bg-primary text-white">
				<label for="select_category">Kategori :</label>
				<select class="form-control input-sm" id="select_category">
					<option value="0" <?php if ($this->uri->segment(3) == 0) {
															echo 'selected';
														} ?>>Belum Diverifikasi</option>
					<option value="1" <?php if ($this->uri->segment(3) == 1) {
															echo 'selected';
														} ?>>Sudah Diverifikasi</option>
					<option value="2" <?php if ($this->uri->segment(3) == 2) {
															echo 'selected';
														} ?>>Dibatalkan</option>
				</select>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<?php
			if ($this->session->flashdata('message') != '') :
			?>
				<div class="col-md-4 text-center">
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>
				</div>
			<?php endif; ?>
		</div>

	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">

					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Tanggal</th>
							<!-- <th>Nama Pemilik Usaha</th> -->
							<th>Merk Usaha</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>Aksi</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;

						foreach ($data as $row) {
							$var_bg = "";
							$status = "Sudah Diverifikasi";

							if ($row->verifikasi_formal == 0) {
								$var_bg = 'class="table-warning"';
								$status = "Belum Diverifikasi";
							} else if ($row->verifikasi_formal == 2) {
								$var_bg = 'class="table-danger"';
								$status = "Dibatalkan";
							}
						?>
							<tr <?= $var_bg ?>>
								<td align="center"><?= $i ?></td>
								<td align="center"><?= date("d-m-Y", strtotime($row->tanggal)); ?></td>
								<!-- <td align="center"><?= $row->nama_usaha ?></td> -->
								<td><?= $row->merk ?></td>
								<td width="400 px"><?= $row->nama_jalan ?></td>
								<td align="center"><?= $status ?></td>
								<td align="center">
									<?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) : ?>

										<?php if ($row->verifikasi_formal == 0) {
											echo anchor(site_url('data/verifikasi_formal_verif/' . $row->id), '<button type="button" class="btn btn-sm btn-success btn-flat" data-tooltip="tooltip" data-placement="bottom" title="Verifikasi"><i class="fas fa-clipboard-check"></i></button>', array('class' => ''));
											echo ' '; ?>
											<!-- // echo anchor(site_url('data/verifikasi_formal_batal/' . $row->id), 'Dibatalkan', array('class' => 'btn btn-sm btn-warning btn-flat'));
											// echo ' ';
											// echo anchor(site_url('data/verifikasi_formal_read/' . $row->id), '<i class="fa fa-eye "></i>', array('class' => 'btn btn-sm btn-primary btn-flat'));
											// echo ' ';
											// echo anchor(site_url('data/verifikasi_formal_delete/' . $row->id), '<i class="fa fa-trash-o "></i>', array('class' => 'btn btn-sm btn-danger btn-flat')); -->
									<?php }
									endif; ?>
									<button type="button" id="detail" class="btn btn-sm btn-primary detail" data-id="<?= $row->id ?> " data-toggle="modal" data-target="#detailModal" data-tooltip="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-eye"></i></button>

								</td>
							</tr>
						<?php
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- /.container-fluid -->


<!-- ============ MODAL Konfirmasi =============== -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary" id="modalKonfirmasi"><b>Konfirmasi</b></h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form-horizontal" method="post" action="">
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


<!-- Modal Ekspor-->
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
				<form method="POST" action="<?= base_url() ?>cetak/verifikasi_formal" target="_blank">
					<div class="form-group">
						<label for="exampleInputEmail1">Pilih Tanggal</label>
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
							</div>
							<input type="text" class="form-control" id="reservation" name="date_range" required>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Kategori</label>
						<select class="form-control input-sm" id="kategori" name="kategori">
							<option value="3">ALL</option>
							<option value="0" <?php if ($this->uri->segment(3) == 0) {
																	echo 'selected';
																} ?>>Belum Diverifikasi</option>
							<option value="1" <?php if ($this->uri->segment(3) == 1) {
																	echo 'selected';
																} ?>>Sudah Diverifikasi</option>
							<option value="2" <?php if ($this->uri->segment(3) == 2) {
																	echo 'selected';
																} ?>>Dibatalkan
							</option>
						</select>
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
				<h5 class="modal-title"><b>Detail Verifikasi Formal</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table-responsive">
					<tr id="alasan" class="w-100">
					</tr>
					<tr id="alasan_formal">
					</tr>
				</table>
				<div class="row">
					<div class="col-md-6">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>Tanggal</td>
									<td id="tgl-dd">: </td>
								</tr>
								<tr>
									<td>NPWP</td>
									<td id="npwp-dd">: </td>
								</tr>
								<tr>
									<td>Status NPWP</td>
									<td id="status_npwp-dd">: </td>
								</tr>
								<tr>
									<td>Tanggal Terdaftar NPWP</td>
									<td id="tgl_npwp-dd">: </td>
								</tr>
								<tr>
									<td>Latitude Longitude</td>
									<td id="ll-dd">: </td>
								</tr>
								<tr>
									<td>Nama Jalan</td>
									<td id="jln-dd">: </td>
								</tr>
								<tr>
									<td>RT/RW</td>
									<td id="rtrw-dd">: </td>
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
									<td>Jenis Lokasi</td>
									<td id="jenis_lokasi-dd">: </td>
								</tr>
								<tr>
									<td>No. ST</td>
									<td id="no_st-dd">: </td>
								</tr>
								<tr>
									<td>Dalam Rangka</td>
									<td id="dalam_rangka-dd">: </td>
								</tr>
								<tr>
									<td>Nama Data</td>
									<td id="nama_data-dd">: </td>
								</tr>
								<tr>
									<td>Uraian Data</td>
									<td id="uraian_data-dd">: </td>
								</tr>
								<tr>
									<td>Klasifikasi Data</td>
									<td id="klasifikasi_data-dd">: </td>
								</tr>
								<tr>
									<td>Jenis Data</td>
									<td id="jenis_data-dd">: </td>
								</tr>
								<tr>
									<td>KLU</td>
									<td id="klu-dd">: </td>
								</tr>
								<tr>
									<td>Kegiatan Usaha</td>
									<td id="keg-dd">: </td>
								</tr>
								<tr>
									<td>Merk Usaha</td>
									<td id="merk-dd">: </td>
								</tr>
								<tr>
									<td>Sumber</td>
									<td id="sumber-dd">: </td>
								</tr>
								<tr>
									<td>Jam Pengamatan</td>
									<td id="jam_pengamatan-dd">: </td>
								</tr>
								<tr>
									<td>Perkiraan Omzet</td>
									<td id="omzt-dd">: </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table table-borderless">
							<tbody>
								<tr>
									<td>Status WP</td>
									<td id="status_wp-dd">: </td>
								</tr>
								<tr>
									<td>Nama Pemilik Usaha</td>
									<td id="nama_pemilik-dd">: </td>
								</tr>
								<tr>
									<td>Kewarganegaraan</td>
									<td id="kewarganegaraan-dd">: </td>
								</tr>
								<tr>
									<td>Jenis Identitas</td>
									<td id="jenis_identitas-dd">: </td>
								</tr>
								<tr>
									<td>No. Telp</td>
									<td id="no_telp-dd">: </td>
								</tr>

								<tr>
									<td>Email</td>
									<td id="email-dd">: </td>
								</tr>
								<tr>
									<td>No. Identitas</td>
									<td id="no_identitas-dd">: </td>
								</tr>
								<tr>
									<td>Petugas</td>
									<td id="nama_pet-dd">: </td>
								</tr>
								<tr>
									<td>Komentar</td>
								</tr>
								<tr>
									<td id="kom-dd">: </td>
								</tr>
								<tr>
									<td>Foto</td>
									<td>: </td>
								</tr>
								<tr>
									<td id="foto-dd">: </td>
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


<script>
	$(document).ready(function() {
		$('#select_category').change(function() {
			var val = $(this).val();
			if (val == 0) {
				window.location = '<?php echo site_url('data/verifikasi_formal') ?>';
			} else {
				window.location = '<?php echo site_url('data/verifikasi_formal/') ?>' + val;
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '#detail', function() {
			var id = $(this).data('id');
			$.ajax({
				url: "<?php echo base_url(); ?>data/read_ajax",
				method: "POST",
				data: {
					id: id
				},
				dataType: 'json',
				success: function(datas) {
					var data = datas['data'];
					var komentar = datas['komentar'];
					var foto = datas['foto'];
					var alasan = datas['alasan'];
					var alasan_formal = datas['alasan_formal'];
					data['tanggal'] = (moment(data['tanggal'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tanggal']).format('DD-MM-YYYY') : '';
					data['tgl_terdaftar_npwp'] = (moment(data['tgl_terdaftar_npwp'], 'YYYY-MM-DD', true).isValid()) ? moment(data['tgl_terdaftar_npwp']).format('DD-MM-YYYY') : '';
					$('#tgl-dd').text(': ' + data['tanggal']);
					$('#npwp-dd').text(': ' + data['npwp']);
					$('#status_npwp-dd').text(': ' + data['status_npwp']);
					$('#jenis_lokasi-dd').text(': ' + data['jenis_lokasi']);
					$('#no_st-dd').text(': ' + data['no_st']);
					$('#dalam_rangka-dd').text(': ' + data['dalam_rangka']);
					$('#nama_data-dd').text(': ' + data['nama_data']);
					$('#uraian_data-dd').text(': ' + data['uraian_data']);
					$('#klasifikasi_data-dd').text(': ' + data['klasifikasi_data']);
					$('#jenis_data-dd').text(': ' + data['jenis_data']);
					$('#sumber-dd').text(': ' + data['sumber']);
					$('#jam_pengamatan-dd').text(': ' + data['jam_pengamatan']);
					$('#kewarganegaraan-dd').text(': ' + data['kewarganegaraan']);
					$('#jenis_identitas-dd').text(': ' + data['jenis_identitas']);
					$('#no_identitas-dd').text(': ' + data['no_identitas']);
					$('#nama_pet-dd').text(': ' + data['nama_pet']);
					$('#no_telp-dd').text(': ' + data['no_telp']);
					$('#email-dd').text(': ' + data['email']);
					$('#nama_pemilik-dd').text(': ' + data['nama_usaha']);
					$('#tgl_npwp-dd').text(': ' + data['tgl_terdaftar_npwp']);
					$('#jln-dd').text(': ' + data['nama_jalan']);
					$('#ll-dd').text(': ' + data['lokasi_lat'] + ' , ' + data['lokasi_long']);
					$('#kel-dd').text(': ' + data['kelurahan']);
					$('#kec-dd').text(': ' + data['kecamatan']);
					$('#rtrw-dd').text(': ' + data['rt'] + ' / ' + data['rw']);
					$('#klu-dd').text(': ' + data['klu']);
					$('#keg-dd').text(': ' + data['kegiatan']);
					$('#merk-dd').text(': ' + data['merk']);
					$('#omzt-dd').text(': ' + data['omzet']);
					$('#status_wp-dd').text(': ' + data['status_wp']);
					$('#kom-dd').text(': ' + data['ip']);
					if (foto.length != 0) {
						var html = '<div class="card">';
						var i;
						for (i = 0; i < foto.length; i++) {
							html += '<img src="<?php echo base_url() ?>upload/' + foto[i].foto + '" class="card-img-top">';
							html += '<div class="card-body text-center">';
							html += '<h6 class="card-title">' + foto[i].nama + '</h6>';
							html += '</div>';
						}
						html += '</div>';
						$('#foto-dd').html(html);
					} else {
						$('#foto-dd').html('');
					}

					if (komentar.length != 0) {
						var htmlkom = '<ul>';
						var i;
						for (i = 0; i < komentar.length; i++) {
							htmlkom += '<li>' + komentar[i].komentar + ' (' + komentar[i].ip + ' - ' + komentar[i].nama + ')</li>';
						}
						htmlkom += '</ul>';
						$('#kom-dd').html(htmlkom);
					} else {
						$('#kom-dd').html('');
					}
					if (alasan != null && data.verifikasi != 1) {
						var html = '<div class="alert alert-danger" role="alert" id="alert_alasan"></div>';
						$('#alasan').html(html);
						var html = '<td>Alasan penolakan verifikasi material :  </td> <td>' + alasan.alasan + ' </td>';
						$('#alert_alasan').append(html);
					} else {
						$('#alasan').html('');
					}
					if (alasan_formal != null && data.verifikasi_formal != 1) {
						var html = '<div class="alert alert-danger" role="alert" id="alert_alasan_formal"></div>';
						$('#alasan_formal').html(html);
						var html = '<td>Alasan penolakan verifikasi Formal :  </td> <td>' + alasan_formal.alasan + ' </td>';
						$('#alert_alasan_formal').append(html);
					} else {
						$('#alasan_formal').html('');
					}
				}
			});
		});
	});
</script>
