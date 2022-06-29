<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lokasi');
        $this->load->model('M_pbaru');
        $this->load->model('M_pengajuan');
        $this->load->model('M_pgedung');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_lokasi'] = $this->M_lokasi->jumlah();
        $data['jumlah_pbaru'] = $this->M_pbaru->jumlah();
        $data['jumlah_pengajuan'] = $this->M_pengajuan->jumlah();
        $data['jumlah_pgedung'] = $this->M_pgedung->jumlah();
        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('layoutmember/index', $data);
        $this->load->view('layoutmember/footer');
    }
}