<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghapusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghapusan');
        $this->load->model('M_aset');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Penghapusan Aset Peralatan & Mesin';
        $data['barang'] = $this->M_penghapusan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/penghapusan/index', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['barang'] = $this->M_penghapusan->lihat();
        $this->load->view('admin/penghapusan/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penghapusan Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Penghapusan Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/penghapusan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
