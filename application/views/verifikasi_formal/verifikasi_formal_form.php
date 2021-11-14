<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<?php if (!empty($alasan) && $data['verifikasi_formal'] != 1) : ?>
				<tr class="table-danger">
					<div class="alert alert-danger" role="alert">
						<td width="150px">Alasan penolakan verifikasi formal : </td>
						<td><?= $alasan['alasan']; ?></td>
					</div>
				</tr>
			<?php endif; ?>
			<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
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
			<div class="text-right">
				<form action="<?php echo base_url('data/verifikasi_formal_verifikasi'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $data['id']; ?>" />
					<button type="submit" class="btn btn-success">Setuju</button>
				</form>
				<button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#exampleModal">Menolak</button>
				<a href=" <?php echo site_url('data/verifikasi_formal') ?>" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
</div>

<!-- ============ MODAL Konfirmasi =============== -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><b>Alasan Menolak</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="<?php echo base_url('data/verifikasi_formal_batal'); ?>" method="post">
					<input type="hidden" name="id" value="<?= $data['id']; ?>" />
					<div class="form-group">
						<div class="form-floating">
							<label for="floatingTextarea2">Alasan :</label>
							<textarea class="form-control" placeholder="" name="alasan" id="alasan" required style="height: 100px"></textarea>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-danger">Menolak</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- ============ END MODAL SALE =============== -->
