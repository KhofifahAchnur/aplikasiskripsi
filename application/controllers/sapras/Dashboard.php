<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pbaru');
        $this->load->model('M_pengajuan');
        $this->load->model('M_pgedung');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_pbaru'] = $this->M_pbaru->jumlah();
        $data['jumlah_pengajuan'] = $this->M_pengajuan->jumlah();
        $data['jumlah_pgedung'] = $this->M_pgedung->jumlah();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('layoutsapras/index', $data);
        $this->load->view('layoutsapras/footer');
    }
}