<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<title>KPP Decima</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
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
				<th style="text-align:center">Kecamatan</th>
				<th style="text-align:center">Kelurahan</th>
				<th style="text-align:center">Rw</th>
				<th style="text-align:center">Seksi</th>
				<th style="text-align:center">Nama Ar</th>
				<th style="text-align:center">Ip</th>
			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td align="center"><?= $nomor; ?></td>
					<td align="center"><?php echo $row->kecamatan_nama ?></td>
					<td align="center"><?php echo $row->kelurahan_nama ?></td>
					<td align="center"><?php echo $row->rw ?></td>
					<td align="center"><?php echo $row->seksi ?></td>
					<td align="center"><?php echo $row->nama ?></td>
					<td align="center"><?php echo $row->ip ?></td>

				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
