
<?php 
/**
* 
*/
class area_model extends CI_model
{
	
	function  __construct()
	{
    parent::__construct(); 
    $this->table = 'rjcountry';
  }


  /*
  * Fetch members data from the database
  * @param array filter data based on the passed parameters
  */

  public function getCountry($params = array()){ 

    $this->db->from($this->table);
  //$data=$this->db->get($this->table);
  //return $data->result();
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
      $likeArr = array('country_name' => $search);
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
        $this->db->where('country_id', $params['id']);
        $query = $this->db->get();
        $result = $query->row_array();
      } 
      else 
      {

        $this->db->order_by('country_name', 'asc');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) 
        {
          $this->db->limit($params['limit'], $params['start']);
        } 
      // elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) 
      // {
      //   $this->db->limit($params['limit']);
      // }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
      }
    }

  // Return fetched data
    return $result;
  }




  public function getState($params = array()){ 

    $this->db->from("rjstate");


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
      $likeArr = array('state_name' => $search);
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
        $this->db->where('state_id', $params['id']);
        $query = $this->db->get();
        $result = $query->row_array();
      } 
      else 
      {

        $this->db->order_by('state_name', 'asc');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) 
        {
          $this->db->limit($params['limit'], $params['start']);
        } 
    

        $query = $this->db->join("rjcountry","rjstate.country_id=rjcountry.country_id");
        $query = $this->db->get();
         $result =  $query->result_array();

       // $query->result_array();
      }
    }

// Return fetched data
    return $result;
  }



public function getCity($params = array()){ 

    $this->db->from("rjcity");


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
      $likeArr = array('city_name' => $search);
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
        $this->db->where('city_id', $params['id']);
        $query = $this->db->get();
        $result = $query->row_array();
      } 
      else 
      {

        $this->db->order_by('city_name', 'asc');
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) 
        {
          $this->db->limit($params['limit'], $params['start']);
        } 
    

        $query = $this->db->join("rjstate","rjcity.state_id=rjstate.state_id");
        $query = $this->db->get();
         $result =  $query->result_array();

       // $query->result_array();
      }
    }

// Return fetched data
    return $result;
  }


/*
* insert data in database
* @data array is contain data to insert
*/

public function insert_country($data = array())
{  
  if (!empty($data)) {

    $insert=$this->db->insert($this->table, $data);
    return $insert ? $this->db->insert_id() : false;
  }
  return false;
} 


public function insert_state($data = array())
{  
  if (!empty($data)) {

    $insert=$this->db->insert("rjstate", $data);
    return $insert ? $this->db->insert_id() : false;
  }
  return false;
} 

public function insert_city($data = array())
{  
  if (!empty($data)) {

    $insert=$this->db->insert("rjcity", $data);
    return $insert ? $this->db->insert_id() : false;
  }
  return false;
} 

/*
* update data in database
* @data array is contain data to update
*@id is table id to update
*/
public function update_country($data,$id)
{  
  if (!empty($data)) {

    $update=$this->db->update($this->table, $data, array('country_id' => $id));
    return $update ? true : false;
  }
  return false;
} 
public function update_state($data,$id)
{  
  if (!empty($data)) {

    $update=$this->db->update("rjstate", $data, array('state_id' => $id));
    return $update ? true : false;
  }
  return false;
}
public function update_city($data,$id)
{  
  if (!empty($data)) {

    $update=$this->db->update("rjcity", $data, array('city_id' => $id));
    return $update ? true : false;
  }
  return false;
}

public function delete_country($id)
{  

  // Delete member data
  $delete = $this->db->delete($this->table, array('country_id' => $id));

  // Return the status
  return $delete ? true : false;
} 
public function delete_state($id)
{  

  // Delete member data
  $delete = $this->db->delete("rjstate", array('state_id' => $id));

  // Return the status
  return $delete ? true : false;
}

public function delete_city($id)
{  

  // Delete member data
  $delete = $this->db->delete("rjcity", array('city_id' => $id));

  // Return the status
  return $delete ? true : false;
}





}


?>



