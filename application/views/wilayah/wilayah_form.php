<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<form action="<?= $action; ?>" method="post">
				<div class="form-group">
					<label for="varchar">Kecamatan </label>
					<select name="kecamatan_id" id="kecamatan" class="form-control" required>
						<option value="0">-PILIH-</option>
						<?php foreach ($data_kecamatan as $row) : ?>
							<option value="<?php echo $row->id; ?>" <?php if ($row->id == $kecamatan) {
																												echo "Selected";
																											} ?>><?php echo $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
					<select name="kelurahan_id" class="kelurahan form-control" required>

						<?php
						if ($kelurahan != '' || $kelurahan != null) { ?>
							<option value="<?= $kelurahan_id ?>"> <?= $kelurahan; ?> </option>
						<?php } else { ?>
							<option value="0">-PILIH-</option>
						<?php }
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="varchar">Rw <?php echo form_error('rw') ?></label>
					<input type="text" class="form-control" name="rw" id="rw" placeholder="01, 02" value="<?php echo $rw; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Seksi <?php echo form_error('seksi') ?></label>
					<input readonly type="text" class="form-control" name="seksi" id="seksi" placeholder="Seksi" value="<?php echo $seksi; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Nama <?php echo form_error('nama') ?></label>
					<input readonly type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">IP <?php echo form_error('ip') ?></label>
					<input type="text" class="form-control" name="ip" id="ip" placeholder="ip" value="<?= $ip; ?>" />
					<div id="suggestions">
						<div id="autoSuggestionsList"></div>
					</div>
				</div>




				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<div class=text-right>
					<button type="submit" class="btn btn-success"><?= $button; ?></button>
					<a href="<?php echo site_url('wilayah') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
			<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>

			<script type="text/javascript">
				$(document).ready(function() {
					$("#ip").keyup(function() {
						var ref_ip = $(this).val();
						if (ref_ip.length < 1) {
							$('#suggestions').hide();
						} else {
							$.ajax({
								url: "<?php echo base_url(); ?>data/ajax_ip",
								method: "POST",
								data: {
									ref_ip: ref_ip
								},
								dataType: 'json',
								success: function(data) {
									var html = '<ul class= "list-group">';
									var i;
									for (i = 0; i < data.length; i++) {
										html += '<li class="list-group-item ip" data-ip= "' + data[i].ip + '" data-seksi="' + data[i].seksi + '" data-nama="' + data[i].nama +
											'" style= " cursor:pointer;">' + data[i].ip + '</li>';
									}
									html += '</ul>';
									$('#suggestions').show();
									$('#autoSuggestionsList').html(html);
								}
							});
						}
					});
				});
				$(document).on("click", ".ip", function() {
					$('#suggestions').hide();
					$("#ip").val($(this).data("ip"));
					$("#nama").val($(this).data("nama"));
					$("#seksi").val($(this).data("seksi"));
				});
			</script>


			<script type="text/javascript">
				$('#kelurahan').autocomplete({
					source: "<?php echo site_url('wilayah/get_autocomplete'); ?>",

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
