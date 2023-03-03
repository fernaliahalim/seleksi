<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'dashboard');

			//load dashboard.php view
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('home');
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}
}
