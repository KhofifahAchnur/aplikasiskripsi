<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hbuku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        $this->load->model('M_kondisi_buku');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index($id)
    {

        $data['judul'] = 'Halaman Data History Aset perpustakaan';
        $data['kondisi_buku'] = $this->M_kondisi_buku->lihatkondisibyid($id);
        $data['buku'] = $this->M_buku->getBrgById($id);
        // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);
        // $data['pemeliharaan'] = $this->M_pemeliharaan->lihatpemeliharaanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/hbuku/index', $data);
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

        $data['kondisi_buku'] = $this->M_kondisi_buku->lihatkondisibyid($id);
        $data['buku'] = $this->M_buku->getBrgByIdCetak($id);
        // $data['pemeliharaan'] = $this->M_pemeliharaan->lihatpemeliharaanbyid($id);
        $this->load->view('guru/hbuku/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan history Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan history Aset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('guru/hbuku/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
