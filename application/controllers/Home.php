<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_iduser') != "") {
			redirect('dashboard');
		} else {
			$data['username'] = $this->session->flashdata('username');
			$data['error_username'] = $this->session->flashdata('error_email');
			$data['error_password'] = $this->session->flashdata('error_password');

			$this->load->view('loginpage', $data);
		}
	}

	public function auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$rs_login = $this->auth_model->login($username, $password);

		if ($rs_login->num_rows()) {
			$row_user = $rs_login->row_array();
			$username = $row_user['username'];
			$nama 	  = $row_user['nama'];

			$this->session->set_userdata('maindata_uname', $username);
			$this->session->set_userdata('maindata_nama', $nama);

			redirect('dashboard');
		} else {
			$rs_check_username = $this->auth_model->check_username($username);

			if ($rs_check_username->num_rows() > 0) {
				$this->session->set_flashdata('error_password', 'Password yg dimasukkan salah');
			} else {
				$this->session->set_flashdata('error_username', 'Username yg dimasukkan tidak terdaftar');
			}

			$this->session->set_flashdata('username', $username);

			redirect(site_url('home'), 'refresh');
		}
	}

	public function sign_out()
	{
		$this->session->sess_destroy();

		redirect('home');
	}
}
