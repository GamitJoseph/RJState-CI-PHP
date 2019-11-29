<?php
    class address_model extends CI_Model {
        public $addr_detail_id;
        public $city_id;
        public $state_id;
        public $country_id;
        public $locality;
        public $lendmark;
        public $fulladdr;
        public function getAddrById($addr_id){
            //$query=$this->db->get('rj_addr_detail',array('addr_detail_id' => '$id'));
            $this->db->select('*');
            $this->db->from('rj_addr_detail');
            $this->db->join('rjcity', 'rjcity.city_id = rj_addr_detail.city_id');
            $this->db->join('rjstate', 'rjstate.state_id = rj_addr_detail.state_id');
            $this->db->join('rjcountry', 'rjcountry.country_id = rj_addr_detail.country_id');
            $query = $this->db->get();
          //  $query=$this->db->query("select * from rj_addr_detail where addr_detail_id='$addr_id'");
            return $query->result();
        }
    }   
?>