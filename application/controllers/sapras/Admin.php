<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }


    public function index()
    {  
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar', $data);
        $this->load->view('layoutsapras/index', $data);
        $this->load->view('layoutsapras/footer');

    }


} 