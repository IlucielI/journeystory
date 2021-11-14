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
				<th style="text-align:center">IP</th>
				<th style="text-align:center">NIP</th>
				<th style="text-align:center">Nama</th>
				<th style="text-align:center">Jabatan</th>
				<th style="text-align:center">Seksi</th>
				<th style="text-align:center">Fungsi</th>
				<th style="text-align:center">Role</th>
				<th style="text-align:center">Handphone</th>
				<th style="text-align:center">Email</th>
			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td style="text-align:center;"><?= $nomor; ?></td>
					<td style="text-align:center;"><?= $row->ip ?></td>
					<td style="text-align:center;"><?= $row->nip ?></td>
					<td style="text-align:left;"><?= $row->nama ?></td>
					<td style="text-align:center;"><?= $row->jabatan ?></td>
					<td style="text-align:center;"><?= $row->seksi ?></td>
					<td style="text-align:center;"><?= $row->fungsi ?></td>
					<td style="text-align:center;"><?= $row->status_role ?></td>
					<td style="text-align:center;"><?= $row->handphone ?></td>
					<td style="text-align:center;"><?= $row->email ?></td>

				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
