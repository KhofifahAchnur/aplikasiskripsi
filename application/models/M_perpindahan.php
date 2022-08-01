<?php

class M_perpindahan extends CI_model
{
    public function lihat()
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function getPerpindahan()
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function lihatperpindahanbyid($id)
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->where('history_perpindahan.aset_id', $id);
        $this->db->order_by('history_perpindahan.id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function proses_tambah()
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "tanggal" => date('Y-m-d')

        ];
        $this->db->insert('history_perpindahan', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('history_perpindahan');
    }

    public function edit_barang($id)
    {
        $data = [
            "aset_id" => $this->input->post('nama_barang', true),
            "lokasi_id" => $this->input->post('lokasi', true),
            "tanggal" => date('Y-m-d')
        ];
        $this->db->where('id', $id);
        $this->db->update('history_perpindahan', $data);
    }


    public function tambahlokasi($id)
    {
        $data = [
            "perpindahan_id" => $this->input->post('lokasi', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('aset', $data);
    }

    public function updatestatus($id)
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

    public function nama_barang()
    {
        $this->db->select('nama_barang');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_barang');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        $this->db->group_by('nama_barang');
        return $this->db->get()->result_array();
    }

    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        $this->db->where("tanggal>=", "$tgl_awalcetak");
        $this->db->where("tanggal<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_barang)
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tanggal>=", "$tgl_awalcetak");
        $this->db->where("tanggal<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_barang)
    {
        $this->db->select('history_perpindahan.id, aset.nama_barang, aset.kode_barang, aset.register, lokasi.lokasi, penanggung_jawab.nama, 
        history_perpindahan.tanggal');
        $this->db->from('history_perpindahan');
        $this->db->join('aset', 'aset.id = history_perpindahan.aset_id ');
        $this->db->join('lokasi', 'lokasi.id = history_perpindahan.lokasi_id');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = lokasi.penanggung_jawab_id');
        $this->db->order_by('history_perpindahan.id', 'DESC');
        $this->db->where("aset.nama_barang", "$nama_barang");
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }
}
