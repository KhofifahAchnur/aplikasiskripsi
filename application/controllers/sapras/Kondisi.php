<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kondisi');
        $this->load->model('M_aset');
        // $this->load->model('M_lokasi');
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Kondisi Aset Peralatan & Mesin';
        $data['kondisi'] = $this->M_kondisi->lihat();
        $data['aset'] = $this->M_aset->tampilaset();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/kondisi/index', $data);
        $this->load->view('layoutsapras/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['kondisi'] = $this->M_aset->getBrgById($id);
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        // $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/kondisi/tambah', $data);
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_kondisi->updatekondisi($id);
            $this->M_kondisi->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sapras/masteraset');
        }
    }

    // public function ubahkondisi($id)
    // {
    //     $data['judul'] = 'Halaman Tambah Data';
    //     $data['barang'] = $this->M_aset->lihat();
    //     $data['aset'] = $this->M_aset->tampilaset();
    //     $data['kondisi'] = $this->M_aset->getBrgById($id);
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    //     $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('layoutsapras/header', $data);
    //         $this->load->view('layoutsapras/topbar');
    //         $this->load->view('layoutsapras/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layoutsapras/footer');
    //     } else {
    //         $this->M_kondisi->updatekondisi($id);
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('masteraset');
    //     }
    // }




    public function hapus($id)
    {
        $this->M_lokasi->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sapras/lokasi');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['kondisi'] = $this->M_kondisi->lihat();
        $this->load->view('sapras/kondisi/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Kondisi Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Kondisi Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('sapras/kondisi/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
