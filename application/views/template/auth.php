<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="<?= base_url('assets/img/djp.jpeg') ?>" type="image/x-icon">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>Login</title>


	<link rel="stylesheet" href="<?= base_url() ?>assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/neon-core.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/signin.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/skins/blue.css">

	<script src="<?= base_url() ?>assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="<?= base_url() ?>assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>

<body class="text-center">

	<form class="form-signin" action="<?php echo base_url() . 'administrator/cekuser' ?>" method="post">
		<img class="mb-4" src="<?php echo base_url() . 'assets/img/djp.jpeg' ?>" alt="gambar" alt="" width="90" height="90">
		<h1 class="h3 mb-3 font-weight-normal">Admin Pengamatan dan Pengumpulan Data Lapangan</h1>

		<label for="inputEmail" class="sr-only">NIP/IP</label>
		<input class="form-control" type="text" name="username" placeholder="NIP atau IP" required>
		<br />
		<label for="inputPassword" class="sr-only">Password</label>
		<input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom:1px;" required>
		<br />
		<?php if ($this->session->flashdata('msg')) { ?>
			<p class="text-danger"><?= $this->session->flashdata('msg') ?></p>
		<?php } ?>
		<br />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<p class="mt-5 mb-3 text-muted">kpp-decima © 2020</p>
	</form>


	<!-- Bottom Scripts -->
	<script src="<?= base_url() ?>assets/js/gsap/main-gsap.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/js/joinable.js"></script>
	<script src="<?= base_url() ?>assets/js/resizeable.js"></script>
	<script src="<?= base_url() ?>assets/js/neon-api.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?= base_url() ?>assets/js/neon-login.js"></script>
	<script src="<?= base_url() ?>assets/js/neon-custom.js"></script>
	<script src="<?= base_url() ?>assets/js/neon-demo.js"></script>

</body>

</html>
