<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
    
    
    public function index(){

        $this->load->view('layouts/header');
        $this->load->view('seller/index');
        $this->load->view('layouts/footer');
    }

}