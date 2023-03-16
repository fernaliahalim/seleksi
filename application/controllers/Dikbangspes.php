<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dikbangspes extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('fungsi_dikbangspes_model');
		$this->load->model('jenis_dikbangspes_model');
		$this->load->model('dikbangspes_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'list_dikbangspes');

			$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");

			$data = array(
				'tahun'		=> $tahun,
				'rs_year'	=> $this->dikbangspes_model->get_year(),
				'rs_fungsi' => $this->fungsi_dikbangspes_model->get_all(),
				'rs_jenis'  => $this->jenis_dikbangspes_model->get_all()
			);

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('dikbangspes/index.php', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}

	public function fetch_dikbangspes()
	{
		$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");
		$fetch_data = $this->dikbangspes_model->make_datatables($tahun);
		$data = array();

		$i = 1;
		foreach ($fetch_data as $row) {
			$sub_array = array();

			$sub_array[] = $i++;
			$sub_array[] = $row->nama;
			$sub_array[] = $row->pangkat;
			$sub_array[] = $row->nrp;
			$sub_array[] = $row->jabatan;
			$sub_array[] = $row->kesatuan;
			$sub_array[] = $row->detail;
			$sub_array[] = $row->nama_dikbangspes;
			$sub_array[] = $row->tahun;
			$sub_array[] = '<input type="text" id="nama_' . $row->id . '" value="' . $row->nama . '" hidden />
							<input type="text" id="pangkat_' . $row->id . '" value="' . $row->pangkat . '" hidden />
							<input type="text" id="nrp_' . $row->id . '" value="' . $row->nrp . '" hidden />
							<input type="text" id="jabatan_' . $row->id . '" value="' . $row->jabatan . '" hidden />
							<input type="text" id="kesatuan_' . $row->id . '" value="' . $row->kesatuan . '" hidden />
							<input type="text" id="id_jenis_dikbangspes_' . $row->id . '" value="' . $row->id_jenis_dikbangspes . '" hidden />
							<input type="text" id="id_fungsi_dikbangspes_' . $row->id . '" value="' . $row->id_fungsi_dikbangspes . '" hidden />
							<input type="text" id="tahun_' . $row->id . '" value="' . $row->tahun . '" hidden />
							<a type="button" class="btn btn-sm btn-warning btn-update" id="' . $row->id . '" data-toggle="tooltip" title="Ubah">
								<i class="nav-icon fas fa-edit"></i>
							</a>
							<a type="button" class="btn btn-sm btn-danger btn-delete"  id="' . $row->id . '" data-toggle="tooltip" title="Hapus">
								<i class="nav-icon fas fa-trash-alt"></i>
							</a>';

			$data[] = $sub_array;
		}

		$output = array(
			"draw"            => intval($this->input->get_post("draw")),
			"recordsTotal"    => $this->dikbangspes_model->get_all_data($tahun),
			"recordsFiltered" => $this->dikbangspes_model->get_flltered_data($tahun),
			"data"            => $data
		);

		echo json_encode($output);
	}

	public function get_jenis_dikbangspes()
	{
		if ($this->input->is_ajax_request()) {
			$q_fungsi_dikbangspes = $this->input->get_post('q', true);
			$rs = $this->jenis_dikbangspes_model->get_all_by_fungsi($q_fungsi_dikbangspes);

			$data = "";

			foreach ($rs->result_array() as $row) {
				$data = $data . " <option value='" . $row['id'] . "'>" . $row['nama_dikbangspes'] . "</option> ";
			}

			echo $data;
		}
	}

	public function add()
	{
		$nama 			       = $this->input->post('nama');
		$pangkat 	   		   = $this->input->post('pangkat');
		$nrp 	   			   = $this->input->post('nrp');
		$jabatan 	   		   = $this->input->post('jabatan');
		$kesatuan 	  		   = $this->input->post('kesatuan');
		$id_jenis_dikbangspes  = $this->input->post('id_jenis_dikbangspes');
		$tahun 	               = $this->input->post('tahun');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$id_jenis_dikbangspes,
			$tahun
		);

		$this->dikbangspes_model->add($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function edit_by_id()
	{
		$id 				   = $this->input->post('id');
		$nama 			       = $this->input->post('nama');
		$pangkat 	   		   = $this->input->post('pangkat');
		$nrp 	   			   = $this->input->post('nrp');
		$jabatan 	   		   = $this->input->post('jabatan');
		$kesatuan 	  		   = $this->input->post('kesatuan');
		$id_jenis_dikbangspes  = $this->input->post('id_jenis_dikbangspes');
		$tahun 	               = $this->input->post('tahun');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$id_jenis_dikbangspes,
			$tahun,
			$id
		);

		$this->dikbangspes_model->edit_by_id($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}


	public function delete_by_id()
	{
		$id = $this->input->post('id');

		$this->dikbangspes_model->delete_by_id($id);
		$this->session->set_flashdata('success', 'Yeay! Data berhasil dihapus');
	}
}
