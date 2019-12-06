<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
		$this->load->model('country_model','',TRUE);
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
		

		if ($this->session->userdata['logged_data']['type']=='admin') {
			redirect(base_url('RJHome'));
		}elseif ($this->session->userdata['logged_data']['type']=='seller') {
			redirect(base_url('RJSellerHome'));
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login.php');
		}
		else
		{	
			
			$username = $this->input->post('username');
			$password = $this->input->post('password');
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
				if ($this->session->userdata['logged_data']['type']=='admin') {
					redirect(base_url('RJHome'));
				}elseif ($this->session->userdata['logged_data']['type']=='seller') {
					redirect(base_url('RJSellerHome'));
				}

			}
			else
			{
				$this->session->set_flashdata('check_database', 'Invalid username or password');
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
			$this->session->set_flashdata('check_database', 'Invalid username or password');
			
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



		$data['cntr']=$this->country_model->getAllCountry();
		if($this->input->post('sreg')){

			$config['upload_path']          = './assets/uploads/users/';
			$config['allowed_types']        = 'gif|jpg|png|jfif';
			$config['max_size']             = 8000;
			$config['file_name'] = $this->getID("user_pic");
				//echo $config['upload_path'];
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
			
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_emails|is_unique[rjusertbl.email]');
			$this->form_validation->set_rules('phone', 'Mobile Number', 'trim|required|is_unique[rjusertbl.phone]');
			$this->form_validation->set_rules('uname', 'Username', 'is_unique[rjusertbl.username]');

			$this->form_validation->set_rules('country', 'country Name', 'trim|required');
			$this->form_validation->set_rules('state', 'state Name', 'trim|required');
			$this->form_validation->set_rules('city', 'city Name', 'trim|required');
			$this->form_validation->set_rules('psw', 'password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('cpsw', 'confirm password ', 'trim|required|min_length[8]|matches[psw]');
			// $this->form_validation->set_rules('photo', 'profile picture ', 'trim|required');
			
			$indata['user_id']=$this->getID('user');
			$indata['username']=$this->input->post('uname');;
			$indata['email']=$this->input->post('email');
			$indata['password']=md5($this->input->post('psw'));
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
			
			if ($this->form_validation->run() == FALSE)
			{

				$this->load->view('register_seller.php',$data);
				
			}
			else
			{
				if ( ! $this->upload->do_upload('photo'))
				{
					print_r($this->upload->display_errors());
					$error = array('error' => $this->upload->display_errors());
					
					$this->session->set_flashdata("upload_err", $error['error']);
					$this->load->view('register_seller.php',$data);
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$indata['photo']=$data['upload_data']['file_name'];
					$insert =$this->user_model->AddUser($indata);

					if ($insert) {
						redirect("login");
					} else {

						$this->session->set_flashdata("insert_err", "Something went Wrong try again after sometime..");
						$this->load->view('register_seller.php',$data);	
					}
				}

			}

		}else{
			$this->load->view('register_seller.php',$data);
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
	function full_customer($id)
	{
		$data = array();
		$conditions['conditions'] = array('user_type' => 'cust');
		$conditions['id'] =   $id ;
		$data['cust']=$this->user_model->getUsers($conditions);
		//print_r($data);
		$this->load_view($data,"Customer Details","Admin/users/full_customer");
	}

	function full_seller($id)
	{
		$data = array();
		$conditions['conditions'] = array('user_type' => 'seller' );
		$conditions['id'] =   $id ;
		$data['cust']=$this->user_model->getUsers($conditions);
		//print_r($data);
		$this->load_view($data,"Customer Details","Admin/users/full_seller");
	}
	function get_customers()
	{
		// Get rows count

		$conditions['returnType']    = 'count';
		$conditions['conditions'] = array('user_type' => 'cust' );
		$rowsCount = $this->user_model->getUsers($conditions);

			// Pagination config
		$config['base_url']    = base_url() . '/Customers/';
		$config['uri_segment'] = 2;
		$config['total_rows']  = $rowsCount;
		$config['per_page']    = 6;



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


			// Get rows
			//$data['pg']=$page;
		$conditions['returnType'] = '';
		//$conditions['start'] = $offset;
		//$conditions['limit'] = $config['per_page'];
		$conditions['conditions'] = array('id' => 'user1574573627');
		$conditions['conditions'] = array('user_type' => 'cust' );


		$data['datalst']=$this->user_model->getUsers($conditions);
	// print_r($data);
		$this->load_view($data,"Customer List","Admin/users/customer_list");

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

	public function verify_cust($id,$val)
	{

		echo "$id  $val";
		$memData = array(
			'is_verify' => $val
		);
		$update = $this->user_model->update_user($memData,$id);
		if ($update) {

			$this->show_alert("info","successfully","user has been updated.");

			redirect("Customer_full/".$id);

		} else {

			$this->show_alert("danger","Error","Some error.");	

		}

	}
	public function verify_seller($id,$val)
	{


		$memData = array(
			'is_verify' => $val
		);
		$update = $this->user_model->update_user($memData,$id);
		if ($update) {

			$this->show_alert("info","successfully","user has been updated.");

			redirect("Seller_full/".$id);

		} else {

			$this->show_alert("danger","Error","Some error.");
			echo "string";	

		}

	}

	function get_sellers()
	{
		// Get rows count
		
		$conditions['returnType']    = 'count';
		$conditions['conditions'] = array('user_type' => 'seller');
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
		$conditions['conditions'] = array('user_type' => 'seller' );

		$data['datalst']=$this->user_model->getUsers($conditions);
		
		//print_r($data);
		$this->load_view($data,"Country List","Admin/users/seller_list");

	}
	
}
?>