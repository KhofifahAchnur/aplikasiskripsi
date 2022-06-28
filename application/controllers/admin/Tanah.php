<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tanah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tanah');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data Aset Tanah';
        $data['tanah'] = $this->M_tanah->lihat();
        $data['jumlah_kasmasuk'] = $this->M_tanah->totalkas();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/tanah/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Aset Tanah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kode'] = $this->M_tanah->kode();

        $this->form_validation->set_rules('nama_tanah', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_tanah', 'Kode Tanah', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('hak', 'Hak', 'required');
        $this->form_validation->set_rules('nomer', 'Nomer', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/tanah/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_tanah->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/tanah');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Aset Tanah';
        $data['tanah'] = $this->M_tanah->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_tanah', 'Nama', 'required');
        $this->form_validation->set_rules('kode_tanah', 'Kode Tanah', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('hak', 'Hak', 'required');
        $this->form_validation->set_rules('nomer', 'Nomer', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal-Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/tanah/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_tanah->edit_tanah($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/tanah');
        }
    }

    public function hapus($id)
    {
        $this->M_tanah->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/tanah');
    }

    public function filter()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
       

        $data['judul'] = 'Filter Laporan';
        $data['jumlah_kasmasuk'] = $this->M_tanah->totalkas();
        // $data['aset'] = $this->M_masteraset->lihat();
        $data['tanah'] = $this->M_tanah->databytanggal($tgl_awal, $tgl_akhir);
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        // $data['aset'] = $this->M_masteraset->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/tanah/filter', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $data['jumlah_kasmasuk'] = $this->M_tanah->totalkas();

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['tanah'] = $this->M_tanah->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
        $data['tgl_awal'] = $tgl_awalcetak;
        $data['tgl_akhir'] = $tgl_akhircetak;

        $this->load->view('admin/tanah/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Aset Tanah';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Aset Tanah';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/tanah/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
