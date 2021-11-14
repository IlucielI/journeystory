<?php
class Dashboard extends CI_Controller
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

	function index()
	{
		$data['title'] = "Dashboard";
		$query1 = "select
					COUNT(id) as pegawai
					from user
				";
		$query2 = "select
					COUNT(capture_data.id) as tagging
					from capture_data
					join user on user.id = capture_data.user_id
				";
		$query3 = "SELECT c.nama ,COUNT(b.id) as jumlah_per_seksi 
		from rekam_penugasan a 
		left join user b on b.ip = a.ref_ip 
		left join seksi c on c.id = b.seksi_id 
		GROUP BY c.id ORDER BY c.nama asc";

		$query4 = "SELECT c.nama_status ,COUNT(b.id) as jumlah_per_status 
		from rekam_penugasan a 
		left join user b on b.ip = a.ref_ip 
		left join status_role c on c.id = b.status_role 
		GROUP BY c.id ORDER BY c.nama_status asc";

		$data['data1'] = $this->db->query($query1)->row();
		$data['data2'] = $this->db->query($query2)->row();
		$data['byseksi'] = $this->db->query($query3)->result_array();
		$data['bystatus'] = $this->db->query($query4)->result_array();
		$data['byproses'][0] = ['nama_proses' => 'Pengambilan Data', 'jumlah_per_proses' => $this->Data_model->get_count_jmltag()['jml']];
		$data['byproses'][1] = ['nama_proses' => 'Verifikasi Material', 'jumlah_per_proses' => $this->Data_model->get_count_verifmaterial()['jml']];
		$data['byproses'][2] = ['nama_proses' => 'Verifikasi Formal', 'jumlah_per_proses' => $this->Data_model->get_count_verifformal()['jml']];
		$data['byproses'][3] = ['nama_proses' => 'Cetak Form KPDL', 'jumlah_per_proses' => $this->Data_model->get_count_cetakKPDL()['jml']];
		$data['byproses'][4] = ['nama_proses' => 'Tindak Lanjut SP2DK-LHP2dk', 'jumlah_per_proses' => $this->Data_model->get_count_tindaklanjut()['jml']];
		$this->template->load('template/backend/dashboard', 'dashboard', $data);
	}

	public function ajax_status()
	{
		$kat = $this->input->post('kat');
		$bulan = date('Y-m');
		if ($kat == 0) {
			$query = "SELECT c.nama_status ,COUNT(b.id) as jumlah_per_status 
		from rekam_penugasan a 
		left join user b on b.ip = a.ref_ip 
		left join status_role c on c.id = b.status_role 
		GROUP BY c.id ORDER BY c.nama_status asc";
		} else {
			$query = "SELECT c.nama_status ,COUNT(b.id) as jumlah_per_status 
		from rekam_penugasan a 
		left join user b on b.ip = a.ref_ip 
		left join status_role c on c.id = b.status_role
		WHERE a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31' 
		GROUP BY c.id ORDER BY c.nama_status asc";
		}

		$data = $this->db->query($query)->result_array();
		echo json_encode($data);
	}
	public function ajax_seksi()
	{
		$kat = $this->input->post('kat');
		$bulan = date('Y-m');
		if ($kat == 0) {
			$query = "SELECT c.nama ,COUNT(b.id) as jumlah_per_seksi 
		from rekam_penugasan a 
		left join user b on b.ip = a.ref_ip 
		left join seksi c on c.id = b.seksi_id 
		GROUP BY c.id ORDER BY c.nama asc";
		} else {
			$query = "SELECT c.nama ,COUNT(b.id) as jumlah_per_seksi 
			from rekam_penugasan a 
			left join user b on b.ip = a.ref_ip 
			left join seksi c on c.id = b.seksi_id
			WHERE a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
			GROUP BY c.id ORDER BY c.nama asc";
		}

		$data = $this->db->query($query)->result_array();
		echo json_encode($data);
	}
	public function ajax_proses()
	{
		$kat = $this->input->post('kat');
		if ($kat == 0) {
			$data[0] = ['nama_proses' => 'Pengambilan Data', 'jumlah_per_proses' => $this->Data_model->get_count_jmltag()['jml']];
			$data[1] = ['nama_proses' => 'Verifikasi Material', 'jumlah_per_proses' => $this->Data_model->get_count_verifmaterial()['jml']];
			$data[2] = ['nama_proses' => 'Verifikasi Formal', 'jumlah_per_proses' => $this->Data_model->get_count_verifformal()['jml']];
			$data[3] = ['nama_proses' => 'Cetak Form KPDL', 'jumlah_per_proses' => $this->Data_model->get_count_cetakKPDL()['jml']];
			$data[4] = ['nama_proses' => 'Tindak Lanjut SP2DK-LHP2dk', 'jumlah_per_proses' => $this->Data_model->get_count_tindaklanjut()['jml']];
		} else {
			$data[0] = ['nama_proses' => 'Pengambilan Data', 'jumlah_per_proses' => $this->Data_model->get_count_jmltag(1)['jml']];
			$data[1] = ['nama_proses' => 'Verifikasi Material', 'jumlah_per_proses' => $this->Data_model->get_count_verifmaterial(1)['jml']];
			$data[2] = ['nama_proses' => 'Verifikasi Formal', 'jumlah_per_proses' => $this->Data_model->get_count_verifformal(1)['jml']];
			$data[3] = ['nama_proses' => 'Cetak Form KPDL', 'jumlah_per_proses' => $this->Data_model->get_count_cetakKPDL(1)['jml']];
			$data[4] = ['nama_proses' => 'Tindak Lanjut SP2DK-LHP2dk', 'jumlah_per_proses' => $this->Data_model->get_count_tindaklanjut(1)['jml']];
		}
		echo json_encode($data);
	}
}
