<?php

class Jenis_dikbangspes_model extends CI_Model
{
	public function get_all()
	{
		$sql = "SELECT jenis_dikbangspes.*, 
					   fungsi_dikbangspes.detail 
				FROM jenis_dikbangspes
				JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
				ORDER BY jenis_dikbangspes.id_fungsi_dikbangspes;";
		return $this->db->query($sql);
	}

	public function get_all_by_fungsi($q)
	{
		$sql = "SELECT * FROM jenis_dikbangspes
				WHERE id_fungsi_dikbangspes = ?;";
		return $this->db->query($sql, $q);
	}

	public function add($data)
	{
		$sql = "INSERT INTO jenis_dikbangspes(nama_dikbangspes, id_fungsi_dikbangspes)
                VALUES(?, ?);";
		return $this->db->query($sql, $data);
	}

	public function edit_by_id($data)
	{
		$sql = "UPDATE jenis_dikbangspes
                SET nama_dikbangspes = ?,
					id_fungsi_dikbangspes = ?
                WHERE id = ?;";
		return $this->db->query($sql, $data);
	}

	public function delete_by_id($id)
	{
		$sql = "DELETE FROM jenis_dikbangspes
                WHERE id = ?;";
		return $this->db->query($sql, $id);
	}
}
