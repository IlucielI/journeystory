<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>dashboard">
		<div class="sidebar-brand-icon">
			<img src="<?php echo base_url() ?>/assets/img/djp.jpeg" width="50" height="50" alt="">
		</div>
		<div class="sidebar-brand-text mx-3">KPP<sup>Decima</sup></div>
	</a>


	<!-- Nav Item - Dashboard -->
	<div class="sidebar-heading">
		Menu
	</div>

	<li class="nav-item <?php if ($this->uri->segment(1) == 'dashboard') echo 'active' ?>">
		<a class="nav-link" href="<?php echo base_url() ?>dashboard">
			<i class="fa fa-dashboard"></i>
			<span>Dashboard</span>
		</a>
	</li>

	<li class="nav-item <?php if ($this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'wilayah' || $this->uri->segment(1) == 'data_wp' || $this->uri->segment(1) == 'sp2dk_lhp2dk') echo 'active' ?>">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
			<i class="fa fa-users"></i>
			<span>Tabel Referensi</span>
		</a>
		<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item <?php if ($this->uri->segment(1) == 'pegawai') echo 'active' ?>" href="<?php echo base_url() ?>pegawai">Tabel Pegawai</a>
				<a class="collapse-item <?php if ($this->uri->segment(1) == 'wilayah') echo 'active' ?>" href="<?php echo base_url() ?>wilayah">Tabel Wilayah</a>
				<a class="collapse-item <?php if ($this->uri->segment(1) == 'data_wp') echo 'active' ?>" href="<?php echo base_url() ?>data_wp">Tabel Data WP</a>
				<a class="collapse-item <?php if ($this->uri->segment(1) == 'sp2dk_lhp2dk') echo 'active' ?>" href="<?php echo base_url() ?>sp2dk_lhp2dk">Tabel SP2DK-LHP2DK</a>
			</div>
		</div>
	</li>

	<li class="nav-item <?php if ($this->uri->segment(2) == 'rekam_penugasan' || $this->uri->segment(2) == 'penugasan_update' || $this->uri->segment(2) == 'penugasan_create') echo 'active' ?>">
		<a class="nav-link" href="<?php echo base_url() ?>data/rekam_penugasan">
			<i class="fa fa-book"></i>
			<span>Penugasan</span></a>
	</li>


	<li class="nav-item <?php if ($this->uri->segment(2) == 'data_lapangan' || $this->uri->segment(2) == 'data_lapangan_verif' || $this->uri->segment(2) == 'data_lapangan_read') echo 'active' ?>">
		<a class="nav-link" href="<?php echo base_url() ?>data/data_lapangan/">
			<i class="fa fa-book"></i>
			<span>Edit Data Lapangan</span></a>
	</li>

	<li class="nav-item <?php if ($this->uri->segment(2) == 'verifikasi_material' || $this->uri->segment(2) == 'percetakan_form_kpdl' || $this->uri->segment(2) == 'verifikasi_formal' || $this->uri->segment(2) == 'verifikasi_material_verif') echo 'active' ?>">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			<i class="fa fa-dashboard"></i>
			<span>Penjamin Kualitas Data</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item <?php if ($this->uri->segment(2) == 'verifikasi_material' || $this->uri->segment(2) == 'verifikasi_material_verif' || $this->uri->segment(2) == 'verifikasi_material_read') echo 'active' ?>" href="<?php echo base_url() ?>data/verifikasi_material">Verifikasi Material</a>
				<a class=" collapse-item <?php if ($this->uri->segment(2) == 'percetakan_form_kpdl' || $this->uri->segment(2) == 'percetakan_form_kpdl_read') echo 'active' ?>" href="<?php echo base_url() ?>data/percetakan_form_kpdl">Pencetakan Form KPDL</a>
				<a class=" collapse-item <?php if ($this->uri->segment(2) == 'verifikasi_formal' || $this->uri->segment(2) == 'verifikasi_formal_verif' || $this->uri->segment(2) == 'verifikasi_formal_read') echo 'active' ?>" href="<?php echo base_url() ?>data/verifikasi_formal">Verifikasi Formal</a>
			</div>
		</div>
	</li>


	<li class="nav-item <?php if ($this->uri->segment(2) == 'tindak_lanjut' || $this->uri->segment(2) == 'tindak_lanjut_update' || $this->uri->segment(2) == 'tindak_lanjut_read') echo 'active' ?>">
		<a class="nav-link" href="<?php echo base_url() ?>data/tindak_lanjut">
			<i class="fa fa-book"></i>
			<span>Tindak Lanjut SP2DK/DSE</span></a>
	</li>

	<li class="nav-item <?php if ($this->uri->segment(2) == 'monitoring_pengamatan_kecamatan' || $this->uri->segment(2) == 'monitoring_pengamatan' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_sp2dk_kecamatan' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_sp2dk' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_pkd_kecamatan' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_pkd' || $this->uri->segment(2) == 'monitoring_kinerja') echo 'active' ?>">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			<i class="fa fa-desktop"></i>
			<span>Monitoring</span>
		</a>
		<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Data Monitoring :</h6>
				<a class="collapse-item <?php if ($this->uri->segment(2) == 'monitoring_pengamatan_kecamatan' || $this->uri->segment(2) == 'monitoring_pengamatan') echo 'active' ?>" href="<?php echo base_url() ?>data/monitoring_pengamatan_kecamatan">Data Pengamatan</a>
				<a class="collapse-item <?php if ($this->uri->segment(2) == 'monitoring_tindak_lanjut_pkd_kecamatan' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_pkd') echo 'active' ?>" href="<?php echo base_url() ?>data/monitoring_tindak_lanjut_pkd_kecamatan">Tindak Lanjut PKD</a>
				<a class="collapse-item <?php if ($this->uri->segment(2) == 'monitoring_tindak_lanjut_sp2dk_kecamatan' || $this->uri->segment(2) == 'monitoring_tindak_lanjut_sp2dk') echo 'active' ?>" href="<?php echo base_url() ?>data/monitoring_tindak_lanjut_sp2dk_kecamatan">Tindak Lanjut SP2DK/DSE</a>
				<a class="collapse-item <?php if ($this->uri->segment(2) == 'monitoring_kinerja') echo 'active' ?>" href="<?php echo base_url() ?>data/monitoring_kinerja">Kinerja Individu</a>
			</div>
		</div>
	</li>



	<!-- Divider -->
	<hr class="sidebar-divider">


	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->
