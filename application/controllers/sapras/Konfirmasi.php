<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_konfirmasi');
        $this->load->model('M_pengajuan');
        // $this->load->model('M_lokasi');
        // $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        $data['konfir'] = $this->M_konfirmasi->lihat();
        $data['pengajuan'] = $this->M_pengajuan->tampilstatus();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/konfirmasi/index', $data);
        $this->load->view('layoutsapras/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['status'] = $this->M_pengajuan->getStsById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/konfirmasi/tambah', $data);
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_konfirmasi->updatestatus($id);
            $this->M_konfirmasi->proses_tambah();
            $this->session->set_flashdata('flash', ' , Konfirmasi Sudah Diubah');
            redirect('sapras/pengajuan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Pemeliharaan Aset Peralatan & Mesin';
        $data['konfirmasi'] = $this->M_konfirmasi->getKonfirmasiById($id);
        $data['status'] = $this->M_pengajuan->getStsById($data['konfirmasi']['pengajuan_id']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutsapras/header', $data);
            $this->load->view('layoutsapras/topbar');
            $this->load->view('layoutsapras/sidebar');
            $this->load->view('sapras/konfirmasi/edit', $data);
            $this->load->view('layoutsapras/footer');
        } else {
            $this->M_konfirmasi->edit_barang($id);
            $this->M_konfirmasi->updatestatus($id);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('sapras/konfirmasi');
        }
    }

    // public function ubahkonfirmasi($id)
    // {
    //     $data['judul'] = 'Halaman Tambah Data';
    //     $data['pengajuan'] = $this->M_pengajuan->lihat();
    //     $data['aset'] = $this->M_pengajuan->tampilstatus();
    //     $data['status'] = $this->M_pengajuan->getStsById($id);
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
    //     $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
    //     $this->form_validation->set_rules('status', 'Status', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('layoutsapras/header', $data);
    //         $this->load->view('layoutsapras/topbar');
    //         $this->load->view('layoutsapras/sidebar');
    //         $this->load->view('sapras/konfirmasi/tambah', $data);
    //         $this->load->view('layoutsapras/footer');
    //     } else {
    //         $this->M_konfirmasi->updatestatus2($id);
    //         $this->session->set_flashdata('flash', 'Diubah');
    //         redirect('sapras/konfirmasi');
    //     }
    // }

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
    //         $this->load->view('layoutsapras/header', $data);
    //         $this->load->view('layoutsapras/topbar');
    //         $this->load->view('layoutsapras/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layoutsapras/footer');
    //     } else {
    //         $this->M_kondisi->updatekondisi($id);
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('masteraset');
    //     }
    // }




    public function hapus($id_konfir)
    {
        $this->M_konfirmasi->hapusData($id_konfir);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sapras/konfirmasi');
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
                $data['konfir'] = $this->M_konfirmasi->databynama($tgl_awal, $tgl_akhir, $aset);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_aset'] = $aset;
                $data['aset'] = $this->M_konfirmasi->nama_tanggal($tgl_awal, $tgl_akhir, $aset);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['konfirmasi'] = $this->M_konfirmasi->databytanggal($tgl_awal, $tgl_akhir));
                $data['konfir'] = $this->M_konfirmasi->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['aset'] = $this->M_konfirmasi->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['aset'] = $this->M_konfirmasi->aset();
            $data['konfir'] = $this->M_konfirmasi->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutsapras/header', $data);
        $this->load->view('layoutsapras/topbar');
        $this->load->view('layoutsapras/sidebar');
        $this->load->view('sapras/konfirmasi/filter');
        $this->load->view('layoutsapras/footer');
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
                $data['konfir'] = $this->M_konfirmasi->filterbynama($tgl_awalcetak, $tgl_akhircetak, $aset);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['konfir'] = $this->M_konfirmasi->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['aset'] = $aset;
            }
        } else {
            // Cetak Semua Data
            $data['konfir'] = $this->M_konfirmasi->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['aset'] = null;
        }

        // die($tgl_awal);
        $this->load->view('sapras/konfirmasi/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('sapras/konfirmasi/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['konfir'] = $this->M_konfirmasi->lihat();
    //     $this->load->view('sapras/konfirmasi/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'Laporan Konfirmasi Pengajuan Pemeliharaan Aset Peralatan & Mesin';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('sapras/konfirmasi/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
