<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<form action="<?= $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">NPWP <?php echo form_error('npwpl') ?></label>
					<input type="text" class="form-control" name="npwpl" id="npwpl" placeholder="00.000.000.0-000.000" value="<?= $npwpl; ?>" required />
				</div>
				<div class="form-group">
					<label for="varchar">Nama <?php echo form_error('nama') ?></label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" required />
				</div>
				<div class="form-group">
					<label for="varchar">Nomor LHPT <?php echo form_error('nomor_lhpt') ?></label>
					<input type="text" class="form-control" name="nomor_lhpt" id="nomor_lhpt" placeholder="LHPT-00/WPJ.00/KP.0000/0000" value="<?php echo $nomor_lhpt; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal LHPT <?php echo form_error('tanggal_lhpt') ?></label>
					<input type="date" class="form-control" name="tanggal_lhpt" id="tanggal_lhpt" placeholder="Tanggal_lhpt" value="<?php echo $tanggal_lhpt; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor SP2DK<?php echo form_error('nomor_sp2dk') ?></label>
					<input type="text" class="form-control" name="nomor_sp2dk" id="nomor_sp2dk" placeholder="SP2DK-000/WPJ.00/KP.00/0000" value="<?php echo $nomor_sp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal SP2DK <?php echo form_error('tanggal_sp2dk') ?></label>
					<input type="date" class="form-control" name="tanggal_sp2dk" id="tanggal_sp2dk" placeholder="Tanggal_sp2dk" value="<?php echo $tanggal_sp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tahun Pajak<?php echo form_error('tahun_pajak_sp2dk') ?></label>
					<input type="text" class="form-control" name="tahun_pajak_sp2dk" id="tahun_pajak_sp2dk" placeholder="Tahun" value="<?php echo $tahun_pajak_sp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Estimasi Potensi Awal<?php echo form_error('estimasi_potensi_awal_sp2dk') ?></label>
					<input type="number" class="form-control" name="estimasi_potensi_awal_sp2dk" id="estimasi_potensi_awal_sp2dk" placeholder="Estimasi Potensi Awal" value="<?php echo $estimasi_potensi_awal_sp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor LHP2DK<?php echo form_error('nomor_lhp2dk') ?></label>
					<input type="text" class="form-control" name="nomor_lhp2dk" id="nomor_lhp2dk" placeholder="Nomor lhp2dk" value="<?php echo $nomor_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal LHP2DK<?php echo form_error('tanggal_lhp2dk') ?></label>
					<input type="date" class="form-control" name="tanggal_lhp2dk" id="tanggal_lhp2dk" placeholder="Tanggal lhp2dk" value="<?php echo $tanggal_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Keputusan LHP2DK<?php echo form_error('keputusan_lhp2dk') ?></label>
					<input type="text" class="form-control" name="keputusan_lhp2dk" id="keputusan_lhp2dk" placeholder="Keputusan lhp2dk" value="<?php echo $keputusan_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kesimpulan LHP2DK<?php echo form_error('kesimpulan_lhp2dk') ?></label>
					<input type="text" class="form-control" name="kesimpulan_lhp2dk" id="kesimpulan_lhp2dk" placeholder="Kesimpulan lhp2dk" value="<?php echo $kesimpulan_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Estimasi Potensi LHP2DK<?php echo form_error('estimasi_potensi_lhp2dk') ?></label>
					<input type="number" class="form-control" name="estimasi_potensi_lhp2dk" id="estimasi_potensi_lhp2dk" placeholder="Estimasi Potensi lhp2dk" value="<?php echo $estimasi_potensi_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Realisasi LHP2DK<?php echo form_error('realisasi_lhp2dk') ?></label>
					<input type="number" class="form-control" name="realisasi_lhp2dk" id="realisasi_lhp2dk" placeholder="Realisasi lhp2dk" value="<?php echo $realisasi_lhp2dk; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor DSPP<?php echo form_error('nomor_dspp') ?></label>
					<input type="text" class="form-control" name="nomor_dspp" id="nomor_dspp" placeholder="Nomor dspp" value="<?php echo $nomor_dspp; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal DSPP<?php echo form_error('tanggal_dspp') ?></label>
					<input type="date" class="form-control" name="tanggal_dspp" id="tanggal_dspp" placeholder="Tanggal dspp" value="<?php echo $tanggal_dspp; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor NP2<?php echo form_error('nomor_np2') ?></label>
					<input type="text" class="form-control" name="nomor_np2" id="nomor_np2" placeholder="Nomor np2" value="<?php echo $nomor_np2; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal NP2<?php echo form_error('tanggal_np2') ?></label>
					<input type="date" class="form-control" name="tanggal_np2" id="tanggal_np2" placeholder="Tanggal np2" value="<?php echo $tanggal_np2; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor SP2<?php echo form_error('nomor_sp2') ?></label>
					<input type="text" class="form-control" name="nomor_sp2" id="nomor_sp2" placeholder="Nomor sp2" value="<?php echo $nomor_sp2; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal SP2<?php echo form_error('tanggal_sp2') ?></label>
					<input type="date" class="form-control" name="tanggal_sp2" id="tanggal_sp2" placeholder="Tanggal sp2" value="<?php echo $tanggal_sp2; ?>" />
				</div>

				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<input type="hidden" name="npwpl_id" value="<?php echo $npwpl_id; ?>" />
				<div class=text-right>
					<button type="submit" class="btn btn-success"><?= $button; ?></button>
					<a href="<?php echo site_url('sp2dk_lhp2dk') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script>
	$(document).ready(function($) {
		$('#npwpl').mask("00.000.000.0-000.000");
	});
</script>
