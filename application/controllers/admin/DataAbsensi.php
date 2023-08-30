<?php

class dataAbsensi extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Absensi";
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
        $data['absensi'] = $this->db->query("SELECT*FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai=data_pegawai.id_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE data_kehadiran.bulan = $bulan AND data_kehadiran.tahun=$tahun ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('template_page/footer');
    }
    public function tambahAbsensi()
    {
        //membaca value button simpan 
        if ($this->input->post('submit', TRUE) == 'submit') {
            //mendeklarasikan variabel $post untuk menyimpan data yang telah dikirimkan
            $post = $this->input->post();
            //melakukan perulangan dari data yang diambil.. sebagai kuncinya yaitu bulan
            foreach ($post['bulan'] as $key => $value) {
                //cek data dalam perulangan apakah kosong atau tidak
                if ($post['bulan'][$key] != '' && $post['tahun'][$key] != '' || $post['id_pegawai'][$key] != '') {
                    //jika kondisi benar maka masukkan ke dalam kunci field
                    $simpan[] = array(
                        'bulan'         => $post['bulan'][$key],
                        'tahun'         => $post['tahun'][$key],
                        'id_pegawai'    => $post['id_pegawai'][$key],
                        'hadir'         => $post['hadir'][$key],
                        'izin'          => $post['izin'][$key],
                        'alpha'         => $post['alpha'][$key]
                    );
                }
            }
            $this->penggajianModel->insert_batch('data_kehadiran', $simpan);
            $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
            <span class="badge badge-pill badge-primary">Success</span>
            Data berhasil ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
             </div>');
            redirect('admin/dataAbsensi');
        }

        $data['title'] = "Form Input Absensi";
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
        } else {
            $bulan = date('m');
            $tahun = date('Y');
        }
        $data['tambah_Absensi'] = $this->db->query("SELECT*FROM data_pegawai 
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE NOT EXISTS (SELECT*FROM data_kehadiran WHERE bulan=$bulan AND tahun=$tahun AND data_pegawai.id_pegawai=data_kehadiran.id_pegawai) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/formtambahAbsensi', $data);
        $this->load->view('template_page/footer');
    }

    public function editData($id_kehadiran)
    {

        $where = array('id_kehadiran' => $id_kehadiran);
        $data['title'] = "Edit Data Kehadiran";
        $data['tes'] = $this->db->query("SELECT * FROM data_kehadiran 
        INNER JOIN data_pegawai ON data_kehadiran.id_pegawai = data_pegawai.id_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan = data_jabatan.id_jabatan
        WHERE id_kehadiran='$id_kehadiran'")->result();
        // var_dump($data['tes']);
        // exit();

        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/editAbsensi', $data);
        $this->load->view('template_page/footer');
    }

    public function prosesEditData()
    {
        $id_kehadiran = $this->input->post('id_kehadiran');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $id_pegawai = $this->input->post('id_pegawai');
        $hadir = $this->input->post('hadir');
        $izin = $this->input->post('izin');
        $alpha = $this->input->post('alpha');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'id_pegawai' => $id_pegawai,
            'hadir' => $hadir,
            'izin' => $izin,
            'alpha' => $alpha
        );
        $where = array(
            'id_kehadiran' => $id_kehadiran
        );
        $this->penggajianModel->update_data('data_kehadiran', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataAbsensi');
    }
}
