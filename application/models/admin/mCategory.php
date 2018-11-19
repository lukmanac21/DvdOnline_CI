<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mCategory extends CI_Model {

	function tampil($limit = 999, $start = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_product_category');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}
	function get_category_list($limit, $start){
		$query = $this->db->get('tbl_product_category', $limit, $start);
		return $query;
	}
	function save_category($data, $tbl){
		$this->db->insert($tbl,$data);
	}
	function edit_category($where, $data, $tbl){
		$this->db->where($where);
		$this->db->update($tbl, $data);
	}
	function delete_category($where, $tbl){
		$this->db->where($where);
		$this->db->delete($tbl);
	}
}
?>