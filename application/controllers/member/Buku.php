<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        // if ($this->session->userdata('hak_akses') != '1') {
        //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
		// 			</button> </div>');
        //     redirect('auth');
        // }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data History';
        $data['buku'] = $this->M_buku->lihat();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/buku/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/buku/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_buku->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/buku');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Perpustakaan';
        $data['buku'] = $this->M_buku->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal-Usul', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kondisi', 'kondisi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/buku/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_buku->edit_buku($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/buku');
        }
    }

    public function hapus($id)
    {
        $this->M_buku->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/buku');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['buku'] = $this->M_buku->lihat();
        $this->load->view('admin/buku/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Buku Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Buku Aset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/buku/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
