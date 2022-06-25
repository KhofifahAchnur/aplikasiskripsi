<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi_gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kondisi_gedung');
        $this->load->model('M_gedung');
        // $this->load->model('M_lokasi');
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Kondisi Aset Gedung & Bangunan';
        $data['kondisi_gedung'] = $this->M_kondisi_gedung->lihat();
        $data['kogedung'] = $this->M_gedung->tampilgedung();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/kondisi_gedung/index', $data);
        $this->load->view('layoutsapras/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Kondisi Aset Gedung & Bangunan';
        $data['kondisi_gedung'] = $this->M_gedung->getGdgById($id);
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('kode_gedung', 'Kode Gedung', 'required');
        $this->form_validation->set_rules('tingkat', 'Bertingkat', 'required');
        $this->form_validation->set_rules('beton', 'Beton', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/kondisi_gedung/tambah', $data);
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_kondisi_gedung->updatekondisigedung($id);
            $this->M_kondisi_gedung->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sapras/gedung');
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

        $data['kondisi_gedung'] = $this->M_kondisi_gedung->lihat();
        $this->load->view('sapras/kondisi_gedung/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Kondisi Aset Gedung & Bangunan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Kondisi Aset Gedung & Bangunan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('sapras/kondisi_gedung/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
