<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mProduct extends CI_Model {

function tampil()
{
$this->db->select('*');
$this->db->from('tbl_product');
$this->db->join('tbl_product_category','tbl_product.id_cat_p =tbl_product_category.id_cat_p','inner');
$query = $this->db->get();
return $query->result();
}
}
?>