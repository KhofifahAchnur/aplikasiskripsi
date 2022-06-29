<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tanah');
        $this->load->model('M_masteraset');
        $this->load->model('M_gedung');
        $this->load->model('M_buku');
        $this->load->model('M_jalan');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_tanah'] = $this->M_tanah->jumlah();
        $data['jumlah_aset'] = $this->M_masteraset->jumlah();
        $data['jumlah_gedung'] = $this->M_gedung->jumlah();
        $data['jumlah_buku'] = $this->M_buku->jumlah();
        $data['jumlah_jalan'] = $this->M_jalan->jumlah();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('layoutsapras/index', $data);
        $this->load->view('layoutsapras/footer');
    }
}