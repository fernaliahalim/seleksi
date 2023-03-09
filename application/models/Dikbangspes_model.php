<?php

class Dikbangspes_model extends CI_Model
{
	public function get_all($tahun)
	{
		$sql = "SELECT dikbangspes.id,
					   dikbangspes.nama,
					   dikbangspes.pangkat,
					   dikbangspes.nrp,
					   dikbangspes.jabatan,
					   dikbangspes.kesatuan,
					   dikbangspes.id_jenis_dikbangspes,
					   dikbangspes.tahun,
					   jenis_dikbangspes.nama_dikbangspes,
					   jenis_dikbangspes.jml_siswa,
					   jenis_dikbangspes.lama_pendidikan,
					   jenis_dikbangspes.pelaksanaan_open,
					   jenis_dikbangspes.pelaksanaan_close, 
					   jenis_dikbangspes.id_fungsi_dikbangspes,
					   fungsi_dikbangspes.detail 
				FROM dikbangspes
				JOIN jenis_dikbangspes ON dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id
				JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
				WHERE dikbangspes.tahun = ?
				ORDER BY dikbangspes.tahun, dikbangspes.id ASC;";
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
					   dikbangspes.tahun,
					   jenis_dikbangspes.nama_dikbangspes,
					   jenis_dikbangspes.jml_siswa,
					   jenis_dikbangspes.lama_pendidikan,
					   jenis_dikbangspes.pelaksanaan_open,
					   jenis_dikbangspes.pelaksanaan_close, 
					   jenis_dikbangspes.id_fungsi_dikbangspes,
					   fungsi_dikbangspes.detail 
				FROM dikbangspes
				JOIN jenis_dikbangspes ON dikbangspes.id_jenis_dikbangspes = jenis_dikbangspes.id
				JOIN fungsi_dikbangspes ON fungsi_dikbangspes.id = jenis_dikbangspes.id_fungsi_dikbangspes
				WHERE dikbangspes.nrp = ?
				ORDER BY dikbangspes.tahun, dikbangspes.id ASC;";
		return $this->db->query($sql, $nrp);
	}

	public function get_year()
	{
		$sql = "SELECT DISTINCT tahun
				FROM dikbangspes
				ORDER BY tahun ASC;";
		return $this->db->query($sql);
	}

	public function add($data)
	{
		$sql = "INSERT INTO dikbangspes(nama, pangkat, nrp, jabatan, kesatuan, id_jenis_dikbangspes, tahun)
                VALUES(?, ?, ?, ?, ?, ?, ?);";
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
					tahun = ?
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
