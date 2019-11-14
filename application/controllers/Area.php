<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
	public function index()
	{
		redirect('Home');
	}
	public function list_country()
	{
		
		$this->load->view('layouts/header');
		$this->load->view('Admin/Area/list_country');
		$this->load->view('layouts/footer');
	}
	public function create_country()
	{
		$this->load->view('layouts/header');
		$this->load->view('Admin/Area/create_country');
		$this->load->view('layouts/footer');
		
	}
	public function add_country()
	{
		$this->form_validation->set_rules('country_name', 'Country Name', 'trim|required|is_unique[rjcountry.country_name]');
		if ($this->form_validation->run() == FALSE)
		{
			echo "string";
			//redirect('Area/create_country');
		}
		else
		{
			$this->load->view('layouts/header');
			$this->load->view('Admin/Area/list_country');
			$this->load->view('layouts/footer');
		}
		
	}
	
	public function edit_country()
	{
		
		$this->load->view('layouts/header');
		$this->load->view('Admin/Area/list_country');
		$this->load->view('layouts/footer');
	}
	public function update_country()
	{
		
		
	}
	public function delete_country()
	{
		
		
	}

	

	
}
?>
