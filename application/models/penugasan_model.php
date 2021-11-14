<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penugasan_Model extends CI_Model
{

    public $table = 'rekam_penugasan';
    public $id = 'id';
    public $no_st = 'no_st';
    public $lokasi = 'lokasi';
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
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }

        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('id', 'desc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }

    // insert data
    public function insert($data = array()) {
        if(!empty($data)){
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }

    // update data
    public function update($data, $condition = array()) {
        if(!empty($data)){
            $this->db->select('tanggal, tgl_mulai_tugas, tgl_akhir_tugas, lokasi');
            $this->db->from($this->table);
        
            if(array_key_exists("where", $condition)){
            foreach($condition['where'] as $key => $val){
                $this->db->where($key, $val);
                
                // Update member data
                $update = $this->db->update($this->table, $data);
                
                // Return the status
                return $update?true:false;
            }
        }
        
    }
        return false;
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
