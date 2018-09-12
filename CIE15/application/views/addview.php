<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application/views/Style.css">
</head>
<body>

<h2>ADD DATA</h2>

<?php
echo anchor('welcome/show', 'showdata');
echo form_open('welcome/add');
?>
<table>
  <tr>
    <th>Name</th>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
	<th>Email</th>
    <td><input type="text" name="email"></td>
  </tr>
  <tr>
	<th>Phone</th>
    <td><input type="text" name="phone"></td>
  </tr>
  <tr>
	<th>Message</th>
    <td><input type="text" name="message"></td>
  </tr>
  <tr>
  	<th>  <input type="reset" name="btnsave" value="Cancel"></th>
  	<td>  <input type="submit" name="btnsave" value="Save"></td>

  <?php
echo form_close();
?>
</table>

</body>
</html>