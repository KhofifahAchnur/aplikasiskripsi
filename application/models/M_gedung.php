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
            "nama_gedung" => $this->input->post('nama_gedung', true),
            "kode_gedung" => $this->input->post('kode_gedung', true),
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
            "tanggal_masuk" => date('Y-m-d')
        ];

        $this->db->insert('gedung', $data);
    }

    public function tampilgedung()
    {
        $this->db->select('gedung.nama_gedung, gedung.kode_gedung, gedung.tingkat, gedung.beton, gedung.luas, gedung.kondisi');
        $this->db->from('gedung');
        $this->db->order_by('gedung.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getGdgById($id)
    {
        return $this->db->get_where('gedung', ['id_gedung' => $id])->row_array();
    }

    public function edit_gedung($id)
    {
        $data = [
            "nama_gedung" => $this->input->post('nama_gedung', true),
            "kode_gedung" => $this->input->post('kode_gedung', true),
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

        $this->db->where('id_gedung', $id);
        $this->db->update('gedung', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id_gedung', $id);
        $this->db->delete('gedung');
   
        
}

}
