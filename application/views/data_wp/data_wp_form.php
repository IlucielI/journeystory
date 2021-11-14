<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<form action="<?= $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">NPWP <?php echo form_error('npwp') ?></label>
					<input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP" value="<?= $npwp; ?>" required />
				</div>

				<div class="form-group">
					<label for="varchar">NPWP Full <?php echo form_error('npwpf') ?></label>
					<input type="text" class="form-control npwpf" name="npwpf" id="npwpf" placeholder="00.000.000.0-000.000" value="<?= $npwpf; ?>" required />
				</div>

				<div class="form-group">
					<label for="varchar">Nama <?php echo form_error('nama') ?></label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" required />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></label>
					<input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?= $tanggal_daftar; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal Pindah <?php echo form_error('tanggal_pindah') ?></label>
					<input type="date" class="form-control" name="tanggal_pindah" id="tanggal_pindah" placeholder="Tanggal Pindah" value="<?= $tanggal_pindah; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
					<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $tanggal_lahir; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kode KPP <?php echo form_error('kd_kpp') ?></label>
					<input type="text" class="form-control" name="kd_kpp" id="kd_kpp" placeholder="Kode KPP" value="<?= $kd_kpp; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kode Cabang <?php echo form_error('kd_cabang') ?></label>
					<input type="text" class="form-control" name="kd_cabang" id="kd_cabang" placeholder="Kode Cabang" value="<?= $kd_cabang; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
					<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $alamat; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">RW <?php echo form_error('rw') ?></label>
					<input type="text" class="form-control" name="rw" id="rw" placeholder="RW" value="<?= $rw; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kota <?php echo form_error('kota') ?></label>
					<input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?= $kota; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kode Pos <?php echo form_error('kode_pos') ?></label>
					<input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?= $kode_pos; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor Telepon <?php echo form_error('nomor_telepon') ?></label>
					<input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" placeholder="Nomor Telepon" value="<?= $nomor_telepon; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nomor Fax <?php echo form_error('nomor_fax') ?></label>
					<input type="text" class="form-control" name="nomor_fax" id="nomor_fax" placeholder="Nomor Fax" value="<?= $nomor_fax; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Email <?php echo form_error('email') ?></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= $email; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">NIK <?php echo form_error('nomor_identitas') ?></label>
					<input type="text" class="form-control" name="nomor_identitas" id="nomor_identitas" placeholder="NIK" value="<?= $nomor_identitas; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Status <?php echo form_error('status') ?></label>
					<select name="status" class="status form-control" required>
						<?php foreach ($data_status as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $status_wp) {
																												echo "Selected";
																											} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
					<select name="jenis" class="jenis form-control" required>
						<?php foreach ($data_jenis as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $jenis_wp) {
																												echo "Selected";
																											} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Kode KLU <?php echo form_error('kode_klu') ?></label>
					<input type="text" class="form-control" name="kode_klu" id="kode_klu" placeholder="Kode KLU" value="<?= $kode_klu; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal PKP <?php echo form_error('tanggal_pkp') ?></label>
					<input type="date" class="form-control" name="tanggal_pkp" id="tanggal_pkp" placeholder="Tanggal PKP" value="<?= $tanggal_pkp; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Kecamatan<span class="text-danger">*</span> </label>
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
					<label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
					<select name="kelurahan" class="kelurahan form-control">
						<?php if ($kelurahan == '' || $kelurahan == null || $kelurahan == 0) { ?>
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
					<label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
					<input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= $provinsi; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Bentuk Hukum <?php echo form_error('bentuk_hukum') ?></label>
					<input type="text" class="form-control" name="bentuk_hukum" id="bentuk_hukum" placeholder="Bentuk Hukum" value="<?= $bentuk_hukum; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Mata Uang <?php echo form_error('mata_uang') ?></label>
					<input type="text" class="form-control" name="mata_uang" id="mata_uang" placeholder="Mata Uang" value="<?= $mata_uang; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">No SKT <?php echo form_error('no_skt') ?></label>
					<input type="text" class="form-control" name="no_skt" id="no_skt" placeholder="No SKT" value="<?= $no_skt; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">No PKP <?php echo form_error('no_pkp') ?></label>
					<input type="text" class="form-control" name="no_pkp" id="no_pkp" placeholder="No PKP" value="<?= $no_pkp; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Tanggal PKP Cabut <?php echo form_error('tanggal_pkp_cabut') ?></label>
					<input type="date" class="form-control" name="tanggal_pkp_cabut" id="tanggal_pkp_cabut" placeholder="Tanggal PKP Cabut" value="<?= $tanggal_pkp_cabut; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Metode Perhitungan <?php echo form_error('metode_perhitungan') ?></label>
					<input type="text" class="form-control" name="metode_perhitungan" id="metode_perhitungan" placeholder="Metode Perhitungan" value="<?= $metode_perhitungan; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nama PJ <?php echo form_error('nama_pj') ?></label>
					<input type="text" class="form-control" name="nama_pj" id="nama_pj" placeholder="Nama PJ" value="<?= $nama_pj; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nama JS <?php echo form_error('nama_js') ?></label>
					<input type="text" class="form-control" name="nama_js" id="nama_js" placeholder="Nama JS" value="<?= $nama_js; ?>" />
				</div>

				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<div class=text-right>
					<button type="submit" class="btn btn-success"><?php echo $button ?></button>
					<a href="<?php echo site_url('data_wp') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.11.2.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
			<script type="text/javascript">
				$('#kelurahan').autocomplete({
					source: "<?php echo site_url('data_wp/get_autocomplete'); ?>",

					select: function(event, ui) {
						$('[name="kelurahan"]').val(ui.item.label);
						$('[name="kelurahan_id"]').val(ui.item.kelurahan_id);
					}
				});
			</script>
			<script type="text/javascript">
				$(document).ready(function($) {
					$('#npwpf').mask("00.000.000.0-000.000");
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
		</div>
	</div>
</div>
