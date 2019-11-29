<?php
    class city_model extends CI_Model {
       
       public function getstateBySID($id){
           $this->db->where($id);
           $res=$this->db->get('rjcity');
           return $res->Result();
       }
    }   
?>