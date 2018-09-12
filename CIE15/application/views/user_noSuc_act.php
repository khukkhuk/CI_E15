<!DOCTYPE html>
<html>
<title>No Success</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>

<?php echo form_open('welcome/act_show'); ?>

<header class="w3-container w3-card">



<div class="nav-left">
  <h6 style="color:white;">ยินดีต้อนรับคุณ 
  
  <?php

  $user_fname=$this->session->userdata('user_fname');
  $id=$this->session->userdata('user_id');
  
echo anchor('welcome/user_editshow/'.$id, $user_fname);
  ?></h6>
  </div>
<div class="nav-right">
<h6 style="color: white;">
  <?php 
  echo anchor('welcome/user_index',"หน้าหลัก");
  echo "  ";
  echo anchor('welcome/index',"ออกจากระบบ");
?>
</h6>
  </div>
</header>
<div class="container">
<hr>
<h6 style="margin-left: 25%;color:#292b2f; margin-right: 15%;width: 300px; padding-left: 8%;background-color: #fed00d;
    border: 7px;">คุณได้เข้าร่วมกิจกรรมนี้แล้ว <br>หรือจำนวนคนที่ต้องการเต็ม <br>กรุณาเลือกกิจกรรมอื่น</h6>
<h7 style="margin-left: 45%" >
    <?php

echo anchor('welcome/user_index/','ย้อนกลับ');
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
