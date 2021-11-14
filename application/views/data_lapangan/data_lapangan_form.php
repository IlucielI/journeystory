<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
			<?php
			if ($this->session->userdata('message') != '') {
			?>
				<div class="alert alert-success" role="alert" id="message">
					<?php echo $this->session->userdata('message'); ?>
				</div>
			<?php

			}
			?>
			<?php if (!empty($alasan) && $verifikasi != 1) : ?>
				<tr class="table-danger">
					<div class="alert alert-danger" role="alert">
						<td width="150px">Alasan penolakan verifikasi material : </td>
						<td><?= $alasan['alasan']; ?></td>
					</div>
				</tr>
			<?php endif; ?>
			<?php if (!empty($alasan_formal) && $verifikasi_formal != 1) : ?>
				<tr class="table-danger">
					<div class="alert alert-danger" role="alert">
						<td width="150px">Alasan penolakan verifikasi formal : </td>
						<td><?= $alasan_formal['alasan']; ?></td>
					</div>
				</tr>
			<?php endif; ?>

			<form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
					<label class="form-control-label" for="status_npwp">Status NPWP<?php echo form_error('') ?></label>
					<select class="form-control" name="status_npwp" id="status_npwp" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Status NPWP --</option>
						<option value="Sudah NPWP" <?= $status_npwp === 'Sudah NPWP'  ? 'selected' : ''  ?>>Sudah NPWP</option>
						<option value="Belum NPWP" <?= $status_npwp === 'Belum NPWP'  ? 'selected' : ''  ?>>Belum NPWP</option>
					</select>
				</div>

				<div class="form-group">
					<label for="npwp">NPWP <?php echo form_error('npwp') ?></label>
					<input type="text" class="form-control" name="npwp" id="npwp" placeholder="xx.xxx.xxx.x-xxx.xxx" value="<?= $npwp; ?>" maxlength="20" autocomplete="off" />
					<div id="suggestions">
						<div id="autoSuggestionsList"></div>
					</div>
				</div>

				<div class="form-group">
					<label for="tgl_terdaftar_npwp">Tanggal Terdaftar NPWP <?php echo form_error('tgl_terdaftar_npwp') ?></label>
					<input type="date" class="form-control" name="tgl_terdaftar_npwp" id="tgl_terdaftar_npwp" placeholder="npwp" value="<?= $tgl_terdaftar_npwp; ?>" />
				</div>

				<div class="form-group">
					<label for="no_st">No. ST<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="no_st" id="no_st" placeholder="" value="<?= $no_st ?>" />
				</div>

				<div class="form-group">
					<label for="dalam_rangka">Dalam Rangka<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="dalam_rangka" id="dalam_rangka" placeholder="" value="<?= $dalam_rangka ?>" />
				</div>

				<div class="form-group">
					<label for="nama_petugas">Nama Petugas<?php echo form_error('') ?></label>
					<input readonly type="text" class="form-control" name="nama_pet" id="nama_pet" placeholder="" value="<?= $nama_pet ?>" />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal <?php echo form_error('') ?></label>
					<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="tanggal" value="<?= $tanggal; ?>" />
				</div>


				<label for="lokasi_lat">Koordinat <?php echo form_error('') ?></label>
				<div class="form-group form-inline">
					<div class="form-group">
						<input type="text" class="form-control" name="lokasi_lat" id="lokasi_lat" placeholder="latitude" value="<?= $lokasi_lat ?>" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="lokasi_long" id="lokasi_long" placeholder="longitude" value="<?= $lokasi_long ?>" />
					</div>
				</div>

				<div class="form-group">
					<label for="nama_jalan">Nama Jalan <?php echo form_error('') ?></label>
					<textarea class="form-control" rows="3" name="nama_jalan" id="nama_jalan" placeholder="Nama Jalan"><?= $nama_jalan; ?></textarea>
				</div>

				<label for="rt">RT / RW <?php echo form_error('') ?></label>
				<div class="form-group form-inline">
					<div class="form-group">
						<input type="text" class="form-control" name="rt" id="rt" placeholder="RT" value="<?= $rt ?>" />
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="rw" id="rw" placeholder="RW" value="<?= $rw ?>" />
					</div>
				</div>

				<div class="form-group">
					<label for="kecamatan">Kecamatan</span> </label>
					<select name="kecamatan" id="kecamatan" class="form-control">
						<option value="0">-PILIH KECAMATAN-</option>
						<?php foreach ($data_kecamatan as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $kecamatan) {
																												echo "Selected";
																											} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="kelurahan">Kelurahan <?php echo form_error('kelurahan') ?></label>
					<select name="kelurahan" id="kelurahan" class="kelurahan form-control">
						<?php if ($kelurahan == '' || $kelurahan == null) { ?>
							<option value="0">-PILIH KELURAHAN-</option>
						<?php } else { ?>
							<?php foreach ($data_kelurahan as $row) : ?>
								<option value="<?php echo $row->id; ?>" <?php if ($row->id == $kelurahan) {
																													echo "Selected";
																												} ?>><?php echo $row->nama; ?></option>
							<?php endforeach; ?>
						<?php }
						?>
					</select>
				</div>

				<div class="form-group">
					<label class="form-control-label" for="jenis_data">Jenis Data<?php echo form_error('') ?></label>
					<select class="form-control" name="jenis_data" id="jenis_data" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Jenis Data --</option>
						<option value="Transaksi" <?= $jenis_data === 'Transaksi'  ? 'selected' : ''  ?>>Transaksi</option>
						<option value="Kepemilikan" <?= $jenis_data === 'Kepemilikan'  ? 'selected' : ''  ?>>Kepemilikan</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-control-label" for="klasifikasi_data">Klasifikasi Data<?php echo form_error('') ?></label>
					<select class="form-control" name="klasifikasi_data" id="klasifikasi_data" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Klasifikasi Data --</option>
						<option value="Pendapatan (Income)" <?= $klasifikasi_data === 'Pendapatan (Income)'  ? 'selected' : ''  ?>>Pendapatan (Income)</option>
						<option value="Biaya (Cost)" <?= $klasifikasi_data === 'Biaya (Cost)'  ? 'selected' : ''  ?>>Biaya (Cost)</option>
						<option value="Harta (Asset)" <?= $klasifikasi_data === 'Harta (Asset)' ? 'selected' : ''  ?>>Harta (Asset)</option>
						<option value="Kewajiban (Liability)" <?= $klasifikasi_data === 'Kewajiban (Liability)'  ? 'selected' : ''  ?>>Kewajiban (Liability)</option>
						<option value="Modal (Equity)" <?= $klasifikasi_data === 'Modal (Equity)'  ? 'selected' : ''  ?>>Modal (Equity)</option>
						<option value="Profil (Profile)" <?= $klasifikasi_data === 'Profil (Profile)'  ? 'selected' : ''  ?>>Profil (Profile)</option>
					</select>
				</div>

				<div class="form-group">
					<label class="form-control-label" for="klu">KLU<?php echo form_error('') ?></label>
					<select class="form-control" name="klu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih KLU --</option>
						<option value="Dagang" <?= ($klu == 'Dagang')  ? 'selected' : ''  ?>>Dagang</option>
						<option value="Jasa" <?= ($klu == 'Jasa')  ? 'selected' : ''  ?>>Jasa</option>
						<option value="Industri" <?= ($klu == 'Industri')  ? 'selected' : ''  ?>>Industri</option>
					</select>
				</div>

				<div class="form-group">
					<label for="kegiatan">Kegiatan Usaha<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="" value="<?= $kegiatan ?>" />
				</div>

				<div class="form-group">
					<label class="form-control-label" for="nama_data">Nama Data<?php echo form_error('') ?></label>
					<select class="form-control" name="nama_data" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Nama Data --</option>
						<option value="Uang Tunai" <?= $nama_data === 'Uang Tunai'  ? 'selected' : ''  ?>>Uang Tunai</option>
						<option value="Uang Deposito" <?= $nama_data === 'Uang Deposito'  ? 'selected' : ''  ?>>Uang Deposito</option>
						<option value="Uang Mobil" <?= $nama_data === 'Uang Mobil'  ? 'selected' : ''  ?>>Uang Mobil</option>
						<option value="Uang Utang Bank" <?= $nama_data === 'Uang Utang Bank'  ? 'selected' : ''  ?>>Uang Utang Bank</option>
						<option value="Lainnya" <?= $nama_data === 'Lainnya'  ? 'selected' : ''  ?>>Lainnya</option>
					</select>
				</div>

				<div class="form-group">
					<label for="uraian_data">Uraian Data<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="uraian_data" id="uraian_data" placeholder="" value="<?= $uraian_data ?>" />
				</div>

				<div class="form-group">
					<label for="tahun_perolehan">Tahun Perolehan<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="tahun_perolehan" id="tahun_perolehan" placeholder="" value="<?= $tahun_perolehan ?>" />
				</div>

				<div class="form-group">
					<label for="merk">Merk Usaha<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="merk" id="merk" placeholder="" value="<?= $merk ?>" />
				</div>

				<div class="form-group">
					<label for="nama_usaha">Pemilik Usaha<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="" value="<?= $nama_usaha ?>" />
				</div>


				<div class="form-group">
					<label for="kewarganegaraan">Kewarganegaraan<?php echo form_error('') ?></label>
					<select class="form-control" name="kewarganegaraan" id="kewarganegaraan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Kewarganegaraan --</option>
						<option value="WNI" <?= $kewarganegaraan === 'WNI'  ? 'selected' : ''  ?>>WNI</option>
						<option value="WNA" <?= $kewarganegaraan === 'WNA'  ? 'selected' : ''  ?>>WNA</option>
					</select>
				</div>


				<div class="form-group">
					<label for="jenis_identitas">Jenis Identitas<?php echo form_error('') ?></label>
					<select class="form-control" name="jenis_identitas" id="jenis_identitas" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Jenis Identitas --</option>
						<option value="KTP" <?= $jenis_identitas === 'KTP'  ? 'selected' : ''  ?>>KTP</option>
						<option value="KITAS/KITAP" <?= $jenis_identitas === 'KITAS/KITAP'  ? 'selected' : ''  ?>>KITAS/KITAP</option>
						<option value="Akta Pendirian" <?= $jenis_identitas === 'Akta Pendirian'  ? 'selected' : ''  ?>>Akta Pendirian</option>
						<option value="Dokumen Resmi Pendirian atau Perizinan Usaha" <?= $jenis_identitas === 'Dokumen Resmi Pendirian atau Perizinan Usaha'  ? 'selected' : ''  ?>>Dokumen Resmi Pendirian atau Perizinan Usaha</option>
					</select>
				</div>

				<div class="form-group">
					<label for="no_identitas">No. Identitas<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="" value="<?= $no_identitas ?>" />
				</div>

				<div class="form-group">
					<label class="form-control-label" for="jenis_lokasi">Jenis Lokasi<span class="text-danger">*</span> <?php echo form_error('') ?></label>
					<select class="form-control" name="jenis_lokasi">
						<option value="">-- Pilih Jenis Lokasi --</option>
						<option value="Tempat Kedudukan" <?= $jenis_lokasi === 'Tempat Kedudukan'  ? 'selected' : ''  ?>>Tempat Kedudukan</option>
						<option value="Tempat Kegiatan Usaha" <?= $jenis_lokasi === 'Tempat Kegiatan Usaha'  ? 'selected' : ''  ?>>Tempat Kegiatan Usaha</option>
					</select>
				</div>

				<!-- <div class="form-group">
					<label for="situasi">Situasi Usaha<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="situasi" id="situasi" placeholder="" value="<?= $situasi ?>" />
				</div> -->

				<!-- <div class="form-group">
					<label for="omzet">Perkiraan Omzet<?php echo form_error('') ?></label>
					<select class="form-control" name="omzet" id="omzet" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Omzet --</option>
						<option value="1 - 5 Juta" <?= $omzet === '1 - 5 Juta'  ? 'selected' : ''  ?>>1 - 5 Juta</option>
						<option value="6 - 10 Juta" <?= $omzet === '6 - 10 Juta'  ? 'selected' : ''  ?>>6 - 10 Juta</option>
						<option value="10 - 25 Juta" <?= $omzet === '10 - 25 Juta'  ? 'selected' : ''  ?>>10 - 25 Juta</option>
						<option value="25 - 50 Juta" <?= $omzet === '25 - 50 Juta'  ? 'selected' : ''  ?>>25 - 50 Juta</option>
						<option value="> 50 Juta" <?= $omzet === '> 50 Juta'  ? 'selected' : ''  ?>>> 50 Juta</option>
					</select>
				</div> -->

				
				<div class="form-group">
					<label for="uraian_data">Perkiraan Omzet<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="omzet" id="omzet" oninvalid="this.setCustomValidity('data tidak boleh kosong')" placeholder="" value="<?= $omzet ?>" />
				</div>

				<div class="form-group">
					<label for="sumber">Sumber<?php echo form_error('') ?></label>
					<select class="form-control" name="sumber" id="sumber" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="">-- Pilih Sumber --</option>
						<option value="Lapangan" <?= $sumber === 'Lapangan'  ? 'selected' : ''  ?>>Lapangan</option>
						<option value="Laporan Hasil Pemeriksaan" <?= $sumber === 'Laporan Hasil Pemeriksaan'  ? 'selected' : ''  ?>>Laporan Hasil Pemeriksaan</option>
						<option value="Laporan Hasil Penelitian" <?= $sumber === 'Laporan Hasil Penelitian'  ? 'selected' : ''  ?>>Laporan Hasil Penelitian</option>
						<option value="Bukti Potong" <?= $sumber === 'Bukti Potong'  ? 'selected' : ''  ?>>Bukti Potong</option>
						<option value="Faktur Pajak" <?= $sumber === 'Faktur Pajak'  ? 'selected' : ''  ?>>Faktur Pajak</option>
						<option value="Lainnya" <?= $sumber === 'Lainnya'  ? 'selected' : ''  ?>>Lainnya</option>
					</select>
				</div>
				<div class="form-group">
					<label for="jam_pengamatan">Jam Pengamatan<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="jam_pengamatan" id="jam_pengamatan" placeholder="" value="<?= $jam_pengamatan ?>" />
				</div>

				<div class="form-group">
					<label for="status_wp">Status WP<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="status_wp" id="status_wp" placeholder="" value="<?= $status_wp ?>" />
				</div>

				<!-- <div class="form-group">
					<label for="status_pkp">Status PKP<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="status_pkp" id="status_pkp" placeholder="" value="<?= $status_pkp ?>" />
				</div>

				<div class="form-group">
					<label for="tingkat_potensial">Tingkat Potensial<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="tingkat_potensial" id="tingkat_potensial" placeholder="" value="<?= $tingkat_potensial ?>" />
				</div> -->

				<!-- <div class="form-group">
					<label for="sp2dk_nomor">Nomor SP2DK<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="sp2dk_nomor" id="sp2dk_nomor" placeholder="" value="<?= $sp2dk_nomor ?>" />
				</div>

				<div class="form-group">
					<label for="sp2dk_tgl">Tanggal SP2DK<?php echo form_error('') ?></label>
					<input type="date" class="form-control" name="sp2dk_tgl" id="sp2dk_tgl" placeholder="" value="<?= $sp2dk_tgl ?>" />
				</div>

				<div class="form-group">
					<label for="sp2dk_respon">Respon SP2DK<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="sp2dk_respon" id="sp2dk_respon" placeholder="" value="<?= $sp2dk_respon ?>" />
				</div> -->
				<div class="form-group">
					<label for="email">Email<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="" value="<?= $email ?>" />
				</div>

				<div class="form-group">
					<label for="no_telp">No. Telp<?php echo form_error('') ?></label>
					<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="" value="<?= $no_telp ?>" />
				</div>

				<div class="form-group">
					<label for="komen">Komentar<?php echo form_error('') ?></label>
					<ul>
						<?php
						foreach ($komentar as $row) { ?>
							<li><?= $row->komentar ?> (<?= $row->ip . ' - ' . $row->nama ?>)</li>
						<?php }
						?>
					</ul>
				</div>

				<div class="form-group">
					<label for="komen">Foto<?php echo form_error('') ?></label>
					<?php
					foreach ($foto as $row) { ?>
						<div class="card" style="width:18rem;">
							<img src="<?php echo base_url() ?>upload/<?= $row->foto ?>" class="card-img-top">
							<div class="card-body text-center">
								<h6 class="card-title"><?= $row->nama ?></h6>
								<?php
								echo anchor(site_url('data/hapus_foto/' . $row->id_foto), 'Hapus', array('class' => 'btn btn-sm btn-warning btn-flat'));
								?>
							</div>
						</div>
					<?php }
					?>
				</div>

				<!-- <table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
					<tr>
						<td width="150px">Tanggal</td>
						<td><?= $data->tanggal; ?></td>
					</tr>
					<tr>
						<td width="150px">Latitude Longitude</td>
						<td><?= $data->lokasi_lat ?> , <?= $data->lokasi_long ?></td>
					</tr>
					<tr>
						<td width="150px">Nama Jalan</td>
						<td><?= $data->nama_jalan; ?></td>
					</tr>
					<tr>
						<td width="150px">RT/RW</td>
						<td><?= $data->rt; ?>/<?= $data->rw; ?></td>
					</tr>
					<tr>
						<td width="150px">Kelurahan </td>
						<td><?= $data->kelurahan; ?></td>
					</tr>
					<tr>
						<td width="150px">kecamatan </td>
						<td><?= $data->kecamatan; ?></td>
					</tr> -->

				<!-- ============================ -->
				<!-- <tr>
						<td width="150px">KLU </td>
						<td><?= $data->klu; ?></td>
					</tr>
					<tr>
						<td width="150px">Kegiatan Usaha </td>
						<td><?= $data->kegiatan; ?></td>
					</tr>
					<tr>
						<td width="150px">Merk Usaha </td>
						<td><?= $data->merk; ?></td>
					</tr>
					<tr>
						<td width="150px">Situasi Usaha </td>
						<td><?= $data->situasi; ?></td>
					</tr>
					<tr>
						<td width="150px">Perkiraan Omzet</td>
						<td><?= $data->omzet; ?></td>
					</tr> -->
				<!-- ============================ -->

				<!-- <tr>
					<td width="150px">NPWP</td>
					<td><?= $data->npwp; ?></td>
				</tr> -->
				<!-- <tr>
						<td width="150px">Nama Pemilik Usaha</td>
						<td><?= $data->nama_usaha; ?></td>
					</tr> -->
				<!-- <tr>
					<td width="150px">Tanggal Terdaftar NPWP</td>
					<td><?= $data->tgl_terdaftar_npwp; ?></td>
				</tr> -->
				<!-- <tr>
						<td width="150px">Status WP</td>
						<td><?= $data->status_wp; ?></td>
					</tr>
					<tr>
						<td width="150px">Status PKP</td>
						<td><?= $data->status_pkp; ?></td>
					</tr>
					<tr>
						<td width="150px">Tanggal Terdaftar PKP</td>
						<td><?= $data->tgl_terdaftar_pkp; ?></td>
					</tr>
					<tr>
						<td width="150px">Tingkat Potensial</td>
						<td><?= $data->tingkat_potensial; ?></td>
					</tr> -->
				<!-- ===================== -->
				<!-- <tr>
						<td width="150px">Nomor SP2DK</td>
						<td><?= $data->sp2dk_nomor; ?></td>
					</tr>
					<tr>
						<td width="150px">Tanggal SP2DK</td>
						<td><?= $data->sp2dk_tgl; ?></td>
					</tr>
					<tr>
						<td width="150px">Respon SP2DK</td>
						<td><?= $data->sp2dk_respon; ?></td>
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
							<div class="card-group">
								<?php
								foreach ($foto as $row) { ?>
									<div class="card" style="width:15%;">
										<img src="<?php echo base_url() ?>upload/<?= $row->foto ?>" class="card-img-top">
										<div class="card-body text-center">
											<h6 class="card-title"><?= $row->nama ?></h6>
											<?php
											echo anchor(site_url('data/hapus_foto/' . $row->id_foto), 'Hapus', array('class' => 'btn btn-sm btn-warning btn-flat'));
											?>
										</div>
									</div> &nbsp;
								<?php }
								?>
							</div>
						</td>
					</tr>
				</table> -->
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
				<div class="text-right">
					<button type="submit" class="btn btn-success"><?php echo $button ?></button>
			</form>
			<?php if (!empty($alasan) && $verifikasi == 2) : ?>
				<form action="<?php echo base_url('data/verifikasi_ulang'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<input type="hidden" name="jenis_verifikasi" value="1" />
					<button type="submit" class="btn btn-danger">Ajukan Ulang Verifikasi Material</button>
				</form>
			<?php endif; ?>
			<?php if (!empty($alasan_formal) && $verifikasi_formal == 2) : ?>
				<form action="<?php echo base_url('data/verifikasi_ulang'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $id; ?>" />
					<input type="hidden" name="jenis_verifikasi" value="2" />
					<button type="submit" class="btn btn-warning">Ajukan Ulang Verifikasi Formal</button>
				</form>
			<?php endif; ?>
			<a href=" <?php echo site_url('data/data_lapangan') ?>" class="btn btn-secondary">Kembali</a>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#npwp").keyup(function() {
			var npwp = $(this).val();
			if (npwp.length < 1) {
				$('#suggestions').hide();
			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>data/ajax_npwp",
					method: "POST",
					data: {
						npwp: npwp
					},
					dataType: 'json',
					success: function(data) {
						var html = '<ul class= "list-group">';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<li class="list-group-option npwp" data-npwp= "' + data[i].npwpl + '" data-tgl_daftar="' + data[i].tanggal_daftar +
								'" style= " cursor:pointer;">' + data[i].npwpl + '</li>';
						}
						html += '</ul>';
						$('#suggestions').show();
						$('#autoSuggestionsList').html(html);
					}
				});
			}
		});
	});
	$(document).on("click", ".npwp", function() {
		$('#suggestions').hide();
		$("#npwp").val($(this).data("npwp"));
		$("#tgl_terdaftar_npwp").val($(this).data("tgl_daftar"));
	});
</script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
<script type="text/javascript">
	$('#kelurahan').autocomplete({
		source: "<?php echo site_url('data_wp/get_autocomplete'); ?>",

		select: function(event, ui) {
			$('[name="kelurahan"]').val(ui.option.label);
			$('[name="kelurahan_id"]').val(ui.option.kelurahan_id);
		}
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#kecamatan').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>data_wp/get_kelurahan",
				method: "POST",
				data: {
					id: id
				},
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<option value="' + data[i].id + '">' + data[i].nama + '</option>';
					}
					$('.kelurahan').html(html);

				}
			});
		});
	});
</script>
