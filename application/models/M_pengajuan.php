<?php

class M_pengajuan extends CI_model
{
    public function lihat()
    {
        $this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, lokasi.lokasi, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal');
        $this->db->from('pengajuan');
        $this->db->join('lokasi', 'lokasi.id = pengajuan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where_in('jenis',array('Pemeliharaan Mesin'));
        return $this->db->get()->result_array();
    }
     

    public function tampilstatus()
    {
        $this->db->select('pengajuan.aset, pengajuan.des, pengajuan.status, pengajuan.status');
        $this->db->from('pengajuan');
        $this->db->order_by('pengajuan.id', 'DESC');
        return $this->db->get()->result_array();
    }
    public function proses_tambah()
    {
        $data = [
            "aset" => $this->input->post('aset', true),
            "des" => $this->input->post('des', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => 'Pemeliharaan Mesin',
            "status" => 'Diproses',
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
            "aset" => $this->input->post('aset', true),
            "des" => $this->input->post('des', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "status" => $this->input->post('status', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('pengajuan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengajuan');
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
