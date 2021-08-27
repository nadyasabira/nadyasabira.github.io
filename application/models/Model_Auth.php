<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Auth extends CI_Model {

 public function ambillogin($username,$password)
 {
  $periksa = $this->db->get_where('users' ,array('username'=>$username,'password'=>md5($password)));
    
  if($periksa->num_rows()>0){
      return 1;
  }else{
      return 0;
  }

}
 


 

}