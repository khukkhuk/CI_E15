<!DOCTYPE html>
<html>
<title>AddAct</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>
<style>
table{
  width: 70%;
}
  th{
    background-color: white;
    color: black;
  }
  td{

    width: 15%;
  }
  input[text]{
    background-color: red;
  }
</style>

<?php echo form_open('welcome/act_add'); ?>
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

<?php
echo anchor('welcome/act_show',"ย้อนกลับ");
  ?>
<div style="overflow-x:auto;">
  <table>
  <tr><td colspan="2" style="background-color: gray ;border-width: 0;"><center>เพิ่มข้อมูลกิจกรรม</td></tr>
    <tr>
      <th>ชื่อกิจกรรม</th>
      <td><input type="text" name="act_name"></td>
    </tr>

    <tr>
      <th>ชื่อผู้ดูแล</th>
      <td><input type="text" name="act_staff"></td>
    </tr>

    <tr>
      <th>จำนวนที่ต้องการ</th>
      <td><input type="text" name="act_want"></td>
    </tr>

    <tr>
      <th>วันที่ทำกิจกรรม</th>
      <td><input type="text" name="date"></td>
    </tr>

    <tr>
      <th>รายละเอียด</th>
      <td><input type="text" name="act_detail"></td>
    </tr>
    <input type="hidden" name="status" value="ดำเนินการ">
   
    <tr>
    <td colspan="2">
    <input type="submit" name="submit" value="บันทึกข้อมูล" style="background-color: #fed00d; padding-left: 12px;padding-right: 12px; width:120px; border-width: 0; color:black; border-radius: 7px; margin-left: 82px;">

    </td>
    </tr>
  </table>
</div>

<hr>
</div>




<div class="footer">
ระบบลงชื่อเข้ากิจกรรมพิเศษ
</div>


</body>
</html>
