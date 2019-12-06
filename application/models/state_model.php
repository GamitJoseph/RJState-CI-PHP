<?php
    class state_model extends CI_Model {
       
       
       public function getstateByCID($id){
           $this->db->where($id);
           $res=$this->db->get('rjstate');
           return $res->Result();
       }
    }   
?>