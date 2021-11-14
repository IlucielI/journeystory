<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?=$title?></h2> -->

			<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<td width="150px">IP</td>
					<td><?= $data->ip; ?></td>
				</tr>
				<tr>
					<td width="150px">NIP</td>
					<td><?= $data->nip; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?= $data->nama; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $data->email; ?></td>
				</tr>
			
				<tr>
					<td>Kelurahan</td>
					<td><?= $data->kelurahan_nama; ?></td>
				</tr>
			
				<tr>
					<td>jabatan</td>
					<td><?= $data->jabatan; ?></td>
				</tr>
				<!-- <tr>
					<td>Role Presensi</td>
					<td><?php
						if($data->role == 1) {
							echo 'Mode 1 = Lokasi Presensi Normal';
						} else {
							echo 'Mode 2 = Lokasi Presensi Bebas';
						}
					 ?></td>
				</tr> -->
			</table>
			<div class="text-right">
				<a href=" <?php echo site_url('pegawai') ?>" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
</div>