<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_masteraset');
        $this->load->model('M_perpindahan');
        $this->load->model('M_penanggung_jawab');
        $this->load->model('M_lokasi');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_aset'] = $this->M_masteraset->jumlah();
        $data['jumlah_pindah'] = $this->M_perpindahan->jumlah();
        $data['jumlah_penanggungjwb'] = $this->M_penanggung_jawab->jumlah();
        $data['jumlah_lokasi'] = $this->M_lokasi->jumlah();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('layoutmember/index', $data);
        $this->load->view('layoutmember/footer');
    }
}