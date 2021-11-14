<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_perorangan extends CI_Controller
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
        $data['title'] = "Data Perorangan";
        $data['data'] = $this->db->select('*')
                        ->from('data_perorangan')
                        ->order_by('id', 'ASC')
                        ->get()
                        ->result();
        $this->template->load('template/backend/dashboard', 'data_perorangan/data_list', $data);
    }

    public function read($id)
    { 
        $data['title'] = "Lihat Data Perorangan"; 
        $data['data'] = $this->db->select('*')
                        ->from('data_perorangan')
                        ->where('id',$id)
                        ->get()
                        ->row();
        if ($data['data']) {
            $this->template->load('template/backend/dashboard', 'data_perorangan/data_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_perorangan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah Data Perorangan',
            'action' => site_url('data_perorangan/create_action'),
            'id' => set_value('id'),
            'npwp' => set_value('npwp'),
            'nama' => set_value('nama'),
            'badan' => set_value('badan'),
            'status_pkp' => set_value('status_pkp'),
            'status_wp' => set_value('status_wp'),
            'pelaporan_spt' => set_value('pelaporan_spt'),
            'tunggakan' => set_value('tunggakan'),
        );
        $this->template->load('template/backend/dashboard', 'data_perorangan/data_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'npwp' => $this->input->post('npwp'),
                'nama' => $this->input->post('nama'),
                'badan' => $this->input->post('badan'),
                'status_pkp' => $this->input->post('status_pkp'),
                'status_wp' => $this->input->post('status_wp'),
                'pelaporan_spt' => $this->input->post('pelaporan_spt'),
                'tunggakan' => $this->input->post('tunggakan'),
            );

            $this->db->insert('data_perorangan', $data);
            $this->session->set_flashdata('message', 'Berhasil Tambah');
            redirect(site_url('data_perorangan'));
        }
    }

    public function update($id)
    {
        $row = $this->db->select('*')
                ->from('data_perorangan')
                ->where('id',$id)
                ->get()
                ->row();

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('data_perorangan/update_action'),
                'id' => set_value('id',$row->id),
                'npwp' => set_value('nip',$row->npwp),
                'nama' => set_value('nama',$row->nama),
                'badan' => set_value('badan',$row->badan),
                'status_pkp' => set_value('status_pkp',$row->status_pkp),
                'status_wp' => set_value('status_wp',$row->status_wp),
                'pelaporan_spt' => set_value('pelaporan_spt',$row->pelaporan_spt),
                'tunggakan' => set_value('tunggakan',$row->tunggakan),

            );
            $this->template->load('template/backend/dashboard', 'data_perorangan/data_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_perorangan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'npwp' => $this->input->post('npwp'),
                'nama' => $this->input->post('nama'),
                'badan' => $this->input->post('badan'),
                'status_pkp' => $this->input->post('status_pkp'),
                'status_wp' => $this->input->post('status_wp'),
                'pelaporan_spt' => $this->input->post('pelaporan_spt'),
                'tunggakan' => $this->input->post('tunggakan'),
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('data_perorangan', $data);

            $this->session->set_flashdata('message', 'Berhasil Diubah');
            redirect(site_url('data_perorangan'));
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_perorangan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect(site_url('data_perorangan'));
    }

    public function _rules()
    {
        // $this->form_validation->set_rules('id', 'id', 'trim|required');
        $this->form_validation->set_rules('npwp', 'npwp ', 'trim|required');
       
        // $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
