<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prolat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('prolat_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'list_prolat');

			$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");

			$data = array(
				'tahun'		=> $tahun,
				'rs_year'	=> $this->prolat_model->get_year()
			);

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('prolat/index.php', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}

	public function fetch_data()
	{
		$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");
		$fetch_data = $this->prolat_model->make_datatables($tahun);
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
			$sub_array[] = $row->fungsi_prolat;
			$sub_array[] = $row->jenis_prolat;
			$sub_array[] = $row->tahun;
			$sub_array[] = $row->ket;
			$sub_array[] = '<input type="text" id="nama_' . $row->id . '" value="' . $row->nama . '" hidden />
							<input type="text" id="pangkat_' . $row->id . '" value="' . $row->pangkat . '" hidden />
							<input type="text" id="nrp_' . $row->id . '" value="' . $row->nrp . '" hidden />
							<input type="text" id="jabatan_' . $row->id . '" value="' . $row->jabatan . '" hidden />
							<input type="text" id="kesatuan_' . $row->id . '" value="' . $row->kesatuan . '" hidden />
							<input type="text" id="fungsi_prolat_' . $row->id . '" value="' . $row->fungsi_prolat . '" hidden />
							<input type="text" id="jenis_prolat_' . $row->id . '" value="' . $row->jenis_prolat . '" hidden />
							<input type="text" id="tahun_' . $row->id . '" value="' . $row->tahun . '" hidden />
							<input type="text" id="ket_' . $row->id . '" value="' . $row->ket . '" hidden />
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
			"recordsTotal"    => $this->prolat_model->get_all_data($tahun),
			"recordsFiltered" => $this->prolat_model->get_flltered_data($tahun),
			"data"            => $data
		);

		echo json_encode($output);
	}

	public function add()
	{
		$nama 		   = $this->input->post('nama');
		$pangkat 	   = $this->input->post('pangkat');
		$nrp 	   	   = $this->input->post('nrp');
		$jabatan 	   = $this->input->post('jabatan');
		$kesatuan 	   = $this->input->post('kesatuan');
		$fungsi_prolat = $this->input->post('fungsi_prolat');
		$jenis_prolat  = $this->input->post('jenis_prolat');
		$tahun	   	   = $this->input->post('tahun');
		$ket	   	   = $this->input->post('ket');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$fungsi_prolat,
			$jenis_prolat,
			$tahun,
			$ket
		);

		$this->prolat_model->add($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function edit_by_id()
	{
		$id 	       = $this->input->post('id');
		$nama 		   = $this->input->post('nama');
		$pangkat 	   = $this->input->post('pangkat');
		$nrp 	   	   = $this->input->post('nrp');
		$jabatan 	   = $this->input->post('jabatan');
		$kesatuan 	   = $this->input->post('kesatuan');
		$fungsi_prolat = $this->input->post('fungsi_prolat');
		$jenis_prolat  = $this->input->post('jenis_prolat');
		$tahun	   	   = $this->input->post('tahun');
		$ket	   	   = $this->input->post('ket');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$fungsi_prolat,
			$jenis_prolat,
			$tahun,
			$ket,
			$id
		);

		$this->prolat_model->edit_by_id($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function delete_by_id()
	{
		$id = $this->input->post('id');

		$this->prolat_model->delete_by_id($id);
		$this->session->set_flashdata('success', 'Yeay! Data berhasil dihapus');
	}
}
