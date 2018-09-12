<?php

echo "User_id  = ".$this->session->userdata('user_id')."<br>";
echo "Username = ".$this->session->userdata('username')."<br>";
echo "password = ".$this->session->userdata('password')."<br>";

?>

 <a href="<?php echo base_url()  ?>member/logout" type="submit" >Logout</a> 