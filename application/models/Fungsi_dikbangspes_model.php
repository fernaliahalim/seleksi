<?php

class Fungsi_dikbangspes_model extends CI_Model
{
	public function get_all()
	{
		$sql = "SELECT * FROM fungsi_dikbangspes;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO fungsi_dikbangspes(detail)
                VALUES(?);";
		return $this->db->query($sql, $data);
	}

	public function edit_fungsi_dikbangspes_by_id($data)
	{
		$sql = "UPDATE fungsi_dikbangspes
                SET detail = ?
                WHERE id = ?;";
		return $this->db->query($sql, $data);
	}

	public function delete_fungsi_dikbangspes_by_id($id)
	{
		$sql = "DELETE FROM fungsi_dikbangspes
                WHERE id = ?;";
		return $this->db->query($sql, $id);
	}
}
