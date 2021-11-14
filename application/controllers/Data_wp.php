<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Data_wp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->database();
	}

	public function index()
	{
		$data['title'] = "Data WP";
		$data['data'] = $this->db->select(
			' 
			data_wp.id as data_id,
			data_wp.tanggal_daftar, 
			data_wp.npwp as npwp, 
			data_wp.nama_wp as nama, 
			jenis_wp.nama as jenis, 
			status_wp.nama as status'
		)
			->from('data_wp')
			->join('jenis_wp', 'jenis_wp.id = data_wp.jenis_wp', 'left')
			->join('status_wp', 'status_wp.id = data_wp.status_wp', 'left')
			->order_by('data_wp.id', 'ASC')
			->get()
			->result();
		$this->template->load('template/backend/dashboard', 'data_wp/data_wp_list', $data);
	}

	public function read($id)
	{
		$data['title'] = "Lihat Data WP";
		$data['data'] = $this->db->select(
			'
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
			data_wp.nomor_identitas,      
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
			data_wp.nama_js'
		)
			->from('data_wp')
			->join('kecamatan', 'kecamatan.id = data_wp.kecamatan', 'left')
			->join('kelurahan', 'kelurahan.id = data_wp.kelurahan', 'left')
			->join('jenis_wp', 'jenis_wp.id = data_wp.jenis_wp', 'left')
			->join('status_wp', 'status_wp.id = data_wp.status_wp', 'left')
			->where('data_wp.id', $id)
			->order_by('data_wp.id', 'ASC')
			->get()
			->row();
		if ($data['data']) {
			$this->template->load('template/backend/dashboard', 'data_wp/data_wp_read', $data);
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data_wp'));
		}
	}

	public function read_ajax()
	{
		$data = $this->db->select('
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
			data_wp.nomor_identitas,      
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
			data_wp.nama_js')
			->from('data_wp')
			->join('kecamatan', 'kecamatan.id = data_wp.kecamatan', 'left')
			->join('kelurahan', 'kelurahan.id = data_wp.kelurahan', 'left')
			->join('jenis_wp', 'jenis_wp.id = data_wp.jenis_wp', 'left')
			->join('status_wp', 'status_wp.id = data_wp.status_wp', 'left')
			->where('data_wp.id', $this->input->post('id'))
			->get()
			->result_array();

		echo json_encode($data);
	}

	public function create()
	{
		$this->_checkuser();
		$status_wp = "SELECT * from status_wp order by nama asc";
		$data_status = $this->db->query($status_wp)->result();

		$jenis_wp = "SELECT * from jenis_wp order by nama asc";
		$data_jenis = $this->db->query($jenis_wp)->result();

		$kecamatan = "SELECT * from kecamatan order by nama asc";
		$data_kecamatan = $this->db->query($kecamatan)->result();

		$kelurahan = "SELECT * from kelurahan order by nama asc";
		$data_kelurahan = $this->db->query($kelurahan)->result();


		$data = array(
			'button' => 'Tambah',
			'action' => site_url('data_wp/create_action'),
			'id' => set_value('id'),
			'npwp' => set_value('npwp'),
			'npwpf' => set_value('npwpl',),
			'npwpl' => set_value('npwpf',),
			'nama' => set_value('nama',),
			'tanggal_daftar' => set_value('tanggal_daftar',),
			'tanggal_pindah' => set_value('tanggal_pindah',),
			'tanggal_lahir' => set_value('tanggal_lahir',),
			'kd_kpp' => set_value('kd_kpp',),
			'kd_cabang' => set_value('kd_cabang',),
			'alamat' => set_value('alamat',),
			'rw' => set_value('rw',),
			'kota' => set_value('kota',),
			'kode_pos' => set_value('kode_pos',),
			'nomor_telepon' => set_value('nomor_telepon',),
			'nomor_fax' => set_value('nomor_fax',),
			'email' => set_value('email',),
			'nomor_identitas' => set_value('nomor_identitas',),
			'status_wp' => set_value('status',),
			'data_status' => $data_status,
			'jenis_wp' => set_value('jenis',),
			'data_jenis' => $data_jenis,
			'kode_klu' => set_value('kode_klu',),
			'tanggal_pkp' => set_value('tanggal_pkp',),
			'kelurahan' => set_value('kelurahan',),
			'data_kelurahan' => $data_kelurahan,
			'kecamatan' => set_value('kecamatan',),
			'data_kecamatan' => $data_kecamatan,
			'provinsi' => set_value('provinsi',),
			'bentuk_hukum' => set_value('bentuk_hukum',),
			'mata_uang' => set_value('mata_uang',),
			'no_skt' => set_value('no_skt',),
			'no_pkp' => set_value('no_pkp',),
			'tanggal_pkp_cabut' => set_value('tanggal_pkp_cabut',),
			'metode_perhitungan' => set_value('metode_perhitungan',),
			'nama_pj' => set_value('nama_pj',),
			'nama_js' => set_value('nama_js',),
		);
		$data['title'] = "Tambah Data WP";
		$this->template->load('template/backend/dashboard', 'data_wp/data_wp_form', $data);
	}

	public function create_action()
	{
		$this->_checkuser();
		$npwpl = $this->input->post('npwpf');
		$npwpf = str_replace(array('.', '-'), '', $npwpl);
		$npwp_id = $this->db->select('id')
			->from('data_wp')
			->where('npwp', $this->input->post('npwp'))
			->get()
			->row_array();
		if (!empty($npwp_id)) {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Data WP Sudah ada pada database');
			redirect(site_url('data_wp'));
		}
		$data = array(
			'npwp' => $this->input->post('npwp'),
			'npwpf' => $npwpf,
			'npwpl' => $npwpl,
			'nama_wp' => $this->input->post('nama'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar'),
			'tanggal_pindah' => $this->input->post('tanggal_pindah'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'kd_kpp' => $this->input->post('kd_kpp'),
			'kd_cabang' => $this->input->post('kd_cabang'),
			'alamat' => $this->input->post('alamat'),
			'rw' => $this->input->post('rw'),
			'kota' => $this->input->post('kota'),
			'kode_pos' => $this->input->post('kode_pos'),
			'nomor_telepon' => $this->input->post('nomor_telepon'),
			'nomor_fax' => $this->input->post('nomor_fax'),
			'email' => $this->input->post('email'),
			'nomor_identitas' => $this->input->post('nomor_identitas'),
			'status_wp' => $this->input->post('status'),
			'jenis_wp' => $this->input->post('jenis'),
			'kode_klu' => $this->input->post('kode_klu'),
			'tanggal_pkp' => $this->input->post('tanggal_pkp'),
			'kelurahan' => $this->input->post('kelurahan'),
			'kecamatan' => $this->input->post('kecamatan'),
			'provinsi' => $this->input->post('provinsi'),
			'bentuk_hukum' => $this->input->post('bentuk_hukum'),
			'mata_uang' => $this->input->post('mata_uang'),
			'no_skt' => $this->input->post('no_skt'),
			'no_pkp' => $this->input->post('no_pkp'),
			'tanggal_pkp_cabut' => $this->input->post('tanggal_pkp_cabut'),
			'metode_perhitungan' => $this->input->post('metode_perhitungan'),
			'nama_pj' => $this->input->post('nama_pj'),
			'nama_js' => $this->input->post('nama_js'),
		);;
		$this->db->insert('data_wp', $data);

		$this->session->set_flashdata('message', 'Berhasil Ditambah');
		redirect(site_url('data_wp'));
	}


	public function update($id)
	{
		$this->_checkuser();
		$row = $this->db->select(
			'
			*, 
			data_wp.id as id,
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
			data_wp.nomor_identitas,        
			data_wp.status_wp, 
			data_wp.jenis_wp,
			data_wp.kode_klu,
			data_wp.tanggal_pkp,
			data_wp.kelurahan,
			data_wp.kecamatan,
			data_wp.provinsi,
			data_wp.bentuk_hukum,
			data_wp.mata_uang,
			data_wp.no_skt, 
			data_wp.no_pkp,
			data_wp.no_pkp_cabut,
			data_wp.tanggal_pkp_cabut,
			data_wp.metode_perhitungan,
			data_wp.nama_pj,
			data_wp.nama_js'
		)
			->from('data_wp')
			->join('kecamatan', 'kecamatan.id = data_wp.kecamatan', 'left')
			->join('kelurahan', 'kelurahan.id = data_wp.kelurahan', 'left')
			->join('jenis_wp', 'jenis_wp.id = data_wp.jenis_wp', 'left')
			->join('status_wp', 'status_wp.id = data_wp.status_wp', 'left')
			->where('data_wp.id', $id)
			->order_by('data_wp.id', 'ASC')
			->get()
			->row();
		$status_wp = "SELECT * from status_wp order by nama asc";
		$data_status = $this->db->query($status_wp)->result();

		$jenis_wp = "SELECT * from jenis_wp order by nama asc";
		$data_jenis = $this->db->query($jenis_wp)->result();

		$kecamatan = "SELECT * from kecamatan order by nama asc";
		$data_kecamatan = $this->db->query($kecamatan)->result();

		if (empty($row->kecamatan || $row->kelurahan)) {  //if 1
			$kelurahan = "SELECT * from kelurahan order by nama asc";
			$data_kelurahan = $this->db->query($kelurahan)->result();
		} else {  //just use else instead of 2nd if
			$kelurahan = "SELECT * from kelurahan where kecamatan_id=" . $row->kecamatan;
			$data_kelurahan = $this->db->query($kelurahan)->result();
		}

		if ($row) {

			$npwpf = str_replace(array('.', '-'), '', $row->npwpl);
			$data = array(
				'button' => 'Ubah',
				'action' => site_url('data_wp/update_action'),
				'id' => set_value('id', $row->id),
				'npwp' => set_value('npwp', $row->npwp),
				'npwpf' => set_value('npwpl', $npwpf),
				'npwpl' => set_value('npwpf', $row->npwpf),
				'nama' => set_value('nama', $row->nama),
				'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
				'tanggal_pindah' => set_value('tanggal_pindah', $row->tanggal_pindah),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'kd_kpp' => set_value('kd_kpp', $row->kd_kpp),
				'kd_cabang' => set_value('kd_cabang', $row->kd_cabang),
				'alamat' => set_value('alamat', $row->alamat),
				'rw' => set_value('rw', $row->rw),
				'kota' => set_value('kota', $row->kota),
				'kode_pos' => set_value('kode_pos', $row->kode_pos),
				'nomor_telepon' => set_value('nomor_telepon', $row->nomor_telepon),
				'nomor_fax' => set_value('nomor_fax', $row->nomor_fax),
				'email' => set_value('email', $row->email),
				'nomor_identitas' => set_value('nomor_identitas', $row->nomor_identitas),
				'status_wp' => set_value('status', $row->status_wp),
				'data_status' => $data_status,
				'jenis_wp' => set_value('jenis', $row->jenis_wp),
				'data_jenis' => $data_jenis,
				'kode_klu' => set_value('kode_klu', $row->kode_klu),
				'tanggal_pkp' => set_value('tanggal_pkp', $row->tanggal_pkp),
				'kelurahan' => set_value('kelurahan', $row->kelurahan),
				'data_kelurahan' => $data_kelurahan,
				'kecamatan' => set_value('kecamatan', $row->kecamatan),
				'data_kecamatan' => $data_kecamatan,
				'provinsi' => set_value('provinsi', $row->provinsi),
				'bentuk_hukum' => set_value('bentuk_hukum', $row->bentuk_hukum),
				'mata_uang' => set_value('mata_uang', $row->mata_uang),
				'no_skt' => set_value('no_skt', $row->no_skt),
				'no_pkp' => set_value('no_pkp', $row->no_pkp),
				'tanggal_pkp_cabut' => set_value('tanggal_pkp_cabut', $row->tanggal_pkp_cabut),
				'metode_perhitungan' => set_value('metode_perhitungan', $row->metode_perhitungan),
				'nama_pj' => set_value('nama_pj', $row->nama_pj),
				'nama_js' => set_value('nama_js', $row->nama_js),
			);
			$data['title'] = "Ubah Data WP";
			$this->template->load('template/backend/dashboard', 'data_wp/data_wp_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('data_wp'));
		}
	}

	public function update_action()
	{
		$this->_checkuser();
		$npwpl = $this->input->post('npwpf');
		$npwpf = str_replace(array('.', '-'), '', $npwpl);
		$data = array(
			'npwp' => $this->input->post('npwp'),
			'npwpf' => $npwpf,
			'npwpl' => $npwpl,
			'nama_wp' => $this->input->post('nama'),
			'tanggal_daftar' => $this->input->post('tanggal_daftar'),
			'tanggal_pindah' => $this->input->post('tanggal_pindah'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'kd_kpp' => $this->input->post('kd_kpp'),
			'kd_cabang' => $this->input->post('kd_cabang'),
			'alamat' => $this->input->post('alamat'),
			'rw' => $this->input->post('rw'),
			'kota' => $this->input->post('kota'),
			'kode_pos' => $this->input->post('kode_pos'),
			'nomor_telepon' => $this->input->post('nomor_telepon'),
			'nomor_fax' => $this->input->post('nomor_fax'),
			'email' => $this->input->post('email'),
			'nomor_identitas' => $this->input->post('nomor_identitas'),
			'status_wp' => $this->input->post('status'),
			'jenis_wp' => $this->input->post('jenis'),
			'kode_klu' => $this->input->post('kode_klu'),
			'tanggal_pkp' => $this->input->post('tanggal_pkp'),
			'kelurahan' => $this->input->post('kelurahan'),
			'kecamatan' => $this->input->post('kecamatan'),
			'provinsi' => $this->input->post('provinsi'),
			'bentuk_hukum' => $this->input->post('bentuk_hukum'),
			'mata_uang' => $this->input->post('mata_uang'),
			'no_skt' => $this->input->post('no_skt'),
			'no_pkp' => $this->input->post('no_pkp'),
			'tanggal_pkp_cabut' => $this->input->post('tanggal_pkp_cabut'),
			'metode_perhitungan' => $this->input->post('metode_perhitungan'),
			'nama_pj' => $this->input->post('nama_pj'),
			'nama_js' => $this->input->post('nama_js'),
		);

		$npwp_user = $this->db->select('npwp')
			->from('data_wp')
			->where('id', $this->input->post('id'))
			->get()
			->row_array();

			if ($this->input->post('npwp') != $npwp_user['npwp']){
				$npwp_id = $this->db->select('id')
									->from('data_wp')
									->where('npwp', $this->input->post('npwp'))
									->get()
									->row_array();
				if (!empty($npwp_id)) {
							$this->session->set_flashdata('error', 'error');
							$this->session->set_flashdata('message', 'Data NPWP Sudah ada pada database');
							redirect(site_url('data_wp'));
				}
			}
			
		

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('data_wp', $data);

		$this->session->set_flashdata('message', 'Berhasil Diubah');
		redirect(site_url('data_wp'));
	}

	public function delete($id)
	{
		$this->_checkuser();
		$this->db->where('id', $id);
		$this->db->delete('data_wp');
		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('data_wp'));
	}

	private function _checkuser()
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('data_wp'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nip', 'nip', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		// $this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function import()
	{
		$this->_checkuser();
		// If import request is submitted
		if ($this->input->post('importSubmit')) {
			// Form field validation rules
			$this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');

			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				$insertCount = $updateCount = $rowCount = $notAddCount = 0;

				// If file uploaded
				if (is_uploaded_file($_FILES['file']['tmp_name'])) {
					// Load CSV reader library
					$this->load->library('CSVReader');

					// Parse data from CSV file
					$csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
					// Insert/update CSV data into database
					if (!empty($csvData)) {
						foreach ($csvData as $row) {
							$rowCount++;
							// Prepare data for DB insertion
							$dataReff_WP = array(
								'tanggal_daftar' => ($row['TANGGAL_DAFTAR'] != '') ? $this->_isDate($row['TANGGAL_DAFTAR']) : '',
								'tanggal_pindah' => ($row['TANGGAL_PINDAH'] != '') ? $this->_isDate($row['TANGGAL_PINDAH']) : '',
								'tanggal_lahir' => ($row['TANGGAL_LAHIR'] != '') ? $this->_isDate($row['TANGGAL_LAHIR']) : '',
								'npwp' => $row['NPWP'],
								'kd_kpp' => $row['KD_KPP'],
								'kd_cabang' => $row['KD_CABANG'],
								'npwpf' => $row['NPWPF'],
								'npwpl' => $row['NPWPL'],
								'nama_wp' => $row['NAMA_WP'],
								'alamat' => $row['ALAMAT'],
								'rw' => $row['RW'],
								'kota' => $row['KOTA'], // Static Depok?
								'kode_pos' => $row['KODE_POS'],
								'nomor_telepon' => $row['NOMOR_TELEPON'],
								'nomor_fax' => $row['NOMOR_FAX'],
								'email' => $row['EMAIL'],
								'nomor_identitas' => $row['NOMOR_IDENTITAS'],
								'jenis_wp' => $row['JENIS_WP'],
								'kode_klu' => $row['KODE_KLU'],
								'nama_klu' => $row['NAMA_KLU'],
								'tanggal_pkp' => ($row['TANGGAL_PKP'] != '') ? $this->_isDate($row['TANGGAL_PKP']) : '',
								'provinsi' => $row['PROPINSI'], // Static Jawa Barat?
								'bentuk_hukum' => $row['BENTUK_HUKUM'],
								'mata_uang' => $row['MATA_UANG'],
								'no_skt' => $row['NO_SKT'],
								'no_pkp' => $row['NO_PKP'],
								'no_pkp_cabut' => $row['NO_PKP_CABUT'],
								'tanggal_pkp_cabut' => ($row['TGL_PKP_CABUT'] != '') ? $this->_isDate($row['TGL_PKP_CABUT']) : '',
								'metode_perhitungan' => $row['METODE_PERHITUNGAN'],
								'nama_pj' => $row['NAMA_PJ'],
								'nama_js' => $row['NAMA_JS'],
							);

							$kel_kec = $this->db->select('id, kecamatan_id')
								->from('kelurahan')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['KELURAHAN']))
								->get()
								->row_array();

							$dataReff_WP['kelurahan'] = $kel_kec['id'];
							$dataReff_WP['kecamatan'] = $kel_kec['kecamatan_id'];
							$npwp_id = $this->db->select('id')
								->from('data_wp')
								->where('npwp', $dataReff_WP['npwp'])
								->get()
								->row_array();
							$status_wp = $this->db->select('id')
								->from('status_wp')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['STATUS_WP']))
								->get()
								->row_array();
							$dataReff_WP['status_wp'] = $status_wp['id'];
							$jenis_wp = $this->db->select('id')
								->from('jenis_wp')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['JENIS_WP']))
								->get()
								->row_array();
							$dataReff_WP['jenis_wp'] = $jenis_wp['id'];
							if (!empty($npwp_id)) {
								// update WP
								$this->db->where('npwp', $dataReff_WP['npwp']);
								$this->db->update('data_wp', $dataReff_WP);
								$updateCount++;
							} else {
								$this->db->insert('data_wp', $dataReff_WP);
								$insertCount++;
							}
						}

						// Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Data WP imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated (' . $updateCount . ') | Not Add Rows (' . $notAddCount . ')';

						$this->session->set_flashdata('message', $successMsg);
					}
				} else {
					$this->session->set_flashdata('message', 'Error on file upload, please try again.');
				}
			} else {
				$this->session->set_flashdata('message', 'Invalid file, please select only CSV file.');
			}
		}
		redirect('data_wp');
	}

	/*
     * Callback function to check file value and type during validation
     */
	public function file_check($str)
	{
		$allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel');
		if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
			$mime = get_mime_by_extension($_FILES['file']['name']);
			$fileAr = explode('.', $_FILES['file']['name']);
			$ext = end($fileAr);
			if (($ext == 'csv') && in_array($mime, $allowed_mime_types)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	private function _isDate($date)
	{
		if (date_create_from_format('d/m/Y', $date)) {
			return  date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d');
		} else if (date_create_from_format('d-m-Y', $date)) {
			return  date_format(date_create_from_format('d-m-Y', $date), 'Y-m-d');
		}
		return date('Y-m-d', ($date - (25567 + 2)) * 86400);
	}

	// public function get_autocomplete()
	// {
	// 	if (isset($_GET['term'])) {
	// 		$result = $this->search_kelurahan($_GET['term']);
	// 		if (count($result) > 0) {
	// 			foreach ($result as $row)
	// 				$arr_result[] = array(
	// 					// 'label'            => $row->nik . ' - ' . $row->nama,
	// 					'label'            => $row->nama,
	// 					'kelurahan_id'     => $row->id,
	// 					'nama'            => $row->nama,
	// 				);
	// 			echo json_encode($arr_result);
	// 		}
	// 	}
	// }

	function get_kelurahan()
	{
		$id = $this->input->post('id');
		$query = "SELECT
                *
                from kelurahan
                where kecamatan_id = '$id'
                order by kelurahan.nama asc
                ";
		// $data = $this->db->query($query);
		$data = $this->db->query($query)->result();

		echo json_encode($data);
	}
}
