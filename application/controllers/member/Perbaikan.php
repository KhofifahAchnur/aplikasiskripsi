<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perbaikan');
        $this->load->model('M_aset');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Perbaikan Barang';
        $data['barang'] = $this->M_perbaikan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/perbaikan/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['aset'] = $this->M_masteraset->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required');
        $this->form_validation->set_rules('jenis_service', 'Jenis Service', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('perbaikan/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_perbaikan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('perbaikan');
        }
    }

   
    public function brgberdasarkankondisi($id)
    {
        $data['judul'] = 'Halaman Data Barang';
        $data['barang'] = $this->M_masteraset->lihatBykondisi()($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('perbaikan/index', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['barang'] = $this->M_perbaikan->lihat();
        $this->load->view('perbaikan/laporan', $data);

        // title dari pdf
        $this->data['judul'] = 'Laporan Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan outlet';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('perbaikan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

}

}