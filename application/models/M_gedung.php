<?php

class M_gedung extends CI_model
{
    public function lihat()
    {
        return $this->db->get('gedung')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "kode_barang" => $this->input->post('kode_barang', true),
            "register" => $this->input->post('register', true),
            "tingkat" => $this->input->post('tingkat', true),
            "beton" => $this->input->post('beton', true),
            "luas" => $this->input->post('luas', true),
            "lokasi" => $this->input->post('lokasi', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->insert('gedung', $data);
    }
}
