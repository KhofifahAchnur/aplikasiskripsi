<?php

class M_pengajuan extends CI_model
{
    public function lihat()
    {
        $this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, lokasi.lokasi, penanggung_jawab.nama, pengajuan.status, pengajuan.tanggal');
        $this->db->from('pengajuan');
        $this->db->join('lokasi', 'lokasi.id = pengajuan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->order_by('pengajuan.id', 'DESC');
        return $this->db->get()->result_array();
    }
     

    public function tampilstatus()
    {
        $this->db->select('pengajuan.aset, pengajuan.des, pengajuan.status');
        $this->db->from('pengajuan');
        $this->db->order_by('pengajuan.id', 'DESC');
        return $this->db->get()->result_array();
    }
    public function proses_tambah()
    {
        $data = [
            "aset" => $this->input->post('aset', true),
            "des" => $this->input->post('deskripsi', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "status" => $this->input->post('status', true),
            "tanggal" => date('Y-m-d')
        ];

        $this->db->insert('pengajuan', $data);
    }

    public function getStsById($id)
    {
        return $this->db->get_where('pengajuan', ['id' => $id])->row_array();
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
