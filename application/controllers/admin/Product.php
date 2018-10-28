<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'controllers/admin/Product.php');

class Product extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('session');
$this->load->database(); // load database
$this->load->library('table');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->model('admin/mProduct');
$this->load->helper('form');
}
public function index()
{

	 	$config['base_url'] = site_url('admin/Product/index'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_product'); //total row
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
        $data['data'] = $this->mProduct->get_product_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();

      	$data['title'] = "Table Of Product"; //title web
          $data['tampil'] = $this->mProduct->tampil($config["per_page"], $data['page']);
          $data['groups'] = $this->mProduct->get_category_product();
          $this->load->view('admin/vProduct',$data);
      }
      public function addProduct(){
        $data['product_title'] = $this->input->post('ptitle');
        $data['id_cat_p'] = $this->input->post('pcat');
        $data['product_price'] = $this->input->post('pprice');
        $data['product_desc'] = $this->input->post('pdesc');
        $data['product_release'] = $this->input->post('pyear');
        $data['product_img1'] = $_FILES['pimages']['name'];
        $config['upload_path'] = './assets/product_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $data['product_img1'] = $upload_data['file_name'];
        }
        $this->mProduct->save_product($data, 'tbl_product');
        redirect('admin/Product');
    }
    public function editProduct(){
        $where['id_product'] = $this->input->post('pid');
        $data['product_title'] = $this->input->post('ptitle');
        $data['id_cat_p'] = $this->input->post('pcat');
        $data['product_price'] = $this->input->post('pprice');
        $data['product_desc'] = $this->input->post('pdesc');
        $data['product_release'] = $this->input->post('pyear');
        $data['product_img1'] = $_FILES['pimages']['name'];
        $config['upload_path'] = './assets/product_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('pimages')){
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $upload_data = $this->upload->data();
            $data['product_img1'] = $upload_data['file_name'];
        }
        $this->mProduct->edit_product($where, $data, 'tbl_product');
        redirect('admin/Product');
    }
    public function deleteProduct() {
        $where['id_product'] = $this->input->post('pidelete');
        $this->mProduct->delete_product($where,'tbl_product');
        redirect('admin/Product');
    }
}

