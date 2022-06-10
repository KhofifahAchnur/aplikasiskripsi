<?php

class M_jalan extends CI_model
{
    public function lihat()
    {
        return $this->db->get('jalan')->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "nama_aset" => $this->input->post('nama_aset', true),
            "kode_aset" => $this->input->post('kode_aset', true),
            "register" => $this->input->post('register', true),
            "konstruksi" => $this->input->post('konstruksi', true),
            "luas" => $this->input->post('luas', true),
            "lokasi" => $this->input->post('lokasi', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('jalan', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('jalan', ['id_jalan' => $id])->row_array();
    }

    public function edit_jalan($id)
    {
        $data = [
            "nama_aset" => $this->input->post('nama_aset', true),
            "kode_aset" => $this->input->post('kode_aset', true),
            "register" => $this->input->post('register', true),
            "konstruksi" => $this->input->post('konstruksi', true),
            "luas" => $this->input->post('luas', true),
            "lokasi" => $this->input->post('lokasi', true),
            "kondisi" => $this->input->post('kondisi', true),
            "status" => $this->input->post('status', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
            // "tanggal" => date('Y-m-d')
        ];

        $this->db->where('id_jalan', $id);
        $this->db->update('jalan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_jalan', $id);
        $this->db->delete('jalan');
   
        
}

}
