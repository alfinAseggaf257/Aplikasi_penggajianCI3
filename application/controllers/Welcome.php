<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Aplikasi Penggajian";
			$this->load->view('formLogin', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//cek username dan password lewat functuin cek_login di model yang digunakan
			$cekQuery = $this->penggajianModel->cek_login($username, $password);

			if ($cekQuery == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3">
				<span class="badge badge-pill badge-danger">Gagal Login</span>
				Username atau Password Salah!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>');
				redirect('welcome');
			} else {
				//membuat dan mengirimkan session hakakses
				$this->session->set_userdata('id_hakakses', $cekQuery->id_hakakses);
				//membuat dan mengirimkan session nama_pegawai, status, foto
				$this->session->set_userdata('id_pegawai', $cekQuery->id_pegawai);
				$this->session->set_userdata('nik', $cekQuery->nik);
				$this->session->set_userdata('nama_pegawai', $cekQuery->nama_pegawai);
				$this->session->set_userdata('tanggal_aktif', $cekQuery->tanggal_aktif);
				$this->session->set_userdata('jenis_kelamin', $cekQuery->jenis_kelamin);
				$this->session->set_userdata('status', $cekQuery->status);
				$this->session->set_userdata('foto', $cekQuery->foto);
				$this->session->set_userdata('nama_jabatan', $cekQuery->nama_jabatan);

				switch ($cekQuery->id_hakakses) {
					case 1:
						//memanggil file dasboard pada controller admin
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('pegawai/dashboard');
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}

	public function logout()
	{
		//menghapus (menghancurkan) session
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
