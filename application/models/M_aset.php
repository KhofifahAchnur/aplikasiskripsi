<?php

class M_aset extends CI_model
{
    public function lihat()
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        // $this->db->where_in('lokasi',array('Gudang'));
        return $this->db->get()->result_array();
    }

    public function lihatbylokasi($id)
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, lokasi.id as idlokasi, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where('lokasi.id', $id);
        return $this->db->get()->result_array();
    }

    public function tampilaset()
    {
        $this->db->select('aset.nama_barang, aset.kode_barang, aset.kondisi');
        $this->db->from('aset');
        $this->db->order_by('aset.id', 'DESC');
        return $this->db->get()->result_array();
    }
    
    // public function tampilkondisibaik()
    // {
    //     return $this
    //         ->db
    //         ->select('*')
    //         ->order_by('id', 'DESC')
    //         ->where('kondisi', 'Baik')
    //         ->get('aset')
    //         ->result_array();
    // }


    public function proses_tambah()
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "kode_barang" => $this->input->post('kode_barang', true),
            "register" => $this->input->post('register', true),
            "merk" => $this->input->post('merk', true),
            "ukuran" => $this->input->post('ukuran', true),
            "bahan" => $this->input->post('bahan', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga_brg" => $this->input->post('harga_brg', true),
            "perpindahan_id" => '11',
            "tanggal_masuk" => date('Y-m-d')
            
           
        ];

        $this->db->insert('aset', $data);
    }

    public function getBrgById($id)
    {
        return $this->db->get_where('aset', ['id' => $id])->row_array();
    }

    public function edit_barang($id)
    {
        $data = [
            "nama_barang" => $this->input->post('nama_barang', true),
            "kode_barang" => $this->input->post('kode_barang', true),
            "register" => $this->input->post('register', true),
            "merk" => $this->input->post('merk', true),
            "ukuran" => $this->input->post('ukuran', true),
            "bahan" => $this->input->post('bahan', true),
            "tahun" => $this->input->post('tahun', true),
            "kondisi" => $this->input->post('kondisi', true),
            "asal_usul" => $this->input->post('asal_usul', true),
            "harga_brg" => $this->input->post('harga_brg', true),
           
        ];

        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aset');
    }

//     public function jumlah()
//     {
//         return $this->db->get('aset')->num_rows();
//     }
}
