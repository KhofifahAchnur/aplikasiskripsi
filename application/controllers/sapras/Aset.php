<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_aset');
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Aset Peralatan & Mesin';
        $data['barang'] = $this->M_aset->lihat();
        

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/aset/index', $data);
        $this->load->view('layoutsapras/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Aset Peratan & Mesin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kode'] = $this->M_aset->kode();

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|is_unique[aset.kode_barang]', [
            'is_unique' => 'Kode Aset  ini sudah ada!'
        ]);

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('register', 'register', 'required');
        $this->form_validation->set_rules('merk', 'merk', 'required');
        $this->form_validation->set_rules('ukuran', 'Nama Barang', 'required');
        $this->form_validation->set_rules('bahan', 'Kode Barang', 'required');
        $this->form_validation->set_rules('tahun', 'register', 'required');
        $this->form_validation->set_rules('asal_usul', 'register', 'required');
        $this->form_validation->set_rules('harga_brg', 'merk', 'required');
        $this->form_validation->set_rules('kondisi', 'merk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/aset/tambah');
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_aset->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sapras/aset');
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Aset Peratan & Mesin';
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
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/aset/edit', $data);
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_aset->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sapras/aset');
        }
    }

    public function hapus($id)
    {
        $this->M_aset->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sapras/aset');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['barang'] = $this->M_aset->lihat();
        $this->load->view('sapras/aset/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('sapras/aset/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
