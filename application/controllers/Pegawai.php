<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Pegawai extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != true) {
			$url = base_url();
			redirect($url);
		};
		$this->load->database();;
	}

	public function index()
	{
		$data['title'] = "Data Pegawai";
		$data['data'] = $this->db->select('*,user.id as user_id, user.nama as nama,kecamatan.nama as kecamatan_nama,kelurahan.nama as kelurahan_nama, seksi.nama as seksi, jabatan.nama as jabatan
		, status_role.nama_status as status_role, status_fungsi.nama as fungsi')
			->from('user')
			->join('kecamatan', 'kecamatan.id = user.kecamatan_id', 'left')
			->join('kelurahan', 'kelurahan.id = user.kelurahan_id', 'left')
			->join('status_role', 'user.status_role = status_role.id', 'left')
			->join('status_fungsi', 'user.fungsi_id = status_fungsi.id', 'left')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->join('jabatan', 'jabatan.id = user.jabatan_id', 'left')
			->where('user.id !=', 1)
			->order_by('user.id', 'ASC')
			->get()
			->result();
		$this->template->load('template/backend/dashboard', 'pegawai/pegawai_list', $data);
	}

	public function read($id)
	{
		$data['title'] = "Lihat Data Pegawai";
		$data['data'] = $this->db->select('*, user.nama as nama, kelurahan.nama as kelurahan_nama,kecamatan.nama as kecamatan_nama,seksi.nama as seksi, jabatan.nama as jabatan')
			->from('user')
			->join('kecamatan', 'kecamatan.id = user.kecamatan_id', 'left')
			->join('kelurahan', 'kelurahan.id = user.kelurahan_id', 'left')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->join('jabatan', 'jabatan.id = user.jabatan_id', 'left')
			->where('user.id', $id)
			->order_by('user.id', 'ASC')
			->get()
			->row();
		if ($data['data']) {
			$this->template->load('template/backend/dashboard', 'pegawai/pegawai_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pegawai'));
		}
	}

	public function create()
	{
		$this->_checkuser();
		$query = "SELECT
        *
        from kecamatan
        order by nama asc
        ";
		$data_1 = $this->db->query($query)->result();

		$seksi = "SELECT
        *
        from seksi
        order by nama asc
        ";
		$jabatan = "SELECT
        *
        from jabatan
        order by nama asc
        ";
		$data_seksi = $this->db->query($seksi)->result();
		$data_jabatan = $this->db->query($jabatan)->result();
		$fungsi = "SELECT * from status_fungsi order by nama asc";
		$data_fungsi = $this->db->query($fungsi)->result();
		$role = "SELECT * from status_role order by nama_status asc";
		$data_role = $this->db->query($role)->result();
		$kecamatan = "SELECT * from kecamatan order by nama asc";
		$data_kec = $this->db->query($kecamatan)->result();
		$kelurahan = "SELECT * from kelurahan order by nama asc";
		$data_kel = $this->db->query($kelurahan)->result();
		$data = array(
			'kecamatan' => $data_1,
			'seksi' => $data_seksi,
			'fungsi' => $data_fungsi,
			'role' => $data_role,
			'jabatan' => $data_jabatan,
			'data_kecamatan' => $data_kec,
			'data_kelurahan' => $data_kel,
			'button' => 'Tambah Pegawai',
			'action' => site_url('pegawai/create_action'),
			'id' => set_value('id'),
			'ip' => set_value('ip'),
			'nip' => set_value('nip'),
			'nama' => set_value('nama'),
			'kelurahan' => set_value('kelurahan'),
			'jabatan_id' => set_value('jabatan_id'),
			'seksi_id' => set_value('seksi_id'),
			'fungsi_id' => set_value('fungsi_id'),
			'status_role' => set_value('status_role'),
			'handphone' => set_value('handphone'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'level' => set_value('level'),
		);
		$data['title'] = "Tambah Data Pegawai";
		$this->template->load('template/backend/dashboard', 'pegawai/pegawai_form', $data);
	}

	public function create_action()
	{
		$this->_checkuser();
		$this->_rules();
		if ($this->form_validation->run() == false) {
			$this->create();
		} else {
			$password = md5($this->input->post('password'));
			$password_default = 0;
			if ($password == "dcdfed53bdb73ceb4931d10829e4eae2") {
				$password_default = 1;
			}
			$ip = $this->input->post('ip');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$handphone = $this->input->post('handphone');
			$kecamatan_id = $this->input->post('kecamatan');
			$kelurahan_id = $this->input->post('kelurahan');
			$jabatan_id = $this->input->post('jabatan_id');
			$seksi_id = $this->input->post('seksi_id');
			$fungsi_id = $this->input->post('fungsi_id');
			$status_role = $this->input->post('role_id');
			$password = $password;
			$password_default = $password_default;
			if ($jabatan_id == 1) {
				$level = 1;
			} elseif ($jabatan_id == 2) {
				$level = 2;
			} elseif ($jabatan_id == 3) {
				$level = 3;
			} elseif ($jabatan_id == 4) {
				$level = 4;
			} elseif ($jabatan_id == 5) {
				$level = 5;
			} elseif ($jabatan_id == 6) {
				$level = 6;
			} else {
				$level = 7;
			}
			$data = array(
				'ip' => $ip,
				'nip' => $nip,
				'nama' => $nama,
				'email' => $email,
				'handphone' => $handphone,
				'kecamatan_id' => $kecamatan_id,
				'kelurahan_id' => $kelurahan_id,
				'jabatan_id' => $jabatan_id,
				'seksi_id' => $seksi_id,
				'fungsi_id' => $fungsi_id,
				'status_role' => $status_role,
				'password' => $password,
				'password_default' => $password_default,
				'level' => $level,
			);
			$ip_db = $this->db->select('id')
				->from('user')
				->where('ip', $ip)
				->get()
				->row_array();
			if (!empty($ip_db)) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Ip Sudah ada pada database');
				redirect(site_url('pegawai'));
			}

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', 'Berhasil Ditambah');
			redirect(site_url('pegawai'));
		}
	}

	public function update($id)
	{
		$this->_checkuser();
		if ($id != 1) {
			$row = $this->db->select('*, user.id as user_id,user.nama as nama, kecamatan.id as kecamatan, kelurahan.nama as kelurahan')
				->from('user')
				->join('kecamatan', 'kecamatan.id = user.kecamatan_id', 'left')
				->join('kelurahan', 'kelurahan.id = user.kelurahan_id', 'left')
				->where('user.id', $id)
				->order_by('user.id', 'ASC')
				->get()
				->row();

			$seksi = "SELECT * from seksi order by nama asc";
			$data_seksi = $this->db->query($seksi)->result();
			$jabatan = "SELECT * from jabatan order by nama asc";
			$data_jabatan = $this->db->query($jabatan)->result();
			$fungsi = "SELECT * from status_fungsi order by nama asc";
			$data_fungsi = $this->db->query($fungsi)->result();
			$role = "SELECT * from status_role order by nama_status asc";
			$data_role = $this->db->query($role)->result();
			if (empty($row->kecamatan_id || $row->kelurahan_id)) {  //if 1
				$kecamatan = "SELECT * from kecamatan order by nama asc";
				$data_kec = $this->db->query($kecamatan)->result();
				$kelurahan = "SELECT * from kelurahan order by nama asc";
				$data_kelurahan = $this->db->query($kelurahan)->result();
			} else {  //just use else instead of 2nd if
				$kecamatan = "SELECT * from kecamatan order by nama asc";
				$data_kec = $this->db->query($kecamatan)->result();

				$kelurahan = "SELECT * from kelurahan where kecamatan_id=" . $row->kecamatan;
				$data_kelurahan = $this->db->query($kelurahan)->result();
			}

			if ($row) {
				$data = array(
					'button' => 'Ubah',
					'action' => site_url('pegawai/update_action'),
					'id' => set_value('id', $row->user_id),
					'ip' => set_value('ip', $row->ip),
					'nip' => set_value('nip', $row->nip),
					'nama' => set_value('nama', $row->nama),
					'kecamatan' => set_value('kecamatan', $row->kecamatan_id),
					'data_kecamatan' => $data_kec,
					'kelurahan' => set_value('kelurahan', $row->kelurahan),
					'data_kelurahan' => $data_kelurahan,
					'jabatan' => $data_jabatan,
					'jabatan_id' => set_value('jabatan_id', $row->jabatan_id),
					'seksi' => $data_seksi,
					'seksi_id' => set_value('seksi_id', $row->seksi_id),
					'fungsi' => $data_fungsi,
					'fungsi_id' => set_value('fungsi_id', $row->fungsi_id),
					'role' => $data_role,
					'status_role' => set_value('status_role', $row->status_role),
					'handphone' => set_value('handphone', $row->handphone),
					'email' => set_value('email', $row->email),
					'password' => set_value('password'),
					'level' => set_value('level', $row->level),
				);
				$data['title'] = "Ubah Data Pegawai";
				$this->template->load('template/backend/dashboard', 'pegawai/pegawai_form', $data);
			} else {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Record Not Found');
				redirect(site_url('pegawai'));
			}
		} else {
			redirect(site_url('pegawai'));
		}
	}

	public function update_action()
	{
		$this->_checkuser();
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->update($this->input->post('id', true));
		} else {
			$password = md5($this->input->post('password'));
			$password_default = 0;
			if ($password == "dcdfed53bdb73ceb4931d10829e4eae2") {
				$password_default = 1;
			}
			$ip = $this->input->post('ip');
			$nip = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$handphone = $this->input->post('handphone');
			$kecamatan_id = $this->input->post('kecamatan');
			$kelurahan_id = $this->input->post('kelurahan');
			$jabatan_id = $this->input->post('jabatan_id');
			$seksi_id = $this->input->post('seksi_id');
			$fungsi_id = $this->input->post('fungsi_id');
			$status_role = $this->input->post('role_id');

			$password = $password;
			$password_default = $password_default;
			if ($jabatan_id == 1) {
				$level = 1;
			} elseif ($jabatan_id == 2) {
				$level = 2;
			} elseif ($jabatan_id == 3) {
				$level = 3;
			} elseif ($jabatan_id == 4) {
				$level = 4;
			} elseif ($jabatan_id == 5) {
				$level = 5;
			} elseif ($jabatan_id == 6) {
				$level = 6;
			} else {
				$level = 7;
			}
			$data = array(
				'ip' => $ip,
				'nip' => $nip,
				'nama' => $nama,
				'email' => $email,
				'handphone' => $handphone,
				'kecamatan_id' => $kecamatan_id,
				'kelurahan_id' => $kelurahan_id,
				'jabatan_id' => $jabatan_id,
				'seksi_id' => $seksi_id,
				'fungsi_id' => $fungsi_id,
				'status_role' => $status_role,
				'password' => $password,
				'password_default' => $password_default,
				'level' => $level,
			);

			$ip_user = $this->db->select('ip')
				->from('user')
				->where('id', $this->input->post('id'))
				->get()
				->row_array();

			if ($ip != $ip_user['ip']){
				$ip_db = $this->db->select('id')
					->from('user')
					->where('ip', $ip)
					->get()
					->row_array();
				if (!empty($ip_db)) {
					$this->session->set_flashdata('error', 'error');
					$this->session->set_flashdata('message', 'Ip Sudah ada pada database');
					redirect(site_url('pegawai'));
				}
			}
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('user', $data);

			$this->session->set_flashdata('message', 'Berhasil Diubah');
			redirect(site_url('pegawai'));
		}
	}

	public function reset_password($id)
	{
		$this->_checkuser();
		if ($id != 1) {
			$data = array(
				'password' => 'dcdfed53bdb73ceb4931d10829e4eae2',
				'password_default' => '1',
			);
			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('message', 'Berhasil Direset');
			redirect(site_url('pegawai'));
		} else {
			redirect(site_url('pegawai'));
		}
	}

	public function delete($id)
	{
		$this->_checkuser();
		if ($id != 1) {
			$this->db->where('id', $id);
			$this->db->delete('user');
			$this->session->set_flashdata('message', 'Berhasil Dihapus');
			redirect(site_url('pegawai'));
		} else {
			redirect(site_url('pegawai'));
		}
	}

	private function _checkuser()
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('pegawai'));
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
							$data_user = array(
								'ip' => $row['IP'],
								'nip' => $row['NIP'],
								'nama' => $row['NAMA'],
								'password' => "dcdfed53bdb73ceb4931d10829e4eae2",
								'password_default' => 1,
								'fungsi_id' => $row['FUNGSI'],
							);

							if (strlen($row['IP'])  < 9) {
								$data_user['ip'] = '0' . $row['IP'];
							} else {
								$data_user['ip'] = $row['IP'];
							}

							$status_role = $this->db->select('id')
								->from('status_role')
								->where("REPLACE(nama_status, ' ', '') =", str_replace(' ', '', $row['ROLE']))
								->get()
								->row_array();
							$data_user['status_role'] = $status_role['id'];

							$jabatan_id = $this->db->select('id')
								->from('jabatan')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['JABATAN']))
								->get()
								->row_array();
							$data_user['jabatan_id'] = $jabatan_id['id'];

							$jabatan = str_replace(' ', '', $row['JABATAN']);

							if ($jabatan == 'KepalaSeksi' && $status_role['id'] == 1) {
								$data_user['jabatan_id'] = 3;
							}
							if ($jabatan == 'KepalaSeksi' && $status_role['id'] == 2) {
								$data_user['jabatan_id'] = 4;
							}
							if ($data_user['jabatan_id'] <= 6) {
								$level = $data_user['jabatan_id'];
							} else {
								$level = 7;
							};
							$data_user['level'] = $level;
							$seksi_id = $this->db->select('id')
								->from('seksi')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['UNIT ORGANISASI']))
								->get()
								->row_array();
							$data_user['seksi_id'] = $seksi_id['id'];

							$status_fungsi = $this->db->select('id')
								->from('status_fungsi')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['FUNGSI']))
								->get()
								->row_array();
							$data_user['fungsi_id'] = $status_fungsi['id'];

							$ip_db = $this->db->select('id')
								->from('user')
								->where('ip', $data_user['ip'])
								->get()
								->row_array();
							$ip_db = $this->db->select('id,password')
								->from('user')
								->where('ip', $data_user['ip'])
								->get()
								->row_array();
							if (!empty($ip_db)) {
								// update user
								if ($ip_db['password'] != 'dcdfed53bdb73ceb4931d10829e4eae2') {
									$data_user['password'] = $ip_db['password'];
								}
								$this->db->where('ip', $data_user['ip']);
								$this->db->update('user', $data_user);
								$updateCount++;
							} else {
								if ($data_user['ip'] != '' && $row['NIP'] != '') {
									$this->db->insert('user', $data_user);
									$insertCount++;
								}
							}
						}

						// Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Data User imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated (' . $updateCount . ') | Not Add Rows (' . $notAddCount . ')';

						$this->session->set_flashdata('message', $successMsg);
					}
				} else {
					$this->session->set_flashdata('error', 'error');
					$this->session->set_flashdata('message', 'Error on file upload, please try again.');
				}
			} else {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Invalid file, please select only CSV file.');
			}
		}
		redirect('pegawai');
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
	// public function excel()
	// {
	//     $this->load->helper('exportexcel');
	//     $namaFile = "pegawai.xls";
	//     $judul = "pegawai";
	//     $tablehead = 0;
	//     $tablebody = 1;
	//     $nourut = 1;
	//     //penulisan header
	//     header("Pragma: public");
	//     header("Expires: 0");
	//     header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	//     header("Content-Type: application/force-download");
	//     header("Content-Type: application/octet-stream");
	//     header("Content-Type: application/download");
	//     header("Content-Disposition: attachment;filename=" . $namaFile . "");
	//     header("Content-Transfer-Encoding: binary ");

	//     xlsBOF();

	//     $kolomhead = 0;
	//     xlsWriteLabel($tablehead, $kolomhead++, "No");
	//     xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
	//     xlsWriteLabel($tablehead, $kolomhead++, "Nama Kepsek");
	//     xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pegawai");
	//     xlsWriteLabel($tablehead, $kolomhead++, "pekerjaan");
	//     xlsWriteLabel($tablehead, $kolomhead++, "alamat");
	//     xlsWriteLabel($tablehead, $kolomhead++, "No Telpon");

	//     foreach ($this->Karyawan_model->get_all() as $data) {
	//         $kolombody = 0;

	//         //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
	//         xlsWriteNumber($tablebody, $kolombody++, $nourut);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	//         xlsWriteLabel($tablebody, $kolombody++, $data->no_telpon);

	//         $tablebody++;
	//         $nourut++;
	//     }

	//     xlsEOF();
	//     exit();
	// }

	public function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->search_kelurahan($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) {
					$arr_result[] = array(
						// 'label'            => $row->nik . ' - ' . $row->nama,
						'label'            => $row->nama,
						'kelurahan_id'     => $row->id,
						'nama'            => $row->nama,
					);
				}
				echo json_encode($arr_result);
			}
		}
	}

	public function search_kelurahan($title)
	{

		//$this->db->like('nama_anggota', $title, 'both');
		$this->db->or_like(array('nama' => $title));
		// $this->db->where('active_status', 1);
		$this->db->order_by('nama', 'ASC');
		$this->db->limit(10);
		return $this->db->get('kelurahan')->result();
	}
	public function get_kelurahan()
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

	public function ganti_pw()
	{
		$data['title'] = "Ubah Password";
		$this->template->load('template/backend/dashboard', 'pegawai/gantipw', $data);
	}

	public function ganti_pw_action()
	{
		if ($this->input->post('new_password1') != $this->input->post('new_password2')) {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Konfirmasi password Baru tidak sesuai!');
			redirect('pegawai/ganti_pw');
		}
		$this->load->model('Auth_model');
		$user = $this->Auth_model->check_login($this->session->userdata('ip'), md5($this->input->post('current_password')));
		if (!empty($user)) {
			$data = array(
				'password' => md5($this->input->post('new_password1')),
			);
			$this->db->where('ip', $this->session->userdata('ip'));
			$this->db->update('user', $data);
			$this->session->sess_destroy();
			redirect(site_url('administrator/logout/1'));
		} else {
			$this->session->set_flashdata('error', 'error');
			$this->session->set_flashdata('message', 'Password Lama Salah');
			redirect(site_url('pegawai/ganti_pw'));
		}
	}
}
