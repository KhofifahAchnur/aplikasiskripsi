<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterAset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_masteraset');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Barang';
        // $data['aset'] = $this->M_masteraset->tampillokasi();
      $data['aset'] = $this->M_masteraset->lihat();
        
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/masteraset/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function gantikondisi($id)
    {
        $status = $this->M_masteraset->getKondisiById($id);
        $data['status'] = $status;

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->M_masteraset->edit_kondisi($id);
        $this->session->set_flashdata('flash', 'Berhasil');
        redirect('member/masteraset');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['aset'] = $this->M_masteraset->lihat();
        $this->load->view('masteraset/laporan', $data);

        // title dari pdf
        $this->data['judul'] = 'Laporan Aset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan outlet';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('masteraset/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

}
}
