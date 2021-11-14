<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- <title>KPP Decima</title> -->

	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
	<style>
		td,
		th {
			border: 2px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		h5 {
			font-size: 18px;
		}

		.h55 {
			font-size: 20px;
		}

		.h56 {
			font-size: 25px;
		}

		h4 {
			font-size: 27px;
		}

		table {
			border-spacing: 0;
		}

		@media print {
			@page {
				size: A4;
				/* DIN A4 standard, Europe */
				margin: 10mm 10mm 15mm 0;
				footer: #FFF;
				header: #FFF;
			}

			html,
			body {
				width: 210mm;
				height: 297mm;
				/* height: 282mm; */
				font-size: 12px;
				background: #FFF;
				overflow: visible;
			}

			body {
				padding-top: 5mm;
				padding-left: 25mm;
			}

			header,
			footer {
				display: none;
			}
		}
	</style>
</head>


<body onload="window.print()">
	<div class="container">
		<div class="row pb-2" style="border-bottom : 2px solid">
			<div class="col-2">
				<p></p>
				<img src="<?= base_url('assets/') ?>img/logo-BW.jpg" alt="" width="100px">
			</div>
			<div class="col-8 text-center">
				<p></p>
				<h4><b>KEMENTRIAN KEUANGAN REPUBLIK INDONESIA</h4>
				<h4><b>DIREKTORAT JENDRAL PAJAK</b></h4>
			</div>
		</div>
		<p></p>
		<p style="text-align: center" class="h56"> Formulir Pengumpulan Data</p>
		<ol type="A" class="pb-4 h55">
			<p></p>
			<li>Detail Penugasan</li>
			<h5>Surat tugas</h5>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">1. </th>
						<th style="width: 200px;">Nomor Surat Tugas</th>
						<td><?= $data['no_st']; ?></td>
					</tr>
					<tr>
						<th>2. </th>
						<th>Tanggal</th>
						<td><?= ($data['tanggal_penugasan'] != null) ? date("d-m-Y", strtotime($data['tanggal_penugasan'])) : '' ?></td>
					</tr>
					<tr>
						<th>3. </th>
						<th>Dalam Rangka</th>
						<td><?= $data['dalam_rangka']; ?></td>
					</tr>
				</tbody>
			</table>
			<p>
			<h5>
				Identitas Pegawai</h5>
			</p>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">4. </th>
						<th style="width: 200px;">Nama</th>
						<td><?= $data['nama']; ?></td>
					</tr>
					<tr>
						<th>5. </th>
						<th>NIP</th>
						<td><?= $data['nip']; ?></td>
					</tr>
					<tr>
						<th>6. </th>
						<th>Jabatan</th>
						<td><?= $data['jabatan']; ?></td>
					</tr>
				</tbody>
			</table>
			<p>
			<h5>
				Waktu Pelaksanaan Kegiatan Pengumpulan Data Lapangan</h5>
			</p>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">7. </th>
						<th style="width: 200px;">Hari</th>
						<td><?php switch (date('l', strtotime($data['tanggal']))) {
									case 'Sunday':
										echo 'Minggu';
										break;
									case 'Monday':
										echo 'Senin';
										break;
									case 'Tuesday':
										echo 'Selasa';
										break;
									case 'Wednesday':
										echo 'Rabu';
										break;
									case 'Thursday':
										echo 'Kamis';
										break;
									case 'Friday':
										echo 'Jum\'at';
										break;
									case 'Saturday':
										echo 'Sabtu';
										break;
									default:
										echo 'Tidak ada';
										break;
								}; ?></td>
					</tr>
					<tr>
						<th>8. </th>
						<th>Tanggal</th>
						<td><?= date("d-m-Y", strtotime($data['tanggal'])); ?></td>
					</tr>

				</tbody>
			</table>
			<p></p>
			<li>
				<p>
					Data Lokasi Kegiatan Pengumpulan Data Lapangan</p>
			</li>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">9. </th>
						<th style="width: 200px;">Latitude</th>
						<td colspan="2"><?= $data['lokasi_lat']; ?></td>
					</tr>
					<tr>
						<th>10. </th>
						<th>Longitude</th>
						<td colspan="2"><?= $data['lokasi_long']; ?></td>
					</tr>
					<tr>
						<th>11. </th>
						<th>Jenis Lokasi</th>
						<td colspan="2"><?= $data['jenis_lokasi']; ?></td>
					</tr>
					<tr>
						<th>12. </th>
						<th rowspan=7>Alamat Lokasi KPDL</th>
						<th>Alamat</th>
						<td><?= $data['nama_jalan']; ?></td>
					</tr>
					<tr>
						<th>13. </th>
						<th>RT</th>
						<td><?= $data['rt']; ?></td>
					</tr>
					<tr>
						<th>14. </th>
						<th>RW</th>
						<td><?= $data['rw']; ?></td>
					</tr>
					<tr>
						<th>15. </th>
						<th>Kelurahan</th>
						<td><?= $data['kelurahan']; ?></td>
					</tr>
					<tr>
						<th>16. </th>
						<th>Kecamatan</th>
						<td><?= $data['kecamatan']; ?></td>
					</tr>
					<tr>
						<th>17. </th>
						<th>Kabupaten/Kota</th>
						<td>Depok</td>
					</tr>
					<tr>
						<th>18. </th>
						<th>Provinsi</th>
						<td>Jawa Barat</td>
					</tr>
				</tbody>
			</table>
			<p></p>
			<li>
				<p>Data Subjek Pajak</p>
			</li>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">19. </th>
						<th style="width: 200px;">NPWP/Non NPWP</th>
						<td><?= $data['status_npwp']; ?></td>
					</tr>
					<tr>
						<th>20. </th>
						<th>Jenis Wajib Pajak</th>
						<td><?= $data['status_wp']; ?></td>
					</tr>
					<tr>
						<th>21. </th>
						<th>Kewarganegaraan</th>
						<td><?= $data['kewarganegaraan']; ?></td>
					</tr>
					<tr>
						<th>22. </th>
						<th>Jenis Identitas</th>
						<td><?= $data['jenis_identitas']; ?></td>
					</tr>
					<tr>
						<th>23. </th>
						<th>Nomor Identitas</th>
						<td><?= $data['no_identitas']; ?></td>
					</tr>
					<tr>
						<th>24. </th>
						<th>NPWP</th>
						<td><?= $data['npwp']; ?></td>
					</tr>
					<tr>
						<th>25. </th>
						<th>Nama</th>
						<td><?= $data['nama_usaha']; ?></td>
					</tr>
					<tr>
						<th>26. </th>
						<th>No. telp/HP</th>
						<td><?= $data['no_telp']; ?></td>
					</tr>
					<tr>
						<th>27. </th>
						<th>E-mail</th>
						<td><?= $data['email']; ?></td>
					</tr>
					<tr>
						<th>28. </th>
						<th>Merk Usaha</th>
						<td><?= $data['merk']; ?></td>
					</tr>
				</tbody>
			</table>
			<p></p>
			<li> Data Objek Pajak</li>
			<h5>Data 1</h5>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">29. </th>
						<th style="width: 200px;">Jenis Data</th>
						<td><?= $data['jenis_data']; ?></td>
					</tr>
					<tr>
						<th>30. </th>
						<th>Nama Data</th>
						<td><?= $data['nama_data']; ?></td>
					</tr>
					<tr>
						<th>31. </th>
						<th>Uraian Data</th>
						<td><?= $data['uraian_data']; ?></td>
					</tr>
					<tr>
						<th>32. </th>
						<th>Tahun Perolehan</th>
						<td><?= $data['tahun_perolehan']; ?></td>
					</tr>
					<tr>
						<th>33. </th>
						<th>Estimasi Nilai Data</th>
						<td><?= $data['omzet']; ?></td>
					</tr>
					<tr>
						<th>34. </th>
						<th>Sumber Dokumen</th>
						<td><?= $data['sumber']; ?></td>
					</tr>
				</tbody>
			</table>
			<!-- <p></p>
			<h5>
				<p>Data 2</p>
			</h5>
			<table align="center" style="width:900px;">
				<tbody>
					<tr>
						<th style="width: 50px;">29. </th>
						<th style="width: 200px;">Jenis Data</th>
						<td></td>
					</tr>
					<tr>
						<th>30. </th>
						<th>Nama Data</th>
						<td></td>
					</tr>
					<tr>
						<th>31. </th>
						<th>Uraian Data</th>
						<td></td>
					</tr>
					<tr>
						<th>32. </th>
						<th>Tahun Perolehan</th>
						<td></td>
					</tr>
					<tr>
						<th>33. </th>
						<th>Estimasi Nilai Data</th>
						<td></td>
					</tr>
					<tr>
						<th>34. </th>
						<th>Sumber Dokumen</th>
						<td></td>
					</tr>
				</tbody>
			</table>
			<p></p> -->
			<li>
				<p> Foto Objek </p>
			</li>
			<div class="row text-center">
				<?php foreach ($foto as $row) { ?>
					<div class="col-4">
						<img style="max-height: 300px; max-width:auto" width="auto" height="auto" src="<?php echo base_url() ?>upload/<?= $row->foto ?>">
					</div>
				<?php } ?>

			</div>
		</ol>
		<div class="row mt-5 d-flex justify-content-between mx-5 text-center">
			<div class="col-4 h55">
				<p>Pegawai Pelaksana KPDL</p>
				<p><?= $data['jabatan']; ?></p>
				<br><br><br>
				<p><?= $data['nama']; ?></p>
			</div>
			<div class="col-4 justify-content-end h55 text-center">
				<p>Mengetahui, Atasan Langsung</p>
				<p><?= $atasan_langsung['jabatan']; ?>,</p>
				<br><br><br>
				<p><?= $atasan_langsung['nama']; ?></p>
				<div class="mt-5 h55">
					<p>Penjamin Kualitas data</p>
					<p><?= $kepala_kantor['jabatan']; ?>,</p>
					<br><br><br>
					<p><?= $kepala_kantor['nama']; ?></p>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>

</html>
