<?php 
/**
 * 
 */
class user_model extends CI_model
{
	
	function  __construct()
	{
    parent::__construct(); 
  }

  public function user_login($uname,$pwd)
  { 

    $q=$this->db->where(['username'=>$uname,'password'=>$pwd])
    ->limit(1)
    ->get('rjusertbl');
    if ($q->num_rows()>0) {
      return $q->result();
    }else{
      return false;
    }


  }

  public function getstateByCID($id){
   $this->db->where($id);
   $res=$this->db->get('rjstate');
   return $res->Result();
 }
 public function AddUser($data)
 {
  $res=$this->db->insert('rjusertbl',$data);
  print_r($res);
}


}

?>