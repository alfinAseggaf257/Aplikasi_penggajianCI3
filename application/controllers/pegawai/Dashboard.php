<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //untuk mengecek apakah sudah ada session di dasbord( agar user tidak dilempar ke halaman login kembali walau sudah ada session) 
        //cek apakah sudah ada session pegawai atau belum
        if ($this->session->userdata('id_hakakses') != '2') {
            $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
				<span class="badge badge-pill badge-danger">Akses Dilarang!</span>
				Anda Belum Login
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        //menampilkan jumlah pegawai
        // $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        // $data['pegawai'] = $pegawai->num_rows();

        // //menampilkan jumlah admin
        // $admin = $this->db->query("SELECT * FROM data_pegawai
        // INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan
        // WHERE nama_jabatan = 'Admin'");
        // $data['admin'] = $admin->num_rows();

        // //menampilkan jumlah jabatan
        // $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        // $data['jabatan'] = $jabatan->num_rows();

        // //Menampilkan data nama pegawai + posisi jabatan
        // $data['cek'] =  $this->db->query("SELECT * FROM data_pegawai
        // INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan ORDER BY nama_jabatan ASC")->result();


        // //menampilkan jumlah kehadiran
        // $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        // $data['kehadiran'] = $kehadiran->num_rows();

        $where = $this->session->userdata('id_pegawai');
        $data['profil'] = $this->db->query("SELECT * FROM data_pegawai INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan WHERE id_pegawai='$where'")->result();

        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('pegawai/dashboard', $data);
        $this->load->view('template_page/footer');
    }
}
