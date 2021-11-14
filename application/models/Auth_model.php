<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function check_login($username, $password)
	{
		// $this->db->where('ip', $username);
		// $this->db->where('password', $password);
		// $user = $this->db->get('user')->row_array();

		$query = "SELECT 
								a.id, a.ip, a.nip, a.nama, a.level, a.seksi_id
                from user a
                where (a.ip = '$username' or REPLACE(a.nip, ' ', '') = '$username')
								and a.password = '$password'
				";
		$data = $this->db->query($query)->row_array();
		return $data;
	}

	public function register($data)
	{
		return $this->db->insert('user', $data);
	}
}
