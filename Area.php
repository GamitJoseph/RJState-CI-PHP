<?php

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Area extends REST_Controller {


	public function __construct() {

		parent::__construct();

       //$this->load->database();

		$this->load->model('area_model','',TRUE);
		$this->load->model('country_model','',TRUE);
		$this->load->model('state_model','',TRUE);
		$this->load->model('city_model','',TRUE);


	}

	public function countries_get()
	{
		$data=$this->country_model->getAllCountry(); 
		if ($data) {
                // Set the response and exit
			$this->response([
				'status' => TRUE,
				'message' => 'successful.',
				'data' => $data
			], REST_Controller::HTTP_OK);
                // if ($this->request->is("options")) {

			$this->response->header('Access-Control-Allow-Origin', 'http://localhost:3000');
			$this->response->header('Access-Control-Allow-Methods', '*');
                // $this->response->header('Access-Control-Allow-Credentials', 'true');

                // $this->response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

			$this->response->send();
		} else {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
			$this->response(['status'=>FALSE,'message'=>"no data found."], REST_Controller::HTTP_BAD_REQUEST);
		}  
	}


	public function States_get($c_id = 0)
	{
		if (!empty($c_id)) {

			$data=$this->state_model->getstateByCID(['country_id'=>$c_id]); 
			if ($data) {
                // Set the response and exit
				$this->response([
					'status' => TRUE,
					'message' => 'successful.',
					'data' => $data
				], REST_Controller::HTTP_OK);
                // if ($this->request->is("options")) {

				$this->response->header('Access-Control-Allow-Origin', 'http://localhost:3000');
				$this->response->header('Access-Control-Allow-Methods', '*');
                // $this->response->header('Access-Control-Allow-Credentials', 'true');

                // $this->response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

				$this->response->send();
			} else {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
				$this->response(['status'=>FALSE,'message'=>"no data found."], REST_Controller::HTTP_BAD_REQUEST);
			}  


		}else{

			$this->response([
				'status' => FALSE,
				'message' => "country id is null"  
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

	public function Cities_get($s_id = 0)
	{
		if (!empty($s_id)) {

			$data=$this->city_model->getcityBySID(['state_id'=>$s_id]); 
			if ($data) {
                // Set the response and exit
				$this->response([
					'status' => TRUE,
					'message' => 'successful.',
					'data' => $data
				], REST_Controller::HTTP_OK);
                // if ($this->request->is("options")) {

				$this->response->header('Access-Control-Allow-Origin', 'http://localhost:3000');
				$this->response->header('Access-Control-Allow-Methods', '*');
                // $this->response->header('Access-Control-Allow-Credentials', 'true');

                // $this->response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

				$this->response->send();
			} else {
                // Set the response and exit
                //BAD_REQUEST (400) being the HTTP response code
				$this->response(['status'=>FALSE,'message'=>"no data found."], REST_Controller::HTTP_BAD_REQUEST);
			}  


		}else{

			$this->response([
				'status' => FALSE,
				'message' => "state id is null"  
			], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}
