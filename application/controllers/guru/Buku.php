<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_buku');
        if ($this->session->userdata('hak_akses') != '2') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data Aset Perpustakaan';
        $data['buku'] = $this->M_buku->lihat();
        $data['jumlah_kasmasuk'] = $this->M_buku->totalkas();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/buku/index', $data);
        $this->load->view('layoutguru/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Aset Perpustakaan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kode'] = $this->M_buku->kode();

        $this->form_validation->set_rules('kode_buku', 'Kode GWP', 'required|is_unique[buku.kode_buku]', [
            'is_unique' => 'Kode Buku ini sudah ada!'
        ]);

        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/buku/tambah');
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_buku->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/buku');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data Aset Perpustakaan';
        $data['buku'] = $this->M_buku->getBrgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('kode_buku', 'Kode Buku', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal-Usul', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('kondisi', 'kondisi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layoutguru/header', $data);
            $this->load->view('layoutguru/topbar');
            $this->load->view('layoutguru/sidebar');
            $this->load->view('guru/buku/edit', $data);
            $this->load->view('layoutguru/footer');
        } else {
            $this->M_buku->edit_buku($id);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('guru/buku');
        }
    }

    public function hapus($id)
    {
        $this->M_buku->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('guru/buku');
    }

    public function filter()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');

        $data['judul'] = 'Filter Laporan';
        // $data['aset'] = $this->M_masteraset->lihat();
        $data['buku'] = $this->M_buku->databytanggal($tgl_awal, $tgl_akhir);
        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        // $data['aset'] = $this->M_masteraset->lihat();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layoutguru/header', $data);
        $this->load->view('layoutguru/topbar');
        $this->load->view('layoutguru/sidebar');
        $this->load->view('guru/buku/filter');
        $this->load->view('layoutguru/footer');
    }

    public function laporan()
    {
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        $data['buku'] = $this->M_buku->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
        $data['tgl_awal'] = $tgl_awalcetak;
        $data['tgl_akhir'] = $tgl_akhircetak;
        $this->load->view('guru/buku/laporan', $data);

        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Aset Perpustakaan';

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan Aset Perpustakaan';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('guru/buku/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
