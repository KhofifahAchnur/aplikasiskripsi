<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kendaraan');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Barang';
        $data['motor'] = $this->M_kendaraan->lihat();
        

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/kendaraan/index', $data);
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
            $this->load->view('member/kendaraan/tambah');
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_kendaraan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/kendaraan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data';
        $data['motor'] = $this->M_kendaraan->getBrgById($id);
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
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/kendaraan/edit', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_kendaraan->edit_motor($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/kendaraan');
        }
    }

    public function hapus($id)
    {
        $this->M_kendaraan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/kendaraan');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['motor'] = $this->M_kendaraan->lihat();
        $this->load->view('member/kendaraan/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan kendaraan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan kendaraan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/kendaraan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}