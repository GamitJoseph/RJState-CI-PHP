<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {
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
    $config['base_url']    = base_url() . '/seller/';
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
    
    $this->load_view($data,"property List","Seller/index");
    


 
   }
   
 function load_view($data = array(),$title,$view){
    $data['header_title']=$title;
    $this->load->view('layouts/header_seller',$data);
    $this->load->view($view,$data);
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

    
     $this->load_view($data,"property List","Seller/property_detail");
    
    }

public function getID($prifix){
		$uniqId=$prifix .time();
		return $uniqId;

	}

	public function addprop(){

		if($this->input->post()){


            //addr
			$addrid=$this->getID('addr');
			$addrdata['addr_detail_id']=$addrid;
			$addrdata['city_id']=$this->input->post('city');
			$addrdata['state_id']=$this->input->post('state');
			$addrdata['country_id']=$this->input->post('country');
			$addrdata['locality']=$this->input->post('lcty');
			$addrdata['fulladdr']=$this->input->post('addr');

			$this->load->model('property_model');
			$this->property_model->addAddr($addrdata);



            //main
			$main_id=$this->getID('main');
			$mainDeatail['main_detail_id']=$main_id;
			$mainDeatail['badroom_count']=$this->input->post('badrooms');
			$mainDeatail['bathroom_count']=$this->input->post('bathroom');
			$mainDeatail['balconie_count']=$this->input->post('balconie');
			$mainDeatail['saleable_area']=$this->input->post('saleable_area');
			$mainDeatail['carpet_area']=$this->input->post('carpet_area');

            //print_r($this->input->post());

			if($this->input->post('play')){
				$mainDeatail['is_playerroom']=$this->input->post('play');
			}
			else{
				$mainDeatail['is_playerroom']=0;
			}
			if($this->input->post('study')){
				$mainDeatail['is_studyroom']=$this->input->post('study');
			}
			else{
				$mainDeatail['is_studyroom']=0;
			}
			if($this->input->post('store')){
				$mainDeatail['is_storeroom']=$this->input->post('store');
			} 
			else{
				$mainDeatail['is_storeroom']=0;
			} 
			if($this->input->post('servent')){
				$mainDeatail['is_serventroom']=$this->input->post('servent');
			}
			else{
				$mainDeatail['is_serventroom']=0;
			}


			$mainDeatail['property_type_id']=$this->input->post('ptype');
			$this->property_model->addMainDetail($mainDeatail);

            //price
			$priceid=$this->getID("price");
			$pricedata['price_detail_id']=$priceid;
			$pricedata['price_per_sqft']=$this->input->post('price');
			if($this->input->post('isnegotiable')){
				$pricedata['is_negotiable']=1;
			}
			else{
				$pricedata['is_negotiable']=0;
			}


			if($this->input->post('prg')){
				$pricedata['is_car_parking']=1;
			}else{
				$pricedata['is_car_parking']=0;
			}


			if($this->input->post('plc')){
				$pricedata['is_plc']=1;
			}else{
				$pricedata['is_plc']=0;
			}

			if($this->input->post('club')){
				$pricedata['is_club_membership']=1;
			}else{
				$pricedata['is_club_membership']=0;
			}
			if($this->input->post('reg_fee')){
				$pricedata['is_regisration_fees']=1;
			}else{
				$pricedata['is_regisration_fees']=0;
			}
			if($this->input->post('edu_idc')){
				$pricedata['is_edu_idc']=1;
			}else{
				$pricedata['is_edu_idc']=0;
			}


			$total_amt=intval($this->input->post('price'))*intval($this->input->post('saleable_area'));
			$pricedata['total_amt']=$total_amt;
			$pricedata['booking_amt']=$this->input->post('bkg_amt');     
			$this->property_model->addPriceDetail($pricedata);

            //feature


            //print_r($this->input->post());

            //mastr
			$mdata['propertym_id']=$this->getID("prop");
			$mdata['property_title']=$this->input->post('title');
			$mdata['description']=$this->input->post('descr');
			$mdata['addr_detail_id']=$addrid;
			$mdata['main_detail_id']=$main_id;
			$mdata['price_detail_id']=$priceid;
			$mdata['user_id']=$this->session->userdata['logged_data']['uid'];
			$mdata['type']=$this->input->post('typ');

			$this->property_model->addProperty($mdata);

			$this->load->view('layouts/header_seller');
			$this->load->view('seller/index');
			$this->load->view('layouts/footer');
		}
		else{
			$this->load->model('main_model');
			$data['typ']=$this->main_model->getAllTypes();

			$this->load->model('property_model');   
			$data['flr']=$this->property_model->getAllFlooringType();
			$this->load->model('country_model');
			$data['cntr']=$this->country_model->getAllCountry();
			$this->load->view('layouts/header_seller');
			$this->load->view('seller/addproperty',$data);
			$this->load->view('layouts/footer');
		}
	}
}