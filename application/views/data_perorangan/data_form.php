<!-- Begin Page Content -->
<div class="container-fluid">

    <h2 style="margin-top:0px"><?php echo $button ?> </h2>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">NPWP <?php echo form_error('npwp') ?></label>
                    <input type="text" class="form-control" name="npwp" id="npwp" placeholder="npwp" value="<?=$npwp; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Badan <?php echo form_error('badan') ?></label>
                    <input type="text" class="form-control" name="badan" id="badan" placeholder="badan" value="<?php echo $badan; ?>" />
                </div>
        
                <div class="form-group">
                    <label for="varchar">Status PKP <?php echo form_error('status_pkp') ?></label>
                    <input type="text" class="form-control" id="status_pkp" name="status_pkp" placeholder="status_pkp" value="<?php echo $status_pkp; ?>" required>
                    
                </div>
                <div class="form-group">
                    <label for="varchar">Status WP <?php echo form_error('status_wp') ?></label>
                    <input type="text" class="form-control" name="status_wp" id="status_wp" placeholder="status_wp" value="<?php echo $status_wp; ?>" />
                </div>

                <div class="form-group">
                    <label for="varchar">Pelaporan SPT <?php echo form_error('pelaporan_spt') ?></label>
                    <input type="text" class="form-control" name="pelaporan_spt" id="pelaporan_spt" placeholder="pelaporan_spt" value="<?php echo $pelaporan_spt; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Tunggakan <?php echo form_error('tunggakan') ?></label>
                    <input type="text" class="form-control" name="tunggakan" id="tunggakan" placeholder="tunggakan" value="<?php echo $tunggakan; ?>" />
                </div>
              
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class=text-right>
                <button type="submit" class="btn btn-success"><?php echo $button ?></button>
                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalKonfirmasi">Reset Password</button> -->
                <a href="<?php echo site_url('data_perorangan') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </form>
        
        </div>
    </div>
</div>



<!-- ============ MODAL Konfirmasi =============== -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
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
					<h5><b>Reset password akan merubah password user menjadi default '12345678'</b></h5>	
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