<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application/views/Style.css">
</head>
<body>

<h2>SHOW DATA</h2>

<?php echo anchor('welcome/add', 'adddata');
?>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>message</th>
    <th colspan="2">manage</th>
  </tr>
  <?php
foreach ($rs as $r) {
  ?>
  <tr>
    <td><?php echo $r['id']; ?></td>
    <td><?php echo $r['name']; ?></td>
    <td><?php echo $r['email']; ?></td>
    <td><?php echo $r['phone']; ?></td>
    <td><?php echo $r['message']; ?></td>
    <td><?= anchor ('welcome/edit/'.$r['id'],"edit")?></td>
    <?php /* <td><a href="edit/<?php echo $r['id'];?>">edit</a></td> */?>
    <td><?= anchor ('welcome/del/'.$r['id'],"del",array("onclick"=>"javascript:return confirm('?');")); ?> </td>
  </tr>
  <?php
  };
  ?>
</table>

</body>
</html>
