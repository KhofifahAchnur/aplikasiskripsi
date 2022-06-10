<?php

class M_buku extends CI_model
{
    public function lihat()
    {
        return $this->db->get('buku')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_buku" => $this->input->post('nama_buku', true),
            "kode_buku" => $this->input->post('kode_buku', true),
            "register" => $this->input->post('register', true),
            "judul" => $this->input->post('judul', true),
            "spesifikasi" => $this->input->post('spesifikasi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('buku', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row_array();
    }

    public function edit_buku($id)
    {
        $data = [
            "nama_buku" => $this->input->post('nama_buku', true),
            "kode_buku" => $this->input->post('kode_buku', true),
            "register" => $this->input->post('register', true),
            "judul" => $this->input->post('judul', true),
            "spesifikasi" => $this->input->post('spesifikasi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_buku', $id);
        $this->db->update('buku', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
   
        
}

}
