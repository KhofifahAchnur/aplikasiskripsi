<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_aset');
        $this->load->model('M_perpindahan');
        $this->load->model('M_kondisi');
    }

    public function index($id)
    {
        $data['judul'] = 'Halaman Data History';
        $data['kondisi'] = $this->M_kondisi->lihat();
        $data['barang'] = $this->M_aset->getBrgById($id);
        // $data['barang'] = $this->M_aset->lihat();
        $data['pindah'] = $this->M_perpindahan->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/history/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['pindah'] = $this->M_perpindahan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_barang', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/perpindahan/tambah', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_lokasi->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/history');
        }
    }
}
