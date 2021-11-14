<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<title>KPP Decima</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
	<style>
		@page {
			size: landscape;
		}
		h3 {
			font-size: 18px;
		}
	</style>
</head>

<body onload="window.print()">
	<div id="laporan">
		<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
			<!--<tr>
    <td><img src="<?php
									?>"/></td>
</tr>-->
		</table>

		<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
			<tr>
				<td colspan="2" style="width:800px;padding-left:20px;">
					<center>
						<h3><?= $title ?></h3>
					</center><br />
				</td>
			</tr>

		</table>

		<table border="1" align="center" style="width:900px;">
			<tr>
				<th style="text-align:center">No</th>
				<th style="text-align:center">Tanggal</th>
				<th style="text-align:center">NPWP</th>
				<th style="text-align:center">Tanggal Terdaftar NPWP</th>
				<th style="text-align:center">Koordinat</th>
				<th style="text-align:center">Nama Jalan</th>
				<th style="text-align:center">RT/RW</th>
				<th style="text-align:center">Kecamatan, Kelurahan</th>
				<th style="text-align:center">KLU</th>
				<th style="text-align:center">Nama Usaha</th>
				<th style="text-align:center">Merk</th>
				<th style="text-align:center">Kegiatan</th>
				<!-- <th style="text-align:center">Situasi</th> -->
				<!-- <th style="text-align:center">Karyawan</th> -->
				<th style="text-align:center">Omzet</th>
				<th style="text-align:center">Status WP</th>
				<th style="text-align:center">Petugas</th>
				<!-- <th style="text-align:center">Status PKP</th>
				<th style="text-align:center">Tingkat Potensial</th> -->

			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td style="text-align:center;"><?= $nomor; ?></td>
					<td style="text-align:center;"><?= $row->tanggal ?></td>
					<td style="text-align:center;"><?= $row->npwp ?></td>
					<td style="text-align:center;"><?= $row->tgl_terdaftar_npwp ?></td>
					<td style="text-align:center;"><?= $row->lokasi_lat ?>, <?= $row->lokasi_long ?></td>
					<td style="text-align:center;"><?= $row->nama_jalan ?></td>
					<td style="text-align:center;"><?= $row->rt ?>/<?= $row->rw ?></td>
					<td style="text-align:center;"><?= $row->kecname ?>, <?= $row->kelname ?></td>
					<td style="text-align:center;"><?= $row->klu ?></td>
					<td style="text-align:center;"><?= $row->nama_usaha ?></td>
					<td style="text-align:center;"><?= $row->merk ?></td>
					<td style="text-align:center;"><?= $row->kegiatan ?></td>
					<!-- <td style="text-align:center;"><?= $row->situasi ?></td> -->
					<!-- <td style="text-align:center;"><?= $row->karyawan ?></td> -->
					<td style="text-align:center;"><?= $row->omzet ?></td>
					<td style="text-align:center;"><?= $row->status_wp ?></td>
					<td style="text-align:center;"><?= $row->petugas ?></td>
					<!-- <td style="text-align:center;"><?= $row->status_pkp ?></td>
					<td style="text-align:center;"><?= $row->tingkat_potensial ?></td> -->
				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
