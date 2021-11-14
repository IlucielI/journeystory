<?php

defined('BASEPATH') or exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['get']['limit'] = 10000; // 500 requests per hour per user/key
        $this->methods['post']['limit'] = 10000; // 100 requests per hour per user/key
        $this->methods['delete']['limit'] = 10000; // 50 requests per hour per user/key
        $this->load->model('Auth_model');
    }


    public function index_post()
    {
        $email = $this->post('email');
        $password = md5($this->post('password'));
        $kunci = $this->config->item('thekey'); 
        $user_level = "Staff";
        $invalidLogin = ['status' => 'invalid login'];

        $check_login = $this->Auth_model->check_login($email, $password);
        
    
        if (!$check_login) {
            $this->response($invalidLogin, 200);
        } else {
            if ($check_login['level'] == 1)
                $user_level = "Admin";
            $token['email'] = $email;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            // $token['exp'] = $date->getTimestamp() + 60*60*24; //To here is to generate token
            $token['exp'] = $date->getTimestamp() + 60*60*24; //To here is to generate token
   
            $output['error'] = "false"; 
            $output['message'] = 'Login successfull';
            $result_token = JWT::encode($token, $kunci);
    

            $output['id'] = $check_login['id'];
            $output['ip'] = $check_login['ip'];
            $output['nip'] = $check_login['nip'];
            $output['nama']=$check_login['nama']; 
            $output['jabatan'] = $check_login['jabatan']; 
            $output['nama_seksi'] = $check_login['nama_seksi']; 
            $output['tipe_seksi']=$check_login['tipe_seksi']; 
            $output['kel']=$check_login['kel'];
            $output['kec']=$check_login['kec'];
            //$output['password_default']=$check_login['password_default'];
            $output['email']=$email;
            $output['user']=$user_level;
            //$output['handphone']=$check_login['handphone'];
            $output['token'] = $result_token;

            $this->response($output, 200);
        }

    }    
}
