<?php $this->load->view('template/backend/partials/header'); ?>
<?php $this->load->view('template/backend/partials/menu'); ?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="text-align: center;">
			<h2 style="margin-top:0px"><b><?= $title ?></b></h2>
			<!--<marquee>
				<h3 style="color:#CB3122;">Clinico Shoes</h3>
			</marquee> -->
			<!-- Sidebar Toggle (Topbar) -->
			<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
				<i class="fa fa-bars"></i>
			</button>
			<!-- Nav Item - User Information -->
			<li class="nav-item dropdown no-arrow ml-auto" style="list-style-type: none;">
				<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="mr-4 d-none d-lg-inline text-gray-600"><?= $this->session->userdata('nama') ?></span>
					<img class="img-profile rounded-circle" src="<?= base_url() ?>assets/images/user.png" ?>
				</a>
				<!-- Dropdown - User Information -->
				<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="<?php echo base_url() ?>pegawai/ganti_pw" data-toggle="" data-target="#">
						<i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400" aria-hidden="true"></i>
						Ubah Password
					</a>
					<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
						<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
						Keluar
					</a>

				</div>
			</li>


		</nav>
		<!-- End of Topbar -->



		<!-- konten disini -->
		<!-- Begin Page Content -->
		<div class="container-fluid">

			<?= $contents; ?>

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->
	<!--</div> -->


	<?php $this->load->view('template/backend/partials/footer'); ?>
