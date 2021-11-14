<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <h2 style="margin-top:0px"><?=$title?></h2> -->
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('data_perorangan/create'), 'Tambah', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <?php 
            if($this->session->userdata('message') != '') {
                ?>
                <div class="alert alert-success" role="alert" id="message">
                    <?php echo $this->session->userdata('message'); ?>
                </div>
                <?php
                
            }
            ?>
            
            
        </div>

    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NPWP</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($data as $row){
                        ?>
                            <tr>
                                <td align="center"><?php echo ++$no ?></td>
                                <td align="center"><?php echo $row->npwp ?></td>
                                <td align="center"><?php echo $row->nama ?></td>
                                <td align="center">
                                    <?php
                                    echo anchor(site_url('data_perorangan/read/' . $row->id), 'Lihat', array('class' => 'btn btn-primary btn-sm'));
                                    echo ' ';
                                    echo anchor(site_url('data_perorangan/update/' . $row->id), 'Ubah', array('class' => 'btn btn-sm btn-success btn-flat'));
                                    echo ' ';
                                    echo anchor(site_url('data_perorangan/delete/' . $row->id), 'Delete','onclick="javasciprt: return confirm(\'Yakin ingin hapus ?\')"');
                                    ?>
                                    <!-- <button type="button" class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#modalKonfirmasi">Disable</button> -->
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->




<!-- ============ MODAL Konfirmasi =============== -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="modalKonfirmasi" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-primary" id="modalKonfirmasi"><b>Konfirmasi <?=$row->id ?></b></h4>
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