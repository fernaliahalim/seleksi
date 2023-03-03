<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dikbangspes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'list_dikbangspes');
		} else {
			redirect('home');
		}
	}

	public function add()
	{
	}

	public function edit_by_id()
	{
	}


	public function delete_by_id()
	{
	}
}
