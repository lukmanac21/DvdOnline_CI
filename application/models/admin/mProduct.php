<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mProduct extends CI_Model {

function tampil($limit = 999, $start = 0)
{
$this->db->select('*');
$this->db->from('tbl_product');
$this->db->join('tbl_product_category','tbl_product.id_cat_p =tbl_product_category.id_cat_p','inner');
$this->db->limit($limit, $start);
$query = $this->db->get();
return $query->result();
}
function get_product_list($limit, $start){
        $query = $this->db->get('tbl_product', $limit, $start);
        return $query;
}
function get_category_product(){
		$query = $this->db->query('SELECT * FROM tbl_product_category');
        return $query->result();
}
}
?>