
<title>Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application/views/Style_login.css">
<body>
<div class="container">
<?php echo form_open('welcome/chk_login'); ?>
    <form action="">
        <input class="input-user" type="text" placeholder="Username" required="" name="username" />
        <input class="input-pass" type="password" placeholder="Password" required="" name="password" />
        <input class="btn-login" type="submit" value="เข้าสู่ระบบ" />
        <div class="link-reg"><?php echo anchor('welcome/regis',"ลงทะเบียนเข้าใช้งานระบบ",array("style"=>"color:white")) ?>
        </div>
    </form><!-- form -->
</div><!-- container -->
</body>