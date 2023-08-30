<?php

class profilAkun extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Account";
        $where = $this->session->userdata('id_pegawai');
        $data['profil'] = $this->db->query("SELECT * FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan WHERE id_pegawai='$where'")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('account/profilAkun', $data);
        $this->load->view('template_page/footer');
    }
}
