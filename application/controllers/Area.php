<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {
	

	
	function __construct()
	{
		parent::__construct();
		$this->load->model('area_model','',TRUE);

		// Load pagination library
		$this->load->library('pagination');

		// Per page limit
		$this->perPage = 5;



	}
	public function index()
	{
		redirect('Home');
	}
	function load_view($data = array(),$title,$view){
		$data['header_title']=$title;
		$this->load->view('layouts/header',$data);
		$this->load->view($view,$data);
		$this->load->view('layouts/footer');
	}
	public function list_country()
	{
		// Get rows count
		
		$conditions['returnType']    = 'count';
		$rowsCount = $this->area_model->getCountry($conditions);

			// Pagination config
		$config['base_url']    = base_url() . '/CountryList/';
		$config['uri_segment'] = 2;
		$config['total_rows']  = $rowsCount;
		$config['per_page']    = $this->perPage;



		$config['full_tag_open'] = '<ul class="paginationjp modal-1">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li ><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);


		$page = $this->uri->segment(2);
		$offset = !$page ? 0 : $page;
		echo $page;
		echo "string";

			// Get rows
			//$data['pg']=$page;
		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $config['per_page'];

		$data['datalst']=$this->area_model->getCountry($conditions);
		
		$this->load_view($data,"Country List","Admin/Area/list_country");
		
	}
	
	public function create_country()
	{
		$data=array();
		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('country_name', 'Country Name', 'trim|required|is_unique[rjcountry.country_name]');
			$memData = array(
				'country_name' => $this->input->post('country_name')
			);
			if ($this->form_validation->run() == FALSE)
			{

				$this->load_view($data,"Country Create","Admin/Area/create_country");
				//$this->load->view('Admin/Area/create_country',false);
					//redirect("CountryCreate");
			}
			else
			{
				$insert = $this->area_model->insert_country($memData);

				if ($insert) {

					$this->show_alert("success","successfully","Country has been added successfully");
					redirect("CountryList");
				} else {

					$this->show_alert("danger","Error","Some error.");	
				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("CountryList");
		}
		else{
			$this->load_view($data,"Country Create","Admin/Area/create_country");
		}

		
		

		
	}



	


	public function edit_country($id)
	{
		$memData=$this->area_model->getCountry(array('id' => $id));
		
		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('country_name', 'Country Name', 'trim|required');
			$memData = array(
				'country_name' => $this->input->post('country_name')
			);

			// Validate submitted form data
			if ($this->form_validation->run() == TRUE)
			{
				//upate data
				$update = $this->area_model->update_country($memData,$id);

				if ($update) {

					$this->show_alert("info","successfully","Country has been updated.");
					
					redirect("CountryList/");

				} else {

					$this->show_alert("danger","Error","Some error.");	

				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("CountryList");
		}
		$data['member'] = $memData;
		$this->load_view($data,"Country Update","Admin/Area/edit_country");
	}
	
	public function delete_country($id)
	{
		// Check whether member id is not empty
		if (!empty($id)) {
			// Delete member
			$delete = $this->area_model->delete_country($id);

			if ($delete) {
				$this->show_alert("info","successfully","Country has been deleted.");
				
			} else {
				$this->show_alert("danger","Error","Some problems occured, please try again.");

			}
		}

		// Redirect to the list page
		redirect('CountryList');
		
	}

	public function show_alert($alert,$alert_title,$msg){
		 /*success for insert
		*danger for delete
		*info for update
		*/
		$this->session->set_flashdata("alert",$alert);
		//title for alert
		
		$this->session->set_flashdata("alert_title",$alert_title);
		//msg for altert 

		$this->session->set_flashdata("msg",$msg);

	}



	public function create_state()
	{
		$data=array();
		$data['countries']=$this->area_model->getCountry();

		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('state_name', 'State Name', 'trim|required|is_unique[rjstate.state_name]');
			$this->form_validation->set_rules('country_id', 'Country ', 'trim|required');
			$memData = array(
				'state_name' => $this->input->post('state_name'),
				'country_id' => $this->input->post('country_id')
			);
			if ($this->form_validation->run() == FALSE)
			{
				$this->load_view($data,"Country Create","Admin/Area/create_state");
			}
			else
			{
				$insert = $this->area_model->insert_state($memData);

				if ($insert) {

					$this->show_alert("success","successfully","State has been added successfully");
					redirect("StateList");
				} else {

					$this->show_alert("danger","Error","Some error.");	
				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("StateList");
		}else{
			
			$this->load_view($data,"State Create","Admin/Area/create_state");
		}

		
		
		
	}
	public function list_state()
	{

		// Get rows count
		$conditions['returnType']    = 'count';
		$rowsCount = $this->area_model->getState($conditions);

		// Pagination config
		$config['base_url']    = base_url() . '/StateList/';
		$config['uri_segment'] = 2;
		$config['total_rows']  = $rowsCount;
		$config['per_page']    = 5;



		$config['full_tag_open'] = '<ul class="paginationjp modal-1">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li ><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);


		$page = $this->uri->segment(2);
		$offset = !$page ? 0 : $page;
		echo $page;
		echo "string";

			// Get rows
			//$data['pg']=$page;
		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $config['per_page'];

		$data['datalst']=$this->area_model->getState($conditions);
		
		$this->load_view($data,"State List","Admin/Area/list_state");
		
	}

	public function delete_state($id)
	{
		// Check whether member id is not empty
		if (!empty($id)) {
			// Delete member
			$delete = $this->area_model->delete_state($id);

			if ($delete) {
				$this->show_alert("info","successfully","State has been deleted.");
				
			} else {
				$this->show_alert("danger","Error","Some problems occured, please try again.");

			}
		}

		// Redirect to the list page
		redirect('StateList');
		
	}


	public function edit_state($id)
	{
		$data=array();
		$data['countries']=$this->area_model->getCountry();

		$memData=$this->area_model->getState(array('id' => $id));
		
		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('country_id', 'country', 'trim|required');
			$this->form_validation->set_rules('state_name', 'State Name', 'trim|required');
			$memData = array(
				'state_name' => $this->input->post('state_name'),
				'country_id' => $this->input->post('country_id')
			);

			// Validate submitted form data
			if ($this->form_validation->run() == TRUE)
			{
				//upate data
				$update = $this->area_model->update_state($memData,$id);

				if ($update) {

					$this->show_alert("info","successfully","State has been updated.");
					
					redirect("StateList/");

				} else {

					$this->show_alert("danger","Error","Some error.");	

				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("StateList");
		}
		$data['member'] = $memData;
		$this->load_view($data,"State Update","Admin/Area/edit_state");
	}

//city


	public function create_city()
	{
		$data=array();
		$data['states']=$this->area_model->getState();

		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('city_name', 'City Name', 'trim|required|is_unique[rjcity.city_name]');
			$this->form_validation->set_rules('state_id', 'State ', 'trim|required');
			$memData = array(
				'city_name' => $this->input->post('city_name'),
				'state_id' => $this->input->post('state_id')
			);
			if ($this->form_validation->run() == FALSE)
			{

				//$this->load->view("Admin/Area/create_city",$data,"refresh");
			$this->load_view($data,"City Create","Admin/Area/create_city");
			}
			else
			{
				$insert = $this->area_model->insert_city($memData);

				if ($insert) {

					$this->show_alert("success","successfully","City has been added successfully");
					redirect("CityList");
				} else {

					$this->show_alert("danger","Error","Some error.");	
				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("CityList");
		}else{
			
			$this->load_view($data,"City Create","Admin/Area/create_city");
		}

		
		
		
	}
	public function list_city()
	{

		// Get rows count
		$conditions['returnType']    = 'count';
		$rowsCount = $this->area_model->getCity($conditions);

		// Pagination config
		$config['base_url']    = base_url() . '/CityList/';
		$config['uri_segment'] = 2;
		$config['total_rows']  = $rowsCount;
		$config['per_page']    = 5;



		$config['full_tag_open'] = '<ul class="paginationjp modal-1">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li >';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li ><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);


		$page = $this->uri->segment(2);
		$offset = !$page ? 0 : $page;
		echo $page;
		echo "string";

			// Get rows
			//$data['pg']=$page;
		$conditions['returnType'] = '';
		$conditions['start'] = $offset;
		$conditions['limit'] = $config['per_page'];

		$data['datalst']=$this->area_model->getCity($conditions);
		
		$this->load_view($data,"City List","Admin/Area/list_city");
		
	}

	public function delete_city($id)
	{
		// Check whether member id is not empty
		if (!empty($id)) {
			// Delete member
			$delete = $this->area_model->delete_city($id);

			if ($delete) {
				$this->show_alert("info","successfully","State has been deleted.");
				
			} else {
				$this->show_alert("danger","Error","Some problems occured, please try again.");

			}
		}

		// Redirect to the list page
		redirect('CityList');
		
	}


	public function edit_city($id)
	{
		$data=array();
		$data['states']=$this->area_model->getState();

		$memData=$this->area_model->getCity(array('id' => $id));
		
		if ($this->input->post('formSubmit')) {
			$this->form_validation->set_rules('city_name', 'country', 'trim|required');
			$this->form_validation->set_rules('state_id', 'State', 'trim|required');
			$memData = array(
				'city_name' => $this->input->post('city_name'),
				'state_id' => $this->input->post('state_id')
			);

			// Validate submitted form data
			if ($this->form_validation->run() == TRUE)
			{
				//upate data
				$update = $this->area_model->update_city($memData,$id);

				if ($update) {

					$this->show_alert("info","successfully","City has been updated.");
					
					redirect("CityList/");

				} else {

					$this->show_alert("danger","Error","Some error.");	

				}
				
			}
		}elseif ($this->input->post('formCancel')) {
			redirect("CityList");
		}
		$data['member'] = $memData;
		$this->load_view($data,"City Update","Admin/Area/edit_city");
	}
}
?>
