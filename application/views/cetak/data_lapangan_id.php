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

		<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">

			<tr>
				<td width="150px">Tanggal</td>
				<td><?= $data->tanggal; ?></td>
			</tr>

			<tr>
				<td width="150px">Nama Pemilik Usaha</td>
				<td><?= $data->nama_usaha; ?></td>
			</tr>
			<tr>
				<td width="150px">Tanggal Terdaftar NPWP</td>
				<td><?= $data->tgl_terdaftar_npwp; ?></td>
			</tr>

			<tr>
				<td width="150px">Latitude Longitude</td>
				<td><?= $data->lokasi_lat ?> , <?= $data->lokasi_long ?></td>
			</tr>
			<tr>
				<td width="150px">Nama Jalan</td>
				<td><?= $data->nama_jalan; ?></td>
			</tr>
			<tr>
				<td width="150px">RT/RW</td>
				<td><?= $data->rt; ?>/<?= $data->rw; ?></td>
			</tr>
			<tr>
				<td width="150px">kecamatan </td>
				<td><?= $data->kecamatan; ?></td>
			</tr>
			<tr>
				<td width="150px">Kelurahan </td>
				<td><?= $data->kelurahan; ?></td>
			</tr>

			<!-- ============================ -->
			<tr>
				<td width="150px">KLU </td>
				<td><?= $data->klu; ?></td>
			</tr>
			<tr>
				<td width="150px">Kegiatan Usaha </td>
				<td><?= $data->kegiatan; ?></td>
			</tr>
			<tr>
				<td width="150px">Merk Usaha </td>
				<td><?= $data->merk; ?></td>
			</tr>
			<tr>
				<td width="150px">Situasi Usaha </td>
				<td><?= $data->situasi; ?></td>
			</tr>
			<tr>
				<td width="150px">Perkiraan Omzet</td>
				<td><?= $data->omzet; ?></td>
			</tr>
			<!-- ============================ -->

			<tr>
				<td width="150px">Status WP</td>
				<td><?= $data->status_wp; ?></td>
			</tr>
			<tr>
				<td width="150px">Status PKP</td>
				<td><?= $data->status_pkp; ?></td>
			</tr>

			<tr>
				<td width="150px">Tanggal Terdaftar PKP</td>
				<td><?= $data->tgl_terdaftar_pkp; ?></td>
			</tr>
			<tr>
				<td width="150px">Tingkat Potensial</td>
				<td><?= $data->tingkat_potensial; ?></td>
			</tr>
			<!-- ===================== -->
			<tr>
				<td width="150px">Nomor SP2DK</td>
				<td><?= $data->sp2dk_nomor; ?></td>
			</tr>
			<tr>
				<td width="150px">Tanggal SP2DK</td>
				<td><?= $data->sp2dk_tgl; ?></td>
			</tr>
			<tr>
				<td width="150px">Respon SP2DK</td>
				<td><?= $data->sp2dk_respon; ?></td>
			</tr>
			<tr>
				<td width="150px">Komentar</td>
				<td>
					<ul>
						<?php
						foreach ($komentar as $row) { ?>
							<li><?= $row->komentar ?> (<?= $row->ip . ' - ' . $row->nama ?>)</li>
						<?php }
						?>

					</ul>
				</td>
			</tr>

			<tr>
				<td width="150px">Foto</td>
				<td>
					<?php
					foreach ($foto as $row) { ?>
						<div class="card">
							<img src="<?php echo base_url() ?>upload/<?= $row->foto ?>" class="card-img-top" style="max-width: 150px">
							<div class="card-body text-center">
								<h6 class="card-title"><?= $row->nama ?></h6>
							</div>
						</div>
					<?php }
					?>
				</td>
			</tr>

		</table>

	</div>
</body>

</html>
