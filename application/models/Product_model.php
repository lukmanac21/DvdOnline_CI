<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modelProduct extends CI_Model {

function tampil()
{
$query = $this->db->get("tbl_product");
return $query->result();
}
}
?>