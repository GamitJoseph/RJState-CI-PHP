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

    public function user_login($uname,$pwd){ 

        $q=$this->db->where(['username'=>$uname,'password'=>$pwd])
        ->limit(1)
        ->get('rjusertbl');
        if ($q->num_rows()>0) {
            return $q->result();
        }else{
            return false;
        }


    }

  //   public function getEmp(){ 
  //     $data=$this->db->get("emp");
      
  //     return $data->result();
  // }

  public function insert_product()
  {    
    // $data = array(
    //     'title' => $this->input->post('title'),
    //     'description' => $this->input->post('description')
    // );
    // return $this->db->insert('emp', $data);
// }
// public function update_emp($id) 
// {
//     $data=array(
//         'title' => $this->input->post('title'),
//         'description'=> $this->input->post('description')
//     );
//     if($id==0){
//         return $this->db->insert('emp',$data);
//     }else{
//         $this->db->where('id',$id);
//         return $this->db->update('emp',$data);
//     }        
// }

  }
}

?>