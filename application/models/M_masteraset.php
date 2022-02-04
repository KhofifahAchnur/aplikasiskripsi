<?php

class M_masteraset extends CI_model
{
    public function lihat()
    {
        $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
        $this->db->from('aset');
        // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
        $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
        $this->db->order_by('aset.id', 'DESC');
        $this->db->where_in('lokasi',array('Ruang BK', 'Ruang Lab Komputer', 'Ruang Lab IPA', 'Ruang Lab BAHASA', 'Ruang OSIS'));
        return $this->db->get()->result_array();
    }

    // public function lihatbykondisi()
    // {
    //     $this->db->select('aset.id, lokasi.lokasi, aset.nama_barang, aset.kode_barang, aset.register, aset.merk, aset.ukuran, aset.bahan, aset.tahun, aset.kondisi, aset.asal_usul, aset.harga_brg, aset.tanggal_masuk');
    //     $this->db->from('aset');
    //     // $this->db->join('history_perpindahan', 'history_perpindahan.id = aset.perpindahan_id');
    //     $this->db->join('lokasi', 'lokasi.id = aset.perpindahan_id');
    //     $this->db->order_by('aset.id', 'DESC');
    //     $this->db->where('kondisi','Kurang Baik');
    //     return $this->db->get()->result_array();
    // }
 
    public function getKondisiById($id)
    {
        return $this->db->get_where('aset', ['id' => $id])->row_array();
    }

    // public function lihatBykondisi($id)
    // {
    //     return $this
    //         ->db
    //         ->select('*')
    //         ->order_by('id', 'DESC')
    //         ->where('kondisi', 'Kurang Baik')
    //         ->get('aset')
    //         ->result_array();
    // }

    

    public function edit_kondisi($id)
    {
        $data = [
           
            "kondisi" => "Rusak"
           
        ];

        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function jumlah()
    {
        return $this->db->get('aset')->num_rows();
    }
}

