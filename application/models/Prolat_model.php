<?php

class Prolat_model extends CI_Model
{
	/* Server Side Query */
	var $table		   = "prolat";
	var $select_column = array(
		"prolat.id",
		"prolat.nama",
		"prolat.pangkat",
		"prolat.nrp",
		"prolat.jabatan",
		"prolat.kesatuan",
		"prolat.jenis_prolat",
		"prolat.fungsi_prolat",
		"prolat.tahun",
		"prolat.ket"
	);
	var $order_column 	= array(
		"prolat.id",
		"prolat.nama",
		"prolat.pangkat",
		"prolat.nrp",
		"prolat.jabatan",
		"prolat.kesatuan",
		"prolat.jenis_prolat",
		"prolat.fungsi_prolat",
		"prolat.tahun",
		"prolat.ket"
	);

	public function make_query($tahun)
	{
		if ($tahun == "All") {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
		} else {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
			$this->db->where("prolat.tahun", $tahun);
		}

		if (isset($_POST["search"]["value"])) {
			$this->db->group_start();
			$this->db->like("prolat.id", $_POST["search"]["value"]);
			$this->db->or_like("prolat.nama", $_POST["search"]["value"]);
			$this->db->or_like("prolat.pangkat", $_POST["search"]["value"]);
			$this->db->or_like("prolat.nrp", $_POST["search"]["value"]);
			$this->db->or_like("prolat.jabatan", $_POST["search"]["value"]);
			$this->db->or_like("prolat.kesatuan", $_POST["search"]["value"]);
			$this->db->or_like("prolat.jenis_prolat", $_POST["search"]["value"]);
			$this->db->or_like("prolat.fungsi_prolat", $_POST["search"]["value"]);
			$this->db->or_like("prolat.tahun", $_POST["search"]["value"]);
			$this->db->or_like("prolat.ket", $_POST["search"]["value"]);
			$this->db->group_end();
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("prolat.tahun", "ASC");
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

	public function queriying_all_data($tahun)
	{
		$this->make_query($tahun);
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
		} else {
			$this->db->select("*");
			$this->db->from($this->table);
			$this->db->where("prolat.tahun", $tahun);
		}
		return $this->db->count_all_results();
	}

	/* Query */
	public function get_year()
	{
		$sql = "SELECT DISTINCT tahun
				FROM prolat
				ORDER BY tahun ASC;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO prolat(nama, pangkat, nrp, jabatan, kesatuan, fungsi_prolat, jenis_prolat, tahun, ket)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";
		return $this->db->query($sql, $data);
	}

	public function edit_by_id($data)
	{
		$sql = "UPDATE prolat
                SET nama = ?,
					pangkat = ?,
					nrp = ?,
					jabatan = ?,
					kesatuan = ?,
					fungsi_prolat = ?,
					jenis_prolat = ?,
					tahun = ?,
					ket = ?
                WHERE id = ?;";
		return $this->db->query($sql, $data);
	}

	public function delete_by_id($id)
	{
		$sql = "DELETE FROM prolat
                WHERE id = ?;";
		return $this->db->query($sql, $id);
	}
}
