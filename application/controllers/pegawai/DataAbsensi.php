<?php

class dataAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi";
        $where = $this->session->userdata('id_pegawai');
        $data['absensi'] = $this->db->query("SELECT*FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai=data_pegawai.id_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE data_kehadiran.id_pegawai=$where ORDER BY data_kehadiran.tahun, data_kehadiran.bulan ASC")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('pegawai/dataAbsensi', $data);
        $this->load->view('template_page/footer');
    }
}
