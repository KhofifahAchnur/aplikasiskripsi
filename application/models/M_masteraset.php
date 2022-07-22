<?php

class M_masteraset extends CI_model
{
    public function lihat()
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        return $this->db->get()->result_array();
    }

    public function nama_barang()
    {
        $this->db->select('nama_barang');
        $this->db->from('aset');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_barang');
        $this->db->from('aset');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function totalkas_tgl($tgl_awal, $tgl_akhir)
    {
        $this->db->select_sum('harga_brg');
        $this->db->from('aset');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        return $this->db->get()->result()[0]->harga_brg;
    }

    public function totalkas_nama($tgl_awal, $tgl_akhir, $nama_barang)
    {
        $this->db->select_sum('harga_brg');
        $this->db->from('aset');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->where("nama_barang", "$nama_barang");
        return $this->db->get()->result()[0]->harga_brg;
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama)
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama");
        $this->db->where("tanggal_masuk >=", "$tgl_awalcetak");
        $this->db->where("tanggal_masuk <=", "$tgl_akhircetak");
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama)
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama");
        $this->db->where("tanggal_masuk >=", "$tgl_awal");
        $this->db->where("tanggal_masuk <=", "$tgl_akhir");
        $this->db->where_in('lokasi', array('Ruang Bimbingan Konseling', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS', 'Ruang Wakasek Kurikulum', 'Ruang Wakasek Kesiswaan', 'Ruang Tata Usaha', 'SMPN 15 Banjarmasin'));
        return $this->db->get()->result_array();
        // die($this->db->get()->result_array());
    }

    // public function lihatbykondisi()
    // {
    //     $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
    //     $this->db->from('aset');
    //     // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
    //     $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
    //     $this->db->order_by('aset.id', 'DESC');
    //     $this->db->where('kondisi','Kurang Baik');
    //     return $this->db->get()->result_array();
    // }

    public function getKondisiById($id)
    {
        return $this->db->get_where('aset', ['id' => $id])->row_array();
    }
    public function totalKas()
    {
        return $this->db->select_sum('harga_brg')->from('aset')->get()->result()[0]->harga_brg;
    }

    // public function lihatBykondisi($id)
    // {
    //     return $this
    //         ->db
    //         ->select('*')
    //         ->order_by('id', 'DESC')
    //         ->where('kondisi', 'Kurang Baik')
    //         ->get('aset')
    //         ->result_array();
    // }



    public function edit_kondisi($id)
    {
        $data = [

            "kondisi" => "Rusak"

        ];

        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function jumlah()
    {
        return $this->db->get('aset')->num_rows();
    }
}
