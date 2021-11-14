<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?=$title?></h2> -->

			<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<td width="150px">NPWP</td>
					<td><?= $data->npwp; ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><?= $data->nama; ?></td>
				</tr>
				<tr>
					<td>Badan</td>
					<td><?= $data->badan; ?></td>
				</tr>
			
				<tr>
					<td>Status PKP</td>
					<td><?= $data->status_pkp; ?></td>
				</tr>
			
				<tr>
					<td>Status WP</td>
					<td><?= $data->status_wp; ?></td>
				</tr>
				<tr>
					<td>Pelaporan SPT</td>
					<td><?= $data->pelaporan_spt; ?></td>
				</tr>
				<tr>
					<td>Tunggakan</td>
					<td><?= $data->tunggakan; ?></td>
				</tr>
				
			</table>
			<div class="text-right">
				<a href=" <?php echo site_url('data_perorangan') ?>" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
</div>