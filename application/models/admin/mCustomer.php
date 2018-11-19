<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mCustomer extends CI_Model {

	function tampil($limit = 999, $start = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_customer');
		$this->db->join('tbl_role','tbl_customer.id_role =tbl_role.id_role','inner');
		$this->db->where('tbl_customer.id_role',1);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}
	function get_customer_list($limit, $start){
		$query = $this->db->get('tbl_customer', $limit, $start);
		return $query;
	}
	function get_category_customer(){
		$query = $this->db->query('SELECT * FROM tbl_role');
		return $query->result();
	}
}
?>