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
        if ($this->session->userdata('hak_akses') != '1') {
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


        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/perawatan/index', $data);
        $this->load->view('layout/footer');
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
        $this->form_validation->set_rules('tgl_rawat', 'Tanggal Pemeliharaan', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/perawatan/tambah', $data);
            $this->load->view('layout/footer');
        }
        // else {
        //     // $this->M_perpindahan->tambahlokasi($id);
        //     $this->M_perawatan->proses_tambah();
        //     $this->session->set_flashdata('flash', 'Ditambahkan');
        //     redirect('admin/perawatan');
        // }
    }

    public function input_aksi()
    {
        $aset_id = $this->input->post('nama_barang');
        $lokasi_id = $this->input->post('lokasi');
        $penanggung_jawab_id = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $biaya = $this->input->post('biaya');
        $tgl_rawat = $this->input->post('tgl_rawat');
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
                'aset_id' => $aset_id,
                'lokasi_id' => $lokasi_id,
                'penanggung_jawab_id' => $penanggung_jawab_id,
                'jenis' => $jenis,
                'biaya' => $biaya,
                'tgl_rawat' => $tgl_rawat,
                'tgl_selesai' => $tgl_selesai,
                'bukti' => $bukti
            ];

            // $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
            // $this->form_validation->set_rules('ket', 'Keterangan', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('layout/header', $data);
                $this->load->view('layout/topbar');
                $this->load->view('layout/sidebar');
                $this->load->view('admin/perawatan/tambah', $data);
                $this->load->view('layout/footer');
            }
            $this->M_perawatan->input_data($data, 'perawatan');
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin/perawatan');
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
            $this->load->view('layout/header', $data);
            $this->load->view('layout/topbar');
            $this->load->view('layout/sidebar');
            $this->load->view('admin/perawatan/edit', $data);
            $this->load->view('layout/footer');
        }
        // else {
        //     $this->M_perawatan->edit_barang($id);
        //     $this->session->set_flashdata('flash', 'Diubah');
        //     redirect('admin/perawatan');
        // }
    }

    public function update_aksi()
    {
        $id_rawat = $this->input->post('id_rawat');
        $aset_id = $this->input->post('nama_barang');
        $lokasi_id = $this->input->post('lokasi');
        $penanggung_jawab_id = $this->input->post('nama');
        $jenis = $this->input->post('jenis');
        $biaya = $this->input->post('biaya');
        $tgl_rawat = $this->input->post('tgl_rawat');
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
            'aset_id' => $aset_id,
            'lokasi_id' => $lokasi_id,
            'penanggung_jawab_id' => $penanggung_jawab_id,
            'jenis' => $jenis,
            'biaya' => $biaya,
            'tgl_rawat' => $tgl_rawat,
            'tgl_selesai' => $tgl_selesai,
            'bukti' => $file
        );

        $where = array(
            'id_rawat' => $id_rawat
        );

        $this->M_perawatan->update_data($where, $data, 'perawatan');
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('admin/perawatan');
    }

    public function hapus($id)
    {
        $this->M_perawatan->hapusData($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/perawatan');
    }

    public function filter()
    {
        // Mendapatkan nilai input
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        $nama_barang = $this->input->get('nama_barang');

        $data['judul'] = 'Filter Laporan';
        $data['jumlah_kasmasuk'] = $this->M_perawatan->totalkas();
        // Proses Filter
        if (isset($_GET['filter'])) {

            // Data Filter Berdasarkan Tanggal & Nama
            if (isset($_GET['nama_barang'])) {
                $data['rawat'] = $this->M_perawatan->databynama($tgl_awal, $tgl_akhir, $nama_barang);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nm_barang'] = $nama_barang;
                $data['nama_barang'] = $this->M_perawatan->nama_tanggal($tgl_awal, $tgl_akhir, $nama_barang);
            } else {

                // Data Filter Berdasarkan Tanggal
                // die($data['rawat'] = $this->M_perawatan->databytanggal($tgl_awal, $tgl_akhir));
                $data['rawat'] = $this->M_perawatan->databytanggal($tgl_awal, $tgl_akhir);
                $data['tgl_awal'] = $tgl_awal;
                $data['tgl_akhir'] = $tgl_akhir;
                $data['nama_barang'] = $this->M_perawatan->nama_tanggal($tgl_awal, $tgl_akhir);
            }
        } else {

            // Proses Semua data tanpa filter
            $data['nama_barang'] = $this->M_perawatan->nama_barang();
            $data['rawat'] = $this->M_perawatan->lihat();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('admin/perawatan/filter', $data);
        $this->load->view('layout/footer');
    }

    public function laporan()
    {
        // Mendapatkan nilai input
        $tgl_awalcetak = $this->input->get('tgl_awalcetak');
        $tgl_akhircetak = $this->input->get('tgl_akhircetak');
        $nama_barang = $this->input->get('nama_barang');
        $data['jumlah_kasmasuk'] = $this->M_perawatan->totalkas();

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');

        // Proses Cetak Filter
        if ($tgl_awalcetak) {

            // Cetak Filter Berdasarkan Tanggal & Nama
            if ($nama_barang) {
                $data['rawat'] = $this->M_perawatan->filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            } else {

                // Cetak Filter Berdasarkan Tanggal
                $data['rawat'] = $this->M_perawatan->filterbytanggal($tgl_awalcetak, $tgl_akhircetak);
                $data['tgl_awal'] = $tgl_awalcetak;
                $data['tgl_akhir'] = $tgl_akhircetak;
                $data['nama_barang'] = $nama_barang;
            }
        } else {
            // Cetak Semua Data
            $data['rawat'] = $this->M_perawatan->lihat();
            $data['tgl_awal'] = null;
            $data['tgl_akhir'] = null;
            $data['nama_barang'] = null;
        }

        // die($tgl_awal);
        $this->load->view('admin/perawatan/laporan', $data);
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Peralatan & Mesin';

        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pemeliharaan Aset Peralatan & Mesin';
        // setting paper
        $paper = 'A3';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('admin/perawatan/laporan', $this->data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    // public function laporan()
    // {
    //     // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
    //     $this->load->library('pdfgenerator');

    //     $data['rawat'] = $this->M_perawatan->lihat();
    //     $this->load->view('admin/perawatan/laporan', $data);

    //     // title dari pdf
    //     $this->data['title_pdf'] = 'Laporan Pemeliharaan Aset Peralatan & Mesin';

    //     // filename dari pdf ketika didownload
    //     $file_pdf = 'laporan Pemeliharaan Aset Peralatan & Mesin';
    //     // setting paper
    //     $paper = 'A4';
    //     //orientasi paper potrait / landscape
    //     $orientation = "landscape";

    //     $html = $this->load->view('admin/perawatan/laporan', $this->data, true);

    //     // run dompdf
    //     $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    // }
}
