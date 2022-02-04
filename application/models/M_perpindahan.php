<?php

class M_perpindahan extends CI_model
{
    public function lihat()
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        return $this->db->get()->result_array();

    }

    public function proses_tambah()
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "tanggal" => date('Y-m-d')
           
        ];
        $this->db->insert('history_perpindahan', $data);
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