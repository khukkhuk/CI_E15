<!DOCTYPE html>
<html>
<title>UserReport</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>

<?php echo form_open('welcome/show_useract'); ?>

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
<?php 
  echo anchor('welcome/user_index',"ย้อนกลับ");
?>
<h6>กิจกรรมที่เคยทำ</h6>
<div style="overflow-x:auto;">
<div class="w3-cell-row">
  <table style="width: 70%;">
    <tr>
      <th style="width: 30%;"><center>รหัสกิจกรรม</th>
      <th colspan="2" style="padding-left: 20%;" >ชื่อกิจกรรม</th>
    </tr>
<?php
foreach($show as $row){
  ?>
    <tr>
      <td style="width: 30%;"><center><?php echo $row['act_id']; ?></td>
      <td colspan="2" style="padding-left: 20%;" ><?php echo $row['act_name']; ?></td>
    </tr>
<?php
}?>
  </table>
</div>

<hr>
</div>




<div class="footer">
ระบบลงชื่อเข้ากิจกรรมพิเศษ
</div>


</body>
</html>
