<?php
header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Property extends REST_Controller {
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
       $this->load->model('Property_model','',TRUE);
       $this->load->model('area_model','',TRUE);
   }
   public function properties_get(){
      $data=$this->Property_model->getAllProperty();
      $this->response([
         'status' => TRUE,
         'message' => 'successfully get',
         'data' => $data
     ], REST_Controller::HTTP_OK);
    // $this->response($data,REST_Controller::HTTP_OK);
   }
   public function propertyDetail_get($id){
      $data["detail"]=$this->Property_model->getPropertyByID($id);
      $albid=$data['detail'][0]->album_id;
      $data['imgs']=$this->Property_model->getImages($albid);
      $this->response([
         'status' => TRUE,
         'message' => 'successfully get',
         'data' => $data
     ], REST_Controller::HTTP_OK);
   }
   public function PropertyByUser_get($id){
      echo $id;
      $data["detail"]=$this->Property_model->getPropertyByUserID($id);
         $this->response([
         'status' => TRUE,
         'message' => 'successfully get',
         'data' => $data
     ], REST_Controller::HTTP_OK);
   }
 public function PropertyListSale_get(){
      $data=$this->Property_model->PropertyListSale();
      $d[0]="";
      $i=0;
      foreach($data as $row){
         $n['row']=$row;
         $res=$this->Property_model->getFistImage($row->album_id);
         if($res!=null){
             $n['img']=$res[0]->image_url;
          }
          else{
             $n['img']="";
          }
         $d[$i]=$n;
        $i++; 
      }
      $this->response([
         'status' => TRUE,
         'message' => 'successfully get',
         'data' => $d
     ], REST_Controller::HTTP_OK);
   }
   public function PropertyLisRent_get(){
      $d[0]="";
      $data=$this->Property_model->PropertyLisRent();
      $i=0;
      foreach($data as $row){
         $n['row']=$row;
         $res=$this->Property_model->getFistImage($row->album_id);
         if($res!=null){
            $n['img']=$res[0]->image_url;
         }
         else{
            $n['img']="";
         }
         $d[$i]=n;
        $i++; 
      }
      $this->response([
         'status' => TRUE,
         'message' => 'successfully get',
         'data' => $d
     ], REST_Controller::HTTP_OK);
      
   }
}