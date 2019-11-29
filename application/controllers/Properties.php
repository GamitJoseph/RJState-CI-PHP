<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Properties extends CI_Controller
{


    public function index()
    {
               // $this->load->model('property_model');
       $this->load->model('property_model');
       $this->load->model('main_model');
       $d['list']=$this->property_model->getAllProperty();

       $this->load->view('layouts/header');
       $this->load->view('Admin/property_list',$d);
       $this->load->view('layouts/footer');
   }
   public function moreDetail($id)
   {
                //$this->load->model('property_model');
    $this->load->model('property_model');
    $this->load->model('main_model');
    $this->load->model('address_model');

    $data["pm"]=$this->property_model->getPropertyByID($id);

    $pmid=$data["pm"][0]->main_detail_id;

    $data["md"]=$this->main_model->getDetailByID($pmid);

    $addr_id=$data["pm"][0]->addr_detail_id;
    $data["addr"]=$this->address_model->getAddrById($addr_id);

    $this->load->view('layouts/header');
    $this->load->view('Admin/property_detail',$data);
    $this->load->view('layouts/footer');
    }
}
?>