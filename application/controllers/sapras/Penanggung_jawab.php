<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penanggung_jawab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Penanggung Jawab';
        $data['barang'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/penanggung_jawab/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('hak_akses', 'Hak_akses', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/penanggung_jawab/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_penanggung_jawab->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/penanggung_jawab');
        }
    }


    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Penanggung Jawab';
        $data['barang'] = $this->M_penanggung_jawab->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/penanggung_jawab/edit', $data);
            $this->load->view('layout/footer');
        } else {
            $this->M_penanggung_jawab->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/penanggung_jawab');
        }
    }

    public function hapus($id)
    {
        $this->M_penanggung_jawab->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/penanggung_jawab');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['barang'] = $this->M_penanggung_jawab->lihat();
        $this->load->view('admin/penanggung_jawab/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Penanggung Jawab';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Penanggung Jawab';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/penanggung_jawab/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

}
}
