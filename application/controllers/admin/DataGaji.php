<?php

class dataGaji extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }

        $data['potonganAlpha'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Alpha'")->result();
        $data['potonganIzin'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Izin'")->result();

        $data['title'] = "Data Gaji";
        $data['gaji'] = $this->db->query("SELECT * FROM data_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan
        INNER JOIN data_kehadiran ON data_pegawai.id_pegawai=data_kehadiran.id_pegawai
        WHERE data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun AND data_kehadiran.hadir!=0 ORDER BY data_jabatan.nama_jabatan ASC
        ")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/dataGaji', $data);
        $this->load->view('template_page/footer');
    }
    public function cetakGaji()
    {
        $data['title'] = "Cetak Data Gaji Pegawai";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }

        $data['potonganAlpha'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Alpha'")->result();
        $data['potonganIzin'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Izin'")->result();

        $data['cetakGaji'] = $this->db->query("SELECT * FROM data_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan
        INNER JOIN data_kehadiran ON data_pegawai.id_pegawai=data_kehadiran.id_pegawai
        WHERE data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun AND data_kehadiran.hadir!=0 ORDER BY data_jabatan.nama_jabatan ASC
        ")->result();
        $this->load->view('admin/cetakDataGaji', $data);
    }
}
