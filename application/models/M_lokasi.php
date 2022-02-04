<?php

class M_lokasi extends CI_model
{
    public function lihat()
    {
        $this->db->select('lokasi.id, lokasi.lokasi, penanggung_jawab.nama');
        $this->db->from('lokasi');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('lokasi.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "lokasi" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
        ];

        $this->db->insert('lokasi', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('lokasi', ['id' => $id])->row_array();
    }

    public function edit_barang($id)
    {
        $data = [
            "lokasi" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('lokasi', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('lokasi');
   
        
}

public function jumlah()
    {
        return $this->db->get('lokasi')->num_rows();
    }

// public function jumlah()
//     {
//         return $this->db->get('barang')->num_rows();
//     }
}

