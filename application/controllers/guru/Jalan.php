<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_jalan');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data Aset Jalan , Irigasi & Jaringan';
        $data['jalan'] = $this->M_jalan->lihat();
        $data['jumlah_kasmasuk'] = $this->M_jalan->totalkas();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/jalan/index', $data);
        $this->load->view('layoutguru/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Aset Jalan , Irigasi & Jaringan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kode'] = $this->M_jalan->kode();

        $this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('konstruksi', 'Konstruksi', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Peroleh', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/jalan/tambah');
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_jalan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/jalan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Aset Jalan , Irigasi & Jaringan';
        $data['jalan'] = $this->M_jalan->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_aset', 'Nama Aset', 'required');
        $this->form_validation->set_rules('kode_aset', 'Kode Aset', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('konstruksi', 'Konstruksi', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        // $this->form_validation->set_rules('tanggal', 'Tanggal Peroleh', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/jalan/edit', $data);
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_jalan->edit_jalan($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/jalan');
        }
    }

    public function hapus($id)
    {
        $this->M_jalan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/jalan');
    }

    public function filter()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['judul'] = 'Filter Laporan';
        // $data['aset'] = $this->M_masteraset->lihat();
        $data['jalan'] = $this->M_jalan->databytanggal($tgl_awal, $tgl_akhir);
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        // $data['aset'] = $this->M_masteraset->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/jalan/filter');
        $this->load->view('layoutguru/footer');
    }

    public function laporan()
    {
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['jalan'] = $this->M_jalan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
        $data['tgl_awal'] = $tgl_awalcetak;
        $data['tgl_akhir'] = $tgl_akhircetak;
        $this->load->view('guru/jalan/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Aset Jalan , Irigasi & Jaringan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Aset Jalan , Irigasi & Jaringan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('guru/jalan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
