<?php

class slipGaji extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Slip Gaji Pegawai";
        $data['namaPegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/filterSlipGaji', $data);
        $this->load->view('template_page/footer');
    }
    public function cetakSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji Pegawai";
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $id_pegawai = $this->input->post('id_pegawai');

        //mengambil data bulan, tahun, nama, jabatan (gaji) 
        if (!empty($bulan) && !empty($tahun)) {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['id_pegawai'] = $id_pegawai;
        $data['print'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok , data_jabatan.tunjangan, data_jabatan.bonus, data_kehadiran.izin, data_kehadiran.alpha  FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai= data_pegawai.id_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan= data_jabatan.id_jabatan
        WHERE data_pegawai.id_pegawai='$id_pegawai' AND data_kehadiran.bulan ='$bulan' AND data_kehadiran.tahun='$tahun' 
        ")->result();

        //mengambil data potongan izin dan alpha(dari table data_potongan_gaji)
        $data['potonganAlpha'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Alpha'")->result();
        $data['potonganIzin'] = $this->db->query("SELECT*FROM data_potongan_gaji WHERE nama_potongan='Izin'")->result();
        $this->load->view('admin/cetakSlipGaji', $data);
    }
}
