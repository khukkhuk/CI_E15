<!DOCTYPE html>
<html>
<title>User_index</title>
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
<?php
  echo anchor('welcome/show_useract',"กิจกรรมที่เคยทำ");
?>
<h6>รายชื่อกิจกรรม</h6>
<div style="overflow-x:auto;">
<div class="w3-cell-row">
  <table>
    <tr>
      <th>รหัสกิจกรรม</th>
      <th>ชื่อกิจกรรม</th>
      <th>ผู้ดูแล</th>
      <th>จำนวนที่ต้องการ</th>
      <th>จำนวนที่ได้</th>
      <th>วันที่ทำกิจกรรม</th>
      <th>รายละเอียด</th>
      <th colspan="2">manage</th>
    </tr>
<?php
foreach($show as $row){
  ?>
    <tr>
      <td><?php echo $row['act_id']; ?></td>
      <td><?php echo $row['act_name']; ?></td>
      <td><?php echo $row['act_staff']; ?></td>
      <td><?php echo $row['act_want']; ?></td>
      <td><?php echo $row['act_have']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['act_detail']; ?></td>
      <td colspan="2"><?php echo anchor('welcome/user_detail_act/'.$row['act_id'],"รายละเอียด");?></td>
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
