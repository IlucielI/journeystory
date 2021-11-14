<?php
class Data extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->database();
		$this->load->model('Tagging_model');
		$this->load->model('Data_model');
	}

	function rekam_penugasan()
	{
		$data['title'] = "Penugasan";

		$data['data'] = $this->db->select('rekam_penugasan.id as rekam_id,no_st, tanggal, tgl_mulai_tugas, tgl_akhir_tugas, 
		user.ip as ip, user.nama as nama, lokasi')
			->from('rekam_penugasan')
			->join('user', 'rekam_penugasan.ref_ip = user.ip', 'left')
			->order_by('tanggal', 'DESC', 'no_st', 'ASC')
			->get()
			->result();

		$this->template->load('template/backend/dashboard', 'rekam_penugasan/penugasan_list', $data);
	}


	public function rekam_penugasan_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('rekam_penugasan');

		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('data/rekam_penugasan'));
	}


	public function ajax_ip()
	{
		$ref_ip = $this->input->post('ref_ip');
		$query = "SELECT
                ip, user.nama, seksi.nama as seksi
                from user
								join seksi on seksi.id = user.seksi_id
                where user.ip LIKE '$ref_ip%'
                LIMIT 3
                ";
		$result = $this->db->query($query)->result_array();
		echo json_encode($result);
	}


	public function penugasan_create()
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('data/rekam_penugasan'));
		}
		$data = array(
			'id' => set_value('id'),
			'no_st' => set_value('no_st'),
			'tanggal' => set_value('tanggal'),
			'tgl_mulai_tugas' => set_value('tgl_mulai_tugas'),
			'tgl_akhir_tugas' => set_value('tgl_akhir_tugas'),
			'ref_ip' => set_value('ref_ip'),
			'nama' => set_value('nama'),
			'lokasi' => set_value('lokasi'),
			'button' => 'Tambah ST',
			'action' => site_url('data/create_action')
		);
		$data['title'] = "Tambah Data Penugasan";
		$this->template->load('template/backend/dashboard', 'rekam_penugasan/penugasan_form', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('ref_ip', 'IP', 'trim|required');
		$this->form_validation->set_rules('no_st', 'Nomor ST', 'trim|required');

		// $this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->penugasan_create();
		} else {
			$ip_db = $this->db->select('id')
				->from('user')
				->where('ip', $this->input->post('ref_ip'))
				->get()
				->row_array();
			if (empty($ip_db)) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Ip tidak ada di tabel user');
				redirect(site_url('data/rekam_penugasan'));
			}
			$no_st = $this->input->post('no_st');
			$tanggal = $this->input->post('tanggal');
			$tgl_mulai = $this->input->post('tgl_mulai_tugas');
			$tgl_akhir = $this->input->post('tgl_akhir_tugas');
			$ref_ip = $this->input->post('ref_ip');
			$lokasi = $this->input->post('lokasi');

			$data = array(

				'no_st' => $no_st,
				'tanggal' => $tanggal,
				'tgl_mulai_tugas' => $tgl_mulai,
				'tgl_akhir_tugas' => $tgl_akhir,
				'ref_ip' => $ref_ip,
				'lokasi' => $lokasi
			);

			$this->db->insert('rekam_penugasan', $data);
			$this->session->set_flashdata('message', 'Berhasil Ditambah');
			redirect(site_url('data/rekam_penugasan'));
		}
	}

	public function penugasan_update($id)
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('data/rekam_penugasan'));
		}
		$row = $this->db->select('rekam_penugasan.id as rekam_id, no_st, tanggal, tgl_mulai_tugas, tgl_akhir_tugas, 
		user.ip as ip, user.nama as nama, lokasi')
			->from('rekam_penugasan')
			->join('user', 'cast(ref_ip as int) = cast(ip as int)', 'left')
			->where('rekam_penugasan.id', $id)
			->order_by('tanggal', 'DESC', 'no_st', 'ASC')
			->get()
			->row();

		if ($row) {
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('data/update_action'),
				'id' => set_value('id', $row->rekam_id),
				'no_st' => set_value('no_st', $row->no_st),
				'tanggal' => set_value('tanggal', $row->tanggal),
				'tgl_mulai_tugas' => set_value('tgl_mulai_tugas', $row->tgl_mulai_tugas),
				'tgl_akhir_tugas' => set_value('tgl_akhir_tugas', $row->tgl_akhir_tugas),
				'ref_ip' => set_value('ref_ip', $row->ip),
				'nama' => set_value('nama', $row->nama),
				'lokasi' => set_value('lokasi', $row->lokasi),
			);
			$data['title'] = "Ubah Data Penugasan";
			$this->template->load('template/backend/dashboard', 'rekam_penugasan/penugasan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('rekam_penugasan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->penugasan_update($this->input->post('id', true));
		} else {
			$ip_db = $this->db->select('id')
				->from('user')
				->where('ip', $this->input->post('ref_ip'))
				->get()
				->row_array();
			if (empty($ip_db)) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Ip tidak ada di tabel user');
				redirect(site_url('data/rekam_penugasan'));
			}
			$no_st = $this->input->post('no_st');
			$tanggal = $this->input->post('tanggal');
			$tgl_mulai = $this->input->post('tgl_mulai_tugas');
			$tgl_akhir = $this->input->post('tgl_akhir_tugas');
			$ref_ip = $this->input->post('ref_ip');
			$lokasi = $this->input->post('lokasi');

			$data = array(

				'no_st' => $no_st,
				'tanggal' => $tanggal,
				'tgl_mulai_tugas' => $tgl_mulai,
				'tgl_akhir_tugas' => $tgl_akhir,
				'ref_ip' => $ref_ip,
				'lokasi' => $lokasi
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('rekam_penugasan', $data);

			$this->session->set_flashdata('message', 'Berhasil Diubah');
			redirect(site_url('data/rekam_penugasan'));
		}
	}



	// ===============================================================
	// ============= Edit Data Lapangan ==========================
	// ===============================================================

	public function data_lapangan()
	{
		$data['title'] = "Data Lapangan";
		$user_id = $this->session->userdata('id');
		$user_level = $this->session->userdata('level');
		if ($user_level >= 5) {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
								where a.user_id = '$user_id'
                order by a.tanggal desc
                ";
		} else {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
                order by a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'data_lapangan/data_lapangan_list', $data);
	}

	public function data_lapangan_read($id)
	{
		$data['title'] = "Data Lapangan";
		$query = "SELECT
                a.*
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.id desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row();
		if ($data['data']) {
			// echo $data['data']->UUID;
			$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
			$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

			$this->template->load('template/backend/dashboard', 'data_lapangan/data_lapangan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data/data_lapangan/'));
		}
	}

	public function read_ajax()
	{
		$id = $this->input->post('id');
		$query = "SELECT
                a.*
								,b.nama as nama_pet
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.id desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row_array();
		$data['komentar'] = $this->Data_model->get_komentar($data['data']['UUID']);
		$data['foto'] = $this->Data_model->get_foto($data['data']['UUID']);
		$data['alasan'] = $this->Data_model->get_alasan($id, 1);
		$data['alasan_formal'] = $this->Data_model->get_alasan($id, 2);
		echo json_encode($data);
	}

	// CONTROLLER AUTOCOMPLETE
	public function autocomplete_lapangan($a)
	{
		$i = 0;
		$this->load->model('data_model');
		$datas = $this->data_model->get_data_lapangan($a);

		if (count($datas) > 0) :
			echo "<ul class='list-group'>";
			foreach ($datas as $item) :
				echo "<li class='list-group-item' id='" . $item['id'] . "'><button onclick=\"setNPWP(" . json_encode($item) . ")\" >" . $item['npwp'] . "</button></li>";
				$i++;
			endforeach;
			echo "</ul>";
		endif;
	}
	// END OF CONTROLLER AUTOCOMPLETE

	public function data_lapangan_verif($id)
	{
		if ($this->session->userdata('level') >= 5 || $this->session->userdata('level') == 1) {
			$row = $this->db->select('capture_data.*, kelurahan.nama as kelurahan_nama, user.nama as nama_pet')
				->from('capture_data')
				->join('kelurahan', 'kelurahan.id = capture_data.kel', 'left')
				->join('user', 'user.id = capture_data.user_id', 'left')
				->where('capture_data.id', $id)
				->order_by('capture_data.verifikasi', 'DESC')
				->limit(1)
				->get()
				->row();

			$kecamatan = "SELECT * from kecamatan order by nama asc";
			$data_kec = $this->db->query($kecamatan)->result();

			if ($row) {
				$kelurahan = "SELECT * from kelurahan where kecamatan_id=" . $row->kec;
				$data_kel = $this->db->query($kelurahan)->result();
			} else {
				$kelurahan = "SELECT * from kelurahan order by nama asc";
				$data_kel = $this->db->query($kelurahan)->result();
			}

			if ($row) {
				$data = array(
					'title' => "Edit Data Lapangan",
					'button' => 'Simpan',
					'action' => site_url('data/data_lapangan_verifikasi'),
					'search' => site_url('data/data_lapangan_search'),
					'id' => set_value('id', $row->id),
					'npwp' => set_value('npwp', $row->npwp),
					'status_npwp' => set_value('status_npwp', $row->status_npwp),
					'tgl_terdaftar_npwp' => set_value('tgl_terdaftar_npwp', $row->tgl_terdaftar_npwp),
					'no_st' => set_value('no_st', $row->no_st),
					'dalam_rangka' => set_value('dalam_rangka', $row->dalam_rangka),
					'nama_pet' => set_value('nama_pet', $row->nama_pet),
					'jenis_lokasi' => set_value('jenis_lokasi', $row->jenis_lokasi),
					'user_id' => set_value('user_id', $row->user_id),
					'tanggal' => set_value('tanggal', $row->tanggal),
					'lokasi_lat' => set_value('lokasi_lat', $row->lokasi_lat),
					'lokasi_long' => set_value('lokasi_long', $row->lokasi_long),
					'nama_jalan' => set_value('nama_jalan', $row->nama_jalan),
					'rt' => set_value('rt', $row->rt),
					'rw' => set_value('rw', $row->rw),
					'kecamatan' => set_value('kecamatan', $row->kec),
					'data_kecamatan' => $data_kec,
					'kelurahan' => set_value('kelurahan', $row->kel),
					'data_kelurahan' => $data_kel,
					'klu' => set_value('klu', $row->klu),
					'jenis_data' => set_value('jenis_data', $row->jenis_data),
					'klasifikasi_data' => set_value('klasifikasi_data', $row->klasifikasi_data),
					'nama_data' => set_value('nama_data', $row->nama_data),
					'uraian_data' => set_value('uraian_data', $row->uraian_data),
					'tahun_perolehan' => set_value('tahun_perolehan', $row->tahun_perolehan),
					'kegiatan' => set_value('kegiatan', $row->kegiatan),
					'merk' => set_value('merk', $row->merk),
					'sumber' => set_value('sumber', $row->sumber),
					'jam_pengamatan' => set_value('jam_pengamatan', $row->jam_pengamatan),
					// 'situasi' => set_value('situasi', $row->situasi),
					'omzet' => set_value('omzet', $row->omzet),
					'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
					'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
					'jenis_identitas' => set_value('jenis_identitas', $row->jenis_identitas),
					'no_identitas' => set_value('no_identitas', $row->no_identitas),
					'status_wp' => set_value('status_wp', $row->status_wp),
					'email' => set_value('email', $row->email),
					'no_telp' => set_value('no_telp', $row->no_telp),
					// 'status_pkp' => set_value('status_pkp', $row->status_pkp),
					'verifikasi' => set_value('verifikasi', $row->verifikasi),
					'verifikasi_formal' => set_value('verifikasi_formal', $row->verifikasi_formal),
					// 'tingkat_potensial' => set_value('tingkat_potensial', $row->tingkat_potensial),
					'sp2dk_nomor' => set_value('sp2dk_nomor', $row->sp2dk_nomor),
					// 'sp2dk_tgl' => set_value('sp2dk_tgl', $row->sp2dk_tgl),
					// 'sp2dk_respon' => set_value('sp2dk_respon', $row->sp2dk_respon),
					'UUID' => set_value('UUID', $row->UUID)
				);
				$data['komentar'] = $this->Data_model->get_komentar($data['UUID']);
				$data['alasan'] = $this->Data_model->get_alasan($id, 1);
				$data['alasan_formal'] = $this->Data_model->get_alasan($id, 2);
				$data['foto'] = $this->Data_model->get_foto($data['UUID']);

				$this->template->load('template/backend/dashboard', 'data_lapangan/data_lapangan_form', $data);
			} else {
				if ($id != 404) {
					$this->session->set_flashdata('error', 'error');
					$this->session->set_flashdata('message', 'Record Not Found');
					redirect(site_url('data/data_lapangan/'));
				}
				$data = array(
					'title' => "Edit Data Lapangan",
					'button' => 'Simpan',
					'action' => site_url('data/data_lapangan_verifikasi'),
					'search' => site_url('data/data_lapangan_search'),
					'id' => "",
					'npwp' => "",
					'status_npwp' => "",
					'tgl_terdaftar_npwp' => "",
					'no_st' => "",
					'dalam_rangka' => "",
					'user_id' => "",
					'tanggal' => "",
					'lokasi_lat' => "",
					'lokasi_long' => "",
					'nama_jalan' => "",
					'jenis_lokasi' => "",
					'rt' => "",
					'rw' => "",
					'kec' => "",
					'data_kecamatan' => $data_kec,
					'kel' => "",
					'data_kelurahan' => $data_kel,
					'klu' => "",
					'nama_data' => "",
					'uraian_data' => "",
					'tahun_perolehan' => "",
					'kegiatan' => "",
					'merk' => "",
					'sumber' => "",
					'jam_pengamatan' => "",
					// 'situasi' => "",
					'omzet' => "",
					'nama_usaha' => "",
					'kewarganegaraan' => "",
					'jenis_identitas' => "",
					'no_identitas' => "",
					'status_wp' => "",
					'email' => "",
					'no_telp' => "",
					// 'status_pkp' => "",
					// 'tingkat_potensial' => "",
					'sp2dk_nomor' => "",
					// 'sp2dk_tgl' => "",
					// 'sp2dk_respon' => "",
					'UUID' => "",
				);
				$data['komentar'] = "";
				$data['foto'] = "";
				$this->template->load('template/backend/dashboard', 'data_lapangan/data_lapangan_form', $data);
			}
		} else {
			redirect(site_url('data/data_lapangan/'));
		}
	}

	// public function data_lapangan_search()
	// {
	// 	redirect(site_url('data/data_lapangan_verif/' . $this->input->post('keyword')));
	// }

	// public function data_lapangan_verif($id)
	// {
	// 	$data['title'] = "Edit Data Lapangan";

	// 	$query = "SELECT
	//             a.*
	//             ,c.nama as kecamatan
	//             ,d.nama as kelurahan
	//             from capture_data a
	//             join user b on b.id = a.user_id
	//             join kecamatan c on c.id = a.kec
	//             join kelurahan d on d.id = a.kel
	//             where a.id = '$id'
	//             order by a.verifikasi desc, a.tanggal desc
	//             ";
	// 	$data['data'] = $this->db->query($query)->row();

	// 	$kecamatan = "SELECT * from kecamatan order by nama asc";
	// 	$data['data_kec'] = $this->db->query($kecamatan)->result();

	// 	if ($data['data']) {
	// 		$kelurahan = "SELECT * from kelurahan where kecamatan_id=" . $data['data']->kec;
	// 		$data['data_kel'] = $this->db->query($kelurahan)->result();
	// 	} else {
	// 		$kelurahan = "SELECT * from kelurahan order by nama asc";
	// 		$data['data_kel'] = $this->db->query($kelurahan)->result();
	// 	}

	// 	$data['action'] = site_url('data/data_lapangan_verifikasi');
	// 	$data['button'] = "Simpan";
	// 	$data['id'] = $data['data']->id;
	// 	$data['npwp'] = $data['data']->npwp;
	// 	$data['tgl_terdaftar_npwp'] = $data['data']->tgl_terdaftar_npwp;

	// 	$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
	// 	$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

	// 	$this->template->load('template/backend/dashboard', 'data_lapangan/data_lapangan_form', $data);
	// }

	public function data_lapangan_verifikasi()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'npwp' => $this->input->post('npwp'),
			'status_npwp' => $this->input->post('status_npwp'),
			'tgl_terdaftar_npwp' => $this->input->post('tgl_terdaftar_npwp'),
			'no_st' => $this->input->post('no_st'),
			'dalam_rangka' => $this->input->post('dalam_rangka'),
			'user_id' => $this->input->post('user_id'),
			'tanggal' => $this->input->post('tanggal'),
			'lokasi_lat' => $this->input->post('lokasi_lat'),
			'lokasi_long' => $this->input->post('lokasi_long'),
			'nama_jalan' => $this->input->post('nama_jalan'),
			'jenis_lokasi' => $this->input->post('jenis_lokasi'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'kec' => $this->input->post('kecamatan'),
			'kel' => $this->input->post('kelurahan'),
			'jenis_data' => $this->input->post('jenis_data'),
			'klasifikasi_data' => $this->input->post('klasifikasi_data'),
			'klu' => $this->input->post('klu'),
			'nama_data' => $this->input->post('nama_data'),
			'uraian_data' => $this->input->post('uraian_data'),
			'tahun_perolehan' => $this->input->post('tahun_perolehan'),
			'omzet' => $this->input->post('omzet'),
			'kegiatan' => $this->input->post('kegiatan'),
			'merk' => $this->input->post('merk'),
			'sumber' => $this->input->post('sumber'),
			'jam_pengamatan' => $this->input->post('jam_pengamatan'),
			// 'situasi' => $this->input->post('situasi'),
			'nama_usaha' => $this->input->post('nama_usaha'),
			'status_wp' => $this->input->post('status_wp'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'jenis_identitas' => $this->input->post('jenis_identitas'),
			'no_identitas' => $this->input->post('no_identitas'),
			// 'status_pkp' => $this->input->post('status_pkp'),
			// 'tingkat_potensial' => $this->input->post('tingkat_potensial'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			// 'sp2dk_nomor' => $this->input->post('sp2dk_nomor'),
			// 'sp2dk_tgl' => $this->input->post('sp2dk_tgl'),
			// 'sp2dk_respon' => $this->input->post('sp2dk_respon'),
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$this->session->set_flashdata('message', 'Data berhasil diubah');
		// redirect(site_url('data/data_lapangan'));
		redirect(site_url('data/data_lapangan'));
	}
	public function data_lapangan_batal($id)
	{
		$data = array(
			'verifikasi' => 2,
		);

		$this->db->where('id', $id);
		$this->db->update('capture_data', $data);

		$this->session->set_flashdata('message', 'Berhasil Dibatalkan');
		redirect(site_url('data/data_lapangan'));
	}
	public function data_lapangan_delete($id)
	{
		if ($this->session->userdata('level') >= 5 || $this->session->userdata('level') == 1) {
			$this->db->where('id', $id);
			$this->db->delete('capture_data');

			$this->session->set_flashdata('message', 'Berhasil Dihapus');
			redirect(site_url('data/data_lapangan'));
		} else {
			redirect(site_url('data/data_lapangan/'));
		}
	}
	//ganti ke query biasa
	public function ajax_npwp()
	{
		$npwp = str_replace(array('.', '-'), '', $this->input->post('npwp'));
		$query = "SELECT
                npwpl,tanggal_daftar
                from data_wp
                where npwpf LIKE '$npwp%'
                LIMIT 3
                ";
		$data = $this->db->query($query)->result_array();
		echo json_encode($data);
	}

	public function verifikasi_ulang()
	{
		$jenis = $this->input->post('jenis_verifikasi');
		if ($jenis == 1) {
			$data = array(
				'verifikasi' => 0,
			);
			$this->session->set_flashdata('message', 'Berhasil mengajukan verifikasi material ulang');
		} else {
			$data = array(
				'verifikasi_formal' => 0,
			);
			$this->session->set_flashdata('message', 'Berhasil mengajukan verifikasi formal ulang');
		}

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);
		redirect(site_url('data/data_lapangan'));
	}

	// ===============================================================
	// ============= END EDIT DATA LAPANGAN ======================
	// ===============================================================


	// ===============================================================
	// ============= Verifikasi Material ==========================
	// ===============================================================

	public function verifikasi_material($kategori = 0)
	{
		$data['title'] = "Verifikasi Material";
		$seksi_id = $this->session->userdata('seksi_id');
		$user_level = $this->session->userdata('level');
		if ($user_level == 3 || $user_level == 4) {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
							 	where a.verifikasi = '$kategori' AND b.seksi_id = '$seksi_id'
                order by a.verifikasi ASC, a.tanggal desc
                ";
		} else {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
							 	where a.verifikasi = '$kategori'
                order by a.verifikasi ASC, a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'verifikasi_material/verifikasi_material_list', $data);
	}

	public function verifikasi_material_read($id)
	{
		$data['title'] = "Verifikasi Material";
		$query = "SELECT
                a.*
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.id desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row();
		// echo $data['data']->UUID;
		$data['alasan'] = $this->Data_model->get_alasan($data['data']->id, 1);
		$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
		$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

		$this->template->load('template/backend/dashboard', 'verifikasi_material/verifikasi_material_read', $data);
	}

	public function verifikasi_material_verif($id)
	{

		$data['title'] = "Verifikasi Material";
		$query = "SELECT
                a.*
								,b.nama as nama_pet
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.verifikasi desc, a.tanggal desc
                ";
		$row = $this->db->query($query)->row();
		$data['data'] = array(
			'title' => "Edit Data Lapangan",
			'button' => 'Simpan',
			'action' => site_url('data/data_lapangan_verifikasi'),
			'search' => site_url('data/data_lapangan_search'),
			'id' => set_value('id', $row->id),
			'npwp' => set_value('npwp', $row->npwp),
			'status_npwp' => set_value('status_npwp', $row->status_npwp),
			'tgl_terdaftar_npwp' => set_value('tgl_terdaftar_npwp', $row->tgl_terdaftar_npwp),
			'no_st' => set_value('no_st', $row->no_st),
			'dalam_rangka' => set_value('dalam_rangka', $row->dalam_rangka),
			'nama_pet' => set_value('nama_pet', $row->nama_pet),
			'jenis_lokasi' => set_value('jenis_lokasi', $row->jenis_lokasi),
			'user_id' => set_value('user_id', $row->user_id),
			'tanggal' => set_value('tanggal', $row->tanggal),
			'lokasi_lat' => set_value('lokasi_lat', $row->lokasi_lat),
			'lokasi_long' => set_value('lokasi_long', $row->lokasi_long),
			'nama_jalan' => set_value('nama_jalan', $row->nama_jalan),
			'rt' => set_value('rt', $row->rt),
			'rw' => set_value('rw', $row->rw),
			'kecamatan' => set_value('kecamatan', $row->kec),
			'kelurahan' => set_value('kelurahan', $row->kel),
			'klu' => set_value('klu', $row->klu),
			'jenis_data' => set_value('jenis_data', $row->jenis_data),
			'klasifikasi_data' => set_value('klasifikasi_data', $row->klasifikasi_data),
			'nama_data' => set_value('nama_data', $row->nama_data),
			'uraian_data' => set_value('uraian_data', $row->uraian_data),
			'tahun_perolehan' => set_value('tahun_perolehan', $row->tahun_perolehan),
			'kegiatan' => set_value('kegiatan', $row->kegiatan),
			'merk' => set_value('merk', $row->merk),
			'sumber' => set_value('sumber', $row->sumber),
			'jam_pengamatan' => set_value('jam_pengamatan', $row->jam_pengamatan),
			// 'situasi' => set_value('situasi', $row->situasi),
			'omzet' => set_value('omzet', $row->omzet),
			'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
			'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
			'jenis_identitas' => set_value('jenis_identitas', $row->jenis_identitas),
			'no_identitas' => set_value('no_identitas', $row->no_identitas),
			'status_wp' => set_value('status_wp', $row->status_wp),
			'email' => set_value('email', $row->email),
			'no_telp' => set_value('no_telp', $row->no_telp),
			// 'status_pkp' => set_value('status_pkp', $row->status_pkp),
			'verifikasi' => set_value('verifikasi', $row->verifikasi),
			'verifikasi_formal' => set_value('verifikasi_formal', $row->verifikasi_formal),
			// 'tingkat_potensial' => set_value('tingkat_potensial', $row->tingkat_potensial),
			'sp2dk_nomor' => set_value('sp2dk_nomor', $row->sp2dk_nomor),
			// 'sp2dk_tgl' => set_value('sp2dk_tgl', $row->sp2dk_tgl),
			// 'sp2dk_respon' => set_value('sp2dk_respon', $row->sp2dk_respon),
			'UUID' => set_value('UUID', $row->UUID)
		);

		$data['alasan'] = $this->Data_model->get_alasan($data['data']['id'], 1);
		$data['komentar'] = $this->Data_model->get_komentar($data['data']['UUID']);
		$data['foto'] = $this->Data_model->get_foto($data['data']['UUID']);

		$this->template->load('template/backend/dashboard', 'verifikasi_material/verifikasi_material_form', $data);
	}

	public function verifikasi_material_verifikasi()
	{
		$data = array(
			// 'id' => $this->input->post('id'),
			// 'npwp' => $this->input->post('npwp'),
			// 'tgl_terdaftar_npwp' => $this->input->post('tgl_terdaftar_npwp'),
			'verifikasi' => 1,
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$alasan = $this->db->select('id')
			->from('alasan_verifikasi')
			->where('capture_id', $this->input->post('id'))
			->where('jenis_verifikasi', 1)
			->get()
			->row_array();
		if (!empty($alasan)) {
			$this->db->where('capture_id', $this->input->post('id'));
			$this->db->where('jenis_verifikasi', 1);
			$this->db->delete('alasan_verifikasi');
		}
		$this->session->set_flashdata('message', 'Berhasil Diverifikasi');
		redirect(site_url('data/verifikasi_material'));
	}
	public function verifikasi_material_batal()
	{
		$data = array(
			'verifikasi' => 2,
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$data = array(
			'jenis_verifikasi' => '1',
			'alasan' => $this->input->post('alasan')
		);
		$alasan = $this->db->select('id')
			->from('alasan_verifikasi')
			->where('capture_id', $this->input->post('id'))
			->where('jenis_verifikasi', $data['jenis_verifikasi'])
			->get()
			->row_array();
		if (!empty($alasan)) {
			$this->db->where('capture_id', $this->input->post('id'));
			$this->db->where('jenis_verifikasi', $data['jenis_verifikasi']);
			$this->db->update('alasan_verifikasi', $data);
		} else {
			$data['capture_id'] = $this->input->post('id');
			$this->db->insert('alasan_verifikasi', $data);
		}


		$this->session->set_flashdata('message', 'Data telah dibatalkan');
		redirect(site_url('data/verifikasi_material'));
	}
	public function verifikasi_material_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('capture_data');

		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('data/verifikasi_material'));
	}

	// ===============================================================
	// ============= END Verifikasi Material =========================
	// ===============================================================

	// ===============================================================
	// ============= Percetakan Form KPDL ==========================
	// ===============================================================

	public function percetakan_form_kpdl()
	{
		$data['title'] = "Percetakan Form KPDL";
		$user_id = $this->session->userdata('id');
		$user_level = $this->session->userdata('level');
		if ($user_level >= 5) {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
								where a.user_id = '$user_id' AND a.verifikasi = 1 AND a.tindak_lanjut = 0
                order by a.verifikasi desc, a.tanggal desc
                ";
		} else {
			$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
								where a.verifikasi = 1 AND a.tindak_lanjut = 0
                order by a.verifikasi desc, a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'percetakan_form_kpdl/percetakan_form_kpdl_list', $data);
	}

	public function percetakan_form_kpdl_read($id)
	{
		$data['title'] = "Percetakan Form KPDL";
		$query = "SELECT
                a.*
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.id desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row();
		// echo $data['data']->UUID;
		$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
		$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

		$this->template->load('template/backend/dashboard', 'percetakan_form_kpdl/percetakan_form_kpdl_read', $data);
	}


	// ===============================================================
	// ============= Verifikasi Formal ==========================
	// ===============================================================

	public function verifikasi_formal($kategori = 0)
	{
		$data['title'] = "Verifikasi Formal";
		$query = "SELECT
                a.*
                from capture_data a
                join user b on b.id = a.user_id
								where a.verifikasi = 1 AND a.verifikasi_formal = '$kategori'
                order by a.verifikasi desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'verifikasi_formal/verifikasi_formal_list', $data);
	}

	public function verifikasi_formal_read($id)
	{
		$data['title'] = "Verifikasi Formal";
		$query = "SELECT
                a.*
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.id desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row();
		// echo $data['data']->UUID;
		$data['alasan'] = $this->Data_model->get_alasan($data['data']->id, 2);
		$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
		$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

		$this->template->load('template/backend/dashboard', 'verifikasi_formal/verifikasi_formal_read', $data);
	}

	public function verifikasi_formal_verif($id)
	{
		$data['title'] = "Verifikasi Formal";
		$query = "SELECT
                a.*
								,b.nama as nama_pet
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.verifikasi desc, a.tanggal desc
                ";
		$row = $this->db->query($query)->row();
		$data['data'] = array(
			'title' => "Edit Data Lapangan",
			'button' => 'Simpan',
			'action' => site_url('data/data_lapangan_verifikasi'),
			'search' => site_url('data/data_lapangan_search'),
			'id' => set_value('id', $row->id),
			'npwp' => set_value('npwp', $row->npwp),
			'status_npwp' => set_value('status_npwp', $row->status_npwp),
			'tgl_terdaftar_npwp' => set_value('tgl_terdaftar_npwp', $row->tgl_terdaftar_npwp),
			'no_st' => set_value('no_st', $row->no_st),
			'dalam_rangka' => set_value('dalam_rangka', $row->dalam_rangka),
			'nama_pet' => set_value('nama_pet', $row->nama_pet),
			'jenis_lokasi' => set_value('jenis_lokasi', $row->jenis_lokasi),
			'user_id' => set_value('user_id', $row->user_id),
			'tanggal' => set_value('tanggal', $row->tanggal),
			'lokasi_lat' => set_value('lokasi_lat', $row->lokasi_lat),
			'lokasi_long' => set_value('lokasi_long', $row->lokasi_long),
			'nama_jalan' => set_value('nama_jalan', $row->nama_jalan),
			'rt' => set_value('rt', $row->rt),
			'rw' => set_value('rw', $row->rw),
			'kecamatan' => set_value('kecamatan', $row->kec),
			'kelurahan' => set_value('kelurahan', $row->kel),
			'klu' => set_value('klu', $row->klu),
			'jenis_data' => set_value('jenis_data', $row->jenis_data),
			'klasifikasi_data' => set_value('klasifikasi_data', $row->klasifikasi_data),
			'nama_data' => set_value('nama_data', $row->nama_data),
			'uraian_data' => set_value('uraian_data', $row->uraian_data),
			'tahun_perolehan' => set_value('tahun_perolehan', $row->tahun_perolehan),
			'kegiatan' => set_value('kegiatan', $row->kegiatan),
			'merk' => set_value('merk', $row->merk),
			'sumber' => set_value('sumber', $row->sumber),
			'jam_pengamatan' => set_value('jam_pengamatan', $row->jam_pengamatan),
			// 'situasi' => set_value('situasi', $row->situasi),
			'omzet' => set_value('omzet', $row->omzet),
			'nama_usaha' => set_value('nama_usaha', $row->nama_usaha),
			'kewarganegaraan' => set_value('kewarganegaraan', $row->kewarganegaraan),
			'jenis_identitas' => set_value('jenis_identitas', $row->jenis_identitas),
			'no_identitas' => set_value('no_identitas', $row->no_identitas),
			'status_wp' => set_value('status_wp', $row->status_wp),
			'email' => set_value('email', $row->email),
			'no_telp' => set_value('no_telp', $row->no_telp),
			// 'status_pkp' => set_value('status_pkp', $row->status_pkp),
			'verifikasi' => set_value('verifikasi', $row->verifikasi),
			'verifikasi_formal' => set_value('verifikasi_formal', $row->verifikasi_formal),
			// 'tingkat_potensial' => set_value('tingkat_potensial', $row->tingkat_potensial),
			'sp2dk_nomor' => set_value('sp2dk_nomor', $row->sp2dk_nomor),
			// 'sp2dk_tgl' => set_value('sp2dk_tgl', $row->sp2dk_tgl),
			// 'sp2dk_respon' => set_value('sp2dk_respon', $row->sp2dk_respon),
			'UUID' => set_value('UUID', $row->UUID)
		);

		$data['alasan'] = $this->Data_model->get_alasan($data['data']['id'], 2);
		$data['komentar'] = $this->Data_model->get_komentar($data['data']['UUID']);
		$data['foto'] = $this->Data_model->get_foto($data['data']['UUID']);


		$this->template->load('template/backend/dashboard', 'verifikasi_formal/verifikasi_formal_form', $data);
	}

	public function verifikasi_formal_verifikasi()
	{
		$data = array(
			// 'id' => $this->input->post('id'),
			// 'npwp' => $this->input->post('npwp'),
			// 'tgl_terdaftar_npwp' => $this->input->post('tgl_terdaftar_npwp'),

			'verifikasi_formal' => 1,
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$alasan = $this->db->select('id')
			->from('alasan_verifikasi')
			->where('capture_id', $this->input->post('id'))
			->where('jenis_verifikasi', 2)
			->get()
			->row_array();
		if (!empty($alasan)) {
			$this->db->where('capture_id', $this->input->post('id'));
			$this->db->where('jenis_verifikasi', 2);
			$this->db->delete('alasan_verifikasi');
		}

		$this->session->set_flashdata('message', 'Berhasil Diverifikasi');
		redirect(site_url('data/verifikasi_formal'));
	}
	public function verifikasi_formal_batal()
	{
		$data = array(
			'verifikasi_formal' => 2,
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$data = array(
			'jenis_verifikasi' => '2',
			'alasan' => $this->input->post('alasan')
		);
		$alasan = $this->db->select('id')
			->from('alasan_verifikasi')
			->where('capture_id', $this->input->post('id'))
			->where('jenis_verifikasi', $data['jenis_verifikasi'])
			->get()
			->row_array();
		if (!empty($alasan)) {
			$this->db->where('capture_id', $this->input->post('id'));
			$this->db->where('jenis_verifikasi', $data['jenis_verifikasi']);
			$this->db->update('alasan_verifikasi', $data);
		} else {
			$data['capture_id'] = $this->input->post('id');
			$this->db->insert('alasan_verifikasi', $data);
		}

		$this->session->set_flashdata('message', 'Data telah dibatalkan');
		redirect(site_url('data/verifikasi_formal'));
	}
	public function verifikasi_formal_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('capture_data');

		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('data/verifikasi_formal'));
	}

	// ===============================================================
	// ============= END Verifikasi Formal =========================
	// ===============================================================

	// ===============================================================
	// ============= TINDAK LANJUT DATA LAPANGAN =====================
	// ===============================================================

	public function tindak_lanjut($kategori = 0)
	{
		$data['title'] = "Tindak Lanjut SP2DK-LHP2DK";
		$user_ip = $this->session->userdata('ip');
		$user_level = $this->session->userdata('level');
		if ($user_level == 5 || $user_level >= 7) {
			$query = "SELECT
                a.*, b.nama as user
                from capture_data a
                join user b on b.id = a.user_id
                where a.verifikasi = 1 AND a.verifikasi_formal = 1 AND a.tindak_lanjut = '$kategori' AND a.ip_ketua = '$user_ip'
                order by a.verifikasi desc, a.tanggal desc
                ";
		} else {
			$query = "SELECT
                a.*, b.nama as user
                from capture_data a
                join user b on b.id = a.user_id
                where a.verifikasi = 1 AND a.verifikasi_formal = 1 AND a.tindak_lanjut = '$kategori'
                order by a.verifikasi desc, a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'tindak_lanjut/tindak_lanjut_list', $data);
	}

	public function tindak_lanjut_read($id)
	{
		$data['title'] = "Tindak Lanjut SP2DK-LHP2DK";
		$query = "SELECT
                a.*
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.verifikasi desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row();

		$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
		$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);

		$this->template->load('template/backend/dashboard', 'tindak_lanjut/tindak_lanjut_read', $data);
	}

	public function tindak_lanjut_update($id)
	{
		$data['title'] = "Tindak Lanjut SP2DK-LHP2DK";
		$query = "SELECT
                a.*
								,b.nama as nama_pet
                ,c.nama as kecamatan
                ,d.nama as kelurahan
                from capture_data a
                join user b on b.id = a.user_id
                join kecamatan c on c.id = a.kec
                join kelurahan d on d.id = a.kel
                where a.id = '$id'
                order by a.verifikasi desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row_array();
		$data['action'] = site_url('data/tindak_lanjut_save');
		$data['button'] = "Simpan";

		$data['id'] = $data['data']['id'];
		$data['sp2dk_nomor'] = $data['data']['sp2dk_nomor'];
		$data['sp2dk_potensi'] = $data['data']['sp2dk_potensi'];
		$data['sp2dk_pembayaran'] = $data['data']['sp2dk_pembayaran'];
		$row = $this->db->select('tanggal_sp2dk,tahun_pajak_sp2dk')
			->from('reff_sp2dk')
			->where('reff_sp2dk.nomor_sp2dk', $data['data']['sp2dk_nomor'])
			->get()
			->row_array();
		if (!empty($row)) {
			$data['sp2dk_tgl'] = $row['tanggal_sp2dk'];
			$data['sp2dk_tahun_pajak'] = $row['tahun_pajak_sp2dk'];
		} else {
			$data['sp2dk_tgl'] = "";
			$data['sp2dk_tahun_pajak'] = "";
		}
		// $data['sp2dk_jenis_pajak'] = $data['data']->sp2dk_jenis_pajak;
		// $data['sp2dk_masa_pajak'] = $data['data']->sp2dk_masa_pajak;

		$data['komentar'] = $this->Data_model->get_komentar($data['data']['UUID']);
		$data['foto'] = $this->Data_model->get_foto($data['data']['UUID']);

		$this->template->load('template/backend/dashboard', 'tindak_lanjut/tindak_lanjut_form', $data);
	}


	// public function tindak_lanjut_rekam($id)
	// {
	// 	$data['title'] = "Tindak Lanjut Data SP2DK-LHP2DK";
	// 	$query = "SELECT
	//                a.*
	//                ,c.nama as kecamatan
	//                ,d.nama as kelurahan
	//                from capture_data a
	//                join user b on b.id = a.user_id
	//                join kecamatan c on c.id = a.kec
	//                join kelurahan d on d.id = a.kel
	//                where a.id = '$id'
	//                order by a.verifikasi desc, a.tanggal desc
	//                ";
	// 	$data['data'] = $this->db->query($query)->row();

	// 	$data['id'] = $data['data']->id;
	// 	$data['sp2dk_nomor'] = $data['data']->sp2dk_nomor;
	// 	$data['komentar'] = $this->Data_model->get_komentar($data['data']->UUID);
	// 	$data['foto'] = $this->Data_model->get_foto($data['data']->UUID);
	// 	$data['action'] = site_url('data/tindak_lanjut_save');
	// 	$data['button'] = "Simpan";

	// 	$this->template->load('template/backend/dashboard', 'tindak_lanjut/tindak_lanjut_rekam', $data);
	// }

	public function tindak_lanjut_save()
	{
		$data = array(
			'sp2dk_nomor' => $this->input->post('sp2dk_nomor'),
			'sp2dk_pembayaran' => $this->input->post('sp2dk_pembayaran'),
			'sp2dk_potensi' => $this->input->post('sp2dk_potensi'),
			// 'sp2dk_jenis_pajak' => $this->input->post('sp2dk_jenis_pajak'),
			// 'sp2dk_masa_pajak' => $this->input->post('sp2dk_masa_pajak'),

			'tindak_lanjut' => 1,
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('capture_data', $data);

		$this->session->set_flashdata('message', 'Berhasil ditindak lanjut');
		redirect(site_url('data/tindak_lanjut'));
	}

	public function ajax_sp2dk()
	{
		$sp2dk = str_replace(array('.', '-'), '', $this->input->post('sp2dk'));
		$query = "SELECT
                nomor_sp2dk,tanggal_sp2dk,estimasi_potensi_awal_sp2dk,tahun_pajak_sp2dk
                from reff_sp2dk
                where nomor_sp2dk LIKE '$sp2dk%'
                LIMIT 3
                ";
		$data = $this->db->query($query)->result_array();
		echo json_encode($data);
	}

	// ===============================================================
	// ============= END TINDAK LANJUT DATA LAPANGAN =================
	// ===============================================================

	// ===============================================================
	// =======================  MONITORING  ==========================
	// ===============================================================

	function monitoring_pengamatan_kecamatan()
	{
		$data['title'] = "Monitoring Data Pengamatan";
		$query = "SELECT
        b.nama as kecamatan, b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY kecamatan asc";
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'monitoring/pengamatan/data_pengamatan_kecamatan', $data);
	}

	function monitoring_pengamatan($id)
	{
		$data['title'] = "Monitoring Data Pengamatan";
		$query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan, b.id as kecamatan_id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id
				WHERE b.id = $id 
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";
		$data['data'] = $this->db->query($query)->result();
		$data['monitoring']['nama'] = $data['data']['0']->kecamatan;
		$data['monitoring']['id'] = $data['data']['0']->kecamatan_id;
		$this->template->load('template/backend/dashboard', 'monitoring/pengamatan/data_pengamatan', $data);
	}

	function monitoring_tindak_lanjut_pkd_kecamatan()
	{
		$data['title'] = "Monitoring Tindak Lanjut Penjamin Kualitas Data";
		$query = "SELECT
        b.nama as kecamatan,b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.verifikasi = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.verifikasi = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.verifikasi = '2', 1, NULL)) 'batal'
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY kecamatan asc";
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'monitoring/tindak_lanjut_PKD/data_tindak_lanjut_kecamatan', $data);
	}

	function monitoring_tindak_lanjut_pkd($id)
	{
		$data['title'] = "Monitoring Tindak Lanjut Penjamin Kualitas Data";
		$query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan, b.id as kecamatan_id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.verifikasi = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.verifikasi = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.verifikasi = '2', 1, NULL)) 'batal'
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id
				WHERE b.id = $id  
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";
		$data['data'] = $this->db->query($query)->result();
		$data['monitoring']['nama'] = $data['data']['0']->kecamatan;
		$data['monitoring']['id'] = $data['data']['0']->kecamatan_id;
		$this->template->load('template/backend/dashboard', 'monitoring/tindak_lanjut_PKD/data_tindak_lanjut', $data);
	}

	function monitoring_tindak_lanjut_sp2dk_kecamatan()
	{
		$data['title'] = "Monitoring Tindak Lanjut SP2DK-DSE";
		$query = "SELECT
        b.nama as kecamatan, b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as potensi
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY kecamatan asc";
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'monitoring/tindak_lanjut_sp2dk/data_tindak_lanjut_sp2dk_kecamatan', $data);
	}

	function monitoring_tindak_lanjut_sp2dk($id)
	{
		$data['title'] = "Monitoring Tindak Lanjut SP2DK-DSE";
		$query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan, b.id as kecamatan_id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as potensi
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id
				WHERE b.id = $id  
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";
		$data['data'] = $this->db->query($query)->result();
		$data['monitoring']['nama'] = $data['data']['0']->kecamatan;
		$data['monitoring']['id'] = $data['data']['0']->kecamatan_id;
		$this->template->load('template/backend/dashboard', 'monitoring/tindak_lanjut_sp2dk/data_tindak_lanjut_sp2dk', $data);
	}

	function monitoring_kinerja()
	{
		$data['title'] = "Monitoring Kinerja Individu";
		$query = "SELECT
        a.nama
        , COUNT(b.id) as jumlah_tagging
        ,COUNT(IF(b.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(b.tindak_lanjut = '0', 1, NULL)) 'belum'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as potensi
        FROM capture_data b 
        left JOIN user a on b.user_id=a.id
        GROUP BY a.id
                ";
		$data['data'] = $this->db->query($query)->result();

		$this->template->load('template/backend/dashboard', 'monitoring/kinerja/data_kinerja', $data);
	}



	// ===============================================================
	// =======================  END MONITORING  ======================
	// ===============================================================

	public function hapus_foto($id)
	{
		$this->db->where('id_foto', $id);
		$this->db->delete('foto');

		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('data/data_lapangan'));
	}
}
