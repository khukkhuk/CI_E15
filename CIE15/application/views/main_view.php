
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application/views/Style_login.css">
<body>
<div class="container">
<?php echo form_open('welcome/chk_login'); ?>
    <form action="">
      <h1>ระบบลงชื่อเข้ากิจกรรมพิเศษ</h1>
        <input type="text" placeholder="Username" required="" name="username" />
        <input type="password" placeholder="Password" required="" name="password" />
        <input type="submit" value="Log in" />
        <a href="#">ลืมรหัสผ่าน ?</a>
        <a href="#">ลงทะเบียนเข้าใช้งานระบบ</a>
    </form><!-- form -->
</div><!-- container -->
</body>