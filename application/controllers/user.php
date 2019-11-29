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

		$this->load->view('login.php');
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

			redirect(base_url('RJHome'));
			
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
					'email'=>$row->email
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
    $sess_array = array(
                'uid'  =>'',
                'username' => '',
                'email' => '',
               );

     $this->session->unset_userdata($sess_array);
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
			$indata['user_type']=1;
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
	
}
?>