<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<title>KPP Decima</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body onload="window.print()">
	<div id="laporan">

		<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
			<tr>
				<td colspan="2" style="width:800px;paddin-left:20px;">
					<center>
						<h3><?= $title ?></h3>
					</center><br />
				</td>
			</tr>

		</table>

		<table border="1" align="center" style="width:900px;">
			<tr>
				<th>No</th>
				<th>No. ST</th>
				<th>Tgl ST</th>
				<th>Tgl. Mulai Tugas</th>
				<th>Tgl. Akhir Tugas</th>
				<th>Petugas</th>
				<th>IP</th>
				<th>Lokasi</th>
			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td style="text-align:center;"><?= $nomor; ?></td>
					<td style="text-align:center;"><?= $row->no_st ?></td>
					<td style="text-align:center;"><?= $row->tanggal ?></td>
					<td style="text-align:center;"><?= $row->tgl_mulai_tugas ?></td>
					<td style="text-align:center;"><?= $row->tgl_akhir_tugas ?></td>
					<td style="text-align:center;"><?= $row->nama ?></td>
					<td style="text-align:center;"><?= $row->ip ?></td>
					<td style="text-align:center;"><?= $row->lokasi ?></td>

				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
