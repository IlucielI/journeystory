<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Wilayah extends CI_Controller
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
		$data['title'] = "Data Wilayah";
		$data['data'] = $this->db->select('wilayah.id, wilayah.rw ,kelurahan.nama as kelurahan_nama, kecamatan.nama as kecamatan_nama, user.nama as nama')
			->from('wilayah')
			->join('kelurahan', 'kelurahan.id = wilayah.kelurahan_id', 'left')
			->join('kecamatan', 'kecamatan.id = kelurahan.kecamatan_id', 'left')
			->join('user', 'user.ip = wilayah.ip', 'left')
			->order_by('wilayah.id', 'ASC')
			->get()
			->result();
		$this->template->load('template/backend/dashboard', 'wilayah/wilayah_list', $data);
	}

	public function read_ajax()
	{
		$data = $this->db->select('wilayah.id, wilayah.rw ,kelurahan.nama as kelurahan_nama, kecamatan.nama as kecamatan_nama, user.nama as nama, wilayah.ip, seksi.nama as seksi')
			->from('wilayah')
			->join('kelurahan', 'kelurahan.id = wilayah.kelurahan_id', 'left')
			->join('kecamatan', 'kecamatan.id = kelurahan.kecamatan_id', 'left')
			->join('user', 'user.ip = wilayah.ip', 'left')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->where('wilayah.id', $this->input->post('id'))
			->order_by('wilayah.id', 'ASC')
			->get()
			->result_array();

		echo json_encode($data);
	}

	public function create()
	{
		$this->_checkuser();
		$kecamatan = "SELECT * from kecamatan order by nama asc";
		$data_kec = $this->db->query($kecamatan)->result();

		$kelurahan = "SELECT * from kelurahan order by nama asc";
		$data_kel = $this->db->query($kelurahan)->result();

		$data = array(
			'id' => set_value('id'),
			'ip' => set_value('ip'),
			'nama' => set_value('nama'),
			'rw' => set_value('rw'),
			'seksi' => set_value('seksi'),
			'kecamatan' => set_value('kecamatan'),
			'data_kecamatan' => $data_kec,
			'kelurahan_id' => set_value('kelurahan_id'),
			'kelurahan' => set_value('kelurahan'),
			'data_kelurahan' => $data_kel,
			'button' => 'Tambah',
			'action' => site_url('wilayah/create_action')
		);
		$data['title'] = "Tambah Data Wilayah";
		$this->template->load('template/backend/dashboard', 'wilayah/wilayah_form', $data);
	}

	public function create_action()
	{
		$this->_checkuser();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'kelurahan_id' => $this->input->post('kelurahan_id'),
				'rw' => $this->input->post('rw'),
				'ip' => $this->input->post('ip'),
			);

			$ip_db = $this->db->select('id')
				->from('user')
				->where('ip', $this->input->post('ip'))
				->get()
				->row_array();

			if (empty($ip_db)) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Ip tidak ada di tabel user');
				redirect(site_url('wilayah'));
			}

			$ip = $this->db->select('wilayah.ip')
				->from('wilayah')
				->where('wilayah.ip', $this->input->post('ip'))
				->get()
				->row_array();
			if (!empty($ip)) {
				// update wilayah
				$ar = $this->db->select('wilayah.ip')
					->from('wilayah')
					->where('wilayah.kelurahan_id', $this->input->post('kelurahan_id'))
					->where('wilayah.ip', $this->input->post('ip'))
					->get()
					->row_array();
				if (!empty($ar)) {
					$this->session->set_flashdata('message', 'Data Sudah ada pada database silakan update');
					redirect(site_url('wilayah'));
				} else {
					$rw = $this->db->select('wilayah.ip')
						->from('wilayah')
						->where('wilayah.kelurahan_id', $this->input->post('kelurahan_id'))
						->where('wilayah.rw', $this->input->post('rw'))
						->get()
						->row_array();
					if (!empty($rw)) {
						$this->session->set_flashdata('message', 'Kelurahan Dan Rw sama seperti AR lain silakan update');
						redirect(site_url('wilayah'));
					} else {
						$this->db->insert('wilayah', $data);
					}
				}
			} else {
				$rw = $this->db->select('wilayah.ip')
					->from('wilayah')
					->where('wilayah.kelurahan_id', $this->input->post('kelurahan_id'))
					->where('wilayah.rw', $this->input->post('rw'))
					->get()
					->row_array();
				if (!empty($rw)) {
					$this->session->set_flashdata('message', 'Kelurahan Dan Rw sama seperti AR lain silakan update');
					redirect(site_url('wilayah'));
				} else {
					$this->db->insert('wilayah', $data);
				}
			}

			$this->session->set_flashdata('message', 'Berhasil Ditambah');
			redirect(site_url('wilayah'));
		}
	}

	public function update($id)
	{
		$this->_checkuser();
		$row = $this->db->select('wilayah.id,wilayah.rw , kelurahan.id as kelurahan_id ,kelurahan.nama as kelurahan_nama, kecamatan.id as kecamatan_id, user.nama as nama, wilayah.ip, seksi.nama as seksi')
			->from('wilayah')
			->join('kelurahan', 'kelurahan.id = wilayah.kelurahan_id', 'left')
			->join('kecamatan', 'kecamatan.id = kelurahan.kecamatan_id', 'left')
			->join('user', 'user.ip = wilayah.ip', 'left')
			->join('seksi', 'seksi.id = user.seksi_id', 'left')
			->where('wilayah.id', $id)
			->order_by('wilayah.id', 'ASC')
			->get()
			->row();

		$kecamatan = "SELECT * from kecamatan order by nama asc";
		$data_kec = $this->db->query($kecamatan)->result();

		$kelurahan = "SELECT * from kelurahan order by nama asc";
		$data_kel = $this->db->query($kelurahan)->result();

		$data = array(
			'id' => set_value('id', $row->id),
			'ip' => set_value('ip', $row->ip),
			'nama' => set_value('nama', $row->nama),
			'rw' => set_value('rw', $row->rw),
			'seksi' => set_value('seksi', $row->seksi),
			'kecamatan' => set_value('kecamatan', $row->kecamatan_id),
			'data_kecamatan' => $data_kec,
			'kelurahan_id' => set_value('kelurahan_id', $row->kelurahan_id),
			'kelurahan' => set_value('kelurahan', $row->kelurahan_nama),
			'data_kelurahan' => $data_kel,
			'button' => 'Update',
			'action' => site_url('wilayah/update_action')
		);
		$data['title'] = "Ubah Data Wilayah";

		$this->template->load('template/backend/dashboard', 'wilayah/wilayah_form', $data);
	}

	public function update_action()
	{
		$this->_checkuser();
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$ip_db = $this->db->select('id')
				->from('user')
				->where('ip', $this->input->post('ip'))
				->get()
				->row_array();

			if (empty($ip_db)) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Ip tidak ada di tabel user');
				redirect(site_url('wilayah'));
			}
			$data = array(
				'kelurahan_id' => $this->input->post('kelurahan_id'),
				'rw' => $this->input->post('rw'),
				'ip' => $this->input->post('ip'),
			);

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('wilayah', $data);

			$this->session->set_flashdata('message', 'Berhasil Diubah');
			redirect(site_url('wilayah'));
		}
	}

	public function delete($id)
	{
		$this->_checkuser();
		$this->db->where('id', $id);
		$this->db->delete('wilayah');
		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('wilayah'));
	}

	private function _checkuser()
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('wilayah'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('ip', 'ip', 'trim|required');
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
				$insertCount = $updateCount = $rowCount = $notAddCount = $notFoundKelurahan = $notFoundIp = 0;
				$notFoundKelurahanArr = [];
				$notFoundIpArr = [];
				$notFoundIpList = '';
				$notFoundKelurahanList = '';
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
							if (strlen($row['NIP AR'])  < 9) {
								$dataReff_wilayah['ip'] = '0' . $row['NIP AR'];
							} else {
								$dataReff_wilayah['ip'] = $row['NIP AR'];
							}
							$dataReff_wilayah['rw'] = $row['RW'];

							// Check ip in the database

							$kelurahan = $this->db->select('id')
								->from('kelurahan')
								->where("REPLACE(nama, ' ', '') =", str_replace(' ', '', $row['KELURAHAN']))
								->get()
								->row_array();

							if (!empty($kelurahan)) {
								$dataReff_wilayah['kelurahan_id'] = $kelurahan['id'];
								$ip = $this->db->select('wilayah.ip')
									->from('wilayah')
									->where('wilayah.ip', $dataReff_wilayah['ip'])
									->get()
									->row_array();
								if (!empty($ip)) {
									// update wilayah
									$ar = $this->db->select('wilayah.ip')
										->from('wilayah')
										->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id'])
										->where('wilayah.ip', $dataReff_wilayah['ip'])
										->get()
										->row_array();
									if (!empty($ar)) {
										$this->db->where('ip', $dataReff_wilayah['ip']);
										$this->db->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id']);
										$this->db->update('wilayah', $dataReff_wilayah);
										$updateCount++;
									} else {
										$rw = $this->db->select('wilayah.ip')
											->from('wilayah')
											->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id'])
											->where('wilayah.rw', $dataReff_wilayah['rw'])
											->get()
											->row_array();
										if (!empty($rw)) {
											$this->db->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id']);
											$this->db->where('wilayah.rw', $dataReff_wilayah['rw']);
											$this->db->update('wilayah', $dataReff_wilayah);
										} else {
											$this->db->insert('wilayah', $dataReff_wilayah);
											$insertCount++;
										}
									}
								} else {
									$user_ip = $this->db->select('user.ip')
										->from('user')
										->where('user.ip', $dataReff_wilayah['ip'])
										->get()
										->row_array();
									if (!empty($user_ip)) {
										$rw = $this->db->select('wilayah.ip')
											->from('wilayah')
											->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id'])
											->where('wilayah.rw', $dataReff_wilayah['rw'])
											->get()
											->row_array();
										if (!empty($rw)) {
											$this->db->where('wilayah.kelurahan_id', $dataReff_wilayah['kelurahan_id']);
											$this->db->where('wilayah.rw', $dataReff_wilayah['rw']);
											$this->db->update('wilayah', $dataReff_wilayah);
										} else {
											$this->db->insert('wilayah', $dataReff_wilayah);
											$insertCount++;
										}
									} else {
										$notFoundIp++;
										array_push($notFoundIpArr, $row['NIP AR']);
									}
								}
							} else {
								$notFoundKelurahan++;
								array_push($notFoundKelurahanArr, $row['KELURAHAN']);
							}
						}

						// Status message with imported data count

						$notAddCount = $notFoundKelurahan + $notFoundIp;
						$successMsg = 'Wilayah imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated (' . $updateCount . ') | Not Inserted (' . $notAddCount . ') | not Found Kelurahan (' . $notFoundKelurahan . ')';
						if (!empty($notFoundKelurahanArr)) {
							foreach ($notFoundKelurahanArr as $kelurahanArr) {
								$notFoundKelurahanList .= $kelurahanArr . ',';
							}
							$successMsg .= '( List Kelurahan : ' . $notFoundKelurahanList . ')';
						}
						$successMsg .= '| not Found Ip (' . $notFoundIp . ')';
						if (!empty($notFoundIpArr)) {
							foreach ($notFoundIpArr as $IpArr) {
								$notFoundIpList .= $IpArr . ',';
							}
							$successMsg .= '( List Ip : ' . $notFoundIpList . ')';
						}
						$this->session->set_flashdata('message', $successMsg);
					}
				} else {
					$this->session->set_flashdata('message', 'Error on file upload, please try again.');
				}
			} else {
				$this->session->set_flashdata('message', 'Invalid file, please select only CSV file.');
			}
		}
		redirect('wilayah');
	}

	/*
     * Callback function to check file value and type during validation
     */
	public function file_check($str)
	{
		$allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
		if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
			$mime = get_mime_by_extension($_FILES['file']['name']);
			$fileAr = explode('.', $_FILES['file']['name']);
			$ext = end($fileAr);
			if (($ext == 'csv') && in_array($mime, $allowed_mime_types)) {
				return true;
			} else {
				$this->form_validation->set_flashdata('message', 'Please select only CSV file to upload.');
				return false;
			}
		} else {
			$this->form_validation->set_flashdata('message', 'Please select a CSV file to upload.');
			return false;
		}
	}

	// public function excel()
	// {
	// 	$this->load->helper('exportexcel');
	// 	$namaFile = "wilayah.xls";
	// 	$judul = "wilayah";
	// 	$tablehead = 0;
	// 	$tablebody = 1;
	// 	$nourut = 1;
	// 	//penulisan header
	// 	header("Pragma: public");
	// 	header("Expires: 0");
	// 	header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
	// 	header("Content-Type: application/force-download");
	// 	header("Content-Type: application/octet-stream");
	// 	header("Content-Type: application/download");
	// 	header("Content-Disposition: attachment;filename=" . $namaFile . "");
	// 	header("Content-Transfer-Encoding: binary ");

	// 	xlsBOF();

	// 	$kolomhead = 0;
	// 	xlsWriteLabel($tablehead, $kolomhead++, "No");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "Nama wilayah");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kepsek");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "Alamat wilayah");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "pekerjaan");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "alamat");
	// 	xlsWriteLabel($tablehead, $kolomhead++, "No Telpon");

	// 	foreach ($this->Karyawan_model->get_all() as $data) {
	// 		$kolombody = 0;

	// 		//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
	// 		xlsWriteNumber($tablebody, $kolombody++, $nourut);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->nama_karyawan);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	// 		xlsWriteLabel($tablebody, $kolombody++, $data->no_telpon);

	// 		$tablebody++;
	// 		$nourut++;
	// 	}

	// 	xlsEOF();
	// 	exit();
	// }
}
