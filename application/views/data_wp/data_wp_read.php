<div class="card shadow mb-12">
	<div class="card-body">
		<div class="table-responsive">
			<!-- <h2 style="margin-top:0px"><?= $title ?></h2> -->

			<table class="table responsive table-bordered" id="dataTable" width="100%" cellspacing="0">
				<tr>
					<td width="150px">NPWP</td>
					<td><?= $data->npwp; ?></td>
				</tr>
				<tr>
					<td width="150px">Nama</td>
					<td><?= $data->nama; ?></td>
				</tr>
				<tr>
					<td>Tanggal Daftar</td>
					<td><?= (strtotime($data->tanggal_daftar) > 0) ? date('d-m-Y', strtotime($data->tanggal_daftar)) : "" ?></td>
				</tr>
				<tr>
					<td>Tanggal Pindah</td>
					<td><?= (strtotime($data->tanggal_pindah) > 0) ? date('d-m-Y', strtotime($data->tanggal_pindah)) : "" ?></td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td><?= (strtotime($data->tanggal_lahir) > 0) ? date('d-m-Y', strtotime($data->tanggal_lahir)) : "" ?></td>
				</tr>
				<tr>
					<td>Kode KPP</td>
					<td><?= $data->kd_kpp; ?></td>
				</tr>

				<tr>
					<td>Kode Cabang</td>
					<td><?= $data->kd_cabang; ?></td>
				</tr>
				<tr>
					<td>NPWP Full</td>
					<td><?= $data->npwpf; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td><?= $data->alamat; ?></td>
				</tr>
				<tr>
					<td>RW</td>
					<td><?= $data->rw; ?></td>
				</tr>
				<tr>
					<td>Kota</td>
					<td><?= $data->kota; ?></td>
				</tr>
				<tr>
					<td>Kode Pos</td>
					<td><?= $data->kode_pos; ?></td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td><?= $data->nomor_telepon; ?></td>
				</tr>
				<tr>
					<td>Nomor Fax</td>
					<td><?= $data->nomor_fax; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?= $data->email; ?></td>
				</tr>
				<tr>
					<td>NIK</td>
					<td><?= $data->nomor_identitas; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?= $data->status; ?></td>
				</tr>
				<tr>
					<td>Jenis</td>
					<td><?= $data->jenis; ?></td>
				</tr>
				<tr>
					<td>Kode KLU</td>
					<td><?= $data->kode_klu; ?></td>
				</tr>
				<tr>
					<td>Tanggal PKP</td>
					<td><?= (strtotime($data->tanggal_pkp) > 0) ? date('d-m-Y', strtotime($data->tanggal_pkp)) : "" ?></td>
				</tr>
				<tr>
					<td>Kelurahan</td>
					<td><?= $data->kelurahan; ?></td>
				</tr>
				<tr>
					<td>Kecamatan</td>
					<td><?= $data->kecamatan; ?></td>
				</tr>
				<tr>
					<td>Provinsi</td>
					<td><?= $data->provinsi; ?></td>
				</tr>
				<tr>
					<td>Bentuk Hukum</td>
					<td><?= $data->bentuk_hukum; ?></td>
				</tr>
				<tr>
					<td>Mata Uang</td>
					<td><?= $data->mata_uang; ?></td>
				</tr>
				<tr>
					<td>No SKT</td>
					<td><?= $data->no_skt; ?></td>
				</tr>
				<tr>
					<td>No PKP</td>
					<td><?= $data->no_pkp ?></td>
				</tr>
				<tr>
					<td>Tanggal PKP Cabut</td>
					<td><?= (strtotime($data->tanggal_pkp) > 0) ? date('d-m-Y', strtotime($data->tanggal_pkp_cabut)) : "" ?></td>
				</tr>
				<tr>
					<td>Metode Perhitungan</td>
					<td><?= $data->metode_perhitungan; ?></td>
				</tr>
				<tr>
					<td>Nama PJ</td>
					<td><?= $data->nama_pj; ?></td>
				</tr>
				<tr>
					<td>Nama JS</td>
					<td><?= $data->nama_js; ?></td>
				</tr>
			</table>
			<div class="text-right">
				<a href=" <?php echo site_url('data_wp') ?>" class="btn btn-primary">Kembali</a>
			</div>
		</div>
	</div>
</div>
