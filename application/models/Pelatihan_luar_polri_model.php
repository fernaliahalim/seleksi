<?php

class Pelatihan_luar_polri_model extends CI_Model
{
	/* Server Side Query */
	var $table		   = "pelatihan_luar_polri";
	var $select_column = array(
		"pelatihan_luar_polri.id",
		"pelatihan_luar_polri.nama",
		"pelatihan_luar_polri.pangkat",
		"pelatihan_luar_polri.nrp",
		"pelatihan_luar_polri.jabatan",
		"pelatihan_luar_polri.kesatuan",
		"pelatihan_luar_polri.jenis_pelatihan",
		"pelatihan_luar_polri.tempat_pelatihan",
		"pelatihan_luar_polri.tanggal",
		"pelatihan_luar_polri.lama_pelatihan",
		"pelatihan_luar_polri.ket"
	);
	var $order_column 	= array(
		"pelatihan_luar_polri.id",
		"pelatihan_luar_polri.nama",
		"pelatihan_luar_polri.pangkat",
		"pelatihan_luar_polri.nrp",
		"pelatihan_luar_polri.jabatan",
		"pelatihan_luar_polri.kesatuan",
		"pelatihan_luar_polri.jenis_pelatihan",
		"pelatihan_luar_polri.tempat_pelatihan",
		"pelatihan_luar_polri.tanggal",
		"pelatihan_luar_polri.lama_pelatihan",
		"pelatihan_luar_polri.ket"
	);

	public function make_query($tahun)
	{
		if ($tahun == "All") {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
		} else {
			$this->db->select($this->select_column);
			$this->db->from($this->table);
			$this->db->where("YEAR(pelatihan_luar_polri.tanggal)", $tahun);
		}

		if (isset($_POST["search"]["value"])) {
			$this->db->group_start();
			$this->db->like("pelatihan_luar_polri.id", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.nama", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.pangkat", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.nrp", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.jabatan", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.kesatuan", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.jenis_pelatihan", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.tempat_pelatihan", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.tanggal", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.lama_pelatihan", $_POST["search"]["value"]);
			$this->db->or_like("pelatihan_luar_polri.ket", $_POST["search"]["value"]);
			$this->db->group_end();
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by("pelatihan_luar_polri.tanggal", "ASC");
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
			$this->db->where("YEAR(pelatihan_luar_polri.tanggal)", $tahun);
		}
		return $this->db->count_all_results();
	}

	/* Query */
	public function get_year()
	{
		$sql = "SELECT DISTINCT YEAR(pelatihan_luar_polri.tanggal) AS tahun
				FROM pelatihan_luar_polri
				ORDER BY tahun ASC;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO pelatihan_luar_polri(nama, pangkat, nrp, jabatan, kesatuan, jenis_pelatihan, tempat_pelatihan, tanggal, lama_pelatihan, ket)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
		return $this->db->query($sql, $data);
	}

	public function edit_by_id($data)
	{
		$sql = "UPDATE pelatihan_luar_polri
                SET nama = ?,
					pangkat = ?,
					nrp = ?,
					jabatan = ?,
					kesatuan = ?,
					jenis_pelatihan = ?,
					tempat_pelatihan = ?,
					tanggal = ?,
					lama_pelatihan = ?,
					ket = ?
                WHERE id = ?;";
		return $this->db->query($sql, $data);
	}

	public function delete_by_id($id)
	{
		$sql = "DELETE FROM pelatihan_luar_polri
                WHERE id = ?;";
		return $this->db->query($sql, $id);
	}
}
