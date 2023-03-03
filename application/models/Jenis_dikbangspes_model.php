<?php

class Jenis_dikbangspes_model extends CI_Model
{
	public function get_all()
	{
		$sql = "SELECT jenis_dikbangspes.*, 
					   fungsi_dikbangspes.detail 
				FROM jenis_dikbangspes
				JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_jenis_dikbangspes
				ORDER BY jenis_dikbangspes.id_jenis_dikbangspes;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO jenis_dikbangspes(nama_dikbangspes, jml_siswa, lama_pendidikan, pelaksanaan_open, pelaksanaan_close, id_jenis_dikbangspes)
                VALUES(?, ?, ?, ?, ?, ?);";
		return $this->db->query($sql, $data);
	}

	public function edit_by_id($data)
	{
		$sql = "UPDATE jenis_dikbangspes
                SET nama_dikbangspes = ?,
					jml_siswa = ?,
					lama_pendidikan = ?,
					pelaksanaan_open = ?,
					pelaksanaan_close = ?,
					id_jenis_dikbangspes = ?
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
