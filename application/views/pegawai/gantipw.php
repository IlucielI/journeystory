<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->
			<form action="<?= base_url('pegawai/ganti_pw_action'); ?>" method="post">
				<div class="form-group">
					<label for="current_password">Password Lama</label>
					<input type="password" name="current_password" class="form-control" id="current_password" placeholder="password lama">
					<?= form_error('current_password', '<small  class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_password1">Password Baru</label>
					<input type="password" name="new_password1" class="form-control" id="new_password1" placeholder="password baru">
					<?= form_error('new_password1', '<small  class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="new_password2">Konfirmasi Password Baru</label>
					<input type="password" name="new_password2" class="form-control" id="new_password2" placeholder="konfirmasi password baru">
					<?= form_error('new_password2', '<small  class="text-danger pl-3">', '</small>'); ?>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-success">Ubah Password</button>
					<a href=" <?php echo site_url('dashboard') ?>" class="btn btn-primary">Kembali</a>
				</div>

			</form>


		</div>
	</div>
</div>
<?php
if ($this->session->flashdata('message') != '') :
?>
	<div class="col-md-4 text-center">
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-error="<?= $this->session->flashdata('error'); ?>"></div>
	</div>
<?php endif; ?>
