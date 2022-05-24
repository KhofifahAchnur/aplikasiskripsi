<?php

class M_tanah extends CI_model
{
    public function lihat()
    {
        return $this->db->get('tanah')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "kode_barang" => $this->input->post('kode_barang', true),
            "register" => $this->input->post('register', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "lokasi" => $this->input->post('lokasi', true),
            "hak" => $this->input->post('hak', true),
            "nomer" => $this->input->post('nomer', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->insert('tanah', $data);
    }

}
