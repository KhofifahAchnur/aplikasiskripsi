<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_member');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Member';
        $data['member'] = $this->M_member->lihatmember();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('member/index', $data);
        $this->load->view('layout/footer');
    }
}