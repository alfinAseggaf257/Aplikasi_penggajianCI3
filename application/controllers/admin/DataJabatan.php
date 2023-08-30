<?php

class dataJabatan extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('template_page/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/tambahJabatan', $data);
        $this->load->view('template_page/footer');
    }

    public function validasiTambahData()
    {
        // $this->_rules();

        // if ($this->form_validation->run() == false) {
        //     $this->tambahData();
        // } else {
        $nama_jabatan = $this->input->post('nama_jabatan');
        $gaji_pokok = $this->input->post('gaji_pokok');
        $tunjangan = $this->input->post('tunjangan');
        $bonus = $this->input->post('bonus');

        $data = array(
            'nama_jabatan' => $nama_jabatan,
            'gaji_pokok' => $gaji_pokok,
            'tunjangan' => $tunjangan,
            'bonus' => $bonus
        );
        $this->penggajianModel->insert_data('data_jabatan', $data);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataJabatan');
        // }
    }

    // public function _rules()
    // {
    //     $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
    //     $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
    //     $this->form_validation->set_rules('tunjangan', 'tunjangan', 'required');
    //     $this->form_validation->set_rules('bonus', 'bonus', 'required');
    // }

    public function editData($id_jabatan)
    {
        $where = array('id_jabatan' => $id_jabatan);
        $data['title'] = "Edit Data Jabatan";
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id_jabatan'")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/editJabatan', $data);
        $this->load->view('template_page/footer');
    }
    public function prosesEditData()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $nama_jabatan = $this->input->post('nama_jabatan');
        $gaji_pokok = $this->input->post('gaji_pokok');
        $tunjangan = $this->input->post('tunjangan');
        $bonus = $this->input->post('bonus');

        $data = array(
            'nama_jabatan' => $nama_jabatan,
            'gaji_pokok' => $gaji_pokok,
            'tunjangan' => $tunjangan,
            'bonus' => $bonus
        );
        $where = array(
            'id_jabatan' => $id_jabatan // diambil dari line 75
        );
        $this->penggajianModel->update_data('data_jabatan', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil diubah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataJabatan');
    }

    public function hapusData($id_jabatan)
    {
        $where = array('id_jabatan' => $id_jabatan);
        $data['title'] = "Delete Data Jabatan";
        $this->penggajianModel->hapus_data('data_jabatan', $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-danger">Success</span>
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataJabatan');
    }
}
