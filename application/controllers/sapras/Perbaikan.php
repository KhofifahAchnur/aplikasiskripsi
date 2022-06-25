<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbaikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perbaikan');
        // $this->load->model('M_aset');
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Perbaikan Barang';
        $data['barang'] = $this->M_perbaikan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/perbaikan/index', $data);
        $this->load->view('layoutsapras/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Data History';
        $data['barang'] = $this->M_perbaikan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_perbaikan', 'Nama Perbaikan', 'required');
        $this->form_validation->set_rules('lokasi_aset', 'lokasi_aset', 'required');
        $this->form_validation->set_rules('rusak', 'Kerusakan', 'Kequired');
        $this->form_validation->set_rules('biaya_perbaikan', 'Biaya Perbaikan', 'Bequired');
   


        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/perbaikan/tambah');
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_perbaikan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sapras/perbaikan');
        }
    }


    // public function brgberdasarkankondisi($id)
    // {
    //     $data['judul'] = 'Halaman Data Barang';
    //     $data['barang'] = $this->M_masteraset->lihatBykondisi()($id);
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->load->view('layoutsapras/header', $data);
    //     $this->load->view('layoutsapras/topbar');
    //     $this->load->view('layoutsapras/sidebar');
    //     $this->load->view('sapras/perbaikan/index', $data);
    //     $this->load->view('layoutsapras/footer');
    // }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['barang'] = $this->M_perbaikan->lihat();
    //     $this->load->view('sapras/perbaikan/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Perbaikan Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Perbaikan Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('sapras/perbaikan/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
