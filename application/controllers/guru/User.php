<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {  
        $data['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('layoutguruheader', $data);
        $this->load->view('layoutgurutopbar');
        $this->load->view('layoutgurusidebar');
        $this->load->view('guru/user/index', $data);
        $this->load->view('layoutgurufooter');

    }


}