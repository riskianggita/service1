<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_Mahasiswa_all()
	{
		$query = $this->db->query("SELECT * FROM mahasiswa");
		return $query;
	}

	public function get_Mahasiswa_one($nim)
	{
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
		return $query;
	}

	public function post($data)
	{
		return ($this->db->insert('mahasiswa', $data)) ? TRUE : FALSE;
	}

	public function put($data, $id)
	{
		return ($this->db->update('mahasiswa', $data, "nim = '$id'")) ? TRUE : FALSE;
	}

	public function delete($id)
	{
		return ($this->db->delete('mahasiswa', array('nim' => $id))) ? TRUE : FALSE;
	}

	public function delete_all()
	{
		return ($this->db->delete('mahasiswa', array('0' => 0))) ? TRUE : FALSE;
	}
}
