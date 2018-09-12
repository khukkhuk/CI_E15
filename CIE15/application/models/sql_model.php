<?php
session_start();
class sql_model extends CI_Model {
	public function chk_login($data){

		$numr = $this->db->query("SELECT * from user where username='$username' && password='$password'");
		$chknum = $numr->num_rows();
		if($chknum==1){
			echo "ok";
		}
		else{
			echo "no";
			echo "SELECT * from user where username='$username' && password='$password'";
		}
	}
	 public function log_in_correctly($data) {  
        $username = $data['username'];
        echo $username;
        if($username!=""){
        	echo "no-space";
        	echo $username;
        	echo $password;
        	
        }
        else {
        	echo "space";
        }
        $query = $this->db->get('user');  
  
        if ($query->num_rows() == 1)  
        {  
        	echo "ok";  
        } else {  
        	echo "no";  
        }  
  
    }
}
?>