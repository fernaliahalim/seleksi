<?php

class Auth_model extends CI_Model
{
	public function login($username, $password)
	{
		$sql = "SELECT * FROM user
                WHERE username = ? AND password = ?;";
		return $this->db->query($sql, array($username, $password));
	}

	public function check_username($username)
	{
		$sql = "SELECT * FROM user
                WHERE username = ?;";
		return $this->db->query($sql, $username);
	}

	public function get_user_by_username($username)
	{
		$sql = "SELECT * FROM user
                WHERE username = ?;";
		return $this->db->query($sql, $username);
	}
}
