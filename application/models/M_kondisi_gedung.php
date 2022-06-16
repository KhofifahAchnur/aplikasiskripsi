<?php

class M_kondisi_gedung extends CI_model
{
    public function lihat()
    {
        $this->db->select('kondisi_gedung.id, gedung.nama_gedung, 
		gedung.kode_gedung, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id = kondisi_gedung.gedung_id ');
        $this->db->order_by('kondisi_gedung.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatkondisibyid($id)
    {
       $this->db->select('kondisi_gedung.id, gedung.nama_gedung, 
		gedung.kode_gedung, gedung.tingkat, gedung.beton, gedung.luas, kondisi_gedung.kondisi, kondisi_gedung.tanggal');
        $this->db->from('kondisi_gedung');
        $this->db->join('gedung', 'gedung.id = kondisi_gedung.gedung_id ');
        $this->db->where('konfisi_gedung.aset_id', $id);
        $this->db->order_by('konfisi_gedung.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "tanggal" => date('Y-m-d'),
            "kondisi" => $this->input->post('kondisi', true)
        ];

        $this->db->insert('history_kondisi', $data);
    }

    public function updatekondisigedung($id)
    {
        $data = [
            "kondisi" => $this->input->post('kondisi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('gedung', $data);
    }


    public function getKondisiById($id)
    {
        return $this->db->get_where('kondisi_gedung', ['id' => $id])->row_array();
    }

    // public function jumlah()
    // {
    //     return $this->db->get('history_kondisi')->num_rows();
    // }
}
