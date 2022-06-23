<?php

class M_perawatan extends CI_model
{
    public function lihat()
    {
        $this->db->select('perawatan.id_rawat, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, perawatan.jenis, perawatan.biaya, perawatan.tgl_rawat, perawatan.tgl_selesai');
        $this->db->from('perawatan');
        $this->db->join('aset', 'aset.id = perawatan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = perawatan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = perawatan.penanggung_jawab_id');
        $this->db->order_by('perawatan.id_rawat', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatperawatanbyid($id)
    {
        $this->db->select('perawatan.id_rawat, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, perawatan.jenis, perawatan.biaya, perawatan.tgl_rawat, perawatan.tgl_selesai');
        $this->db->from('perawatan');
        $this->db->join('aset', 'aset.id = perawatan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = perawatan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = perawatan.penanggung_jawab_id');
        $this->db->where('perawatan.aset_id', $id);
        $this->db->order_by('perawatan.id_rawat', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_rawat" => $this->input->post('tgl_rawat', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)

        ];
        $this->db->insert('perawatan', $data);
    }

    public function getRwtById($id)
    {
        return $this->db->get_where('perawatan', ['id_rawat' => $id])->row_array();
    }

    public function edit_barang($id)
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => $this->input->post('jenis', true),
            "biaya" => $this->input->post('biaya', true),
            "tgl_rawat" => $this->input->post('tgl_rawat', true),
            "tgl_selesai" => $this->input->post('tgl_selesai', true)
        ];

        $this->db->where('id_rawat', $id);
        $this->db->update('perawatan', $data);
    }


    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function getKondisiById($id)
    {
        return $this->db->get_where('history_perpindahan', ['id' => $id])->row_array();
    }

    public function jumlah()
    {
        return $this->db->get('history_perpindahan')->num_rows();
    }

    public function hapusData($id)
    {
        $this->db->where('id_rawat', $id);
        $this->db->delete('perawatan');
    }
}
