<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
	}
	public function index()
	{
		if (isset($this->session->userdata['logged_data'])) {

			if ($this->session->userdata['logged_data']['type']==1) {
				redirect(base_url('RJHome'));
			}elseif ($this->session->userdata['logged_data']['type']==2) {
				redirect(base_url('RJSellerHome'));
			}else{
				$this->load->view('login.php');
			}
			
		}else{
			$this->load->view('login.php');
		}
		
	}
	public function login()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login.php');
		}
		else
		{	
		// print_r($this->session->userdata['logged_data']);

			if ($this->session->userdata['logged_data']['type']==1) {
				redirect(base_url('RJHome'));
			}elseif ($this->session->userdata['logged_data']['type']==2) {
				redirect(base_url('RJSellerHome'));
			}else{
				$this->load->view('login.php');
			}


			
		}
		
	}

	function check_database($password)
	{
	   //Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
	   //query the database
		$result = $this->user_model->user_login($username, $password);


		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'uid' => $row->user_id,
					'username' => $row->username,
					'email'=>$row->email,
					'type'=>$row->user_type
				);
				$this->session->set_userdata('logged_data', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			
			return false;
		}
	}


	function logout()
	{
    // $this->session->unset_userdata($sess_array);
		$this->session->sess_destroy();

		redirect(base_url('login'));
	}



	public function registerseller(){
		if($this->input->post('sreg')){
			
			$indata['user_id']=$this->getID('user');
			$indata['username']="";
			$indata['email']=$this->input->post('email');
			$indata['password']=$this->input->post('psw');
			$indata['phone']=$this->input->post('phone');
			$indata['firstname']=$this->input->post('fname');
			$indata['middlename']=$this->input->post('mname');
			$indata['lastname']=$this->input->post('lname');
			$indata['city']=$this->input->post('city');
			$indata['state']=$this->input->post('state');
			$indata['country']=$this->input->post('country');
			$indata['address']=$this->input->post('addr');
			$indata['reg_date']=date("y-m-d"); ;
			$indata['user_type']="seller";
			$indata['photo']=$this->do_upload();

			$this->load->model('user_model');
			$this->user_model->AddUser($indata);


			$this->load->library('session');
			$user['user_id']=$indata['user_id'];
			$this->session->set_userdata($user);

			redirect('Seller/index');
		}
		else{
			$this->load->model('country_model');
			$data['cntr']=$this->country_model->getAllCountry();
			$this->load->view('register_seller.php',$data);
		}
	}
	public function do_upload()
	{
		$config['upload_path']          = './assets/uploads/users/';
		$config['allowed_types']        = 'gif|jpg|png|jfif';
		$config['file_name'] = $this->getID("user_pic");
				//echo $config['upload_path'];
		$this->load->library('upload',$config);
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$error = array('error' => $this->upload->display_errors());
			return $error[0];
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data']['file_name'];
		}
	}

	public function getID($prifix){
		$uniqId=$prifix .time();
		return $uniqId;

	}
	function fetch_state()
	{
		if($this->input->post('id'))
		{
			$this->load->model('state_model');
			$id['country_id']=$this->input->post('id');
			$data['sts']=$this->state_model->getStateByCID($id);
			  // print_r($data);
			$this->load->view('stemplist',$data);
		}
	}

	function fetch_city()
	{
		if($this->input->post('id'))
		{
			$this->load->model('city_model');
			$id['state_id']=$this->input->post('id');
			$data['cts']=$this->city_model->getstateBySID($id);
		   // print_r($data);
			$this->load->view('ctemplist',$data);
		}

	}


function load_view($data = array(),$title,$view){
		$data['header_title']=$title;
		$this->load->view('layouts/header',$data);
		$this->load->view($view,$data);
		$this->load->view('layouts/footer');
	}
	function get_customers()
	{
		// Get rows count
		
		$conditions['returnType']    = 'count';
		$rowsCount = $this->user_model->getUsers($conditions);

			// Pagination config
		$config['base_url']    = base_url() . '/Customers/';
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
		$conditions['conditions'] = array('user_type' => 3 );

		$data['datalst']=$this->user_model->getUsers($conditions);
		
	$this->load_view($data,"Country List","Admin/users/customer_list");

	}


	function get_sellers()
	{
		// Get rows count
		
		$conditions['returnType']    = 'count';
		$rowsCount = $this->user_model->getUsers($conditions);

			// Pagination config
		$config['base_url']    = base_url() . '/Sellers/';
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
		$conditions['conditions'] = array('user_type' => 2 );

		$data['datalst']=$this->user_model->getUsers($conditions);
		
		//print_r($data);
		$this->load_view($data,"Country List","Admin/users/customer_list");

	}
	
}
?>