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
			redirect('Home/index');
			
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
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			
			return false;
		}
	}
	
}
?>