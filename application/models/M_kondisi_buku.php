<?php

class M_kondisi_buku extends CI_model
{
    public function lihat()
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->order_by('kondisi_buku.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatkondisibyid($id)
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id ');
        $this->db->where('kondisi_buku.buku_id', $id);
        $this->db->order_by('kondisi_buku.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "buku_id" => $this->input->post('nama_buku', true),
            "tanggal" => date('Y-m-d'),
            "kondisi" => $this->input->post('kondisi', true)
        ];

        $this->db->insert('kondisi_buku', $data);
    }

    public function updatekondisibuku($id)
    {
        $data = [
            "kondisi" => $this->input->post('kondisi', true)
        ];
        $this->db->where('id_buku', $id);
        $this->db->update('buku', $data);
    }


    public function getKondisiById($id)
    {
        return $this->db->get_where('kondisi_buku', ['id' => $id])->row_array();
    }

    // public function jumlah()
    // {
    //     return $this->db->get('history_kondisi')->num_rows();
    // }
}
