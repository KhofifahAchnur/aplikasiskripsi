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

    public function nama_buku()
    {
        $this->db->select('nama_buku');
		$this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->group_by('nama_buku');
        return $this->db->get()->result_array();
    }

	public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('nama_buku');
		$this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
		$this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        $this->db->group_by('nama_buku');
        return $this->db->get()->result_array();
    }

	public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->order_by('kondisi_buku.id', 'DESC');
		$this->db->where("tanggal >=", "$tgl_awalcetak");
        $this->db->where("tanggal <=", "$tgl_akhircetak");
        $this->db->group_by('nama_buku');
        return $this->db->get()->result_array();
    }

	public function databytanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->order_by('kondisi_buku.id', 'DESC');
        $this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }
    
    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $nama_buku)
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->order_by('kondisi_buku.id', 'DESC');
        $this->db->where("buku.nama_buku", "$nama_buku");
        $this->db->where("tanggal >=", "$tgl_awalcetak");
        $this->db->where("tanggal <=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $nama_buku)
    {
        $this->db->select('kondisi_buku.id, buku.nama_buku, buku.kode_buku, buku.register, buku.judul, kondisi_buku.kondisi, kondisi_buku.tanggal');
        $this->db->from('kondisi_buku');
        $this->db->join('buku', 'buku.id_buku = kondisi_buku.buku_id');
        $this->db->order_by('kondisi_buku.id', 'DESC');
        $this->db->where("buku.nama_buku", "$nama_buku");
        $this->db->where("tanggal >=", "$tgl_awal");
        $this->db->where("tanggal <=", "$tgl_akhir");
        return $this->db->get()->result_array();
        // die($this->db->get()->result_array());
    }
}
