
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
public function getImages($alb_id){
    $this->db->where('album_id',$alb_id);
    $query=$this->db->get('rj_images');
    return $query->result();
}

public function getPropertyByID($id){
    $this->db->select("*");
    $this->db->from('rj_property_master');
    $this->db->join('rj_addr_detail',"rj_addr_detail.addr_detail_id=rj_property_master.addr_detail_id","left");
        $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id',"left");
        $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id',"left");
        $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id',"left");
    //$this->db->join('rjusertbl',"rjusertbl.user_id=rj_property_master.user_id");
    $this->db->join('rj_pmain_detail',"rj_pmain_detail.main_detail_id=rj_property_master.main_detail_id","left");
    $this->db->join('rj_price_detail',"rj_price_detail.price_detail_id=rj_property_master.price_detail_id","left");
   
    $this->db->join('rj_feature_master',"rj_feature_master.feature_id=rj_property_master.pfeature_id","left");
        $this->db->join('rj_furnishing_detail',"rj_feature_master.furnishing_detail_id=rj_furnishing_detail.furnishing_detail_id","left");
        $this->db->join('rj_flooring',"rj_feature_master.flooring_detail_id=rj_flooring.flooring_id","left");
           // $this->db->join('rj_flooring_type',"rj_flooring.flooring_id=rj_flooring_type.flooring_id");
        $this->db->join('rj_amentiestbl',"rj_feature_master.amentie_id=rj_amentiestbl.amentie_id","left");                

    $this->db->join('rj_albums',"rj_albums.album_id=rj_property_master.album_id","left");
        //$this->db->from('rj_images',"rj_images.album_id=rj_albums.album_id");

    $this->db->where('rj_property_master.propertym_id',$id);
    $query=$this->db->get();
   // $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
   // $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
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

public function getPropertyByUserID($id){
    $this->db->select("*");
    $this->db->from('rj_property_master');
    $this->db->join('rj_addr_detail',"rj_addr_detail.addr_detail_id=rj_property_master.addr_detail_id","left");
        $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id',"left");
        $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id',"left");
        $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id',"left");
    //$this->db->join('rjusertbl',"rjusertbl.user_id=rj_property_master.user_id");
    $this->db->join('rj_pmain_detail',"rj_pmain_detail.main_detail_id=rj_property_master.main_detail_id","left");
    $this->db->join('rj_price_detail',"rj_price_detail.price_detail_id=rj_property_master.price_detail_id","left");
    $this->db->join('rj_feature_master',"rj_feature_master.feature_id=rj_property_master.pfeature_id","left");
        $this->db->join('rj_furnishing_detail',"rj_feature_master.furnishing_detail_id=rj_furnishing_detail.furnishing_detail_id","left");
        $this->db->join('rj_flooring',"rj_feature_master.flooring_detail_id=rj_flooring.flooring_id","left");
           // $this->db->join('rj_flooring_type',"rj_flooring.flooring_id=rj_flooring_type.flooring_id");
        $this->db->join('rj_amentiestbl',"rj_feature_master.amentie_id=rj_amentiestbl.amentie_id","left");                

    $this->db->join('rj_albums',"rj_albums.album_id=rj_property_master.album_id","left");
        //$this->db->from('rj_images',"rj_images.album_id=rj_albums.album_id");
    $this->db->where('rj_property_master.user_id',$id);
    $query=$this->db->get();
   // $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
   // $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
    return $query->result();

}

public function getAllProperty(){
    $this->db->select("*");
    $this->db->from('rj_property_master');
    $this->db->join('rj_addr_detail',"rj_addr_detail.addr_detail_id=rj_property_master.addr_detail_id","left");
        $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id',"left");
        $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id',"left");
        $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id',"left");
    //$this->db->join('rjusertbl',"rjusertbl.user_id=rj_property_master.user_id");
    $this->db->join('rj_pmain_detail',"rj_pmain_detail.main_detail_id=rj_property_master.main_detail_id","left");
    $this->db->join('rj_price_detail',"rj_price_detail.price_detail_id=rj_property_master.price_detail_id","left");
    $this->db->join('rj_feature_master',"rj_feature_master.feature_id=rj_property_master.pfeature_id","left");
        $this->db->join('rj_furnishing_detail',"rj_feature_master.furnishing_detail_id=rj_furnishing_detail.furnishing_detail_id","left");
        $this->db->join('rj_flooring',"rj_feature_master.flooring_detail_id=rj_flooring.flooring_id","left");
           // $this->db->join('rj_flooring_type',"rj_flooring.flooring_id=rj_flooring_type.flooring_id");
        $this->db->join('rj_amentiestbl',"rj_feature_master.amentie_id=rj_amentiestbl.amentie_id","left");                

    $this->db->join('rj_albums',"rj_albums.album_id=rj_property_master.album_id","left");
        //$this->db->from('rj_images',"rj_images.album_id=rj_albums.album_id");

    $query=$this->db->get();
   // $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
   // $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
    return $query->result();
}

public function getSaleProperteis(){
    $this->db->select("*");
    $this->db->from('rj_property_master');
    $this->db->join('rj_addr_detail',"rj_addr_detail.addr_detail_id=rj_property_master.addr_detail_id","left");
        $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id',"left");
        $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id',"left");
        $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id',"left");
    //$this->db->join('rjusertbl',"rjusertbl.user_id=rj_property_master.user_id");
    $this->db->join('rj_pmain_detail',"rj_pmain_detail.main_detail_id=rj_property_master.main_detail_id","left");
    $this->db->join('rj_price_detail',"rj_price_detail.price_detail_id=rj_property_master.price_detail_id","left");
    $this->db->join('rj_feature_master',"rj_feature_master.feature_id=rj_property_master.pfeature_id","left");
        $this->db->join('rj_furnishing_detail',"rj_feature_master.furnishing_detail_id=rj_furnishing_detail.furnishing_detail_id","left");
        $this->db->join('rj_flooring',"rj_feature_master.flooring_detail_id=rj_flooring.flooring_id","left");
           // $this->db->join('rj_flooring_type',"rj_flooring.flooring_id=rj_flooring_type.flooring_id");
        $this->db->join('rj_amentiestbl',"rj_feature_master.amentie_id=rj_amentiestbl.amentie_id","left");                

    $this->db->join('rj_albums',"rj_albums.album_id=rj_property_master.album_id","left");
        //$this->db->from('rj_images',"rj_images.album_id=rj_albums.album_id");
    $this->db->where('rj_property_master.type','sale');
    $query=$this->db->get();
   // $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
   // $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
    return $query->result();
}

public function getRentProperteis(){
    $this->db->select("*");
    $this->db->from('rj_property_master');
    $this->db->join('rj_addr_detail',"rj_addr_detail.addr_detail_id=rj_property_master.addr_detail_id","left");
        $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id',"left");
        $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id',"left");
        $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id',"left");
    //$this->db->join('rjusertbl',"rjusertbl.user_id=rj_property_master.user_id");
    $this->db->join('rj_pmain_detail',"rj_pmain_detail.main_detail_id=rj_property_master.main_detail_id","left");
    $this->db->join('rj_price_detail',"rj_price_detail.price_detail_id=rj_property_master.price_detail_id","left");
    $this->db->join('rj_feature_master',"rj_feature_master.feature_id=rj_property_master.pfeature_id","left");
        $this->db->join('rj_furnishing_detail',"rj_feature_master.furnishing_detail_id=rj_furnishing_detail.furnishing_detail_id","left");
        $this->db->join('rj_flooring',"rj_feature_master.flooring_detail_id=rj_flooring.flooring_id","left");
           // $this->db->join('rj_flooring_type',"rj_flooring.flooring_id=rj_flooring_type.flooring_id");
        $this->db->join('rj_amentiestbl',"rj_feature_master.amentie_id=rj_amentiestbl.amentie_id","left");                

    $this->db->join('rj_albums',"rj_albums.album_id=rj_property_master.album_id","left");
        //$this->db->from('rj_images',"rj_images.album_id=rj_albums.album_id");
    $this->db->where('rj_property_master.type','rent');
    $query=$this->db->get();
   // $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
   // $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
    return $query->result();
}

}   

?>

