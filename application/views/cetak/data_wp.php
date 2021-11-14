<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
	<title>KPP Decima</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
	<style>
		@page {
			size: landscape;
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
				<th style="text-align:center">NPWP</th>
				<th style="text-align:center">NIK</th>
				<th style="text-align:center">Nama</th>
				<th style="text-align:center">Tanggal Daftar</th>
				<th style="text-align:center">Nama KLU</th>
				<th style="text-align:center">Kode Cabang</th>
				<th style="text-align:center">Kode KPP</th>
				<th style="text-align:center">Kelurahan</th>
				<th style="text-align:center">Jenis Wajib Pajak</th>
				<th style="text-align:center">Status</th>
				<th style="text-align:center">No SKT</th>
				<th style="text-align:center">Nama PJ</th>
				<th style="text-align:center">Nama JS</th>
			</tr>

			<?php
			$nomor = 0;
			foreach ($data as $row) {
				$nomor++;
			?>

				<tr>
					<td style="text-align:center;"><?= $nomor; ?></td>
					<td style="text-align:center;"><?= $row->npwp ?></td>
					<td style="text-align:center;"><?= $row->nomor_identitas ?></td>
					<td style="text-align:center;"><?= $row->nama ?></td>
					<td style="text-align:center;"><?= $row->tanggal_daftar ?></td>
					<td style="text-align:center;"><?= $row->nama_klu ?></td>
					<td style="text-align:center;"><?= $row->kd_cabang ?></td>
					<td style="text-align:center;"><?= $row->kd_kpp ?></td>
					<td style="text-align:center;"><?= $row->kelurahan ?></td>
					<td style="text-align:center;"><?= $row->jenis ?></td>
					<td style="text-align:center;"><?= $row->status ?></td>
					<td style="text-align:center;"><?= $row->no_skt ?></td>
					<td style="text-align:center;"><?= $row->nama_pj ?></td>
					<td style="text-align:center;"><?= $row->nama_js ?></td>
				</tr>


			<?php
			}
			?>
		</table>


	</div>
</body>

</html>
