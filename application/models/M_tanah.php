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
            "nama_tanah" => $this->input->post('nama_tanah', true),
            "kode_tanah" => $this->input->post('kode_tanah', true),
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

    public function getBrgById($id)
    {
        return $this->db->get_where('tanah', ['id_tanah' => $id])->row_array();
    }

    public function edit_tanah($id)
    {
        $data = [
            "nama_tanah" => $this->input->post('nama_tanah', true),
            "kode_tanah" => $this->input->post('kode_tanah', true),
            "register" => $this->input->post('register', true),
            "luas" => $this->input->post('luas', true),
            "tahun" => $this->input->post('tahun', true),
            "lokasi" => $this->input->post('lokasi', true),
            "hak" => $this->input->post('hak', true),
            "nomer" => $this->input->post('nomer', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga" => $this->input->post('harga', true),
        ];

        $this->db->where('id_tanah', $id);
        $this->db->update('tanah', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_tanah', $id);
        $this->db->delete('tanah');
   
        
}

}
