<!DOCTYPE html>
<html>
<title>AdminIndex</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>

<?php echo form_open('welcome/admin_index'); ?>
<header class="w3-container w3-card">



<div class="nav-left">
  <h6 style="color:white;">ยินดีต้อนรับคุณ <?php

  $user_fname=$this->session->userdata('user_fname');
  $id=$this->session->userdata('user_id');
  
echo anchor('welcome/admin_editshow/'.$id, $user_fname);
  ?></h6>
  </div>
<div class="nav-right">
<h6 style="color: white;">
  <?php 
  echo anchor('welcome/admin_index',"หน้าหลัก");
  echo "  ";
  echo anchor('welcome/index',"ออกจากระบบ");
?>
</h6>
  </div>
</header>
<div class="container">
<hr>

<?php echo anchor('welcome/act_show', ' 
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
    <img src="http://localhost/cie15/application/views/img/activity.png" style="width:100%">
  </div>
  <div class="w3-cell w3-container">
    <h4>จัดการกิจกรรม</h4>
    <p>ตรวจสอบ เพิ่ม ลบ แก้ไข กิจกรรม</p>
  </div>
</div>
');
?>

<hr>
<?php echo anchor('welcome/user_show', ' 
<div class="w3-cell-row">
  <div class="w3-cell" style="width:30%">
    <img src="http://localhost/cie15/application/views/img/user.png" style="width:100%">
  </div>
  <div class="w3-cell w3-container">
    <h3>จัดการผู้เข้าใช้</h3>
    <p>ตรวจสอบ เพิ่ม ลบ แก้ไข ผู้เข้าใช้งาน</p>
  </div>
</div>
');
?>
</div>




<div class="footer">
ระบบลงชื่อเข้ากิจกรรมพิเศษ
</div>


</body>
</html>
