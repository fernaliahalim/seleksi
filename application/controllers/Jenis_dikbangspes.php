<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_Dikbangspes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('fungsi_dikbangspes_model');
		$this->load->model('jenis_dikbangspes_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'jenis_dikbangspes');

			$data = array(
				'rs_fungsi' => $this->fungsi_dikbangspes_model->get_all(),
				'rs_data'   => $this->jenis_dikbangspes_model->get_all()
			);

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('dikbangspes/jenis/index.php', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}

	public function add()
	{
		$id_fungsi_dikbangspes = $this->input->post('id_fungsi_dikbangspes');
		$nama_dikbangspes 	   = $this->input->post('nama_dikbangspes');

		$data = array(
			$nama_dikbangspes,
			$id_fungsi_dikbangspes
		);

		$this->jenis_dikbangspes_model->add($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function edit_by_id()
	{
		$id 				   = $this->input->post('id');
		$id_fungsi_dikbangspes = $this->input->post('id_fungsi_dikbangspes');
		$nama_dikbangspes 	   = $this->input->post('nama_dikbangspes');

		$data = array(
			$nama_dikbangspes,
			$id_fungsi_dikbangspes,
			$id
		);

		$this->jenis_dikbangspes_model->edit_by_id($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}


	public function delete_by_id()
	{
		$id = $this->input->post('id');

		$this->jenis_dikbangspes_model->delete_by_id($id);
		$this->session->set_flashdata('success', 'Yeay! Data berhasil dihapus');
	}
}
