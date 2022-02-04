<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_aset');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Barang';
        $data['barang'] = $this->M_aset->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/aset/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'register', 'required');
        $this->form_validation->set_rules('merk', 'merk', 'required');
        $this->form_validation->set_rules('ukuran', 'Nama Barang', 'required');
        $this->form_validation->set_rules('bahan', 'Kode Barang', 'required');
        $this->form_validation->set_rules('tahun', 'register', 'required');
        $this->form_validation->set_rules('asal_usul', 'register', 'required');
        $this->form_validation->set_rules('harga_brg', 'merk', 'required');
        $this->form_validation->set_rules('kondisi', 'merk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/aset/tambah');
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_aset->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/aset');
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data';
        $data['barang'] = $this->M_aset->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required');
        $this->form_validation->set_rules('bahan', 'Bahan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal_Usul', 'required');
        $this->form_validation->set_rules('harga_brg', 'Harga Barang', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('member/aset/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_aset->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/aset');
        }
    }

    public function hapus($id)
    {
        $this->M_aset->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/aset');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['barang'] = $this->M_aset->lihat();
        $this->load->view('member/aset/laporan', $data);

        // title dari pdf
        $this->data['judul'] = 'Laporan Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan outlet';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/aset/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

}
}
