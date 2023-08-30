<?php

class dataPotongan extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Data Potongan Gaji";
        $data['potonganGaji'] = $this->penggajianModel->get_data('data_potongan_gaji')->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/dataPotonganGaji', $data);
        $this->load->view('template_page/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Data Potongan";
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/tambahPotonganGaji', $data);
        $this->load->view('template_page/footer');
    }

    public function TambahDataAksi()
    {
        $nama_potongan = $this->input->post('nama_potongan');
        $nominal       = $this->input->post('nominal');

        $data = array(
            'nama_potongan'  => $nama_potongan,
            'nominal'  => $nominal
        );

        //nama model-> nama function -> parameter( nama tabel serta data yang dikirimkan)
        $this->penggajianModel->insert_data('data_potongan_gaji', $data);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-primary">Success</span>
        Data berhasil ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataPotongan');
    }

    public function editData($id_potongan)
    {
        $data['title'] = "Hapus Data Potongan";
        $where = array(
            'id_potongan' => $id_potongan
        );
        $data['editPotongan'] = $this->db->query("SELECT * FROM data_potongan_gaji WHERE id_potongan='$id_potongan'")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('admin/editPotonganGaji', $data);
        $this->load->view('template_page/footer');
    }

    public function UpdateDataAksi()
    {
        $id_potongan = $this->input->post('id_potongan');
        $nama_potongan = $this->input->post('nama_potongan');
        $nominal = $this->input->post('nominal');

        $data = array(
            'nama_potongan' => $nama_potongan,
            'nominal' => $nominal
        );

        $where = array(
            'id_potongan' => $id_potongan
        );

        $this->penggajianModel->update_data('data_potongan_gaji', $data, $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-success">Success</span>
        Data berhasil diedit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        //redurect ke controller utama yaitu index
        redirect('admin/dataPotongan');
    }

    public function hapusData($id_potongan)
    {
        $data['title'] = "Hapus Data Potongan";
        $where = array(
            'id_potongan' => $id_potongan
        );
        $this->penggajianModel->hapus_data('data_potongan_gaji', $where);
        $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
        <span class="badge badge-pill badge-danger">Success</span>
        Data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        //redurect ke controller utama yaitu index
        redirect('admin/dataPotongan');
    }
}
