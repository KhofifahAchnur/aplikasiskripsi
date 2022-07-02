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
        if ($this->session->userdata('hak_akses') != '1') {
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


        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/peminjaman/index', $data);
        $this->load->view('layout/footer');
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

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/peminjaman/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_perpindahan->tambahlokasi($id);
            $this->M_perpindahan->proses_tambah();
            $this->M_peminjaman->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/peminjaman');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Peminjaman Aset Peralatan & Mesin';
        $data['pinjam'] = $this->M_peminjaman->getpeminjamanById($id);
        $data['aset'] = $this->M_aset->getBrgById($data['pinjam']['aset_id']);
        $data['lokasi'] = $this->M_lokasi->lihat();
        $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/peminjaman/edit', $data);
            $this->load->view('layout/footer');
        } else {
            // $this->M_perpindahan->tambahlokasi($id);
            // $this->M_perpindahan->proses_tambah();
            $this->M_peminjaman->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/peminjaman');
        }
    }

    public function hapus($id)
    {
        $this->M_peminjaman->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/peminjaman');
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
                $data['pinjam'] = $this->M_peminjaman->databynama($tgl_awal, $tgl_akhir, $nama_barang);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_barang'] = $nama_barang;
                $data['nama_barang'] = $this->M_peminjaman->nama_tanggal($tgl_awal, $tgl_akhir, $nama_barang);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['peminjaman'] = $this->M_peminjaman->databytanggal($tgl_awal, $tgl_akhir));
                $data['pinjam'] = $this->M_peminjaman->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama_barang'] = $this->M_peminjaman->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama_barang'] = $this->M_peminjaman->nama_barang();
            $data['pinjam'] = $this->M_peminjaman->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/peminjaman/filter');
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
                $data['pinjam'] = $this->M_peminjaman->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['pinjam'] = $this->M_peminjaman->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            }
        } else {
            // Cetak Semua Data
            $data['pinjam'] = $this->M_peminjaman->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['nama_barang'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/peminjaman/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan peminjaman';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan peminjaman';
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/peminjaman/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }


    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['pinjam'] = $this->M_peminjaman->lihat();
    //     $this->load->view('admin/peminjaman/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Peminjaman Aset Peralatan & Mesin';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Peminjaman Aset Peralatan & Mesin';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/peminjaman/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
