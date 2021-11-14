<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

	public function get_komentar($UUID)
	{
		$query = "SELECT *
		from komentar a
		join user b on b.id=a.user_id 
		where a.UUID = '$UUID'
		";
		$data = $this->db->query($query)->result();
		return $data;
	}

	public function get_foto($UUID)
	{
		$query = "SELECT *,a.nama as foto
			from foto a
			join user b on b.id=a.user_id 
			where a.UUID = '$UUID'
		";
		$data = $this->db->query($query)->result();
		return $data;
	}

	// MODEL AUTOCOMPLETE
	public function get_data_lapangan($name)
	{
		$this->db->like('npwpl', $name);

		$query = $this->db->get('data_wp', 3);

		$items = array();
		$i = 0;
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$items[$i]['id'] = $row->npwpl;
				$items[$i]['npwp'] = $row->npwpl;
				$items[$i]['tanggal_daftar'] = $row->tanggal_daftar;
				$i++;
			}
		}

		return $items;
	}
	// END OF MODEL AUTOCOMPLETE

	public function get_alasan($ID, $jenis)
	{
		$query = "SELECT alasan
		from alasan_verifikasi a
		where a.capture_id = '$ID' AND a.jenis_verifikasi = $jenis
		";
		$data = $this->db->query($query)->row_array();
		return $data;
	}

	public function get_count_jmltag($kat = false)
	{
		$bulan = date('Y-m');
		if ($kat != false) {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
		";
		} else {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		";
		}
		$data = $this->db->query($query)->row_array();
		return $data;
	}
	public function get_count_verifmaterial($kat = false)
	{
		$bulan = date('Y-m');
		if ($kat != false) {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 0 AND a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
		";
		} else {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 0 
		";
		}
		$data = $this->db->query($query)->row_array();
		return $data;
	}
	public function get_count_verifformal($kat = false)
	{
		$bulan = date('Y-m');
		if ($kat != false) {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.verifikasi_formal = 0 AND a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
		";
		} else {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.verifikasi_formal = 0 
		";
		}
		$data = $this->db->query($query)->row_array();
		return $data;
	}
	public function get_count_cetakKPDL($kat = false)
	{
		$bulan = date('Y-m');
		if ($kat != false) {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.tindak_lanjut = 0 AND a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
		";
		} else {
			$query = "SELECT COUNT(a.id) as jml 
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.tindak_lanjut = 0
		";
		}
		$data = $this->db->query($query)->row_array();
		return $data;
	}
	public function get_count_tindaklanjut($kat = false)
	{
		$bulan = date('Y-m');
		if ($kat != false) {
			$query = "SELECT COUNT(a.id) as jml
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.verifikasi_formal = 1 AND a.tindak_lanjut = 0 AND a.tanggal >= '$bulan-01' AND a.tanggal <= '$bulan-31'
		";
		} else {
			$query = "SELECT COUNT(a.id) as jml
		from capture_data a
		join user b on b.id = a.user_id
		WHERE a.verifikasi = 1 AND a.verifikasi_formal = 1 AND a.tindak_lanjut = 0
		";
		}
		$data = $this->db->query($query)->row_array();
		return $data;
	}
}
