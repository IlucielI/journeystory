<?php
class Cetak extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->database();
		$this->load->model('Data_model');
	}

	function pegawai()
	{
		$data['title'] = "Data Pegawai";
		// $query = "select
		// 			*
		// 			from user
		// 			where level = '2'
		// 		";		
		// $data['data'] = $this->db->query($query)->result();
		$data['data'] = $this->db->select('*,user.id as user_id, user.nama as nama,seksi.nama as seksi,jabatan.nama as jabatan, status_role.nama_status as status_role, status_fungsi.nama as fungsi')
			->from('user')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->join('jabatan', 'jabatan.id = user.jabatan_id', 'left')
			->join('status_role', 'user.status_role = status_role.id', 'left')
			->join('status_fungsi', 'user.fungsi_id = status_fungsi.id', 'left')
			->where('user.id !=', 1)
			->order_by('user.id', 'ASC')
			->get()
			->result();
		$this->load->view('cetak/pegawai', $data);
	}

	function data_wp()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$data['title'] = "Data WP";
		$data['data'] = $this->db->select('
			*, 
			data_wp.id as data_id,
			data_wp.tanggal_daftar, 
			data_wp.tanggal_pindah, 
			data_wp.tanggal_lahir, 
			data_wp.npwp as npwp, 
			data_wp.kd_kpp,
			data_wp.kd_cabang,
			data_wp.npwpf,
			data_wp.npwpl,    
			data_wp.nama_wp as nama, 
			data_wp.alamat,
			data_wp.rw,
			data_wp.kota,
			data_wp.kode_pos,
			data_wp.nomor_telepon,
			data_wp.nomor_fax,
			data_wp.email,       
			status_wp.nama as status, 
			jenis_wp.nama as jenis,
			data_wp.kode_klu,
			data_wp.tanggal_pkp,
			kelurahan.nama as kelurahan,
			kecamatan.nama as kecamatan,
			data_wp.provinsi,
			data_wp.bentuk_hukum,
			data_wp.mata_uang,
			data_wp.no_skt, 
			data_wp.no_pkp,
			data_wp.no_pkp_cabut,
			data_wp.tanggal_pkp_cabut,
			data_wp.metode_perhitungan,
			data_wp.nama_pj,
			data_wp.nama_js
		')
			->from('data_wp')
			->join('kecamatan', 'kecamatan.id = data_wp.kecamatan', 'left')
			->join('kelurahan', 'kelurahan.id = data_wp.kelurahan', 'left')
			->join('jenis_wp', 'jenis_wp.id = data_wp.jenis_wp', 'left')
			->join('status_wp', 'status_wp.id = data_wp.status_wp', 'left')
			->where('data_wp.tanggal_daftar >=', $from)
			->where('data_wp.tanggal_daftar <=', $to)
			->order_by('data_wp.id', 'ASC')
			->get()
			->result();
		if (!empty($data['data'])) {
			$this->load->view('cetak/data_wp', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data WP tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data_wp'));
		}
	}

	function data_lapangan()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$data['title'] = "Data Lapangan";
		$data['data'] = $this->db->select('
			capture_data.*,
			kecamatan.nama kecname,
			kelurahan.nama kelname,
			user.nama petugas
		')
			->from('capture_data')
			->join('kecamatan', 'kecamatan.id = capture_data.kec', 'left')
			->join('kelurahan', 'kelurahan.id = capture_data.kel', 'left')
			->join('user', 'user.id = capture_data.user_id', 'left')
			->where('capture_data.tanggal >=', $from)
			->where('capture_data.tanggal <=', $to)
			->order_by('capture_data.id', 'ASC')
			->get()
			->result();
		if (!empty($data['data'])) {
			$this->load->view('cetak/data_lapangan', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data lapangan tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data/data_lapangan'));
		}
	}

	function data_lapangan_id($id)
	{
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
		$data['title'] = "npwp - " . $data['data']->npwp;

		$this->load->view('cetak/data_lapangan_id', $data);
	}

	function sp2dk_lhp2dk()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$data['title'] = "Data Sp2dk";
		$data['data'] = $this->db->select('*,reff_sp2dk.id as id, npwpl.id as npwpl_id')
			->from('reff_sp2dk')
			->join('npwpl', 'npwpl.id = reff_sp2dk.npwpl_id', 'inner')
			->where('reff_sp2dk.tanggal_sp2dk >=', $from)
			->where('reff_sp2dk.tanggal_sp2dk <=', $to)
			->order_by('reff_sp2dk.id', 'ASC')
			->get()
			->result();
		if (!empty($data['data'])) {
			$this->load->view('cetak/sp2dk_lhp2dk', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data SP2DK tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('sp2dk_lhp2dk'));
		}
	}

	function wilayah()
	{
		$data['title'] = "Data Wilayah";
		$data['data'] = $this->db->select('wilayah.id, wilayah.rw ,kelurahan.nama as kelurahan_nama, kecamatan.nama as kecamatan_nama, user.nama as nama, wilayah.ip, seksi.nama as seksi')
			->from('wilayah')
			->join('kelurahan', 'kelurahan.id = wilayah.kelurahan_id', 'left')
			->join('kecamatan', 'kecamatan.id = kelurahan.kecamatan_id', 'left')
			->join('user', 'user.ip = wilayah.ip', 'left')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->order_by('wilayah.id', 'ASC')
			->get()
			->result();
		if (!empty($data['data'])) {
			$this->load->view('cetak/wilayah', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data wilayah tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('wilayah'));
		}
	}

	function rekam_penugasan()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$data['title'] = "Penugasan";

		// $data['title'] = "Data Rekam Penugasan";
		// $query = "SELECT
		//         a.no_st,a.tanggal
		//         ,b.nama as seksi, b.tipe as tipe
		//         ,e.nama as nama, e.ip
		//         ,c.nama as kec
		//         ,d.nama as kel
		//         from rekam_penugasan a
		//         join user e on e.id = a.user_id
		//         join seksi b on b.id = e.seksi_id
		//         join kecamatan c on c.id = e.kecamatan_id
		//         join kelurahan d on d.id = e.kelurahan_id
		//         order by a.tanggal desc, a.no_st asc
		//         ";
		// $data['data'] = $this->db->query($query)->result();

		$data['data'] =
			$this->db->select('no_st, tanggal, tgl_mulai_tugas, tgl_akhir_tugas, 
		user.ip as ip, user.nama as nama, lokasi')
			->from('rekam_penugasan')
			->join('user', 'cast(ref_ip as int) = cast(ip as int)', 'left')
			->where('rekam_penugasan.tanggal >=', $from)
			->where('rekam_penugasan.tanggal <=', $to)
			->order_by('tanggal', 'DESC', 'no_st', 'ASC')
			->get()
			->result();

		if (!empty($data['data'])) {

			$this->load->view('cetak/rekam_penugasan', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data penugasan tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data/rekam_penugasan'));
		}
	}

	function rekam_penugasan_tagging()
	{

		$st_query = $this->input->post('no_st');


		$data['title'] = "Data Rekam Penugasan";

		$data['data'] = $this->db->select('no_st, tanggal, tgl_mulai_tugas, tgl_akhir_tugas, 
		user.ip as ip, user.nama as nama, lokasi')
			->from('rekam_penugasan')
			->join('user', 'cast(ref_ip as int) = cast(ip as int)', 'left')
			->where('no_st', $st_query)
			->order_by('tanggal', 'DESC', 'no_st', 'ASC')
			->get()
			->result();

		$this->load->view('cetak/rekam_penugasan', $data);
	}

	function verifikasi_material()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$kategori = $this->input->post('kategori');
		$data['title'] = "Verifikasi Material";
		if ($this->input->post('kategori') != 3) {
			$query = "SELECT
				a.*, b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to' AND a.verifikasi = '$kategori'
				order by a.verifikasi desc, a.tanggal desc
                ";
		} else {
			$query = "SELECT
				a.*, b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to'
				order by a.verifikasi desc, a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		if (!empty($data['data'])) {
			$this->load->view('cetak/verifikasi_material', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data verifikasi material tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data/verifikasi_material'));
		}
	}


	function percetakan_form_kpdl($id)
	{
		$data['title'] = "Percetakan Form KPDL";
		$query = "SELECT
				a.*, b.nama , b.nip
				,c.nama as kelurahan
				,d.nama as kecamatan
				,e.nama as jabatan
				,f.tanggal as tanggal_penugasan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				left join jabatan e on e.id = b.jabatan_id
				left join rekam_penugasan f on f.no_st = a.no_st
				where a.id = '$id'
				order by a.verifikasi desc, a.tanggal desc
                ";
		$data['data'] = $this->db->query($query)->row_array();
		$data['kepala_kantor'] = $this->db->select('user.nama, jabatan.nama as jabatan')
				->from('user')
				->join('jabatan', 'user.jabatan_id = jabatan.id')
				->where('user.jabatan_id', 2)
				->get()
				->row_array();
		$data['atasan_langsung'] = $this->db->select('user.nama, jabatan.nama as jabatan')
				->from('user')
				->join('jabatan', 'user.jabatan_id = jabatan.id')
				->where('user.ip', $data['data']['ip_ketua'])
				->get()
				->row_array();	
		$data['foto'] = $this->Data_model->get_foto($data['data']['UUID']);
		$this->load->view('cetak/percetakan_form_kpdl', $data);
	}

	function verifikasi_formal()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$kategori = $this->input->post('kategori');
		$data['title'] = "Verifikasi Formal";
		if ($this->input->post('kategori') != 3) {
			$query = "SELECT
				a.*, b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to' AND a.verifikasi = 1 AND a.verifikasi_formal = '$kategori'
				order by a.verifikasi desc, a.tanggal desc";
		} else {
			$query = "SELECT
				a.*, b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to' AND a.verifikasi = 1
				order by a.verifikasi desc, a.tanggal desc";
		}

		$data['data'] = $this->db->query($query)->result();

		if (!empty($data['data'])) {
			$this->load->view('cetak/verifikasi_formal', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data verifikasi formal tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data/verifikasi_formal'));
		}
	}

	function tindak_lanjut()
	{
		$ex = explode(' s/d ', $this->input->post('date_range'));
		$from = date('Y-m-d', strtotime($ex[0]));
		$to = date('Y-m-d', strtotime($ex[1]));
		$kategori = $this->input->post('kategori');
		$data['title'] = "Tindak Lanjut SP2DK-DSE";
		if ($this->input->post('kategori') != 3) {
			$query = "SELECT
				a.*,b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to' AND a.verifikasi = 1 AND a.verifikasi_formal = 1 AND a.tindak_lanjut = '$kategori'
				order by a.verifikasi desc, a.tanggal desc
                ";
		} else {
			$query = "SELECT
				a.*,b.nama as user
				,c.nama as kelurahan
				,d.nama as kecamatan
				from capture_data a
				join user b on b.id = a.user_id
				left join kelurahan c on c.id = a.kel
				left join kecamatan d on d.id = a.kec
				where a.tanggal >= '$from' AND a.tanggal <= '$to' AND a.verifikasi = 1 AND a.verifikasi_formal = 1
				order by a.verifikasi desc, a.tanggal desc
                ";
		}
		$data['data'] = $this->db->query($query)->result();

		if (!empty($data['data'])) {
			$this->load->view('cetak/tindak_lanjut', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data tindak lanjut sp2dk tidak ada pada tanggal yang dimasukkan');
			redirect(site_url('data/tindak_lanjut'));
		}
	}

	function monitoring_pengamatan($id = false)
	{
		$data['fields'] = [
			'jumlah_tagging' => 'jml Tagging',
			'sudah' => 'Sudah TL',
			'belum' => 'Belum TL',
			'batal' => 'Dibatalkan'
		];
		if ($id) {
			$data['title'] = "Monitoring Data Pengamatan";
			$data['fields']['lokasi'] = 'Kelurahan';
			$query = "SELECT
					b.nama as kecamatan, a.nama as lokasi, b.id as kecamatan_id
					, COUNT(c.id) as jumlah_tagging
					,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
					,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
					,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
					from kelurahan a
					join kecamatan b on b.id=a.kecamatan_id
					left join capture_data c on c.kel = a.id
					WHERE b.id = $id 
					GROUP BY a.id
					ORDER BY kecamatan asc, lokasi asc
									";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = ' Kecamatan ' . $data['data']['0']['kecamatan'];
			$data['monitoring']['id'] = $data['data']['0']['kecamatan_id'];

			$this->load->view('cetak/monitoring', $data);
		} else {
			$data['title'] = "Monitoring Data Pengamatan";
			$data['fields']['lokasi'] = 'Kecamatan';
			$query = "SELECT
        b.nama as lokasi, b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY lokasi asc";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = '';
			$this->load->view('cetak/monitoring', $data);
		}
	}

	function monitoring_tindak_lanjut_pkd($id = false)
	{
		$data['fields'] = [
			'jumlah_tagging' => 'jml Tagging',
			'sudah' => 'Sudah Verif',
			'belum' => 'Belum Verif',
			'batal' => 'Dibatalkan'
		];
		if ($id) {
			$data['title'] = "Monitoring Tindak Lanjut Penjamin Kualitas Data";
			$data['fields']['lokasi'] = 'Kelurahan';
			$query = "SELECT
        b.nama as kecamatan, a.nama as lokasi, b.id as kecamatan_id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.verifikasi = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.verifikasi = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.verifikasi = '2', 1, NULL)) 'batal'
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id
				WHERE b.id = $id  
        GROUP BY a.id
        ORDER BY kecamatan asc, lokasi asc
                ";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = ' Kecamatan ' . $data['data']['0']['kecamatan'];
			$data['monitoring']['id'] = $data['data']['0']['kecamatan_id'];

			$this->load->view('cetak/monitoring', $data);
		} else {
			$data['title'] = "Monitoring Tindak Lanjut Penjamin Kualitas Data";
			$data['fields']['lokasi'] = 'Kecamatan';
			$query = "SELECT
        b.nama as lokasi,b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.verifikasi = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.verifikasi = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.verifikasi = '2', 1, NULL)) 'batal'
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY lokasi asc";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = '';
			$this->load->view('cetak/monitoring', $data);
		}
	}

	function monitoring_tindak_lanjut_sp2dk($id = false)
	{
		$data['fields'] = [
			'jumlah_tagging' => 'jml Tagging',
			'sudah' => 'Sudah SP2DK',
			'belum' => 'Belum SP2DK',
			'potensi' => 'Potensi',
			'pembayaran' => 'pembayaran',
			'sisa_potensi' => 'sisa potensi',
		];
		if ($id) {
			$data['title'] = "Monitoring Tindak Lanjut SP2DK-DSE";
			$data['fields']['nama'] = 'Kelurahan';
			$query = "SELECT
        b.nama as kecamatan, a.nama as nama, b.id as kecamatan_id
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
        ORDER BY kecamatan asc, nama asc";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = ' Kecamatan ' . $data['data']['0']['kecamatan'];
			$data['monitoring']['id'] = $data['data']['0']['kecamatan_id'];

			$this->load->view('cetak/monitoring_sp2dk-kinerja', $data);
		} else {
			$data['title'] = "Monitoring Tindak Lanjut SP2DK-DSE";
			$data['fields']['nama'] = 'Kecamatan';
			$query = "SELECT
        b.nama as nama, b.id as id
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as potensi
        from kecamatan b
        left join capture_data c on c.kec = b.id 
        GROUP BY b.id
        ORDER BY nama asc";
			$data['data'] = $this->db->query($query)->result_array();
			$data['monitoring']['nama'] = '';
			$this->load->view('cetak/monitoring_sp2dk-kinerja', $data);
		}
	}

	function monitoring_kinerja()
	{
		$data['fields'] = [
			'nama' => 'nama',
			'jumlah_tagging' => 'jml Tagging',
			'sudah' => 'Sudah SP2DK',
			'belum' => 'Belum SP2DK',
			'potensi' => 'Potensi',
			'pembayaran' => 'pembayaran',
			'sisa_potensi' => 'sisa potensi',
		];
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
        GROUP BY a.id";
		$data['data'] = $this->db->query($query)->result_array();
		$data['monitoring']['nama'] = '';
		$this->load->view('cetak/monitoring_sp2dk-kinerja', $data);
	}
}
