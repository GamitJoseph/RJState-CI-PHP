<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function index()
	{
			$this->load->view('login.php');
	}
	public function login()
	{

		$uname=$this->input->post('username');
		$pwd=$this->input->post('password');
		
			// $this->load->view('layouts/header');
			// $this->load->view('Admin/index');
			// $this->load->view('layouts/footer');
	}
	
}
?>