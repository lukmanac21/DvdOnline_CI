<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mhs_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAll(){
		$data = $this->db->get('tbl_mhs');
		return $data->result();
		
	}
}
