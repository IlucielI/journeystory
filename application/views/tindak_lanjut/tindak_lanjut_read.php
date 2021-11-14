<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?=$title?></h2> -->

			<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
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
				</tr>

<!-- ============================ -->
				<tr>
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
				</tr>
<!-- ============================ -->

				<tr>
					<td width="150px">NPWP</td>
					<td><?= $data->npwp; ?></td>
				</tr>
				<tr>
					<td width="150px">Nama Pemilik Usaha</td>
					<td><?= $data->nama_usaha; ?></td>
				</tr>
				<tr>
					<td width="150px">Tanggal Terdaftar NPWP</td>
					<td><?= $data->tgl_terdaftar_npwp; ?></td>
				</tr>
				<tr>
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
				</tr>
				<!-- ===================== -->
				<tr>
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
					<td width="150px">Potensi</td>
					<td><?= $data->sp2dk_potensi; ?></td>
				</tr>
				<tr>
					<td width="150px">Pembayaran</td>
					<td><?= $data->sp2dk_pembayaran; ?></td>
				</tr>
				<tr>
					<td width="150px">Tahun Pajak</td>
					<td><?= $data->sp2dk_tahun_pajak; ?></td>
				</tr>
				<tr>
					<td width="150px">Jenis Pajak</td>
					<td><?= $data->sp2dk_jenis_pajak; ?></td>
				</tr>
				<tr>
					<td width="150px">Masa Pajak</td>
					<td><?= $data->sp2dk_masa_pajak; ?></td>
				</tr>

				<tr>
					<td width="150px">Komentar</td>
					<td>
						<ul>
						<?php 
							foreach($komentar as $row)
							{ ?>
								<li><?=$row->komentar?> (<?= $row->ip .' - '. $row->nama ?>)</li>
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
						foreach($foto as $row)
						{ ?>
						<div class="card" style="width:15%;">
							<img src="<?php echo base_url() ?>upload/<?= $row->foto?>" class="card-img-top" >
							<div class="card-body text-center">
								<h6 class="card-title"><?= $row->nama?></h6>
							</div>
						</div> &nbsp;
							
					<?php }
					?>
					</div>
					</td>
				</tr>
				
			
				
			</table>
			<div class="text-right">
				<a href=" <?php echo site_url('data/tindak_lanjut') ?>" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
</div>