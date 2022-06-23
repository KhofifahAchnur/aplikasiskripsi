<?php

class M_pemeliharaan extends CI_model
{
    public function lihat()
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, penanggung_jawab.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pemeliharaan.penanggung_jawab_id');
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        return $this->db->get()->result_array();

    }

    public function lihatpemeliharaanbyid($id)
    {
        $this->db->select('pemeliharaan.id_pemeliharaan, gedung.nama_gedung, gedung.kode_gedung, gedung.register, gedung.lokasi, penanggung_jawab.nama, pemeliharaan.jenis, pemeliharaan.biaya, pemeliharaan.tgl_pemeliharaan, pemeliharaan.tgl_selesai');
        $this->db->from('pemeliharaan');
        $this->db->join('gedung', 'gedung.id_gedung = pemeliharaan.gedung_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pemeliharaan.penanggung_jawab_id');
        $this->db->where('pemeliharaan.gedung_id', $id);
        $this->db->order_by('pemeliharaan.id_pemeliharaan', 'DESC');
        return $this->db->get()->result_array();

    }

    public function proses_tambah()
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_pemeliharaan" => $this->input->post('tgl_pemeliharaan', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)
           
        ];
        $this->db->insert('pemeliharaan', $data);
    }
    public function getpemeliharaanById($id)
    {
        return $this->db->get_where('pemeliharaan', ['id_pemeliharaan' => $id])->row_array();
    }
    
    public function edit_barang($id)
    {
        $data = [
            "gedung_id" => $this->input->post('nama_gedung', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_pemeliharaan" => $this->input->post('tgl_pemeliharaan', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)
        ];

        $this->db->where('id_pemeliharaan', $id);
        $this->db->update('pemeliharaan', $data);
    }
    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }
 
    

    public function jumlah()
    {
        return $this->db->get('history_perpindahan')->num_rows();
    }

    public function hapusData($id)
    {
        $this->db->where('id_pemeliharaan', $id);
        $this->db->delete('pemeliharaan');
}
}