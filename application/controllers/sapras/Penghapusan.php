<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghapusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghapusan');
        $this->load->model('M_aset');
        // if ($this->session->userdata('hak_akses') != '1') {
        //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
		// 			</button> </div>');
        //     redirect('auth');
        // }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Penghapusan Barang';
        $data['barang'] = $this->M_penghapusan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/penghapusan/index', $data);
        $this->load->view('layout/footer');
    }
}