<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_lokasi');
        $this->load->model('M_perawatan');
        $this->load->model('M_pemeliharaan');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_lokasi'] = $this->M_lokasi->jumlah();
        $data['jumlah_perawatan'] = $this->M_perawatan->jumlah();
        $data['jumlah_pemeliharaan'] = $this->M_pemeliharaan->jumlah();
        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('layoutguru/index', $data);
        $this->load->view('layoutguru/footer');
    }
}