<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fungsi_Dikbangspes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('fungsi_dikbangspes_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'fungsi_dikbangspes');

			$data = array(
				'rs_data' => $this->fungsi_dikbangspes_model->get_all()
			);

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('dikbangspes/fungsi/index.php', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}

	public function add()
	{
		$detail = $this->input->post('detail');

		$this->fungsi_dikbangspes_model->add($detail);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function edit_fungsi_dikbangspes_by_id()
	{
		$id = $this->input->post('id');
		$detail = $this->input->post('detail');

		$data = array(
			$detail,
			$id
		);

		$this->fungsi_dikbangspes_model->edit_fungsi_dikbangspes_by_id($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}


	public function delete_fungsi_dikbangspes_by_id()
	{
		$id = $this->input->post('id');

		$this->fungsi_dikbangspes_model->delete_fungsi_dikbangspes_by_id($id);
		$this->session->set_flashdata('success', 'Yeay! Data berhasil dihapus');
	}
}
