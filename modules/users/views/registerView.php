<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng ký</title>
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/login.css">
    <link rel="stylesheet" href="public/reponsive.css">
</head>
<body>
    <div id="wp-form-login">
    <h1 class="login-title">Đăng ký</h1>
        <form action="" method="POST" id="form-login">
        
        
            <input type="text" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo set_value('fullname');  ?>">
            <?php echo form_error('fullname'); ?>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo set_value('email');  ?>">
            <?php echo form_error('email'); ?>
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username');  ?>">
            <?php echo form_error('username'); ?>
            <input type="password" name="password" id="password" placeholder="Password" value="">
            <?php echo form_error('password'); ?>
           
            <input type="submit" value="Đăng kí" name="btn-reg" id="btn-reg">
            <?php echo form_error('account'); ?>
           <a href="?mod=users&action=login">Đăng nhập</a>
        </form>
       
    </div>
</body>
