<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perpindahan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perpindahan');
        $this->load->model('M_aset');
        $this->load->model('M_lokasi');
        $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Perpindahan Aset Peralatan & Mesin';
        $data['barang'] = $this->M_perpindahan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/perpindahan/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Perpindahan Aset Peralatan & Mesin';
        // $data['barang'] = $this->M_aset->lihat();
        // $data['aset'] = $this->M_aset->tampilaset();
        $data['aset'] = $this->M_aset->getBrgById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/perpindahan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_perpindahan->tambahlokasi($id);
            $this->M_perpindahan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/aset');
        }
    }

    public function filter()
    {
        // Mendapatkan nilai input
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $nama_barang = $this->input->get('nama_barang');

        $data['judul'] = 'Filter Laporan';

        // Proses Filter
        if (isset($_GET['filter'])) {

            // Data Filter Berdasarkan Tanggal & Nama
            if (isset($_GET['nama_barang'])) {
                $data['nama_barang'] = $this->M_perpindahan->databynama($tgl_awal, $tgl_akhir, $nama_barang);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_barang'] = $nama_barang;
                $data['nama'] = $this->M_perpindahan->nama_tanggal($tgl_awal, $tgl_akhir, $nama_barang);
            } else {

                // Data Filter Berdasarkan Tanggal
                $data['nama_barang'] = $this->M_perpindahan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama'] = $this->M_perpindahan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama'] = $this->M_perpindahan->nama_barang();
            $data['nama_barang'] = $this->M_perpindahan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/perpindahan/filter');
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // Mendapatkan nilai input
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $nama_barang = $this->input->get('nama_barang');

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // Proses Cetak Filter
        if ($tgl_awalcetak) {

            // Cetak Filter Berdasarkan Tanggal & Nama
            if ($nama_barang) {
                $data['nama_barang'] = $this->M_perpindahan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama'] = $nama_barang;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['nama_barang'] = $this->M_perpindahan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
            }
        } else {
            // Cetak Semua Data
            $data['nama_barang'] = $this->M_perpindahan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/perpindahan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Masteraset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Masteraset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/perpindahan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

//     public function laporan()
//     {
//         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
//         $this->load->library('pdfgenerator');

//         $data['nama_barang'] = $this->M_perpindahan->lihat();
//         $this->load->view('admin/perpindahan/laporan', $data);

//         // title dari pdf
//         $this->data['title_pdf'] = 'Laporan Perpindahan Aset Peralatan & Mesin';

//         // filename dari pdf ketika didownload
//         $file_pdf = 'Laporan Perpindahan Aset Peralatan & Mesin';
//         // setting paper
//         $paper = 'A4';
//         //orientasi paper potrait / landscape
//         $orientation = "landscape";

//         $html = $this->load->view('admin/perpindahan/laporan', $this->data, true);

//         // run dompdf
//         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

// }
}