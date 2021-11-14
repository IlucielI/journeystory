<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Data extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->database();
        $this->load->library('pagination');
    }

    public function update_profil_post() 
    {
        $password = md5($this->input->post('password'));
        $password_default=0;
        if($password == "25d55ad283aa400af464c76d713c07ad")
            $password_default=1;
        $data = [
            'password' => $password,
            'password_default' => $password_default,
        ];
    
        $this->db->where('id', $this->input->post('user_id'));
        $this->db->update('user', $data);


        $this->response(['status' => 'success'], 200);
    
    }

    public function kota_get()
    {        
        
        $query="SELECT a.id,a.nama,a.provinsi_id, IFNULL(b.nama, '-') as provinsi
                from kota a
                left join provinsi b on (a.provinsi_id = b.id)
                order by a.id asc
                ";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function kota_kecamatan_get($id="")
    {
        $id = $this->get('id');
        
        $query="SELECT b.id, b.nama, b.provinsi_id , c.nama provinsi
                FROM kecamatan a 
                LEFT JOIN kota b ON a.kota_id = b.id
                LEFT JOIN provinsi c ON c.id = b.provinsi_id
                WHERE a.kota_id = '$id'
                GROUP BY b.id,b.nama,b.provinsi_id,c.nama
                ";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function rw_kelurahan_get($id="")
    {
        $id = $this->get('id');
        
        $query="SELECT a.id,a.rw, IFNULL(b.nama, '-') as ar
        from wilayah a
        left join user b on (a.ip=b.ip)
        where a.kelurahan_id = '$id'
        order by a.rw";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }


    public function kecamatan_get()
    {        
        $query="SELECT a.id,a.nama,a.kota_id, b.id kota_id ,b.nama kota_nama,b.provinsi_id, c.nama provinsi_nama
                FROM kecamatan a 
                LEFT JOIN kota b ON a.kota_id = b.id
                LEFT JOIN provinsi c ON c.id = b.provinsi_id
                ORDER BY a.id asc
                ";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function kpp_kota_get($id="")
    {        
        $id = $this->get('id');
        
        $query="SELECT a.id,a.nama,a.kota_id
                from kpp a
                where a.kota_id = '$id'
                order by a.nama
                ";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function kecamatan_kota_get($id="")
    {        
        $id = $this->get('id');
        
        $query="SELECT a.id,a.nama,a.kota_id
                from kecamatan a
                where a.kota_id = '$id'
                order by a.id asc
                ";

        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);

    }

   
    public function kelurahan_kec_get($id="")
    {   
        $id = $this->get('id');

        $query="SELECT a.id,a.nama,a.kecamatan_id, '' as ar
                from kelurahan a
                where a.kecamatan_id = '$id'
                order by a.id asc
                ";
        
        $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['debug'] = $id;
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function rekam_penugasan_post() 
    {
        $data = [
            'tanggal' => $this->post('tanggal'),
            'no_st' => $this->post('no_st'),
            'user_id' => $this->post('user_id'),
        ];
    
        $insert = $this->db->insert('rekam_penugasan', $data);

        if ($insert) {
            $this->response(['status' => 'success'], 200);
        } else {
            $this->response(['status' => 'fail', 200]);            
        }
    }
    // ==========================================
    // ============  Penugasan   ================
    // ==========================================

    public function no_st_get($ref_ip="") {
        $ref_ip = $this->get('ip');
        $current_date = date('Y-m-d');

        $data= $this->db->select('no_st')
			->from('rekam_penugasan')
			->where('cast(ref_ip as int)', $ref_ip)
            ->where('tgl_mulai_tugas <=', $current_date)
            ->where('tgl_akhir_tugas >=', $current_date)
			->order_by('tanggal', 'DESC', 'no_st', 'ASC')
			->get()
			->result();

        $response['status'] = "success";
        $response['debug'] = $ref_ip;
        $response['data'] = $data;

        $this->response($response, 200);
    }
    

    public function kecamatan_by_id_get($id="")
    {        
        $id = $this->get('id');

        $data = $this->db->select('nama')
        ->from('kecamatan')
        ->where('id', $id)
        ->order_by('id', 'ASC')
        ->get()
        ->result();

        $response['status'] = "success";
        $response['debug'] = $id;
        $response['data'] = $data;

        $this->response($response, 200);

    }

    public function kelurahan_by_id_get($id="")
    {        
        
        $id = $this->get('id');

        $data = $this->db->select('nama')
        ->from('kelurahan')
        ->where('id', $id)
        ->order_by('id', 'ASC')
        ->get()
        ->result();

        $response['status'] = "success";
        $response['debug'] = $id;
        $response['data'] = $data;

        $this->response($response, 200);

    }
    
    // ==========================================
    // ============ End Penugasan ===============
    // ==========================================



    // ==========================================
    // ============ Capture Data ================
    // ==========================================

    public function capture_data_get()
    {
        $data = $this->db->select('capture_data.*,kelurahan.nama as kelurahan, kecamatan.nama as kecamatan, user.nama as user')
        ->from('capture_data')
        ->join('kelurahan', 'kelurahan.id = capture_data.kel')
        ->join('kecamatan', 'kecamatan.id = capture_data.kec')
        ->join('user', 'user.id = capture_data.user_id')
        ->order_by('tanggal', 'DESC')
        ->get()
        ->result();


        // $query = "SELECT
        // a.*, b.nama as kelurahan, c.nama as kecamatan, d.nama as user
		// ,COUNT(f.UUID) as jumlah_foto
        // from capture_data a
        // join kelurahan b on b.id = a.kel
        // join kecamatan c on c.id = a.kec
        // join user d on d.id = a.user_id
		// 		left join foto f on f.UUID = a.UUID
        // GROUP BY  f.UUID
        // ORDER BY a.id desc
        //         ";

        // $data = $this->db->query($query)->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
        
    }

    public function capture_data_post() 
    {
        $data = [
            'tanggal' => $this->post('tanggal'),
            'lokasi_lat' => $this->post('lokasi_lat'),
            'lokasi_long' => $this->post('lokasi_long'),
            'jenis_lokasi' => $this->post('jenis_lokasi'),
            'nama_jalan' => $this->post('nama_jalan'),
            'rt' => $this->post('rt'),
            'rw' => $this->post('rw'),
            'kec' => $this->post('kec'),
            'kel' => $this->post('kel'),
            
            
            'jenis_data' => $this->post('jenis_data'),
            'klasifikasi_data' => $this->post('klasifikasi_data'),
            'klu' => $this->post('klu'),
            'kegiatan' => $this->post('kegiatan_usaha'),
            'merk' => $this->post('merk_u'),
            'nama_data' => $this->post('nama_data'),
            'uraian_data' => $this->post('uraian_data'),
            'tahun_perolehan' => $this->post('tahun_perolehan'),
            'sumber' => $this->post('sumber_data'),
            'jam_pengamatan' => $this->post('jam_pengamatan'),
            
            
            
            'status_npwp' => $this->post('status_katnpwp'),
            'kewarganegaraan' => $this->post('status_kewarganegaraan'),
            'jenis_identitas' => $this->post('status_jns_identitas'),
            'no_identitas' => $this->post('no_identitas'),
            'omzet' => $this->post('omzet'),
            'npwp' => $this->post('npwp'),
            'nama_usaha' => $this->post('nama'),
            'no_telp' => $this->post('tlp'),
            'email' => $this->post('email'),
            
            'status_wp' => $this->post('status_jns_wjb_pajak'),
            
            
            
            'user_id' => $this->post('user_id'),
            'UUID' => $this->post('UUID'),
            
            'no_st' => $this->post('no_st'),
            'dalam_rangka' => $this->post('dalam_rangka'),
            
            'verifikasi' => 0,
            'verifikasi_formal' => 0,
            'tindak_lanjut' => 0,
        ];
        $komentar = [
            'UUID' => $this->post('UUID'),
            'komentar' => $this->post('komentar'),
            'user_id' => $this->post('user_id'),
        ];
    
        $insert = $this->db->insert('capture_data', $data);
        $insert2 = $this->db->insert('komentar', $komentar);

        if ($insert) {
            $this->response(['status' => 'success'], 200);
        } else {
            $this->response(['status' => 'fail', 200]);            
        }
    }

    public function upload_post()
    {
        $images = $_POST['images'];
        $image_name = md5(uniqid(rand(), true));
        $filename = $image_name . '.' . 'png';
        
        $path = './upload/';
        
        file_put_contents($path . $filename, base64_decode($images));
        $data = [
            'UUID' => $this->post('UUID'),
            'nama' => $filename,
            'user_id' => $this->post('user_id'),
        ];
        
        $insert = $this->db->insert('foto', $data);

        if ($insert) {
            echo "Berhasil";
        } else {
            // $this->response(['status' => 'fail', 200]);       
            echo "Gagal Upload";     
        }
    }

    public function tambah_komentar_post() 
    {
        $komentar = [
            'UUID' => $this->post('UUID'),
            'komentar' => $this->post('komentar'),
            'user_id' => $this->post('user_id'),
        ];
        
        $insert = $this->db->insert('komentar', $komentar);

        if ($insert) {
            $this->response(['status' => 'success'], 200);
        } else {
            $this->response(['status' => 'fail', 200]);            
        }
    }

    // ==========================================
    // ============ END Capture Data ============
    // ==========================================
    
    // ==========================================
    // ====== Penjamin Kualitas Data ============
    // ==========================================

    public function pkd_get()
    {
        $data = $this->db->select('capture_data.*,kelurahan.nama as kelurahan, kecamatan.nama as kecamatan, user.nama as user')
        ->from('capture_data')
        ->join('kelurahan', 'kelurahan.id = capture_data.kel')
        ->join('kecamatan', 'kecamatan.id = capture_data.kec')
        ->join('user', 'user.id = capture_data.user_id')
        ->where('verifikasi', 1)
        ->order_by('id', 'DESC')
        ->get()
        ->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
        
    }

    // ==========================================
    // ====== END Penjamin Kualitas Data ========
    // ==========================================

    // ==========================================
    // =============== SP2DK ====================
    // ==========================================

    public function sp2dk_get()
    {
        $data = $this->db->select('a.*,b.nama as kelurahan, c.nama as kecamatan, d.nama as user, e.nama as ar')
        ->from('capture_data as a')
        ->join('kelurahan as b', 'b.id = a.kel')
        ->join('kecamatan as c', 'c.id = a.kec')
        ->join('user as d', 'd.id = a.user_id')
        ->join('user as e', 'e.kelurahan_id = a.kel', 'left')
        ->where('verifikasi', 1)
        ->where('tindak_lanjut', 1)
        ->order_by('id', 'DESC')
        ->get()
        ->result();

        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
        
    }

    // ==========================================
    // =============== END SP2DK ================
    // ==========================================

    // ===============================================================
    // =======================  MONITORING  ==========================
    // ===============================================================

    function monitoring_pengamatan_get() {
     
        $query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id 
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";

       $data = $this->db->query($query)->result();
       $response['status'] = "success";
       $response['data'] = $data;

       $this->response($response, 200);
    }

    function monitoring_tindak_lanjut_pkd_get() {
        
        $query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.verifikasi = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.verifikasi = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.verifikasi = '2', 1, NULL)) 'batal'
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id 
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";

        $data = $this->db->query($query)->result();
        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
    
    }

    function monitoring_tindak_lanjut_sp2dk_get() {
        $query = "SELECT
        b.nama as kecamatan, a.nama as kelurahan
        , COUNT(c.id) as jumlah_tagging
        ,COUNT(IF(c.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(c.tindak_lanjut = '0', 1, NULL)) 'belum'
        ,COUNT(IF(c.tindak_lanjut = '2', 1, NULL)) 'batal'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as sisa_potensi
        from kelurahan a
        join kecamatan b on b.id=a.kecamatan_id
        left join capture_data c on c.kel = a.id 
        GROUP BY a.id
        ORDER BY kecamatan asc, kelurahan asc
                ";
        $data = $this->db->query($query)->result();
        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
    }


    function monitoring_kinerja_get($id="") {
        $id = $this->get('id');
        $query = "SELECT
        a.nama
        , COUNT(b.id) as jumlah_tagging
        ,COUNT(IF(b.tindak_lanjut = '1', 1, NULL)) 'sudah'
        ,COUNT(IF(b.tindak_lanjut = '0', 1, NULL)) 'belum'
        , SUM(sp2dk_pembayaran) as pembayaran
        , SUM(sp2dk_potensi) as sisa_potensi
        FROM user a 
        left JOIN capture_data b on b.user_id=a.id
        where a.level = 2
        and a.id = '$id'
        GROUP BY a.id
                ";
        $data = $this->db->query($query)->result();
        $response['status'] = "success";
        $response['data'] = $data;

        $this->response($response, 200);
    }



    // ===============================================================
    // =======================  END MONITORING  ======================
    // ===============================================================

}