<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penugasan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};

		// Load database
		$this->load->database();

		//load models
		$this->load->model('Penugasan_model');

		// Load form validation library
		$this->load->library('form_validation');

		// Load file helper
		$this->load->helper('file');
	}


	public function import()
	{
		$data = array();
		$memData = array();

		// If import request is submitted
		if ($this->input->post('importSubmit')) {
			// Form field validation rules
			$this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');

			// Validate submitted form data
			if ($this->form_validation->run() == true) {
				$insertCount = $updateCount = $rowCount = $notAddCount = $notFoundIP = 0;
				$notFoundIPArr = [];
				$notFoundIPList = '';
				// If file uploaded
				if (is_uploaded_file($_FILES['file']['tmp_name'])) {
					// Load CSV reader library
					$this->load->library('CSVReader');

					// Parse data from CSV file
					$csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
					// var_dump($csvData);
					// die;

					// Insert/update CSV data into database
					if (!empty($csvData)) {
						foreach ($csvData as $row) {
							$rowCount++;

							// Prepare data for DB insertion
							$memData = array(
								'no_st' => $row['No. ST'],
								'tanggal' => $row['Tgl. ST'],
								'tgl_mulai_tugas' => $row['Tgl. Mulai Tugas'],
								'tgl_akhir_tugas' => $row['Tgl. Akhir Tugas'],
								'ref_ip' => $row['NIP'],
								'lokasi' => $row['Lokasi'],
							);

							if (strlen($row['NIP'])  < 9) {
								$memData['ref_ip'] = '0' . $row['NIP'];
							} else {
								$memData['ref_ip'] = $row['NIP'];
							}


							// check whether NOMOR ST already exist or not
							$con = array(
								'where' => array(
									'no_st' => $row['No. ST'],
									'ref_ip' => $memData['ref_ip']
								),
								'returnType' => 'count'
							);

							$prevCount = $this->Penugasan_model->getRows($con);

							$ip_db = $this->db->select('id')
								->from('user')
								->where('ip', $memData['ref_ip'])
								->get()
								->row_array();

							if (!empty($ip_db)) {
								if ($prevCount > 0) {
									// Update member data
									$condition = array('where' => array(
										'no_st' => $row['No. ST'],
										'ref_ip' => $row['NIP']
									));
									$update = $this->Penugasan_model->update($memData, $condition);

									if ($update) {
										$updateCount++;
									}
								} else {
									// Insert Penugasan data
									$insert = $this->Penugasan_model->insert($memData);

									if ($insert) {
										$insertCount++;
									}
								}
							} else {
								$notFoundIP++;
								array_push($notFoundIPArr, $memData['ref_ip']);
							}
						}

						// Insert penugasan data
						//     $insert = $this->Penugasan_model->insert($memData);

						//     if($insert){
						//         $insertCount++;
						//     }
						// }

						// Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Members imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated (' . $updateCount . ') | Not Inserted (' . $notAddCount . ')';
						if (!empty($notFoundIPArr)) {
							foreach ($notFoundIPArr as $notFoundIPArr) {
								$notFoundIPList .= $notFoundIPArr . ',';
							}
							$successMsg .= '( List Ip tidak terdaftar : ' . $notFoundIPList . ')';
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
		redirect(site_url('data/rekam_penugasan'));
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
}
