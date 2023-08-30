<?php

class dataPegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Pegawai";
        // $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai
                INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan 
                INNER JOIN hak_akses ON data_pegawai.id_hakakses=hak_akses.id_hakakses 
                ORDER BY nama_jabatan ASC")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('template_page/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['hakAkses'] = $this->penggajianModel->get_data('hak_akses')->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/tambahPegawai', $data);
        $this->load->view('template_page/footer');
    }

    public function TambahDataAksi()
    {
        $nik = $this->input->post('nik');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $id_jabatan = $this->input->post('id_jabatan');
        $tanggal_aktif = $this->input->post('tanggal_aktif');
        $status = $this->input->post('status');
        $username = $this->input->post('status');
        $password = MD5($this->input->post('password'));
        $id_hakakses = $this->input->post('id_hakakses');
        $foto   = $_FILES['foto']['name'];

        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nik'            => $nik,
            'nama_pegawai'   => $nama_pegawai,
            'jenis_kelamin'  => $jenis_kelamin,
            'id_jabatan'        => $id_jabatan,
            'tanggal_aktif'  => $tanggal_aktif,
            'status'         => $status,
            'username'       => $username,
            'password'       => $password,
            'id_hakakses'    => $id_hakakses,
            'foto'           => $foto
        );
        $this->penggajianModel->insert_data('data_pegawai', $data);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataPegawai');
    }

    public function editData($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['title'] = "Edit Data Jabatan";
        $data['editjabatan'] = $this->db->query("SELECT*FROM data_jabatan")->result();
        $data['editHakAkses'] = $this->penggajianModel->get_data('hak_akses')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.id_jabatan=data_jabatan.id_jabatan WHERE id_pegawai='$id_pegawai'")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/editPegawai', $data);
        $this->load->view('template_page/footer');
    }

    public function prosesEditData()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $nik = $this->input->post('nik');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $id_jabatan = $this->input->post('id_jabatan');
        $tanggal_aktif = $this->input->post('tanggal_aktif');
        $status = $this->input->post('status');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (!empty($password)) {
            $password = MD5($this->input->post('password'));
        } else {
            $password = $this->input->post('passwordLama');
        }
        $id_hakakses = $this->input->post('id_hakakses');
        $fileLama   = $this->input->post('fileLama');

        if ($_FILES['foto']['error'] === 4) {
            $foto = $fileLama;
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo $this->upload->display_errors();
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nik'            => $nik,
            'nama_pegawai'   => $nama_pegawai,
            'jenis_kelamin'  => $jenis_kelamin,
            'id_jabatan'        => $id_jabatan,
            'tanggal_aktif'  => $tanggal_aktif,
            'status'         => $status,
            'username'       => $username,
            'password'       => $password,
            'id_hakakses'    => $id_hakakses,
            'foto'           => $foto
        );

        $where = array(
            'id_pegawai' => $id_pegawai
        );
        $this->penggajianModel->update_data('data_pegawai', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataPegawai');
    }

    public function hapusData($id_pegawai)
    {
        $where = array('id_pegawai' => $id_pegawai);
        $data['title'] = "Delete Data Pegawai";
        $this->penggajianModel->hapus_data('data_pegawai', $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-danger">Success</span>
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataPegawai');
    }
}
