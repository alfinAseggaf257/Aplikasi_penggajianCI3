<?php

class settingAkun extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Setting";
        $where = $this->session->userdata('id_pegawai');
        $data['setting'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$where'")->result();
        $this->load->view('template_page/header', $data);
        $this->load->view('template_page/sidebar');
        $this->load->view('account/settingAkun', $data);
        $this->load->view('template_page/footer');
    }
    public function editAkun()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $konfirmasiPass = $this->input->post('konfirmasiPass');

        if (!empty($password)) {
            if ($password != $konfirmasiPass) {
                $this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
                        <span class="badge badge-pill badge-danger">Gagal!</span>
                        Konfirmasi Password tidak sama!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect('account/settingAkun');
            } else {
                $tes = $this->input->post('password');
                $password = MD5($this->input->post('password'));
            }
        } else {
            $password = $this->input->post('passwordLama');
        }
        $data = array(
            'username'       => $username,
            'password'       => $password
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
        redirect('account/profilAkun');
    }
}
