<?php

class dataGaji extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Gaji";
        $where = $this->session->userdata('id_pegawai');
        $data['potongan'] = $this->db->query("SELECT*FROM data_potongan_gaji ORDER BY nama_potongan ASC")->result();

        $data['potonganAlpha'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Alpha'")->result();
        $data['potonganIzin'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Izin'")->result();

        $data['gaji'] = $this->db->query("SELECT * FROM data_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan
        INNER JOIN data_kehadiran ON data_pegawai.id_pegawai=data_kehadiran.id_pegawai
        WHERE data_kehadiran.id_pegawai=$where ORDER BY data_kehadiran.tahun, data_kehadiran.bulan ASC")->result();

        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('pegawai/dataGaji', $data);
        $this->load->view('template_page/footer');
    }
}
