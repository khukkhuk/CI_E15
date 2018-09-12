<!DOCTYPE html>
<html>
<title>No Success</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>

<header class="w3-container w3-card">



<div class="nav-left">
  <h6 style="color:white;">
  
  <?php

  $user_fname=$this->session->userdata('user_fname');
  $id=$this->session->userdata('user_id');
  
  ?></h6>
  </div>
<div class="nav-right">
<h6 style="color: white;">
  <?php 
?>
</h6>
  </div>
</header>
<div class="container">
<hr>
<h6 style="margin-left: 25%;color:#292b2f; margin-right: 15%;width: 300px; padding-left: 5%;background-color: #fed00d;
    border: 7px;">Username หรือ Password <br> ไม่ถูกต้อง กรูณาตรวจสอบใหม่อีกครั้ง</h6>
<h7 style="margin-left: 45%" >
    <?php

echo anchor('welcome/index/','ย้อนกลับ');
    ?>
</h7>
    <div class="w3-cell-row">
  
</div>

<hr>
</div>




<div class="footer">
ระบบลงชื่อเข้ากิจกรรมพิเศษ
</div>


</body>
</html>
