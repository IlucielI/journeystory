<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tagging_model extends CI_Model
{

    public $table = 'capture_data';
    public $id = 'id';
    public $nama = 'nama';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
        $this->load->library('m_db');
    }


    // get all
    function get_all()
    {
        $this->db->where('delete',0);
        $this->db->order_by($this->nama, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function update_where($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }


}
