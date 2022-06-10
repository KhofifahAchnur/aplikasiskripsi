<?php

class M_perbaikan extends CI_model
{

    public function lihat()
    {
        return $this->db->get('perbaikan')->result_array();
    }
    // public function lihat()
    // {
    //     $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
    //     $this->db->from('aset');
    //     $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
    //     $this->db->order_by('aset.id', 'DESC');
    //     $this->db->where('kondisi', 'Kurang Baik');
    //     return $this->db->get()->result_array();
    // }

    public function proses_tambah()
    {
        $data = [
            "nama_perbaikan" => $this->input->post('nama_perbaikan', true),
            "lokasi_aset" => $this->input->post('lokasi_aset', true),
            "rusak" => $this->input->post('rusak', true),
            "biaya_perbaikan" => $this->input->post('biaya_perbaikan', true),
            "tgl_perbaikan" => date('Y-m-d'),
            "tgl_selesai" => date('Y-m-d')
        ];

        $this->db->insert('perbaikan', $data);
    }
}
