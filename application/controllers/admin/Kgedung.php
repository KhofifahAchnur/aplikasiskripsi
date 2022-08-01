<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kgedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kgedung');
        $this->load->model('M_pgedung');
        // $this->load->model('M_lokasi');
        // $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';
        $data['kgedung'] = $this->M_kgedung->lihat();
        $data['pgedung'] = $this->M_pgedung->tampilstatus();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/kgedung/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['status'] = $this->M_pgedung->getStsById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/kgedung/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_kgedung->updatestatus($id);
            $this->M_kgedung->proses_tambah();
            $this->session->set_flashdata('flash', ' , Konfirmasi Sudah Diubah');
            redirect('admin/pgedung');
        }
    }
    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Pemeliharaan Aset Peralatan & Mesin';
        $data['kgedung'] = $this->M_kgedung->getKgedungById($id);
        $data['status'] = $this->M_pgedung->getStsById($data['kgedung']['pengajuan_id']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/kgedung/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_kgedung->edit_barang($id);
            $this->M_kgedung->updatestatus($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin/kgedung');
        }
    }
    // public function ubahkondisi($id)
    // {
    //     $data['judul'] = 'Halaman Tambah Data';
    //     $data['barang'] = $this->M_aset->lihat();
    //     $data['aset'] = $this->M_aset->tampilaset();
    //     $data['kondisi'] = $this->M_aset->getBrgById($id);
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    //     $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
    //     $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('layout/header', $data);
    //         $this->load->view('layout/topbar');
    //         $this->load->view('layout/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layout/footer');
    //     } else {
    //         $this->M_kondisi->updatekondisi($id);
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('masteraset');
    //     }
    // }




    public function hapus($id)
    {
        $this->M_kgedung->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/kgedung');
    }

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
                $data['kgedung'] = $this->M_kgedung->databynama($tgl_awal, $tgl_akhir, $aset);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_aset'] = $aset;
                $data['aset'] = $this->M_kgedung->nama_tanggal($tgl_awal, $tgl_akhir, $aset);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['kgedung'] = $this->M_kgedung->databytanggal($tgl_awal, $tgl_akhir));
                $data['kgedung'] = $this->M_kgedung->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['aset'] = $this->M_kgedung->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['aset'] = $this->M_kgedung->aset();
            $data['kgedung'] = $this->M_kgedung->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/kgedung/filter');
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
                $data['kgedung'] = $this->M_kgedung->filterbynama($tgl_awalcetak, $tgl_akhircetak, $aset);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['kgedung'] = $this->M_kgedung->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            }
        } else {
            // Cetak Semua Data
            $data['kgedung'] = $this->M_kgedung->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['aset'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/kgedung/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/kgedung/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['kondisi'] = $this->M_kondisi->lihat();
    //     $this->load->view('admin/kondisi/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Kondisi Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Kondisi Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/kondisi/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['kgedung'] = $this->M_kgedung->lihat();
    //     $this->load->view('admin/kgedung/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Gedung & Bangunan';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/kgedung/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
