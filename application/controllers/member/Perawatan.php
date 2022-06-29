<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_perawatan');
        $this->load->model('M_aset');
        $this->load->model('M_lokasi');
        $this->load->model('M_penanggung_jawab');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Pemeliharaan Aset Peralatan & Mesin';
        $data['rawat'] = $this->M_perawatan->lihat();
        $data['jumlah_kasmasuk'] = $this->M_perawatan->totalkas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layoutmember/header', $data);
        $this->load->view('layoutmember/topbar');
        $this->load->view('layoutmember/sidebar');
        $this->load->view('member/perawatan/index', $data);
        $this->load->view('layoutmember/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Pemeliharaan Aset Peralatan & Mesin';
        $data['aset'] = $this->M_aset->getBrgById($id);
        $data['lokasi'] = $this->M_lokasi->getBrgById($data['aset']['perpindahan_id']);
        $data['nama'] = $this->M_penanggung_jawab->getBrgById($data['lokasi']['penanggung_jawab_id']);
        // var_dump( $data['nama']); die;
        // $data['lokasi'] = $this->M_lokasi->lihat();
        // $data['penanggung_jawab'] = $this->M_penanggung_jawab->lihat();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/perawatan/tambah', $data);
            $this->load->view('layoutmember/footer');
        } else {
            // $this->M_perpindahan->tambahlokasi($id);
            $this->M_perawatan->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/perawatan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Pemeliharaan Aset Peralatan & Mesin';
        $data['rawat'] = $this->M_perawatan->getRwtById($id);
        $data['aset'] = $this->M_aset->getBrgById($data['rawat']['aset_id']);
        $data['lokasi'] = $this->M_lokasi->getBrgById($data['rawat']['lokasi_id']);
        $data['nama'] = $this->M_penanggung_jawab->getBrgById($data['rawat']['penanggung_jawab_id']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutmember/header', $data);
            $this->load->view('layoutmember/topbar');
            $this->load->view('layoutmember/sidebar');
            $this->load->view('member/perawatan/edit', $data);
            $this->load->view('layoutmember/footer');
        } else {
            $this->M_perawatan->edit_barang($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('member/perawatan');
        }
    }

    public function hapus($id)
    {
        $this->M_perawatan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('member/perawatan');
    }

    public function laporan()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['rawat'] = $this->M_perawatan->lihat();
        $this->load->view('member/perawatan/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Pemeliharaan Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('member/perawatan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
