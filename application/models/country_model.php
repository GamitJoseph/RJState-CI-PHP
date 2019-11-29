<?php
    class country_model extends CI_Model {
       
       public function getAllCountry(){
           $res=$this->db->get('rjcountry');
           return $res->Result();
       }
    }   
?>