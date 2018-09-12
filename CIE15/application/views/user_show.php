<!DOCTYPE html>
<html>
<title>ShowUser</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url(); ?>/application/views/Style.css">

<body>

<?php echo form_open('welcome/user_show'); ?>
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
<?php
  echo anchor('welcome/user_addview',"เพิ่มผู้ใช้");
?>
<hr>
<h6>จัดการผู้เข้าใช้</h6>
<div style="overflow-x:auto;">
<div class="w3-cell-row">
  <table>
    <tr>
      <th>id</th>
      <th>username</th>
      <th>password</th>
      <th>ชื่อจริง</th>
      <th>นามสกุล</th>
      <th>แผนก</th>
      <th>ระดับชั้น</th>
      <th colspan="2">จัดการ</th>
    </tr>

<?php
foreach($show as $row)
{
?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['password']; ?></td>
      <td><?php echo $row['user_fname']; ?></td>
      <td><?php echo $row['user_lname']; ?></td>
      <td><?php echo $row['user_depart']; ?></td>
      <td><?php echo $row['user_level']; ?></td>
      <td><?php echo anchor('welcome/admin_editshow/'.$row['id'],"แก้ไข");?></td><td><?php echo anchor('welcome/user_del/'.$row['id'],"ลบ");?></td>
    </tr>
<?php
}
?>
  </table>
</div>
</div>

<hr>
</div>




<div class="footer">
ระบบลงชื่อเข้ากิจกรรมพิเศษ
</div>


</body>
</html>
