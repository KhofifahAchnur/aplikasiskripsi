<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_aset');
        $this->load->model('M_perpindahan');
        $this->load->model('M_kondisi');
        $this->load->model('M_perawatan');
        $this->load->model('M_peminjaman');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index($id)
    {

        $data['judul'] = 'Halaman Data History Aset Peralatan & Mesin';
        $data['kondisi'] = $this->M_kondisi->lihatkondisibyid($id);
        $data['barang'] = $this->M_aset->getBrgById($id);
        // $data['barang'] = $this->M_aset->lihat();
        $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);
        $data['rawat'] = $this->M_perawatan->lihatperawatanbyid($id);
        $data['pinjam'] = $this->M_peminjaman->lihatpeminjamanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/history/index', $data);
        $this->load->view('layoutguru/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data';
        $data['pindah'] = $this->M_perpindahan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_barang', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/perpindahan/tambah', $data);
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_lokasi->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/history');
        }
    }

    public function laporan($id)
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        
        $data['barang'] = $this->M_aset->getBrgByIdCetak($id);
        $data['barang2'] = $this->M_perpindahan->lihatperpindahanbyid($id);
        $data['rawat'] = $this->M_perawatan->lihatperawatanbyid($id);
        $data['kondisi'] = $this->M_kondisi->lihatkondisibyid($id);
        $data['pinjam'] = $this->M_peminjaman->lihatpeminjamanbyid($id);
        $this->load->view('guru/history/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan history Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan history Aset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('guru/history/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
