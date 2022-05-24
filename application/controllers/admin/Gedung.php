<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_gedung');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {

        $data['judul'] = 'Halaman Data History';
        $data['gedung'] = $this->M_gedung->lihat();
        // $data['barang'] = $this->M_aset->getBrgById($id);
        // // $data['barang'] = $this->M_aset->lihat();
        // $data['pindah'] = $this->M_perpindahan->lihatperpindahanbyid($id);

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/gedung/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Halaman Tambah Data Penanggung Jawab';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('register', 'Register', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun Peroleh', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('hak', 'Hak', 'required');
        $this->form_validation->set_rules('nomer', 'Nomer', 'required');
        $this->form_validation->set_rules('asal_usul', 'Asal - Usul', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/tanah/tambah');
            $this->load->view('layout/footer');
        } else {
            $this->M_tanah->proses_tambah();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/tanah');
        }
    }
}
