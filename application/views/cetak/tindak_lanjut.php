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
				<th style="text-align:center">Nama Pemilik Usaha</th>
				<th style="text-align:center">Alamat</th>
				<th style="text-align:center">Status</th>
				<th style="text-align:center">Pegawai</th>


			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
				$status = "Sudah Di Tindak Lanjut";

				if ($row->tindak_lanjut == 0) {
					$status = "Belum Di Tindak Lanjut";
				} else if ($row->tindak_lanjut == 2) {
					$status = "Dibatalkan";
				}
			?>

				<tr>
					<td style="text-align:center;"><?= $nomor; ?></td>
					<td style="text-align:center;"><?= $row->tanggal ?></td>
					<td style="text-align:center;"><?= $row->nama_usaha ?></td>
					<td style="text-align:center;"><?= $row->nama_jalan ?></td>
					<td style="text-align:center;"><?= $status ?></td>
					<td style="text-align:center;"><?= $row->user ?></td>

				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
