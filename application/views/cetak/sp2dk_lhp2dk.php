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
				<th style="text-align:center">NPWP</th>
				<th style="text-align:center">NAMA</th>
				<th style="text-align:center">NOMOR LHPT</th>
				<th style="text-align:center">TANGGAL LHPT</th>
				<th style="text-align:center">NOMOR SP2DK</th>
				<th style="text-align:center">TANGGAL SP2DK</th>
				<th style="text-align:center">TAHUN PAJAK SP2DK</th>
				<th style="text-align:center">ESTIMASI POTENSI AWAL</th>
				<th style="text-align:center">NOMOR LHP2DK</th>
				<th style="text-align:center">TANGGAL LHP2DK</th>
				<th style="text-align:center">KEPUTUSAN LHP2DK</th>
				<th style="text-align:center">KESIMPULAN LHP2DK</th>
				<th style="text-align:center">ESTIMASI POTENSI</th>
				<th style="text-align:center">REALISASI LHP2DK</th>
				<th style="text-align:center">NOMOR DSPP</th>
				<th style="text-align:center">TANGGAL DSPP</th>
				<th style="text-align:center">NOMOR NP2</th>
				<th style="text-align:center">TANGGAL NP2</th>
				<th style="text-align:center">NOMOR SP2</th>
				<th style="text-align:center">TANGGAL SP2</th>
			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td align="center"><?php echo $nomor ?></td>
					<td align="center"><?php echo $row->npwpl ?></td>
					<td align="center"><?php echo $row->nama ?></td>
					<td align="center"><?php echo $row->nomor_lhpt ?></td>
					<td align="center"><?php echo $row->tanggal_lhpt ?></td>
					<td align="center"><?php echo $row->nomor_sp2dk ?></td>
					<td align="center"><?php echo $row->tanggal_sp2dk ?></td>
					<td align="center"><?php echo $row->tahun_pajak_sp2dk ?></td>
					<td align="center"><?php echo $row->estimasi_potensi_awal_sp2dk ?></td>
					<td align="center"><?php echo $row->nomor_lhp2dk ?></td>
					<td align="center"><?php echo $row->tanggal_lhp2dk ?></td>
					<td align="center"><?php echo $row->keputusan_lhp2dk ?></td>
					<td align="center"><?php echo $row->kesimpulan_lhp2dk ?></td>
					<td align="center"><?php echo $row->estimasi_potensi_lhp2dk ?></td>
					<td align="center"><?php echo $row->realisasi_lhp2dk ?></td>
					<td align="center"><?php echo $row->nomor_dspp ?></td>
					<td align="center"><?php echo $row->tanggal_dspp ?></td>
					<td align="center"><?php echo $row->nomor_np2 ?></td>
					<td align="center"><?php echo $row->tanggal_np2 ?></td>
					<td align="center"><?php echo $row->nomor_sp2 ?></td>
					<td align="center"><?php echo $row->tanggal_sp2 ?></td>

				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
