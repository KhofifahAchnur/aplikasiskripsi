<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kbaru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kbaru');
        $this->load->model('M_pbaru');
        // $this->load->model('M_lokasi');
        // $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Konfirmasi Pengajuan Aset Baru';
        $data['kbaru'] = $this->M_kbaru->lihat();
        $data['pbaru'] = $this->M_pbaru->tampilstatus();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/kbaru/index', $data);
        $this->load->view('layoutguru/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Konfirmasi Pengajuan Aset Baru';
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['status'] = $this->M_pbaru->getStsById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/kbaru/tambah', $data);
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_kbaru->updatestatus($id);
            $this->M_kbaru->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/pbaru');
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
    //         $this->load->view('layoutguru/header', $data);
    //         $this->load->view('layoutguru/topbar');
    //         $this->load->view('layoutguru/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layoutguru/footer');
    //     } else {
    //         $this->M_kondisi->updatekondisi($id);
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('masteraset');
    //     }
    // }




    public function hapus($id)
    {
        $this->M_lokasi->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/lokasi');
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['kondisi'] = $this->M_kondisi->lihat();
    //     $this->load->view('guru/kondisi/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Kondisi Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Kondisi Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('guru/kondisi/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['kbaru'] = $this->M_kbaru->lihat();
        $this->load->view('guru/kbaru/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Konfirmasi  Pengajuan Aset Baru';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Konfirmasi Pengajuan Aset Baru';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('guru/kbaru/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
