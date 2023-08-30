<?php

class penggajianModel extends CI_Model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insert_data($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function hapus_data($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function cek_login()
    {
        $username = set_value('username');
        $password = MD5(set_value('password'));

        //limit 1 artiya data yang diambil hanya 1 , get (mengambil dari table) data_pegawai
        $result   = $this->db->select('*')
            ->from('data_pegawai')
            ->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.id_jabatan')
            ->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get();


        if ($result->num_rows() > 0) {
            //mengembalikan nilai ke variabel $result (line 37)
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
