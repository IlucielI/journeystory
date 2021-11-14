<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">No. SP2DK <?php echo form_error('sp2dk_nomor') ?></label>
					<input type="text" class="form-control" name="sp2dk_nomor" id="sp2dk_nomor" placeholder="SP2DK-000/WPJ.00/KP.00/0000" value="<?= $sp2dk_nomor; ?>" required />
					<div id="suggestions">
						<div id="autoSuggestionsList"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="varchar">Tanggal SP2DK<?php echo form_error('sp2dk_tgl') ?></label>
					<input readonly type="date" class="form-control" name="sp2dk_tgl" id="sp2dk_tgl" value="<?= $sp2dk_tgl; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Tahun Pajak <?php echo form_error('sp2dk_tahun_pajak') ?></label>
					<input readonly maxlength="4" type="number" class="form-control" name="sp2dk_tahun_pajak" id="sp2dk_tahun_pajak" value="<?= $sp2dk_tahun_pajak; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Potensi <?php echo form_error('sp2dk_potensi') ?></label>
					<input type="number" class="form-control d-inline" name="sp2dk_potensi" id="sp2dk_potensi" value="<?= $sp2dk_potensi; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Pembayaran <?php echo form_error('sp2dk_pembayaran') ?></label>
					<input type="number" class="form-control" name="sp2dk_pembayaran" id="sp2dk_pembayaran" value="<?= $sp2dk_pembayaran; ?>" />
				</div>

				<!--<div class="form-group">
					<label for="varchar">Jenis Pajak <?php echo form_error('sp2dk_jenis_pajak') ?></label>
					<input type="text" class="form-control" name="sp2dk_jenis_pajak" id="sp2dk_jenis_pajak" value="<?= $sp2dk_jenis_pajak; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Masa Pajak <?php echo form_error('sp2dk_masa_pajak') ?></label>
					<input type="text" class="form-control" name="sp2dk_masa_pajak" id="sp2dk_masa_pajak" value="<?= $sp2dk_masa_pajak; ?>" />
				</div> -->

				<!-- <table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
				<div class="form-group">
					<label for="varchar">Tanggal Capture Data <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="tanggal_capture" id="tanggal_capture" value="<?= $data->tanggal; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Latitude Longitude <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="latitude_longitude" id="latitude_longitude" value="<?= $data->lokasi_lat ?> , <?= $data->lokasi_long ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Nama Jalan <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="nama_jalan" id="nama_jalan" value="<?= $data->nama_jalan; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">RT / RW <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="rt/rw" id="rt/rw" value="<?= $data->rt; ?>/<?= $data->rw; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Kelurahan <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?= $data->kelurahan; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Kecamatan <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?= $data->kecamatan; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Klu <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="klu" id="klu" value="<?= $data->klu; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Kegiatan Usaha <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="kegiatan" id="kegiatan" value="<?= $data->kegiatan; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Merk Usaha <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="merk" id="merk" value="<?= $data->merk; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Situasi Usaha <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="situasi" id="situasi" value="<?= $data->situasi; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Perkiraan Omzet <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="omzet" id="omzet" value="<?= $data->omzet; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Nama Pemilik Usaha <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="nama_usaha" id="nama_usaha" value="<?= $data->nama_usaha; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Status WP <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="status_wp" id="status_wp" value="<?= $data->status_wp; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Status PKP <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="status_pkp" id="status_pkp" value="<?= $data->status_pkp; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Tanggal Terdaftar PKP <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="tgl_terdaftar_pkp" id="tgl_terdaftar_pkp" value="<?= $data->tgl_terdaftar_pkp; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">Tingkat Potensial <?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="tingkat_potensial" id="tingkat_potensial" value="<?= $data->tingkat_potensial; ?>" />
				</div> -->

				<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<td width="150px">Status NPWP</td>
						<td><?= $data['status_npwp']; ?></td>
					</tr>
					<tr>
						<td width="150px">NPWP</td>
						<td><?= $data['npwp']; ?></td>
					</tr>
					<tr>
						<td width="150px">Tanggal Terdaftar NPWP</td>
						<td><?= ($data['tgl_terdaftar_npwp'] != '0000-00-00') ? date("d-m-Y", strtotime($data['tgl_terdaftar_npwp'])) : '' ?></td>
					</tr>
					<tr>
						<td width="150px">No. ST</td>
						<td><?= $data['no_st']; ?></td>
					</tr>
					<tr>
						<td width="150px">Dalam Rangka</td>
						<td><?= $data['dalam_rangka']; ?></td>
					</tr>
					<tr>
						<td width="150px">Nama Petugas</td>
						<td><?= $data['nama_pet']; ?></td>
					</tr>
					<tr>
						<td width="150px">Tanggal</td>
						<td><?= ($data['tanggal'] != '0000-00-00') ? date("d-m-Y", strtotime($data['tanggal'])) : ''  ?></td>
					</tr>

					<tr>
						<td width="150px">Koordinat</td>
						<td><?= $data['lokasi_lat'] ?> , <?= $data['lokasi_long'] ?></td>
					</tr>
					<tr>
						<td width="150px">Nama Jalan</td>
						<td><?= $data['nama_jalan']; ?></td>
					</tr>
					<tr>
						<td width="150px">RT/RW</td>
						<td><?= $data['rt']; ?>/<?= $data['rw']; ?></td>
					</tr>
					<tr>
						<td width="150px">kecamatan </td>
						<td><?= $data['kecamatan']; ?></td>
					</tr>
					<tr>
						<td width="150px">Kelurahan </td>
						<td><?= $data['kelurahan']; ?></td>
					</tr>
					<!-- ============================ -->
					<tr>
						<td width="150px">Jenis Data</td>
						<td><?= $data['jenis_data']; ?></td>
					</tr>
					<tr>
						<td width="150px">Klasifikasi Data</td>
						<td><?= $data['klasifikasi_data']; ?></td>
					</tr>
					<tr>
						<td width="150px">KLU</td>
						<td><?= $data['klu']; ?></td>
					</tr>
					<tr>
						<td width="150px">Kegiatan Usaha</td>
						<td><?= $data['kegiatan']; ?></td>
					</tr>
					<tr>
						<td width="150px">Nama Data</td>
						<td><?= $data['nama_data']; ?></td>
					</tr>
					<tr>
						<td width="150px">Uraian Data</td>
						<td><?= $data['uraian_data']; ?></td>
					</tr>
					<tr>
						<td width="150px">Tahun Perolehan</td>
						<td><?= $data['tahun_perolehan']; ?></td>
					</tr>
					<tr>
						<td width="150px">Merk Usaha </td>
						<td><?= $data['merk']; ?></td>
					</tr>
					<tr>
						<td width="150px">Kewarganegaraan</td>
						<td><?= $data['kewarganegaraan']; ?></td>
					</tr>
					<tr>
						<td width="150px">Jenis Identitas</td>
						<td><?= $data['jenis_identitas']; ?></td>
					</tr>
					<!-- ============================ -->

					<tr>
						<td width="150px">No. Identitas</td>
						<td><?= $data['no_identitas']; ?></td>
					</tr>
					<tr>
						<td width="150px">Jenis Lokasi</td>
						<td><?= $data['jenis_lokasi']; ?></td>
					</tr>

					<tr>
						<td width="150px">Perkiraan Omzet</td>
						<td><?= $data['omzet']; ?></td>
					</tr>
					<tr>
						<td width="150px">Sumber</td>
						<td><?= $data['sumber']; ?></td>
					</tr>
					<!-- ===================== -->
					<tr>
						<td width="150px">Jam Pengamatan</td>
						<td><?= $data['jam_pengamatan']; ?></td>
					</tr>
					<tr>
						<td width="150px">Status WP</td>
						<td><?= $data['status_wp']; ?></td>
					</tr>
					<tr>
						<td width="150px">Komentar</td>
						<td>
							<ul>
								<?php
								foreach ($komentar as $row) { ?>
									<li><?= $row->komentar ?> (<?= $row->ip . ' - ' . $row->nama ?>)</li>
								<?php }
								?>

							</ul>
						</td>
					</tr>

					<tr>
						<td width="150px">Foto</td>
						<td>
							<?php
							foreach ($foto as $row) { ?>
								<div class="card" style="width:18rem;">
									<img src="<?php echo base_url() ?>upload/<?= $row->foto ?>" class="card-img-top">
									<div class="card-body text-center">
										<h6 class="card-title"><?= $row->nama ?></h6>
									</div>
								</div>
							<?php }
							?>
						</td>
					</tr>

				</table>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<div class="text-right">
					<button type="submit" class="btn btn-success"><?php echo $button ?></button>
					<a href=" <?php echo site_url('data/tindak_lanjut') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#sp2dk_nomor").keydown(function() {
				var sp2dk = $(this).val();
				if (sp2dk.length < 1) {
					$('#suggestions').hide();
				} else {
					$.ajax({
						url: "<?php echo base_url(); ?>data/ajax_sp2dk",
						method: "POST",
						data: {
							sp2dk: sp2dk
						},
						dataType: 'json',
						success: function(data) {
							var html = '<ul class= "list-group">';
							var i;
							for (i = 0; i < data.length; i++) {
								html += '<li class="list-group-item sp2dk" data-no_sp2dk= "' + data[i].nomor_sp2dk + '" data-tgl_sp2dk="' + data[i].tanggal_sp2dk +
									'" data-tahun="' + data[i].tahun_pajak_sp2dk + '" data-potensi="' + data[i].estimasi_potensi_awal_sp2dk + '" style= " cursor:pointer;">' + data[i].nomor_sp2dk + '</li>';
							}
							html += '</ul>';
							$('#suggestions').show();
							$('#autoSuggestionsList').html(html);
						}
					});
				}
			});
		});
		$(document).on("click", ".sp2dk", function() {
			$('#suggestions').hide();
			$("#sp2dk_nomor").val($(this).data("no_sp2dk"));
			$("#sp2dk_tgl").val($(this).data("tgl_sp2dk"));
			$("#sp2dk_tahun_pajak").val($(this).data("tahun"));
			$("#sp2dk_potensi").val($(this).data("potensi"));
		});
	</script>
</div>
