<?php $pag = $this->uri->segment(1); ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>KPP Decima</title>
	<link rel="icon" href="<?= base_url('assets/img/djp.jpeg') ?>" type="image/x-icon">

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/daterangepicker.css">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap-timepicker.min.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap-datepicker.min.css">


	<!-- Custom styles for this template-->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<!--AUTO COMPLETE-->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">


	<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- RAITING -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="<?php echo base_url() ?>assets/vendor/rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/sweetalert2/sweetalert2.min.css" type="text/css">
	<!--suppress JSUnresolvedLibraryURL -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/vendor/rating/js/star-rating.js" type="text/javascript"></script>
	
	<!-- END RAITING -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">
