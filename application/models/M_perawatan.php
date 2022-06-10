<?php

class M_perawatan extends CI_model
{
    public function lihat()
    {
        $this->db->select('perawatan.id_rawat, perawatan.nama_rawat, perawatan.kode_rawat, lokasi.lokasi, penanggung_jawab.nama, perawatan.jenis, perawatan.biaya, perawatan.tgl_rawat, perawatan.tgl_selesai');
        $this->db->from('perawatan');
        $this->db->join('lokasi', 'lokasi.id = perawatan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = perawatan.penanggung_jawab_id');
        $this->db->order_by('perawatan.id_rawat', 'DESC');
        return $this->db->get()->result_array();

    }

    // public function lihatperpindahanbyid($id)
    // {
    //     $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
    //     history_perpindahan.tanggal');
    //     $this->db->from('history_perpindahan');
    //     $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
    //     $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
    //     $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
    //     $this->db->where('history_perpindahan.aset_id', $id);
    //     $this->db->order_by('history_perpindahan.id', 'DESC');
    //     return $this->db->get()->result_array();

    // }

    public function proses_tambah()
    {
        $data = [
            "nama_rawat" => $this->input->post('nama_rawat', true),
            "kode_rawat" => $this->input->post('kode_rawat', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_rawat" => date('Y-m-d'),
            "tgl_selesai" => date('Y-m-d')
           
        ];
        $this->db->insert('perawatan', $data);
    }


    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }
 
    public function getKondisiById($id)
    {
        return $this->db->get_where('history_perpindahan', ['id' => $id])->row_array();
    }

    public function jumlah()
    {
        return $this->db->get('history_perpindahan')->num_rows();
    }
}