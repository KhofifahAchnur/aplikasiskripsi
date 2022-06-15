<?php

class M_kmotor extends CI_model
{
	public function lihat()
	{
		$this->db->select('history_konfirmasi.id_konfir, pengajuan.aset, 
		pengajuan.des, pengajuan.jenis, history_konfirmasi.status, history_konfirmasi.tgl_konfir');
		$this->db->from('history_konfirmasi');
		$this->db->join('pengajuan', 'pengajuan.id = history_konfirmasi.pengajuan_id');
		// $this->db->join('lokasi', 'lokasi.id = history_konfirmasi.lokasi_id');
        // $this->db->join('penanggung_jawab', 'penanggung_jawab.id = history_konfirmasi.penanggung_jawab_id');
		$this->db->order_by('history_konfirmasi.id_konfir', 'DESC');
		$this->db->where_in('jenis',array('Pemeliharaan Kendaraan'));
		return $this->db->get()->result_array();
	}

	public function lihatkondisibyid($id)
	{
		$this->db->select('history_kondisi.id, aset.nama_barang, 
		aset.kode_barang, aset.register, history_kondisi.kondisi, history_kondisi.tgl_konfir');
		$this->db->from('history_kondisi');
		$this->db->join('aset', 'aset.id = history_kondisi.aset_id ');
		$this->db->where('history_kondisi.aset_id', $id);
		$this->db->order_by('history_kondisi.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function proses_tambah()
	{
		$data = [
            "pengajuan_id" => $this->input->post('aset', true),
            // "lokasi_id" => $this->input->post('lokasi', true),
            // "penanggung_jawab_id" => $this->input->post('nama', true),
            "status" => $this->input->post('status', true),
            "tgl_konfir" => date('Y-m-d')
		];

		$this->db->insert('history_konfirmasi', $data);
	}

	public function updatestatus($id)
	{
		$data = [
			"status" => $this->input->post('status', true)
		];
		$this->db->where('id', $id);
		$this->db->update('pengajuan', $data);
	}


	public function getKondisiById($id)
	{
		return $this->db->get_where('history_kondisi', ['id' => $id])->row_array();
	}

	// public function jumlah()
	// {
	//     return $this->db->get('history_kondisi')->num_rows();
	// }
}
