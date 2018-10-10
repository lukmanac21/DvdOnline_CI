<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mahasiswa extends CI_Controller{

	public function index(){
		$this->load->model('mhs_model');
		$temp['m'] = $this->mhs_model->getAll();
		$this->load->view('mhs/tabel_mhs',$temp);
	}
	public function show($arg1 = '0', $nama = ''){
		$temp['nrp'] = $arg1;
		$temp['nama'] = $nama;
		$this->load->view('mhs/detil_mhs',$temp);
	}
}
?>