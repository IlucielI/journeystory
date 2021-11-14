<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
	<div class="row">
		<div class="col">
			<?php echo anchor(site_url('cetak/monitoring_tindak_lanjut_pkd/' . $monitoring['id']), 'Export', 'class="btn btn-success" target="_blank"'); ?>
		</div>
		<div class="col">
			<h3><?= ' Kecamatan ' . $monitoring['nama'] ?></h3>
		</div>
		<div class="col d-flex justify-content-end">
			<a href="<?php echo base_url() ?>data/monitoring_tindak_lanjut_pkd_kecamatan">
				<button type="button" class="btn btn-danger">Kembali</button>
			</a>
		</div>
	</div>
	<div class="row" style="margin-bottom: 10px">
		<div class="col-md-4 text-center">
		<?php
		if ($this->session->flashdata('message') != '') :
		?>
			<div class="col-md-4 text-center">
				<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
			</div>
		<?php endif; ?>


		</div>

	</div>

	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-sm" id="example2" width="100%" cellspacing="0">

					<thead>
						<tr class="text-center">
							<th>No</th>
							<th>Kelurahan</th>
							<th>Jml Tagging</th>
							<th>Sudah Verif</th>
							<th>Belum Verif</th>
							<th>Dibatalakan</th>

						</tr>
					</thead>
					<tbody><?php
							$no = 0;
							$total_tag = $total_sudah = $total_belum = $total_batal = 0;
							foreach ($data as $row) {
							?>
							<tr>
								<td align="center"><?php echo ++$no ?></td>
								<td align="center"><?php echo $row->kelurahan ?></td>
								<td align="center"><?php echo $row->jumlah_tagging;
								$total_tag = $total_tag + intval($row->jumlah_tagging)?></td>
								<td align="center"><?php echo $row->sudah; 
								$total_sudah = $total_sudah + intval($row->sudah)?></td>
								<td align="center"><?php echo $row->belum;
								$total_belum = $total_belum + intval($row->belum) ?></td>
								<td align="center"><?php echo $row->batal;
								$total_batal = $total_batal + intval($row->batal) ?></td>


							</tr>
						<?php
							}
						?>
						<tr>
									<td align="center"></td>
									<td align="center">Total</td>
									<td align="center"><?php echo $total_tag ?></td>
									<td align="center"><?php echo $total_sudah ?></td>
									<td align="center"><?php echo $total_belum ?></td>
									<td align="center"><?php echo $total_batal?></td>
									<td></td>
								</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- /.container-fluid -->


	<!-- ============ MODAL Konfirmasi =============== -->
	<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
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
						|
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ============ END MODAL SALE =============== -->
