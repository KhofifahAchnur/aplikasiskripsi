<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pbaru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pbaru');
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
        $data['judul'] = 'Halaman Data Barang';
        $data['pbaru'] = $this->M_pbaru->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pbaru/index', $data);
        $this->load->view('layout/footer');
    }


    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['pbaru'] = $this->M_pbaru->lihat();
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        // $this->form_validation->set_rules('jenis', 'Jenis Pengajuan', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pbaru/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_pbaru->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pbaru');
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data';
        $data['pbaru'] = $this->M_pbaru->getStsById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pbaru/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_pbaru->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pbaru');
        }
    }

    public function hapus($id)
    {
        $this->M_pbaru->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pbaru');
    }

    public function brgberdasarkanlks($id)
    {
        $data['judul'] = 'Halaman Data Barang';
        $data['barang'] = $this->M_aset->lihatbylokasi($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/ruangan/index', $data);
        $this->load->view('layout/footer');
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['barang'] = $this->M_lokasi->lihat();
    //     $this->load->view('admin/lokasi/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Lokasi Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Lokasi Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/lokasi/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    // public function laporanruangan($id)
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['barang'] = $this->M_aset->lihatbylokasi($id);
    //     $this->load->view('admin/ruangan/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Lokasi Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Lokasi Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/ruangan/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['pbaru'] = $this->M_pbaru->lihat();
        $this->load->view('admin/pbaru/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Pengajuan Aset Baru';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pengajuan Aset Baru';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/pbaru/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
