<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('dikbangspes_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'dashboard');

			$nrp 	 = !empty($this->input->get('nrp')) ? $this->input->get('nrp') : "";

			$rs_data 	     = "";
			$nama 		     = "";
			$pangkat	     = array();
			$jabatan	     = array();
			$kesatuan 	     = array();
			$dikbangspes     = array();
			$detail		     = array();
			$lama_pendidikan = array();
			$tgl_open        = array();
			$tgl_close		 = array();

			if ($nrp != "") {
				$rs_data = $this->dikbangspes_model->get_by_nrp($nrp);
				foreach ($rs_data->result_array() as $row) {
					$nama              = $row['nama'];
					$pangkat[]         = $row['pangkat'];
					$jabatan[]         = $row['jabatan'];
					$kesatuan[]        = $row['kesatuan'];
					$dikbangspes[]     = $row['nama_dikbangspes'];
					$detail[]	       = $row['detail'];
					$lama_pendidikan[] = $row['lama_pendidikan'];
					$tgl_open[]		   = date('d-m-Y', strtotime($row['tgl_open']));
					$tgl_close[]	   =  date('d-m-Y', strtotime($row['tgl_close']));
				}
			}

			$data = array(
				'nrp'		      => $nrp,
				'nama'		      => $nama,
				'pangkat' 	      => $pangkat,
				'jabatan' 	      => $jabatan,
				'kesatuan' 	      => $kesatuan,
				'dikbangspes'     => $dikbangspes,
				'detail'	      => $detail,
				'lama_pendidikan' => $lama_pendidikan,
				'tgl_open'		  => $tgl_open,
				'tgl_close'		  => $tgl_close
			);

			//load dashboard.php view
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('home', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}
}
