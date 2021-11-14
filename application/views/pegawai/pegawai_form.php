<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<form action="<?php echo $action; ?>" method="post" id="PegawaiForm">
				<div class="form-group">
					<label for="varchar">IP<span class="text-danger">*</span> <?php echo form_error('ip') ?></label>
					<input type="text" class="form-control" name="ip" id="ip" placeholder="0xxxxxxx" value="<?= $ip; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" />
				</div>
				<div class="form-group">
					<label for="varchar">NIP<span class="text-danger">*</span> <?php echo form_error('nip') ?></label>
					<input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" value="<?= $nip; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" />
				</div>
				<div class="form-group">
					<label for="varchar">Nama<span class="text-danger">*</span> <?php echo form_error('nama') ?></label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Pengguna" value="<?php echo $nama; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" />
				</div>

				<div class="form-group">
					<label for="varchar">No. Handphone<span class="text-danger">*</span> <?php echo form_error('handphone') ?></label>
					<input type="text" class="form-control" name="handphone" id="handphone" placeholder="08xxx" value="<?php echo $handphone; ?>" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" />
				</div>

				<div class="form-group">
					<label for="varchar">Seksi<span class="text-danger">*</span></label>
					<select name="seksi_id" id="seksi_id" class="form-control">
						<option value="0">-PILIH SEKSI-</option>
						<?php foreach ($seksi as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $seksi_id) {
																		echo "Selected";
																	} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
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
					<label for="varchar">Jabatan<span class="text-danger">*</span> <?php echo form_error('jabatan') ?></label>
					<select name="jabatan_id" id="jabatan_id" class="form-control" required>
						<option value="0">-PILIH JABATAN-</option>
						<?php foreach ($jabatan as $row) : ?>
							<?php if ($row->id == 1) continue; ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $jabatan_id) {
																		echo "Selected";
																	} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Fungsi<span class="text-danger">*</span> <?php echo form_error('fungsi') ?></label>
					<select name="fungsi_id" id="fungsi_id" class="form-control" required>
						<option value="0">-PILIH FUNGSI-</option>
						<?php foreach ($fungsi as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $fungsi_id) {
																		echo "Selected";
																	} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Role<span class="text-danger">*</span> <?php echo form_error('role') ?></label>
					<select name="role_id" id="role_id" class="form-control" required>
						<option value="0">-PILIH ROLE-</option>
						<?php foreach ($role as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $status_role) {
																		echo "Selected";
																	} ?>><?php echo $row->nama_status; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')"/> -->
				<div class="form-group">
					<label for="varchar">Email<span class="text-danger">*</span> <?php echo form_error('email') ?></label>
					<input type="text" class="form-control" name="email" id="email" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" placeholder="Email" value="<?php echo $email; ?>" oninvalid="this.setCustomValidity('data tidak sesuai')" oninput="setCustomValidity('')" />
				</div>
				<div class="form-group">
					<label for="varchar">Password<span class="text-danger">*</span> <?php echo form_error('password') ?></label>
					<input type="password" class="form-control" name="password" id="password" placeholder="New Password" value="<?php echo $password; ?>" />
				</div>
				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<div class=text-right>
					<button type="submit" class="btn btn-success"><?php echo $button ?></button>
					<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalKonfirmasi">Reset Password</button> -->
					<a href="<?php echo site_url('pegawai') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>
			<script type="text/javascript">
				$('#kelurahan').autocomplete({
					source: "<?php echo site_url('pegawai/get_autocomplete'); ?>",

					select: function(event, ui) {
						$('[name="kelurahan"]').val(ui.item.label);
						$('[name="kelurahan_id"]').val(ui.item.kelurahan_id);
					}
				});
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#kecamatan').change(function() {
						var id = $(this).val();
						$.ajax({
							url: "<?php echo base_url(); ?>pegawai/get_kelurahan",
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



<!-- ============ MODAL Konfirmasi =============== -->
<!-- <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary" id="modalKonfirmasi"><b>Konfirmasi Reset Password</b></h4>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form class="form-horizontal" method="post" action="<?php echo site_url('pegawai/reset_password/' . $id) ?>">
				<div class="modal-body">
					<h5><b>Reset password akan merubah password user menjadi default 'd3cim4'</b></h5>	
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit">Ya</button>
					|
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
				</div>
			</form>
		</div>
	</div>
</div> -->
<!-- ============ END MODAL SALE =============== -->
