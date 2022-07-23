<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kmotor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kmotor');
        $this->load->model('M_pmotor');
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
        $data['judul'] = 'Halaman Data Barang';
        $data['kmotor'] = $this->M_kmotor->lihat();
        $data['pmotor'] = $this->M_pmotor->tampilstatus();
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/kmotor/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data';
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['status'] = $this->M_pmotor->getStsById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('des', 'Deskripsi Aset', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/kmotor/tambah', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_kmotor->updatestatus($id);
            $this->M_kmotor->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/pmotor');
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
    //         $this->load->view('layoutmember/header', $data);
    //         $this->load->view('layoutmember/topbar');
    //         $this->load->view('layoutmember/sidebar');
    //         $this->load->view('kondisi/tambah', $data);
    //         $this->load->view('layoutmember/footer');
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
        redirect('member/lokasi');
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['kondisi'] = $this->M_kondisi->lihat();
    //     $this->load->view('member/kondisi/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Kondisi Aset';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Kondisi Aset';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('member/kondisi/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['kmotor'] = $this->M_kmotor->lihat();
        $this->load->view('member/kmotor/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Konfirmasi Aset Baru';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Konfirmasi Aset Baru';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/kmotor/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
