<?php

class Dikbangspes_model extends CI_Model
{
	/* Server Side Query */
	var $table		   = "dikbangspes";
	var $select_column = array(
		"dikbangspes.id",
		"dikbangspes.nama",
		"dikbangspes.pangkat",
		"dikbangspes.nrp",
		"dikbangspes.jabatan",
		"dikbangspes.kesatuan",
		"dikbangspes.id_jenis_dikbangspes",
		"dikbangspes.lama_pendidikan",
		"dikbangspes.tgl_open",
		"dikbangspes.tgl_close",
		"jenis_dikbangspes.nama_dikbangspes",
		"jenis_dikbangspes.id_fungsi_dikbangspes",
		"fungsi_dikbangspes.detail"
	);
	var $order_column 	= array(
		"dikbangspes.id",
		"dikbangspes.nama",
		"dikbangspes.pangkat",
		"dikbangspes.nrp",
		"dikbangspes.jabatan",
		"dikbangspes.kesatuan",
		"dikbangspes.id_jenis_dikbangspes",
		"dikbangspes.lama_pendidikan",
		"dikbangspes.tgl_open",
		"dikbangspes.tgl_close",
		"jenis_dikbangspes.nama_dikbangspes",
		"jenis_dikbangspes.id_fungsi_dikbangspes",
		"fungsi_dikbangspes.detail"
	);

	public function make_query($tahun)
	{
		if ($tahun == "All") {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
			$this->db->join('jenis_dikbangspes', 'dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id');
			$this->db->join('fungsi_dikbangspes', 'fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes');
		} else {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
			$this->db->join('jenis_dikbangspes', 'dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id');
			$this->db->join('fungsi_dikbangspes', 'fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes');
			$this->db->where("YEAR(dikbangspes.tgl_open)", $tahun);
		}

		if (isset($_POST["search"]["value"])) {
			$this->db->group_start();
			$this->db->like("dikbangspes.id", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.pangkat", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.nrp", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.jabatan", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.kesatuan", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.id_jenis_dikbangspes", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.lama_pendidikan", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.tgl_open", $_POST["search"]["value"]);
			$this->db->or_like("dikbangspes.tgl_close", $_POST["search"]["value"]);
			$this->db->or_like("jenis_dikbangspes.nama_dikbangspes", $_POST["search"]["value"]);
			$this->db->or_like("jenis_dikbangspes.id_fungsi_dikbangspes", $_POST["search"]["value"]);
			$this->db->or_like("fungsi_dikbangspes.detail", $_POST["search"]["value"]);
			$this->db->group_end();
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("dikbangspes.tgl_open", "ASC");
		}
	}

	public function make_datatables($tahun)
	{
		$this->make_query($tahun);
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_flltered_data($tahun)
	{
		$this->make_query($tahun);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data($tahun)
	{
		if ($tahun == "All") {
			$this->db->select("*");
			$this->db->from($this->table);
			$this->db->join('jenis_dikbangspes', 'dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id');
			$this->db->join('fungsi_dikbangspes', 'fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes');
		} else {
			$this->db->select("*");
			$this->db->from($this->table);
			$this->db->join('jenis_dikbangspes', 'dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id');
			$this->db->join('fungsi_dikbangspes', 'fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes');
			$this->db->where("YEAR(dikbangspes.tgl_open)", $tahun);
		}
		return $this->db->count_all_results();
	}


	/* Query */
	public function get_all($tahun)
	{
		if ($tahun == "All") {
			$sql = "SELECT dikbangspes.id,
						dikbangspes.nama,
						dikbangspes.pangkat,
						dikbangspes.nrp,
						dikbangspes.jabatan,
						dikbangspes.kesatuan,
						dikbangspes.id_jenis_dikbangspes,
						dikbangspes.lama_pendidikan,
						dikbangspes.tgl_open,
						dikbangspes.tgl_close,
						jenis_dikbangspes.nama_dikbangspes, 
						jenis_dikbangspes.id_fungsi_dikbangspes,
						fungsi_dikbangspes.detail 
					FROM dikbangspes
					JOIN jenis_dikbangspes ON dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id
					JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
					ORDER BY dikbangspes.tgl_open, dikbangspes.id ASC;";
		} else {
			$sql = "SELECT dikbangspes.id,
					   	dikbangspes.nama,
					   	dikbangspes.pangkat,
					   	dikbangspes.nrp,
					   	dikbangspes.jabatan,
					   	dikbangspes.kesatuan,
					   	dikbangspes.id_jenis_dikbangspes,
						dikbangspes.lama_pendidikan,
						dikbangspes.tgl_open,
						dikbangspes.tgl_close,
					   	jenis_dikbangspes.nama_dikbangspes,
					   	jenis_dikbangspes.id_fungsi_dikbangspes,
					   	fungsi_dikbangspes.detail 
					FROM dikbangspes
					JOIN jenis_dikbangspes ON dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id
					JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
					WHERE YEAR(dikbangspes.tgl_open) = ?
					ORDER BY dikbangspes.tahun, dikbangspes.id ASC;";
		}
		return $this->db->query($sql, $tahun);
	}

	public function get_by_nrp($nrp)
	{
		$sql = "SELECT dikbangspes.id,
					   dikbangspes.nama,
					   dikbangspes.pangkat,
					   dikbangspes.nrp,
					   dikbangspes.jabatan,
					   dikbangspes.kesatuan,
					   dikbangspes.id_jenis_dikbangspes,
					   dikbangspes.lama_pendidikan,
					   dikbangspes.tgl_open,
					   dikbangspes.tgl_close,
					   jenis_dikbangspes.nama_dikbangspes,
					   jenis_dikbangspes.id_fungsi_dikbangspes,
					   fungsi_dikbangspes.detail 
				FROM dikbangspes
				JOIN jenis_dikbangspes ON dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id
				JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
				WHERE dikbangspes.nrp = ?
				ORDER BY dikbangspes.tgl_open, dikbangspes.id ASC;";
		return $this->db->query($sql, $nrp);
	}

	public function get_year()
	{
		$sql = "SELECT DISTINCT YEAR(tgl_open) AS tahun
				FROM dikbangspes
				ORDER BY tahun ASC;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO dikbangspes(nama, pangkat, nrp, jabatan, kesatuan, id_jenis_dikbangspes, lama_pendidikan, tgl_open, tgl_close)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
		return $this->db->query($sql, $data);
	}

	public function edit_by_id($data)
	{
		$sql = "UPDATE dikbangspes
                SET nama = ?,
					pangkat = ?,
					nrp = ?,
					jabatan = ?,
					kesatuan = ?,
					id_jenis_dikbangspes = ?,
					lama_pendidikan = ?,
					tgl_open = ?,
					tgl_close = ?
                WHERE id = ?;";
		return $this->db->query($sql, $data);
	}

	public function delete_by_id($id)
	{
		$sql = "DELETE FROM dikbangspes
                WHERE id = ?;";
		return $this->db->query($sql, $id);
	}
}
