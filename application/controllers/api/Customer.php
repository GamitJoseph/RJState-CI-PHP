<?php

header('Content-type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Customer extends REST_Controller {
	  /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function __construct() {

       parent::__construct();

       //$this->load->database();
       $this->load->model('user_model','',TRUE);
       $this->load->model('area_model','',TRUE);


   }





    /**

     * Get User Data from this method.

     *

     * @return Response

    */

    public function user_reg_get()
    {
        // Get the get data
        $username = strip_tags($this->get('username'));
        $email = strip_tags($this->get('email'));
        $password = $this->get('password');
        $firstname = strip_tags($this->get('fname'));
        $middlename = strip_tags($this->get('mname'));
        $lastname = strip_tags($this->get('lname'));
        $phone = strip_tags($this->get('phone'));


        // Validate the post data
        if (!empty($firstname) && !empty($lastname) && !empty($middlename) && !empty($email) && !empty($password)) {

            // Check if the given email already exists
            $con['returnType'] = 'count';
            $con['conditions'] = array(
                'email' => $email,
            );
            $userCount = $this->user_model->getUsers($con);

            if ($userCount > 0) {
                // Set the response and exit
                $this->response(['status'=>FALSE,'message'=>"The given email already exists."], REST_Controller::HTTP_OK);
            } else {
                // Insert user data

               $indata['user_id']=$this->getID('user');

              
               $userData = array(
                'user_id' => $this->getID('cust'),
                'firstname' => $firstname,
                'middlename' => $middlename,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'username' => $username,
                'city' => 0,
                'state' => 0,
                'country' => 0,
                'address' => "",
                'photo' => "user.png",
                'reg_date' =>date("y-m-d"),
                'user_type' => "cust",
                'password' => md5($password)

            );

               $insert = $this->db->insert('rjusertbl',$userData);

                // Check if the user data is inserted
               if ($insert) {
                    // Set the response and exit
                $this->response([
                    'status' => TRUE,
                    'message' => 'The user has been added successfully.',
                    
                ], REST_Controller::HTTP_OK);
            } else {
                    // Set the response and exit
                $this->response(['status'=>FALSE,'message'=>"Some problems occurred, please try again."], REST_Controller::HTTP_OK);
            }
        }
    } else {
            // Set the response and exit
        $this->response(['status'=>FALSE,'message'=>"Provide complete user info to add."], REST_Controller::HTTP_OK);
    }
}
public function user_login_get()
{
    // Get the post data
    $email = $this->get('email');
    $password = $this->get('password');

        // Validate the post data
    if (!empty($email) && !empty($password)) {

            $password = md5($password);
            // Check if any user exists with the given credentials
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'email' => $email,
            'password' => $password,
            'user_type' => 'cust'
        );
        $user = $this->user_model->getUsers($con);

        if ($user) {
                // Set the response and exit
            $this->response([
                'status' => TRUE,
                'message' => 'User login successful.',
                'data' => $user
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
            $this->response(['status'=>FALSE,'message'=>"Wrong email or password."], REST_Controller::HTTP_OK);
        }
    } else {
            // Set the response and exit
        $this->response(['status'=>FALSE,'message'=>"Provide email and password."], REST_Controller::HTTP_OK);
    }
}




public function userby_id_get($user_id = 0)
{

    if (!empty($user_id)) {

        $data =  $this->db->where('user_id' ,$user_id)
        ->where('user_type',"cust")
        ->get("rjusertbl")
        ->row_array();
        $this->response([
            'status' => TRUE,
            'message' => 'successfully get',
            'data' => $data
        ], REST_Controller::HTTP_OK);

    } else {
     $this->response([
        'status' => FALSE,
        'message' => "id is null",
        'data' => []
    ], REST_Controller::HTTP_OK);
 }




}



    /**

     * INsert All Data from this method.

     *username,email,password,phone,firstname,middlename,lastname

     * @return Response

    */

    public function user_update_get($user_id = 0)

    {
      if (!empty($user_id)) 
      {
       $indata=$this->input->get();
       $update=$this->db->update("rjusertbl", $indata, array('user_id' => $user_id));
       if ($update) {
         $this->response([
            'status' => TRUE,
            'message' => 'The user has been update successfully.',
            'data' => $update
        ], REST_Controller::HTTP_OK);

     }else{
        $this->response([
            'status' => FALSE,
            'message' => "Some problems occurred, please try again.",
            'data' => $res
        ], REST_Controller::HTTP_OK);
    }

} else {
    $this->response([
        'status' => FALSE,
        'message' => "id is null"  
    ], REST_Controller::HTTP_OK);

}

}



public function user_register_post()

{

   $data = $this->input->post();

        // $this->db->insert('',$input);
   $indata['user_id']=$this->getID('user');
   $indata['username']=$this->input->post('uname');;
   $indata['email']=$this->input->post('email');
   $indata['password']=$this->input->post('psw');
   $indata['phone']=$this->input->post('phone');
   $indata['firstname']=$this->input->post('fname');
   $indata['middlename']=$this->input->post('mname');
   $indata['lastname']=$this->input->post('lname');
   $indata['city']=0;
   $indata['state']=0;
   $indata['country']=0;
   $indata['address']="";
   $indata['reg_date']=date("y-m-d"); ;
   $indata['user_type']="cust";
   $res=$this->db->insert('rjusertbl',$indata);

   if ($res) {


    $this->response([
        'status' => TRUE,
        'message' => 'The user has been registered successfully.',
        'data' => $res
    ], REST_Controller::HTTP_OK);

}else{
    $this->response([
        'status' => FALSE,
        'message' => "Some problems occurred, please try again.",
        'data' => $res
    ], REST_Controller::HTTP_OK);

}

} 



public function getID($prifix){
    $uniqId=$prifix .time();
    return $uniqId;

}

    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_put($id)

    {

        $input = $this->put();

        $this->db->update('items', $input, array('id'=>$id));



        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);

    }



    /**

     * Get All Data from this method.

     *

     * @return Response

    */

    public function index_delete($id)

    {

        $this->db->delete('items', array('id'=>$id));



        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);

    }



}