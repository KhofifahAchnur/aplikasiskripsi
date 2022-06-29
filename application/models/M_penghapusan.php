<?php

class M_penghapusan extends CI_model
{
    public function lihat()
    {
        $this->db->select('penghapusan.id, aset.nama_barang, aset.kode_barang, aset.register, aset.harga_brg, lokasi.lokasi, penghapusan.status, penghapusan.tgl_hapus');
        $this->db->from('penghapusan');
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = penghapusan.lokasi_id');
        $this->db->order_by('penghapusan.id', 'DESC');
        $this->db->where_in('status',array('Dihapus'));
        return $this->db->get()->result_array();
    }
     

    // public function tampilstatus()
    // {
    //     $this->db->select('penghapusan.aset, penghapusan.des, penghapusan.status, penghapusan.status');
    //     $this->db->from('penghapusan');
    //     $this->db->order_by('penghapusan.id', 'DESC');
    //     return $this->db->get()->result_array();
    // }
    public function proses_tambah()
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "status" => 'Dihapus',
            "tgl_hapus" => date('Y-m-d')
        ];

        $this->db->insert('penghapusan', $data);
    }

    public function getStsById($id)
    {
        return $this->db->get_where('penghapusan', ['id' => $id])->row_array();
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
        $this->db->update('penghapusan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penghapusan');
    }

    public function jumlah()
    {
        return $this->db->get('lokasi')->num_rows();
    }

    public function nama_barang()
    {
        $this->db->select('nama_barang');
        $this->db->from('penghapusan');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_barang');
        $this->db->from('penghapusan');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->where("tgl_hapus>=", "$tgl_awal");
        $this->db->where("tgl_hapus<=", "$tgl_akhir");
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('penghapusan.id, aset.nama_barang, aset.kode_barang, aset.register, aset.harga_brg, lokasi.lokasi, penghapusan.status, penghapusan.tgl_hapus');
        $this->db->from('penghapusan');
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = penghapusan.lokasi_id');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->order_by('penghapusan.id', 'DESC');
        $this->db->where("tgl_hapus>=", "$tgl_awalcetak");
        $this->db->where("tgl_hapus<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('penghapusan.id, aset.nama_barang, aset.kode_barang, aset.register, aset.harga_brg, lokasi.lokasi, penghapusan.status, penghapusan.tgl_hapus');
        $this->db->from('penghapusan');
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = penghapusan.lokasi_id');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->order_by('penghapusan.id', 'DESC');
        $this->db->where("tgl_hapus>=", "$tgl_awal");
        $this->db->where("tgl_hapus<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang)
    {
        $this->db->select('penghapusan.id, aset.nama_barang, aset.kode_barang, aset.register, aset.harga_brg, lokasi.lokasi, penghapusan.status, penghapusan.tgl_hapus');
        $this->db->from('penghapusan');
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = penghapusan.lokasi_id');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->order_by('penghapusan.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tgl_hapus>=", "$tgl_awalcetak");
        $this->db->where("tgl_hapus<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_barang)
    {
        $this->db->select('penghapusan.id, aset.nama_barang, aset.kode_barang, aset.register, aset.harga_brg lokasi.lokasi, penghapusan.status, penghapusan.tgl_hapus');
        $this->db->from('penghapusan');
        $this->db->join('aset', 'aset.id = penghapusan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = penghapusan.lokasi_id');
        $this->db->where_in('status',array('Dihapus'));
        $this->db->order_by('penghapusan.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tgl_hapus>=", "$tgl_awal");
        $this->db->where("tgl_hapus<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    // public function jumlah()
    //     {
    //         return $this->db->get('barang')->num_rows();
    //     }
}
