<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mBarang extends CI_Model {

	function tampil($limit = 999, $start = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}
}
?>