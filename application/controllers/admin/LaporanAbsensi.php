<?php

class laporanAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Laporan Data Absensi";
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/filterLaporanAbsensi');
        $this->load->view('template_page/footer');
    }
    public function cetakLaporanAbsensi()
    {
        $data['title'] = "Cetak Data Absensi Pegawai";
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        if (!empty($bulan) && !empty($tahun)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $data['laporanAbsensi'] = $this->db->query("SELECT*FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai=data_pegawai.id_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('admin/cetakDataAbsensi', $data);
    }
}
