<?php 



defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','',TRUE);
		$this->load->model('country_model','',TRUE);
	}
}
?>