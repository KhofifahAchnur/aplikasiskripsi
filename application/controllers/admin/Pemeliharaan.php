<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemeliharaan');
        $this->load->model('M_gedung');
        $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Pemeliharaan Aset Gedung & Bangunan';
        $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pemeliharaan/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Pemeliharaan Aset Gedung & Bangunan';
        // $data['gedung'] = $this->M_aset->lihat();
        // $data['aset'] = $this->M_aset->tampilaset();
        // $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $data['gedung'] = $this->M_gedung->getGdgById($id);
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama gedung', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pemeliharaan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            // $this->M_perpindahan->tambahlokasi($id);
            $this->M_pemeliharaan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pemeliharaan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Pemeliharaan Aset Gedung & Bangunan';
        $data['pemeliharaan'] = $this->M_pemeliharaan->getpemeliharaanById($id);
        $data['gedung'] = $this->M_gedung->getGdgById($data['pemeliharaan']['gedung_id']);
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pemeliharaan/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_pemeliharaan->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pemeliharaan');
        }
    }

    public function hapus($id)
    {
        $this->M_pemeliharaan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pemeliharaan');
    }

    public function filter()
    {
        // Mendapatkan nilai input
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $nama_gedung = $this->input->get('nama_gedung');

        $data['judul'] = 'Filter Laporan';

        // Proses Filter
        if (isset($_GET['filter'])) {

            // Data Filter Berdasarkan Tanggal & Nama
            if (isset($_GET['nama_gedung'])) {
                $data['pemeliharaan'] = $this->M_pemeliharaan->databynama($tgl_awal, $tgl_akhir, $nama_gedung);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_gedung'] = $nama_gedung;
                $data['nama_gedung'] = $this->M_pemeliharaan->nama_tanggal($tgl_awal, $tgl_akhir, $nama_gedung);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['pemeliharaan'] = $this->M_pemeliharaan->databytanggal($tgl_awal, $tgl_akhir));
                $data['pemeliharaan'] = $this->M_pemeliharaan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama_gedung'] = $this->M_pemeliharaan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama_gedung'] = $this->M_pemeliharaan->nama_gedung();
            $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pemeliharaan/filter');
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // Mendapatkan nilai input
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $nama_gedung = $this->input->get('nama_gedung');

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // Proses Cetak Filter
        if ($tgl_awalcetak) {

            // Cetak Filter Berdasarkan Tanggal & Nama
            if ($nama_gedung) {
                $data['pemeliharaan'] = $this->M_pemeliharaan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_gedung);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_gedung'] = $nama_gedung;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['pemeliharaan'] = $this->M_pemeliharaan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_gedung'] = $nama_gedung;
            }
        } else {
            // Cetak Semua Data
            $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['nama_gedung'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/pemeliharaan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan pemeliharaan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan pemeliharaan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/pemeliharaan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
    //     $this->load->view('admin/pemeliharaan/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Gedung & Bangunan';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Pemeliharaan Aset Gedung & Bangunan';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/pemeliharaan/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
