<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<title><?= $title . $monitoring['nama'] ?></title>
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
						<h3><?= $title . $monitoring['nama'] ?></h3>
					</center><br />
				</td>
			</tr>

		</table>

		<table border="1" align="center" style="width:900px;">
			<tr>
				<th style="text-align:center">No</th>
				<th style="text-align:center"><?= $fields['lokasi']; ?></th>
				<th style="text-align:center"><?= $fields['jumlah_tagging']; ?></th>
				<th style="text-align:center"><?= $fields['sudah']; ?></th>
				<th style="text-align:center"><?= $fields['belum']; ?></th>
				<th style="text-align:center"><?= $fields['batal']; ?></th>
			</tr>

			<?php
			$nomor = 0;
			$total_tag = $total_sudah = $total_belum = $total_batal = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td align="center"><?= $nomor; ?></td>
					<td align="center"><?php echo $row['lokasi'] ?></td>
					<td align="center"><?php echo $row['jumlah_tagging'];
															$total_tag = $total_tag + intval($row['jumlah_tagging']) ?></td>
					<td align="center"><?php echo $row['sudah'];
															$total_sudah = $total_sudah + intval($row['sudah']) ?></td>
					<td align="center"><?php echo $row['belum'];
															$total_belum = $total_belum + intval($row['belum'])  ?></td>
					<td align="center"><?php echo $row['batal'];
															$total_batal = $total_batal + intval($row['batal']) ?></td>
				</tr>


			<?php
			}
			?>
			<tr style="background-color: red;">
				<td align="center" colspan="2"> TOTAL </td>
				<td align="center"><?php echo $total_tag ?></td>
				<td align="center"><?php echo $total_sudah ?></td>
				<td align="center"><?php echo $total_belum ?></td>
				<td align="center"><?php echo $total_batal ?></td>
			</tr>
		</table>


	</div>
</body>

</html>
