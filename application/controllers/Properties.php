<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Properties extends CI_Controller
{


  function __construct()
  {
    parent::__construct();
    $this->load->model('property_model');
    $this->load->model('main_model');
    $this->load->model('address_model');
    $this->perPage = 5;
  }

  public function index()
  {
      
   // Get rows count
    
    $conditions['returnType']    = 'count';
    $rowsCount = $this->property_model->getProperty($conditions);

      // Pagination config
    $config['base_url']    = base_url() . '/Admin_Properties/';
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
  
    $conditions['returnType'] = '';
    $conditions['start'] = $offset;
    $conditions['limit'] = $config['per_page'];

    $data['list']=$this->property_model->getProperty($conditions);
    
    $this->load_view($data,"Country List","Admin/property/index");
    


 }


  function load_view($data = array(),$title,$view){
    $data['header_title']=$title;
    $this->load->view('layouts/header',$data);
    $this->load->view($view,$data);
    $this->load->view('layouts/footer');
  }

 public function moreDetail($id)
 {

  $data["pm"]=$this->property_model->getPropertyByID($id);

  $pmid=$data["pm"][0]->main_detail_id;

  $data["md"]=$this->main_model->getDetailByID($pmid);

  $addr_id=$data["pm"][0]->addr_detail_id;
  $data["addr"]=$this->address_model->getAddrById($addr_id);

  $this->load->view('layouts/header');
  $this->load->view('Admin/property/property_detail',$data);
  $this->load->view('layouts/footer');
}
}
?>