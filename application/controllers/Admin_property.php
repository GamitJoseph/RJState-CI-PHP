<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_property extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
		public function index()
	{
		$data= array();
			$this->load_view($data,"Property List","Admin/Property/index");


	}


function load_view($data = array(),$title,$view){
		$data['header_title']=$title;
		$this->load->view('layouts/header',$data);
		$this->load->view($view,$data);
		$this->load->view('layouts/footer');
	}

}
 ?>