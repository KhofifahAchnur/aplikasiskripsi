<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghapusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghapusan');
        $this->load->model('M_aset');
        $this->load->model('M_lokasi');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        $data['hapus'] = $this->M_penghapusan->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/penghapusan/index', $data);
        $this->load->view('layout/footer');
    }


    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data penghapusan Pemeliharaan Aset Peralatan & Mesin';
        $data['aset'] = $this->M_aset->getBrgById($id);
        $data['lokasi'] = $this->M_lokasi->getBrgById($data['aset']['perpindahan_id']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi barang', 'required');
        // $this->form_validation->set_rules('jenis', 'Jenis penghapusan', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
    

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/penghapusan/tambah', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_penghapusan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/penghapusan');
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
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pengajuan');
        }
    }

    public function hapus($id)
    {
        $this->M_penghapusan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/penghapusan');
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
                $data['hapus'] = $this->M_penghapusan->databynama($tgl_awal, $tgl_akhir, $nama_barang);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_barang'] = $nama_barang;
                $data['nama_barang'] = $this->M_penghapusan->nama_tanggal($tgl_awal, $tgl_akhir, $nama_barang);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['hapus'] = $this->M_penghapusan->databytanggal($tgl_awal, $tgl_akhir));
                $data['hapus'] = $this->M_penghapusan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama_barang'] = $this->M_penghapusan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama_barang'] = $this->M_penghapusan->nama_barang();
            $data['hapus'] = $this->M_penghapusan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/penghapusan/filter');
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
                $data['hapus'] = $this->M_penghapusan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['hapus'] = $this->M_penghapusan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            }
        } else {
            // Cetak Semua Data
            $data['hapus'] = $this->M_penghapusan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['nama_barang'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/penghapusan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan penghapusan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan penghapusan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "potrait";

        $html = $this->load->view('admin/penghapusan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
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
