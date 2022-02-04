<?php
class M_login extends CI_model
{
    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username', $username)
            ->where('password', md5($password))
            ->limit(1)
            ->get('penanggung_jawab');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    // public function jumlah()
    // {
    //     return $this->db->get('barang')->num_rows();
    // }
}