<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengajuan');
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
        $data['judul'] = 'Halaman Data Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        $data['pengajuan'] = $this->M_pengajuan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/index', $data);
        $this->load->view('layout/footer');
    }


    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        $data['pengajuan'] = $this->M_pengajuan->lihat();
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        // $this->form_validation->set_rules('jenis', 'Jenis Pengajuan', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
    

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pengajuan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_pengajuan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pengajuan');
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        $data['pengajuan'] = $this->M_pengajuan->getStsById($id);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi Barang', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pengajuan/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_pengajuan->edit_barang($id);
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('admin/pengajuan');
        }
    }

    public function hapus($id)
    {
        $this->M_pengajuan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pengajuan');
    }

    public function brgberdasarkanlks($id)
    {
        $data['judul'] = 'Halaman Data Barang';
        $data['barang'] = $this->M_aset->lihatbylokasi($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/ruangan/index', $data);
        $this->load->view('layout/footer');
    }

//     public function laporan()
//     {
//         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
//         $this->load->library('pdfgenerator');

//         $data['barang'] = $this->M_lokasi->lihat();
//         $this->load->view('admin/lokasi/laporan', $data);

//         // title dari pdf
//         $this->data['title_pdf'] = 'Laporan Lokasi Aset';

//         // filename dari pdf ketika didownload
//         $file_pdf = 'laporan Lokasi Aset';
//         // setting paper
//         $paper = 'A4';
//         //orientasi paper potrait / landscape
//         $orientation = "landscape";

//         $html = $this->load->view('admin/lokasi/laporan', $this->data, true);

//         // run dompdf
//         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

// }

// public function laporanruangan($id)
//     {
//         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
//         $this->load->library('pdfgenerator');

//         $data['barang'] = $this->M_aset->lihatbylokasi($id);
//         $this->load->view('admin/ruangan/laporan', $data);

//         // title dari pdf
//         $this->data['title_pdf'] = 'Laporan Lokasi Aset';

//         // filename dari pdf ketika didownload
//         $file_pdf = 'laporan Lokasi Aset';
//         // setting paper
//         $paper = 'A4';
//         //orientasi paper potrait / landscape
//         $orientation = "landscape";

//         $html = $this->load->view('admin/ruangan/laporan', $this->data, true);

//         // run dompdf
//         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

// }

public function filter()
    {
        // Mendapatkan nilai input
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $aset = $this->input->get('aset');

        $data['judul'] = 'Filter Laporan';

        // Proses Filter
        if (isset($_GET['filter'])) {

            // Data Filter Berdasarkan Tanggal & Nama
            if (isset($_GET['aset'])) {
                $data['pengajuan'] = $this->M_pengajuan->databynama($tgl_awal, $tgl_akhir, $aset);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_aset'] = $aset;
                $data['aset'] = $this->M_pengajuan->nama_tanggal($tgl_awal, $tgl_akhir, $aset);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['pengajuan'] = $this->M_pengajuan->databytanggal($tgl_awal, $tgl_akhir));
                $data['pengajuan'] = $this->M_pengajuan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['lokasi'] = $this->M_pengajuan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['aset'] = $this->M_pengajuan->aset();
            $data['pengajuan'] = $this->M_pengajuan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pengajuan/filter');
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // Mendapatkan nilai input
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $aset = $this->input->get('aset');

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // Proses Cetak Filter
        if ($tgl_awalcetak) {

            // Cetak Filter Berdasarkan Tanggal & Nama
            if ($aset) {
                $data['pengajuan'] = $this->M_pengajuan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $aset);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['pengajuan'] = $this->M_pengajuan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            }
        } else {
            // Cetak Semua Data
            $data['pengajuan'] = $this->M_pengajuan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['aset'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/pengajuan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan pengajuan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan pengajuan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/pengajuan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
// public function laporan()
//     {
//         // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
//         $this->load->library('pdfgenerator');

//         $data['baru'] = $this->M_pengajuan->lihat();
//         $this->load->view('admin/pengajuan/laporan', $data);

//         // title dari pdf
//         $this->data['title_pdf'] = 'Laporan Pengajuan Pemeliharaan Aset Peralatan & Mesin';

//         // filename dari pdf ketika didownload
//         $file_pdf = 'Laporan Pengajuan Pemeliharaan Aset Peralatan & Mesin';
//         // setting paper
//         $paper = 'A4';
//         //orientasi paper potrait / landscape
//         $orientation = "landscape";

//         $html = $this->load->view('admin/pengajuan/laporan', $this->data, true);

//         // run dompdf
//         $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
//     }


}
