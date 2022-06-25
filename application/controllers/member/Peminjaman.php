<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_peminjaman');
        $this->load->model('M_aset');
        $this->load->model('M_lokasi');
        $this->load->model('M_penanggung_jawab');
        $this->load->model('M_perpindahan');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Peminjaman Aset Peralatan & Mesin';
        $data['pinjam'] = $this->M_peminjaman->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/peminjaman/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Peminjaman Aset Peralatan & Mesin';
        // $data['barang'] = $this->M_aset->lihat();
        // $data['aset'] = $this->M_aset->tampilaset();
        // $data['rawat'] = $this->M_perawatan->lihat();
        $data['aset'] = $this->M_aset->getBrgById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/peminjaman/tambah', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_perpindahan->tambahlokasi($id);
            $this->M_perpindahan->proses_tambah();
            $this->M_peminjaman->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/peminjaman');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Peminjaman Aset Peralatan & Mesin';
        $data['aset'] = $this->M_aset->getBrgById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/peminjaman/edit', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_peminjaman->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/peminjaman');
        }
    }

    public function hapus($id)
    {
        $this->M_peminjaman->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/peminjaman');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['pinjam'] = $this->M_peminjaman->lihat();
        $this->load->view('member/peminjaman/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Peminjaman Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Peminjaman Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/peminjaman/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
