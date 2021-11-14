<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<form action="<?php echo $action; ?>" method="post" id="PegawaiForm">
				<div class="form-group">
					<label for="varchar">Nomor ST <?php echo form_error('no_st') ?></label>
					<input type="text" class="form-control" name="no_st" id="no_st" placeholder="nomor st" value="<?= $no_st; ?>" />
				</div>
				<div class="form-group">
					<label for="date">Tgl. ST <?php echo form_error('tanggal') ?></label>
					<input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal ST" value="<?= $tanggal; ?>" />
				</div>
				<div class="form-group">
					<label for="date">Tgl. Mulai Tugas <?php echo form_error('tgl_mulai_tugas') ?></label>
					<input type="date" class="form-control" name="tgl_mulai_tugas" id="tgl_mulai_tugas" placeholder="Tanggal Mulai Tugas" value="<?= $tgl_mulai_tugas; ?>" />
				</div>
				<div class="form-group">
					<label for="date">Tgl. Akhir Tugas <?php echo form_error('tgl_akhir_tugas') ?></label>
					<input type="date" class="form-control" name="tgl_akhir_tugas" id="tgl_akhir_tugas" placeholder="Tanggal Akhir Tugas" value="<?= $tgl_akhir_tugas; ?>" />
				</div>
				<div class="form-group">
					<label for="varchar">IP <?php echo form_error('ref_ip') ?></label>
					<input type="text" class="form-control" name="ref_ip" id="ref_ip" placeholder="IP" value="<?php echo $ref_ip; ?>" />

					<div id="suggestions">
						<div id="autoSuggestionsList"></div>
					</div>

				</div>

				<div class="form-group">
					<label for="varchar">Petugas <?php echo form_error('nama') ?></label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="Petugas" readonly value="<?php echo $nama; ?>" />
				</div>

				<div class="form-group">
					<label for="varchar">Lokasi <?php echo form_error('lokasi') ?></label>
					<input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="lokasi" value="<?php echo $lokasi; ?>" />
				</div>

				<input type="hidden" name="id" value="<?php echo $id; ?>" />
				<div class=text-right>
					<button type="submit" class="btn btn-success"><?php echo $button ?></button>
					<a href="<?php echo site_url('data/rekam_penugasan') ?>" class="btn btn-primary">Kembali</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#ref_ip").keyup(function() {
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
							html += '<li class="list-group-item ref_ip" data-ref_ip= "' + data[i].ip + '" data-nama="' + data[i].nama +
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
	$(document).on("click", ".ref_ip", function() {
		$('#suggestions').hide();
		$("#ref_ip").val($(this).data("ref_ip"));
		$("#nama").val($(this).data("nama"));
	});
</script>
