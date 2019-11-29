<?php


    class property_model extends CI_Model {
        public $propertym_id;
        public $property_title;
        public $user_id;
        public $addr_detail_id;
        public $main_detail_id;
        public $price_detail_id;
        public $ps_detail_id;
        public $feature_id;
        public $albume_id;
        public $description;

        public function getAllProperty(){
            $query=$this->db->get("rj_property_master");
	        return $query->result();
        }
        public function getPropertyByID($id){
            $query=$this->db->query("select * from rj_property_master where propertym_id='$id'");
            return $query->result();
        }

    }   

?>