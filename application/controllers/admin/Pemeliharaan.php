<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeliharaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemeliharaan');
        $this->load->model('M_gedung');
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert"> Anda Belum Login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span arial-hidden="true">&times;</span>
					</button> </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Pemeliharaan Aset Gedung & Bangunan';
        $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $data['jumlah_kasmasuk'] = $this->M_pemeliharaan->totalkas();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pemeliharaan/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah($id)
    {
        $data['judul'] = 'Halaman Tambah Data Pemeliharaan Aset Gedung & Bangunan';
        // $data['gedung'] = $this->M_aset->lihat();
        // $data['aset'] = $this->M_aset->tampilaset();
        // $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        $data['gedung'] = $this->M_gedung->getGdgById($id);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama gedung', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');
        $this->form_validation->set_rules('tgl_pemeliharaan', 'Tanggal Pemeliharaan', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pemeliharaan/tambah', $data);
            $this->load->view('layout/footer');
        }
        // else {
        //     // $this->M_perpindahan->tambahlokasi($id);
        //     $this->M_pemeliharaan->proses_tambah();
        //     $this->session->set_flashdata('flash', 'Ditambahkan');
        //     redirect('admin/pemeliharaan');
        // }
    }

    public function input_aksi()
    {
        $gedung_id = $this->input->post('nama_gedung');
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $biaya = $this->input->post('biaya');
        $tgl_pemeliharaan = $this->input->post('tgl_pemeliharaan');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $bukti = $_FILES['bukti'];
        if ($bukti = '') {
        } else {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bukti')) {
                $this->form_validation->set_rules('bukti', 'Bukti', 'required');
                // echo "Gagal Upload";
            } else {
                $bukti = $this->upload->data('file_name');
            }

            $data = [
                'gedung_id' => $gedung_id,
                'nama' => $nama,
                'jenis' => $jenis,
                'biaya' => $biaya,
                'tgl_pemeliharaan' => $tgl_pemeliharaan,
                'tgl_selesai' => $tgl_selesai,
                'bukti' => $bukti
            ];

            // $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
            // $this->form_validation->set_rules('ket', 'Keterangan', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout/header', $data);
                $this->load->view('layout/topbar');
                $this->load->view('layout/sidebar');
                $this->load->view('admin/pemeliharaan/tambah', $data);
                $this->load->view('layout/footer');
            }
            $this->M_pemeliharaan->input_data($data, 'pemeliharaan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/pemeliharaan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Halaman Edit Data  Pemeliharaan Aset Gedung & Bangunan';
        $data['pemeliharaan'] = $this->M_pemeliharaan->getpemeliharaanById($id);
        $data['gedung'] = $this->M_gedung->getGdgById($data['pemeliharaan']['gedung_id']);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_gedung', 'Nama Gedung', 'required');
        $this->form_validation->set_rules('nama', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/pemeliharaan/edit', $data);
            $this->load->view('layout/footer');
        }
        // else {
        //     $this->M_pemeliharaan->edit_barang($id);
        //     $this->session->set_flashdata('flash', 'Diubah');
        //     redirect('admin/pemeliharaan');
        // }
    }

    public function update_aksi()
    {
        $id_pemeliharaan = $this->input->post('id_pemeliharaan');
        $gedung_id = $this->input->post('nama_gedung');
        $nama = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $biaya = $this->input->post('biaya');
        $tgl_pemeliharaan = $this->input->post('tgl_pemeliharaan');
        $tgl_selesai = $this->input->post('tgl_selesai');
        $bukti = $this->input->post('bukti');
        $buktilama = $this->input->post('buktilama');
        $bukti = $_FILES['bukti']['name'];

        if (!empty($bukti)) {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $file = $this->upload->data('file_name');
                $this->db->set('bukti', $file);
            } else {
                echo "Gagal Upload";
            }
        } else {
            $file = $buktilama;
        }

        $data = array(
            'gedung_id' => $gedung_id,
            'nama' => $nama,
            'jenis' => $jenis,
            'biaya' => $biaya,
            'tgl_pemeliharaan' => $tgl_pemeliharaan,
            'tgl_selesai' => $tgl_selesai,
            'bukti' => $file
        );

        $where = array(
            'id_pemeliharaan' => $id_pemeliharaan
        );

        $this->M_pemeliharaan->update_data($where, $data, 'pemeliharaan');
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/pemeliharaan');
    }

    public function hapus($id)
    {
        $this->M_pemeliharaan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/pemeliharaan');
    }

    public function filter()
    {
        // Mendapatkan nilai input
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $nama_gedung = $this->input->get('nama_gedung');

        $data['judul'] = 'Filter Laporan';
        $data['jumlah_kasmasuk'] = $this->M_pemeliharaan->totalkas();
        // Proses Filter
        if (isset($_GET['filter'])) {

            // Data Filter Berdasarkan Tanggal & Nama
            if (isset($_GET['nama_gedung'])) {
                $data['pemeliharaan'] = $this->M_pemeliharaan->databynama($tgl_awal, $tgl_akhir, $nama_gedung);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_gedung'] = $nama_gedung;
                $data['nama_gedung'] = $this->M_pemeliharaan->nama_tanggal($tgl_awal, $tgl_akhir, $nama_gedung);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['pemeliharaan'] = $this->M_pemeliharaan->databytanggal($tgl_awal, $tgl_akhir));
                $data['pemeliharaan'] = $this->M_pemeliharaan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama_gedung'] = $this->M_pemeliharaan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama_gedung'] = $this->M_pemeliharaan->nama_gedung();
            $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/pemeliharaan/filter', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // Mendapatkan nilai input
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $nama_gedung = $this->input->get('nama_gedung');
        $data['jumlah_kasmasuk'] = $this->M_pemeliharaan->totalkas();

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // Proses Cetak Filter
        if ($tgl_awalcetak) {

            // Cetak Filter Berdasarkan Tanggal & Nama
            if ($nama_gedung) {
                $data['pemeliharaan'] = $this->M_pemeliharaan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_gedung);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_gedung'] = $nama_gedung;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['pemeliharaan'] = $this->M_pemeliharaan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_gedung'] = $nama_gedung;
            }
        } else {
            // Cetak Semua Data
            $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['nama_gedung'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/pemeliharaan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Gedung & Bangunan';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pemeliharaan Aset Gedung & Bangunan';
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/pemeliharaan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['pemeliharaan'] = $this->M_pemeliharaan->lihat();
    //     $this->load->view('admin/pemeliharaan/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Gedung & Bangunan';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Pemeliharaan Aset Gedung & Bangunan';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/pemeliharaan/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
