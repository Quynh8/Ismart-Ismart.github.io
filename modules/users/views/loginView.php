<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="public/reset.css">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/login.css">
</head>
<body>
    <div id="wp-form-login">
    <h1 class="login-title">Đăng nhập</h1>
        <form action="" method="POST" id="form-login">
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username');  ?>">
            <?php echo form_error('username'); ?>
            <input type="password" name="password" id="password" placeholder="Password" value="">
            <?php echo form_error('password'); ?>
            <input type="checkbox" name="remember_me" id="remember_me"><label for="remember_me" class="remember_me">Ghi nhớ đăng nhập</label>
            <input type="submit" value="Đăng nhập" name="btn_login" id="btn_login">
            <?php echo form_error('account'); ?>
        </form>
      
        
    </div>
</body>