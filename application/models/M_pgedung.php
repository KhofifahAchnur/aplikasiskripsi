<?php

class M_pgedung extends CI_model
{
    public function lihat()
    {
        $this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal, surat');
        $this->db->from('pengajuan');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
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
        $surat = $_FILES['surat'];
        if ($surat = '') {
        } else {
            $config['upload_path'] = './upload';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('surat')) {
                echo "Gagal Upload";
            } else {
                $surat = $this->upload->data('file_name');
            }
        }
        $data = [
            "aset" => $this->input->post('aset', true),
            "des" => $this->input->post('des', true),
            // "lokasi_id" => $this->input->post('lokasi', true),
            "penanggung_jawab_id" => $this->input->post('nama', true),
            "jenis" => 'Pemeliharaan Bangunan',
            "status" => 'Diproses',
            "tanggal" => date('Y-m-d'),
            "surat" => $surat
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
            // "lokasi" => $this->input->post('lokasi', true),
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
        return $this->db->get('pengajuan')->num_rows();
    }

    public function aset()
    {
        $this->db->select('aset');
        $this->db->from('pengajuan');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->group_by('aset');
        return $this->db->get()->result_array();
    }

    public function nama_tanggal($tgl_awal, $tgl_akhir)
    {
        $this->db->select('aset');
        $this->db->from('pengajuan');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        $this->db->group_by('aset');
        return $this->db->get()->result_array();
    }


    public function filterbytanggal($tgl_awalcetak, $tgl_akhircetak)
    {$this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal, surat');
        $this->db->from('pengajuan');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where("tanggal>=", "$tgl_awalcetak");
        $this->db->where("tanggal<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databytanggal($tgl_awal, $tgl_akhir)
    {$this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal, surat');
        $this->db->from('pengajuan');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }

    public function filterbynama($tgl_awalcetak, $tgl_akhircetak, $aset)
    {
        $this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal, surat');
        $this->db->from('pengajuan');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where("pengajuan.aset", "$aset");
        $this->db->where("tanggal>=", "$tgl_awalcetak");
        $this->db->where("tanggal<=", "$tgl_akhircetak");
        return $this->db->get()->result_array();
    }

    public function databynama($tgl_awal, $tgl_akhir, $aset)
    {
        $this->db->select('pengajuan.id, pengajuan.aset, pengajuan.des, penanggung_jawab.nama, pengajuan.jenis, pengajuan.status, pengajuan.tanggal, surat');
        $this->db->from('pengajuan');
        $this->db->join('penanggung_jawab', 'penanggung_jawab.id = pengajuan.penanggung_jawab_id');
        $this->db->where_in('jenis',array('Pemeliharaan Bangunan'));
        $this->db->order_by('pengajuan.id', 'DESC');
        $this->db->where("pengajuan.aset", "$aset");
        $this->db->where("tanggal>=", "$tgl_awal");
        $this->db->where("tanggal<=", "$tgl_akhir");
        return $this->db->get()->result_array();
    }


    // public function jumlah()
    //     {
    //         return $this->db->get('barang')->num_rows();
    //     }

    
}
