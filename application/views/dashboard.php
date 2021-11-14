<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Selamat Datang <?= $this->session->userdata('nama') ?></h1>

</div>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pegawai</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data1->pegawai ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-primary-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Capture Data</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data2->tagging ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-database fa-2x text-success-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row">
	<div class="col">
		<div class="chart" id="tusi-nontusi"></div>
		<select name="optionstatus" id="optionstatus" class="form-control">
			<option value="0">ALl</option>
			<option value="1">Month</option>
		</select>
	</div>
	<div class="col">
		<div class="chart" id="seksi"></div>
		<select name="optionseksi" id="optionseksi" class="form-control">
			<option value="0">ALL</option>
			<option value="1">Month</option>
		</select>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="chart" id="proses"></div>
		<select name="optionproses" id="optionproses" class="form-control">
			<option value="0">ALL</option>
			<option value="1">Month</option>
		</select>
	</div>
	<div class="col">
		<div class="chart" id="realisasi"></div>
	</div>
</div>




<!-- Page level plugins -->
<!-- <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script> -->

<script type="text/javascript">
	$(document).ready(function() {
		google.charts.load('current', {
			'packages': ['corechart']
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {

			var data = [];
			data['0'] = new google.visualization.DataTable();
			data['0'].addColumn('string', 'Tusi-Non Tusi');
			data['0'].addColumn('number', 'Jumlah');
			data['0'].addRows([
				<?php foreach ($bystatus as $row) : ?>['<?= $row['nama_status']; ?>', <?= $row['jumlah_per_status']; ?>],
				<?php endforeach; ?>
			]);;

			data['1'] = new google.visualization.DataTable();
			data['1'].addColumn('string', 'Nama Seksi');
			data['1'].addColumn('number', 'Jumlah');
			data['1'].addRows([
				<?php foreach ($byseksi as $row) : ?>['<?= $row['nama']; ?>', <?= $row['jumlah_per_seksi']; ?>],
				<?php endforeach; ?>
			]);;

			data['2'] = new google.visualization.DataTable();
			data['2'].addColumn('string', 'Nama Proses');
			data['2'].addColumn('number', 'Jumlah');
			data['2'].addRows([
				<?php foreach ($byproses as $row) : ?>['<?= $row['nama_proses']; ?>', <?= $row['jumlah_per_proses']; ?>],
				<?php endforeach; ?>
			]);;

			var options1 = {
				title: 'Kegiatan KPDL by Tusi-Non Tusi',
				width: 500,
				height: 400,
				legend: 'bottom',
				is3D: true,
				sliceVisibilityThreshold: 0
			};
			var piechart = new google.visualization.PieChart(document.getElementById('tusi-nontusi'));
			piechart.draw(data['0'], options1);

			var options2 = {
				title: 'Kegiatan KPDL by Seksi',
				width: 500,
				height: 400,
				legend: 'bottom',
				is3D: true,
				sliceVisibilityThreshold: 0
			};
			var barchart = new google.visualization.PieChart(document.getElementById('seksi'));
			barchart.draw(data['1'], options2);

			var options3 = {
				title: 'Kegiatan KPDL by Proses',
				width: 500,
				height: 400,
				legend: 'bottom',
				is3D: true,
				sliceVisibilityThreshold: 0
			};
			var barchart = new google.visualization.PieChart(document.getElementById('proses'));
			barchart.draw(data['2'], options3);
		}

	})
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#optionstatus').change(function() {
			var kat = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>dashboard/ajax_status",
				method: "POST",
				data: {
					kat: kat
				},
				dataType: 'json',
				success: function(datas) {
					var nodata = 0;
					for (i = 0; i < datas.length; i++) {
						if (parseInt(datas[i].jumlah_per_status) == 0) {
							nodata++;
						}
					};
					var data = [];
					data['0'] = new google.visualization.DataTable();
					data['0'].addColumn('string', 'Tusi-Non Tusi');
					data['0'].addColumn('number', 'Jumlah');
					if (nodata != datas.length) {
						for (i = 0; i < datas.length; i++) {
							data['0'].addRows([
								[String(datas[i].nama_status), parseInt(datas[i].jumlah_per_status)],
							]);
						};
					}
					var options1 = {
						title: 'Kegiatan KPDL by Tusi-Non Tusi',
						width: 500,
						height: 400,
						legend: 'bottom',
						is3D: true,
						sliceVisibilityThreshold: 0
					};
					var piechart = new google.visualization.PieChart(document.getElementById('tusi-nontusi'));
					piechart.draw(data['0'], options1);
				}
			});
		});

		$('#optionseksi').change(function() {
			var kat = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>dashboard/ajax_seksi",
				method: "POST",
				data: {
					kat: kat
				},
				dataType: 'json',
				success: function(datas) {
					var nodata = 0;
					for (i = 0; i < datas.length; i++) {
						if (parseInt(datas[i].jumlah_per_seksi) == 0) {
							nodata++;
						}
					};
					var data = [];
					data['1'] = new google.visualization.DataTable();
					data['1'].addColumn('string', 'Nama Seksi');
					data['1'].addColumn('number', 'Jumlah');
					if (nodata != datas.length) {
						for (i = 0; i < datas.length; i++) {
							data['1'].addRows([
								[String(datas[i].nama), parseInt(datas[i].jumlah_per_seksi)],
							]);
						};
					}
					var options2 = {
						title: 'Kegiatan KPDL by Seksi',
						width: 500,
						height: 400,
						legend: 'bottom',
						is3D: true,
						sliceVisibilityThreshold: 0
					};
					var piechart = new google.visualization.PieChart(document.getElementById('seksi'));
					piechart.draw(data['1'], options2);
				}
			});
		});
		$('#optionproses').change(function() {
			var kat = $(this).val();
			$.ajax({
				url: "<?php echo base_url(); ?>dashboard/ajax_proses",
				method: "POST",
				data: {
					kat: kat
				},
				dataType: 'json',
				success: function(datas) {
					var nodata = 0;
					for (i = 0; i < datas.length; i++) {
						if (parseInt(datas[i].jumlah_per_proses) == 0) {
							nodata++;
						}
					};
					console.log(datas);
					var data = [];
					data['2'] = new google.visualization.DataTable();
					data['2'].addColumn('string', 'Nama Proses');
					data['2'].addColumn('number', 'Jumlah');
					if (nodata != datas.length) {
						for (i = 0; i < datas.length; i++) {
							data['2'].addRows([
								[String(datas[i].nama_proses), parseInt(datas[i].jumlah_per_proses)],
							]);
						};
					}
					var options3 = {
						title: 'Kegiatan KPDL by Proses',
						width: 500,
						height: 400,
						legend: 'bottom',
						is3D: true,
						sliceVisibilityThreshold: 0
					};
					var piechart = new google.visualization.PieChart(document.getElementById('proses'));
					piechart.draw(data['2'], options3);
				},
			});
		});
	});
</script>
