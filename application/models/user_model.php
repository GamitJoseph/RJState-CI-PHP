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
    ->or_where(['phone'=>$uname,'password'=>$pwd])
    ->or_where(['email'=>$uname,'password'=>$pwd])
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



public function getUsers($params = array()){ 

    $this->db->from("rjusertbl");

    if (array_key_exists("conditions", $params))
    {
      foreach ($params['conditions'] as $key => $val)
      {
        $this->db->where($key, $val);
      }
    }

    if (!empty($params['searchKeyword'])) 
    {
      $search = $params['searchKeyword'];
      $likeArr = array('username' => $search);
      $this->db->or_like($likeArr);
    }

    if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') 
    {
      $result = $this->db->count_all_results();
    } 
    else 
    {
      if (array_key_exists("id", $params)) 
      {
        $this->db->where('user_id', $params['id']);
        $query = $this->db->get();
        $result = $query->row_array();
      } 
      else 
      {

        $this->db->order_by('lastname', 'asc');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) 
        {
          $this->db->limit($params['limit'], $params['start']);
        } 
     

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
      }
    }

  // Return fetched data
    return $result;
  }


}

?>