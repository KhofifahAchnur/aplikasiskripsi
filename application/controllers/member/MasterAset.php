<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterAset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_masteraset');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Barang';
        // $data['aset'] = $this->M_masteraset->tampillokasi();
        $data['aset'] = $this->M_masteraset->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/masteraset/index', $data);
        $this->load->view('layout/footer');
    }

    public function filter()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['judul'] = 'Filter Laporan';
        // $data['aset'] = $this->M_masteraset->lihat();
        $data['aset'] = $this->M_masteraset->databytanggal($tgl_awal, $tgl_akhir);
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        // $data['aset'] = $this->M_masteraset->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/masteraset/filter');
        $this->load->view('layout/footer');
    }

    public function gantikondisi($id)
    {
        $status = $this->M_masteraset->getKondisiById($id);
        $data['status'] = $status;

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->M_masteraset->edit_kondisi($id);
        $this->session->set_flashdata('flash', 'Berhasil');
        redirect('admin/masteraset');
    }

    public function laporan()
    {
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['aset'] = $this->M_masteraset->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
        $data['tgl_awal'] = $tgl_awalcetak;
        $data['tgl_akhir'] = $tgl_akhircetak;

        // die($tgl_awal);
        $this->load->view('admin/masteraset/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Masteraset';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Masteraset';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/masteraset/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
