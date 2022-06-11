<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function index()
    {  
        $data['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $this->load->view('layoutmemberheader', $data);
        $this->load->view('layoutmembertopbar');
        $this->load->view('layoutmembersidebar');
        $this->load->view('member/user/index', $data);
        $this->load->view('layoutmemberfooter');

    }


}