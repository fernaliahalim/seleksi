<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelatihan_Luar_Polri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('pelatihan_luar_polri_model');
	}

	public function index()
	{
		if ($this->session->userdata('maindata_uname') != "") {
			//set active menu
			$this->session->set_userdata('mainsetting_active_menu', 'list_pelatihan_luar');

			$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");

			$data = array(
				'tahun'		=> $tahun,
				'rs_year'	=> $this->pelatihan_luar_polri_model->get_year()
			);

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('pelatihan_luar_polri/index.php', $data);
			$this->load->view('footer');
		} else {
			redirect('home');
		}
	}

	public function fetch_data()
	{
		$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");
		$fetch_data = $this->pelatihan_luar_polri_model->make_datatables($tahun);
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
			$sub_array[] = $row->jenis_pelatihan;
			$sub_array[] = $row->tempat_pelatihan;
			$sub_array[] = $row->tanggal;
			$sub_array[] = $row->lama_pelatihan;
			$sub_array[] = $row->ket;
			$sub_array[] = '<input type="text" id="nama_' . $row->id . '" value="' . $row->nama . '" hidden />
							<input type="text" id="pangkat_' . $row->id . '" value="' . $row->pangkat . '" hidden />
							<input type="text" id="nrp_' . $row->id . '" value="' . $row->nrp . '" hidden />
							<input type="text" id="jabatan_' . $row->id . '" value="' . $row->jabatan . '" hidden />
							<input type="text" id="kesatuan_' . $row->id . '" value="' . $row->kesatuan . '" hidden />
							<input type="text" id="jenis_pelatihan_' . $row->id . '" value="' . $row->jenis_pelatihan . '" hidden />
							<input type="text" id="tempat_pelatihan_' . $row->id . '" value="' . $row->tempat_pelatihan . '" hidden />
							<input type="text" id="tanggal_' . $row->id . '" value="' . $row->tanggal . '" hidden />
							<input type="text" id="lama_pelatihan_' . $row->id . '" value="' . $row->lama_pelatihan . '" hidden />
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
			"recordsTotal"    => $this->pelatihan_luar_polri_model->get_all_data($tahun),
			"recordsFiltered" => $this->pelatihan_luar_polri_model->get_flltered_data($tahun),
			"data"            => $data
		);

		echo json_encode($output);
	}

	public function fetch_all_data()
	{
		$tahun = !empty($this->input->get('y')) ? $this->input->get('y') : date("Y");
		$fetch_data = $this->pelatihan_luar_polri_model->queriying_all_data($tahun);
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
			$sub_array[] = $row->jenis_pelatihan;
			$sub_array[] = $row->tempat_pelatihan;
			$sub_array[] = $row->tanggal;
			$sub_array[] = $row->lama_pelatihan;
			$sub_array[] = $row->ket;

			$data[] = $sub_array;
		}

		$output = array(
			"data" => $data
		);

		echo json_encode($output);
	}

	public function add()
	{
		$nama 		      = $this->input->post('nama');
		$pangkat 	      = $this->input->post('pangkat');
		$nrp 	   	      = $this->input->post('nrp');
		$jabatan 	      = $this->input->post('jabatan');
		$kesatuan 	      = $this->input->post('kesatuan');
		$jenis_pelatihan  = $this->input->post('jenis_pelatihan');
		$tempat_pelatihan = $this->input->post('tempat_pelatihan');
		$tanggal	   	  = $this->input->post('tanggal');
		$lama_pelatihan	  = $this->input->post('lama_pelatihan');
		$ket	   	      = $this->input->post('ket');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$jenis_pelatihan,
			$tempat_pelatihan,
			$tanggal,
			$lama_pelatihan,
			$ket
		);

		$this->pelatihan_luar_polri_model->add($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function edit_by_id()
	{
		$id 	          = $this->input->post('id');
		$nama 		      = $this->input->post('nama');
		$pangkat 	      = $this->input->post('pangkat');
		$nrp 	   	      = $this->input->post('nrp');
		$jabatan 	      = $this->input->post('jabatan');
		$kesatuan 	      = $this->input->post('kesatuan');
		$jenis_pelatihan  = $this->input->post('jenis_pelatihan');
		$tempat_pelatihan = $this->input->post('tempat_pelatihan');
		$tanggal	   	  = $this->input->post('tanggal');
		$lama_pelatihan	  = $this->input->post('lama_pelatihan');
		$ket	   	      = $this->input->post('ket');

		$data = array(
			$nama,
			$pangkat,
			$nrp,
			$jabatan,
			$kesatuan,
			$jenis_pelatihan,
			$tempat_pelatihan,
			$tanggal,
			$lama_pelatihan,
			$ket,
			$id
		);

		$this->pelatihan_luar_polri_model->edit_by_id($data);
		$this->session->set_flashdata('success', 'Yeay! Penambahan data berhasil dilakukan');
	}

	public function delete_by_id()
	{
		$id = $this->input->post('id');

		$this->pelatihan_luar_polri_model->delete_by_id($id);
		$this->session->set_flashdata('success', 'Yeay! Data berhasil dihapus');
	}
}
