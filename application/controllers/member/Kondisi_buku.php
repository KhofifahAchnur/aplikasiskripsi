<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi_buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kondisi_buku');
        $this->load->model('M_buku');
        // $this->load->model('M_lokasi');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Kondisi Aset Perpustakaan';
        $data['kondisi_buku'] = $this->M_kondisi_buku->lihat();
        $data['kobuku'] = $this->M_buku->tampilbuku();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/kondisi_buku/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Kondisi Aset Perpustakaan';
        $data['kondisi_buku'] = $this->M_buku->getBrgById($id);
        // $data['lokasi'] = $this->M_lokasi->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_buku', 'Nama buku', 'required');
        $this->form_validation->set_rules('kode_buku', 'Kode buku', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/kondisi_buku/tambah', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_kondisi_buku->updatekondisibuku($id);
            $this->M_kondisi_buku->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/buku');
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
    //         $this->load->view('layoutmember/header', $data);
    //         $this->load->view('layoutmember/topbar');
    //         $this->load->view('layoutmember/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layoutmember/footer');
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
        redirect('member/lokasi');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['kondisi_buku'] = $this->M_kondisi_buku->lihat();
        $this->load->view('member/kondisi_buku/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Kondisi Aset Perpustakaan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Kondisi Aset Perpustakaan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/kondisi_buku/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
