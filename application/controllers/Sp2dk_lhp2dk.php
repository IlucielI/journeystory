<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sp2dk_lhp2dk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		};
		$this->load->helper('file');
		$this->load->database();
	}

	public function index()
	{
		$data['title'] = "Data SP2DK LHP2DK";
		$data['data'] = $this->db->select('reff_sp2dk.id as id, npwpl.nama, npwpl,tanggal_lhpt, tanggal_sp2dk')
			->from('reff_sp2dk')
			->join('npwpl', 'npwpl.id = reff_sp2dk.npwpl_id', 'inner')
			->order_by('LENGTH(reff_sp2dk.nomor_lhpt), reff_sp2dk.nomor_lhpt', 'DESC')
			->get()
			->result();
		$this->template->load('template/backend/dashboard', 'sp2dk_lhp2dk/sp2dk_lhp2dk_list', $data);
	}

	public function read_ajax()
	{
		$data = $this->db->select('*, reff_sp2dk.id as id, npwpl.id as npwpl_id')
			->from('reff_sp2dk')
			->join('npwpl', 'npwpl.id = reff_sp2dk.npwpl_id', 'inner')
			->where('reff_sp2dk.id', $this->input->post('id'))
			->get()
			->result_array();

		echo json_encode($data);
	}

	public function create()
	{
		$this->_checkuser();
		$data = array(
			'button' => 'Tambah',
			'action' => site_url('sp2dk_lhp2dk/create_action'),
			'npwpl_id' => set_value('npwpl_id'),
			'npwpl' => set_value('npwpl'),
			'nama' => set_value('nama'),
			'id' => set_value('id'),
			'nomor_lhpt' => set_value('nomor_lhpt'),
			'tanggal_lhpt' => set_value('tanggal_lhpt'),
			'nomor_sp2dk' => set_value('nomor_sp2dk'),
			'tanggal_sp2dk' => set_value('tanggal_sp2dk'),
			'tahun_pajak_sp2dk' => set_value('tahun_pajak_sp2dk'),
			'estimasi_potensi_awal_sp2dk' => set_value('estimasi_potensi_awal_sp2dk'),
			'nomor_lhp2dk' => set_value('nomor_lhp2dk'),
			'tanggal_lhp2dk' => set_value('tanggal_lhp2dk'),
			'keputusan_lhp2dk' => set_value('keputusan_lhp2dk'),
			'kesimpulan_lhp2dk' => set_value('kesimpulan_lhp2dk'),
			'estimasi_potensi_lhp2dk' => set_value('estimasi_potensi_lhp2dk'),
			'realisasi_lhp2dk' => set_value('realisasi_lhp2dk'),
			'nomor_dspp' => set_value('nomor_dspp'),
			'tanggal_dspp' => set_value('tanggal_dspp'),
			'nomor_np2' => set_value('nomor_np2'),
			'tanggal_np2' => set_value('tanggal_np2'),
			'nomor_sp2' => set_value('nomor_sp2'),
			'tanggal_sp2' => set_value('tanggal_sp2'),
		);
		$data['title'] = "Tambah Data SP2DK LHP2DK";

		$this->template->load('template/backend/dashboard', 'sp2dk_lhp2dk/sp2dk_lhp2dk_form', $data);
	}

	public function create_action()
	{
		$this->_checkuser();
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'nomor_lhpt' => $this->input->post('nomor_lhpt'),
				'tanggal_lhpt' => $this->input->post('tanggal_lhpt'),
				'nomor_sp2dk' => $this->input->post('nomor_sp2dk'),
				'tanggal_sp2dk' => $this->input->post('tanggal_sp2dk'),
				'tahun_pajak_sp2dk' => $this->input->post('tahun_pajak_sp2dk'),
				'estimasi_potensi_awal_sp2dk' => str_replace('.', '', $this->input->post('estimasi_potensi_awal_sp2dk')),
				'nomor_lhp2dk' => $this->input->post('nomor_lhp2dk'),
				'tanggal_lhp2dk' => $this->input->post('tanggal_lhp2dk'),
				'keputusan_lhp2dk' => $this->input->post('keputusan_lhp2dk'),
				'kesimpulan_lhp2dk' => $this->input->post('kesimpulan_lhp2dk'),
				'estimasi_potensi_lhp2dk' => str_replace('.', '', $this->input->post('estimasi_potensi_lhp2dk')),
				'realisasi_lhp2dk' => str_replace('.', '', $this->input->post('realisasi_lhp2dk')),
				'nomor_dspp' => $this->input->post('nomor_dspp'),
				'tanggal_dspp' => $this->input->post('tanggal_dspp'),
				'nomor_np2' => $this->input->post('nomor_np2'),
				'tanggal_np2' => $this->input->post('tanggal_np2'),
				'nomor_sp2' => $this->input->post('nomor_sp2'),
				'tanggal_sp2' => $this->input->post('tanggal_sp2'),
			);

			$sp2dkCount = $this->db->select('nomor_lhpt, tanggal_lhpt')
				->from('reff_sp2dk')
				->where('nomor_lhpt', $this->input->post('nomor_lhpt'))
				->where('tanggal_lhpt', $this->input->post('tanggal_lhpt'))
				->count_all_results();
			if ($sp2dkCount > 0) {
				$this->session->set_flashdata('error', 'error');
				$this->session->set_flashdata('message', 'Data SP2dk Sudah ada pada database');
				redirect(site_url('wilayah'));
			}

			$data_npwpl = [
				'npwpl' => $this->input->post('npwpl'),
				'nama' => $this->input->post('nama'),
			];

			$npwpl_id = $this->db->select('id')
				->from('npwpl')
				->where('npwpl', $this->input->post('npwpl'))
				->get()
				->row_array();

			if (!empty($npwpl_id)) {
				// Update npwpl data
				$this->db->where('id', $npwpl_id['id']);
				$this->db->update('npwpl', $data_npwpl);;
				$sp2dkCount = $this->db->select('nomor_lhpt, tanggal_lhpt')
					->from('reff_sp2dk')
					->where('nomor_lhpt', $data['nomor_lhpt'])
					->where('tanggal_lhpt', $data['tanggal_lhpt'])
					->count_all_results();
				$data['npwpl_id'] = $npwpl_id['id'];
				if ($sp2dkCount > 0) {
					$this->db->where('nomor_lhpt', $data['nomor_lhpt']);
					$this->db->where('tanggal_lhpt', $data['tanggal_lhpt']);
					$this->db->update('reff_sp2dk', $data);;
				} else {
					$this->db->insert('reff_sp2dk', $data);
				}
			} else {
				// Insert member data
				$this->db->insert('npwpl', $data_npwpl);
				$npwpl_id = $this->db->select('id')
					->from('npwpl')
					->where('npwpl', $this->input->post('npwpl'))
					->get()
					->row_array();
				$data['npwpl_id'] = $npwpl_id['id'];
				$this->db->insert('reff_sp2dk', $data);
			}

			$this->session->set_flashdata('message', 'Berhasil Diubah');
			redirect(site_url('sp2dk_lhp2dk'));
		}
	}

	public function update($id)
	{
		$this->_checkuser();
		$data = $this->db->select('*, reff_sp2dk.id as id, npwpl.id as npwpl_id')
			->from('reff_sp2dk')
			->join('npwpl', 'npwpl.id = reff_sp2dk.npwpl_id', 'inner')
			->where('reff_sp2dk.id', $id)
			->get()
			->row();
		$data->button = 'Update';
		$data->action	= site_url('sp2dk_lhp2dk/update_action');
		$data->title = "Ubah Data SP2DK LHP2DK";

		$this->template->load('template/backend/dashboard', 'sp2dk_lhp2dk/sp2dk_lhp2dk_form', $data);
	}

	public function update_action()
	{
		$this->_checkuser();
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$data = array(
				'nomor_lhpt' => $this->input->post('nomor_lhpt'),
				'tanggal_lhpt' => $this->input->post('tanggal_lhpt'),
				'nomor_sp2dk' => $this->input->post('nomor_sp2dk'),
				'tanggal_sp2dk' => $this->input->post('tanggal_sp2dk'),
				'tahun_pajak_sp2dk' => $this->input->post('tahun_pajak_sp2dk'),
				'estimasi_potensi_awal_sp2dk' => str_replace('.', '', $this->input->post('estimasi_potensi_awal_sp2dk')),
				'nomor_lhp2dk' => $this->input->post('nomor_lhp2dk'),
				'tanggal_lhp2dk' => $this->input->post('tanggal_lhp2dk'),
				'keputusan_lhp2dk' => $this->input->post('keputusan_lhp2dk'),
				'kesimpulan_lhp2dk' => $this->input->post('kesimpulan_lhp2dk'),
				'estimasi_potensi_lhp2dk' => str_replace('.', '', $this->input->post('estimasi_potensi_lhp2dk')),
				'realisasi_lhp2dk' => str_replace('.', '', $this->input->post('realisasi_lhp2dk')),
				'nomor_dspp' => $this->input->post('nomor_dspp'),
				'tanggal_dspp' => $this->input->post('tanggal_dspp'),
				'nomor_np2' => $this->input->post('nomor_np2'),
				'tanggal_np2' => $this->input->post('tanggal_np2'),
				'nomor_sp2' => $this->input->post('nomor_sp2'),
				'tanggal_sp2' => $this->input->post('tanggal_sp2'),
			);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('reff_sp2dk', $data);

			$data = [
				'npwpl' => $this->input->post('npwpl'),
				'nama' => $this->input->post('nama'),
			];
			$npwpl_id = $this->db->select('id')
				->from('npwpl')
				->where('npwpl', $this->input->post('npwpl'))
				->get()
				->row_array();
			if (!empty($npwpl_id)) {
				$this->db->where('id', $this->input->post('npwpl_id'));
				$this->db->update('npwpl', $data);
			} else {
				$this->db->insert('npwpl', $data);
				$npwpl_id = $this->db->select('id')
					->from('npwpl')
					->where('npwpl', $this->input->post('npwpl'))
					->get()
					->row_array();
				$npwplreff['npwpl_id'] = $npwpl_id['id'];
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('reff_sp2dk', $npwplreff);
			}
			$this->session->set_flashdata('message', 'Berhasil Diubah');
			redirect(site_url('sp2dk_lhp2dk'));
		}
	}

	public function delete($id)
	{
		$this->_checkuser();
		$npwpl = $this->db->select('npwpl_id')
			->from('reff_sp2dk')
			->where('id', $id)
			->get()
			->row_array();
		$npwpl_id = $this->db->select('COUNT(id) as jumlah')
			->from('reff_sp2dk')
			->where('npwpl_id', $npwpl['npwpl_id'])
			->get()
			->row_array();
		if ($npwpl_id['jumlah'] == 1) {
			$this->db->where('id', $npwpl['npwpl_id']);
			$this->db->delete('npwpl');
		}
		$this->db->where('id', $id);
		$this->db->delete('reff_sp2dk');

		$this->session->set_flashdata('message', 'Berhasil Dihapus');
		redirect(site_url('sp2dk_lhp2dk'));
	}

	private function _checkuser()
	{
		if ($this->session->userdata('level') != 1) {
			redirect(site_url('sp2dk_lhp2dk'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('npwpl', 'npwpl', 'trim|required');
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
							$dataReff_npwpl = [
								'npwpl' => $row['NPWP'],
								'nama' => $row['NAMA'],
							];

							$dataReff_sp2dk = array(
								'nomor_lhpt' => $row['NOMOR LHPT'],
								'tanggal_lhpt' => ($row['TANGGAL LHPT'] != '') ? $this->_isDate($row['TANGGAL LHPT']) : '',
								'nomor_sp2dk' => $row['NOMOR SP2DK'],
								'tanggal_sp2dk' => ($row['TANGGAL SP2DK'] != '') ? $this->_isDate($row['TANGGAL SP2DK']) : '',
								'tahun_pajak_sp2dk' => $row['TAHUN PAJAK'],
								'estimasi_potensi_awal_sp2dk' => str_replace('.', '', $row['ESTIMASI POTENSI AWAL']),
								'nomor_lhp2dk' => $row['NO_LHP2DK'],
								'tanggal_lhp2dk' => ($row['TGL_LHP2DK'] != '') ? $this->_isDate($row['TGL_LHP2DK']) : '',
								'keputusan_lhp2dk' => $row['KEPUTUSAN_LHP2DK'],
								'kesimpulan_lhp2dk' => $row['KESIMPULAN_LHP2DK'],
								'estimasi_potensi_lhp2dk' => str_replace('.', '', $row['ESTIMASI POTENSI AKHIR_LHP2DK']),
								'realisasi_lhp2dk' => str_replace('.', '', $row[' REALISASI_LHP2DK ']),
								'nomor_dspp' => $row['NOMOR DSPP'],
								'tanggal_dspp' => ($row['TANGGAL DSPP'] != '') ? $this->_isDate($row['TANGGAL DSPP']) : '',
								'nomor_np2' => $row['NOMOR NP2'],
								'tanggal_np2' => ($row['TANGGAL NP2'] != '') ? $this->_isDate($row['TANGGAL NP2']) : '',
								'nomor_sp2' => $row['NOMOR SP2'],
								'tanggal_sp2' => ($row['TANGGAL SP2'] != '') ? $this->_isDate($row['TANGGAL SP2']) : '',
							);

							// Check npwpl in the database

							$npwpl_id = $this->db->select('id')
								->from('npwpl')
								->where('npwpl', $row['NPWP'])
								->get()
								->row_array();

							if (!empty($npwpl_id)) {
								// Update npwpl data
								$this->db->where('id', $npwpl_id['id']);
								$this->db->update('npwpl', $dataReff_npwpl);;
								$sp2dkCount = $this->db->select('nomor_lhpt, tanggal_lhpt')
									->from('reff_sp2dk')
									->where('nomor_lhpt', $dataReff_sp2dk['nomor_lhpt'])
									->where('tanggal_lhpt', $dataReff_sp2dk['tanggal_lhpt'])
									->count_all_results();
								$dataReff_sp2dk['npwpl_id'] = $npwpl_id['id'];
								if ($sp2dkCount > 0) {
									$this->db->where('nomor_lhpt', $dataReff_sp2dk['nomor_lhpt']);
									$this->db->where('tanggal_lhpt', $dataReff_sp2dk['tanggal_lhpt']);
									$this->db->update('reff_sp2dk', $dataReff_sp2dk);;
									$updateCount++;
								} else {
									$this->db->insert('reff_sp2dk', $dataReff_sp2dk);
									$insertCount++;
								}
							} else {
								// Insert member data
								$insert = $this->db->insert('npwpl', $dataReff_npwpl);
								$npwpl_id = $this->db->select('id')
									->from('npwpl')
									->where('npwpl', $row['NPWP'])
									->get()
									->row_array();
								$dataReff_sp2dk['npwpl_id'] = $npwpl_id['id'];
								$this->db->insert('reff_sp2dk', $dataReff_sp2dk);
								if ($insert) {
									$insertCount++;
								}
							}
						}

						// Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Sp2dk imported successfully. Total Rows (' . $rowCount . ') | Inserted (' . $insertCount . ') | Updated (' . $updateCount . ') | Not Inserted (' . $notAddCount . ')';
						$this->session->set_flashdata('message', $successMsg);
					}
				} else {
					$this->session->set_flashdata('message', 'Error on file upload, please try again.');
				}
			} else {
				$this->session->set_flashdata('message', 'Invalid file, please select only CSV file.');
			}
		}
		redirect('sp2dk_lhp2dk');
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

	private function _isDate($date)
	{
		if (date_create_from_format('d/m/Y', $date)) {
			return  date_format(date_create_from_format('d/m/Y', $date), 'Y-m-d');
		} else if (date_create_from_format('d-m-Y', $date)) {
			return  date_format(date_create_from_format('d-m-Y', $date), 'Y-m-d');
		}
		return date('Y-m-d', ($date - (25567 + 2)) * 86400);
	}
}
