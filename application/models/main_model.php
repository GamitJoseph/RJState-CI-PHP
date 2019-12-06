<?php
    class main_model extends CI_Model {
        public $main_detail_id;
        public $badroom_count;
        public $bathroom_count;
        public $balconie_count;
        public $saleable_area;
        public $carpet_area;
        public $isplayrroom;
        public $is_studyroom;
        public $is_storeroom;
        public $is_serventroom;
        public $property_type_id;

        public function getDetailByID($id){
           // $query=$this->db->get('rj_pmain_detail',array('main_detail_id' => '$id'));
            $query=$this->db->query("select * from rj_pmain_detail where main_detail_id='$id'");
            return $query->result();
        }
        public function      getAllTypes(){
           $qry= $this->db->get('rj_property_type');
            return $qry->result();
        }

    }   


?>