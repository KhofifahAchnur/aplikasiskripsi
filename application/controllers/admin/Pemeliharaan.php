<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemeliharaan');
        $this->load->model('M_gedung');
        $this->load->model('M_lokasi');
        $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Pemeliharaan Aset Gedung & Bangunan';
        $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pemeliharaan/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data';
        // $data['barang'] = $this->M_aset->lihat();
        // $data['aset'] = $this->M_aset->tampilaset();
        // $data['rawat'] = $this->M_pemeliharaan->lihat();
        $data['gedung'] = $this->M_gedung->getGdgById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama gedung', 'required');
        $this->form_validation->set_rules('kode_gedung', 'Kode gedung', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pemeliharaan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            // $this->M_perpindahan->tambahlokasi($id);
            $this->M_pemeliharaan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pemeliharaan');
        }
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $this->load->view('admin/pemeliharaan/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Gedung & Bangunan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Pemeliharaan Aset Gedung & Bangunan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/pemeliharaan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
