
<?php


class property_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        
        $this->table = "rj_property_master";



    }


    public function getProperty($params = array()){ 

        $this->db->from($this->table);
        
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
      $likeArr = array('property_title' => $search);
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
        $this->db->where('propertym_id', $params['id']);
        $query = $this->db->get();
        $result = $query->row_array();
    } 
    else 
    {

        $this->db->order_by('property_title', 'asc');
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


public function getPropertyByID($id){
    $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
    return $query->result();
}

public function getAllFlooringType(){
    $query=$this->db->get("rj_flooring_type");
    return $query->result();
}
public function addAddr($data){
    $this->db->insert('rj_addr_detail',$data);
}
public function addMainDetail($data){
    $this->db->insert('rj_pmain_detail',$data);
}
public function addPriceDetail($data){
    $this->db->insert('rj_price_detail',$data);
}

public function addProperty($data){
    $this->db->insert('rj_property_master',$data);
}
}   

?>

