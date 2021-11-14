<?php
class Administrator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}
	function index()
	{
		$x['judul'] = "Login";
		$this->load->view('template/auth', $x);
	}
	function cekuser()
	{
		$username = strip_tags(stripslashes($this->input->post('username', TRUE)));
		$password = strip_tags(stripslashes($this->input->post('password', TRUE)));
		$u = str_replace(' ', '', $username);
		$p = md5($password);
		$cadmin = $this->Auth_model->check_login($u, $p);
		if (!$cadmin) {
			redirect('administrator/gagallogin');
		} else {
			$this->session->set_userdata('masuk', true);
			$this->session->set_userdata('user', $u);
			$this->session->set_userdata('level', $cadmin['level']);
			$this->session->set_userdata('ip', $cadmin['ip']);
			$this->session->set_userdata('id', $cadmin['id']);
			$this->session->set_userdata('nama', $cadmin['nama']);
			$this->session->set_userdata('seksi_id', $cadmin['seksi_id']);
			redirect('dashboard');
		}
	}

	function gagallogin()
	{
		$url = base_url('administrator');
		echo $this->session->set_flashdata('msg', 'Error: NIP/IP Atau Password Salah');
		redirect($url);
	}
	function logout($out = false)
	{
		if ($out == false) {
			$this->session->sess_destroy();
			echo $this->session->set_flashdata('msg', 'Berhasil Logout');
			$url = base_url('');
			redirect($url);
		}
		$url = base_url('administrator');
		echo $this->session->set_flashdata('msg', 'Password Berhasil Diubah');
		redirect($url);
	}
}
