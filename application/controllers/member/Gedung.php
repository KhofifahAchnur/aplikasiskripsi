<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gedung');
        // if ($this->session->userdata('hak_akses') != '1') {
        //     $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
		// 			</button> </div>');
        //     redirect('auth');
        // }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data History';
        $data['gedung'] = $this->M_gedung->lihat();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/gedung/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('kode_gedung', 'Kode Gedung', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('tingkat', 'Bertingkat', 'required');
        $this->form_validation->set_rules('beton', 'Beton', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/gedung/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_gedung->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/gedung');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Penanggung Jawab';
        $data['gedung'] = $this->M_gedung->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('kode_gedung', 'Kode Gedung', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('tingkat', 'Bertingkat', 'required');
        $this->form_validation->set_rules('beton', 'Beton', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal-Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/gedung/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_gedung->edit_gedung($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/gedung');
        }
    }

    public function hapus($id)
    {
        $this->M_gedung->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/gedung');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['gedung'] = $this->M_gedung->lihat();
        $this->load->view('admin/gedung/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Gedung Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Gedung Aset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/gedung/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

}
}
