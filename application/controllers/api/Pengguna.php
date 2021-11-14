<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Pengguna extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->database();
        $this->load->library('pagination');
    }


    public function index_get()
    {        
        
        $penjualan = $this->db->select('*')
        ->from('tbl_user')
        ->order_by('id', 'ASC')
        ->get()
        ->result();

        $response['status'] = "success";
        $response['data'] = $penjualan;

        $this->response($response, 200);

    }

    public function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'username' => $this->post('username'),
            'password' => md5($this->post('password')),
            'handphone' => $this->post('handphone'),
            'level' => $this->post('level')
        ];
    
        $insert = $this->db->insert('tbl_user', $data);

        if ($insert) {
            $this->response(['error' => 'false','status' => 'success'], 200);
        } else {
            $this->response(['status' => 'fail', 200]);            
        }


    }

    public function update_post()
    {
        $id = $this->post('id');
        $data = [
            'id' => $this->post('id'),
            'nama' => $this->post('nama'),
            'username' => $this->post('username'),
            'password' => md5($this->post('password')),
            'handphone' => $this->post('handphone'),
            'level' => $this->post('level')
        ];
        
        $this->db->where('id', $id);
        $update = $this->db->update('tbl_user', $data);

        if ($update) {
            $this->response(['status' => 'success'], 200);
        } else {
            $this->response(['status' => 'fail'], 200);
        }

    }

    public function delete_post()
    {
        $id = $this->post('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('tbl_user');

        if ($delete) {
            $this->response(['error' => 'false','status' => 'success'], 200);
        } else {
            $this->response(['error' => 'true','status' => 'false'], 200);
        }
    }

}
