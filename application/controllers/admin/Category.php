<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/admin/Category.php');

class Category extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
$this->load->database(); // load database
$this->load->library('table');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->model('admin/mCategory');
$this->load->helper('form');
}
public function index()
{

	 	$config['base_url'] = site_url('admin/Category/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_product_category'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //load view mahasiswa view


        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4) ? $this->uri->segment(4) : 0);

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->mCategory->get_category_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

      	$data['title'] = "Table Of Category"; //title web
          $data['tampil'] = $this->mCategory->tampil($config["per_page"], $data['page']);
          $this->load->view('admin/vCategory',$data);
      }
      public function addProduct(){
       $data['cat_p_title'] = $this->input->post('ptitle');
       $data['cat_p_desc'] = $this->input->post('pcat');
       $this->mCategory->save_category($data, 'tbl_product_category');
       redirect('admin/Category');
   }
   public function editProduct(){
       $data['cat_p_title'] = $this->input->post('ptitle');
       $data['cat_p_desc'] = $this->input->post('pcat');
       $this->mCategory->edit_product($where, $data, 'tbl_product_category');
       redirect('admin/Category');
   }
   public function deleteProduct() {
    $where['id_cat_p'] = $this->input->post('cdelete');
    $this->mCategory->delete_category($where,'tbl_product_category');
    redirect('admin/Category');
}
}

