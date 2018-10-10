<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
function __construct(){
parent::__construct();
$this->load->library('session');
$this->load->database(); // load database
$this->load->library('table');
$this->load->helper('url');

$this->load->model('mProduct');
}
public function index()
{
$data['title'] = "Table Of Product"; //title web
$data['tampil'] = $this->mProduct->tampil(); //menampilkan data
$this->load->view('vProduct',$data);
}
}