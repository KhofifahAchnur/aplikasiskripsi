<?php

class M_penanggung_jawab extends CI_model
{
    public function lihat()
    {
        return $this->db->get('penanggung_jawab')->result_array();
    }
    
    public function proses_tambah()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
            "username" => $this->input->post('username', true),
            "password" => md5($this->input->post('password', true)),
            "hak_akses" => $this->input->post('hak_akses', true),
        ];

        $this->db->insert('penanggung_jawab', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('penanggung_jawab', ['id' => $id])->row_array();
    }

    public function edit_barang($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nip" => $this->input->post('nip', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('penanggung_jawab', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penanggung_jawab');
    }

    public function jumlah()
    {
        return $this->db->get('penanggung_jawab')->num_rows();
    }

    // public function jumlah()
    // {
    //     return $this->db->get('Penanggung_jawab')->num_rows();
    // }
}
