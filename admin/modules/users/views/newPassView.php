<html>

<head>
    <title>Thiết lập mật khẩu mới</title>
    <link rel="stylesheet" href="public/css/reset.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.css" type="text/css">
    <link rel="stylesheet" href="public/css/login.css" type="text/css">
</head>

<body>
    <div id="wp-form-login">
        <h1 class="page-title">MẬT KHẨU MỚI</h1>
        <form action="" id="form-login" method="POST">
            <input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" placeholder="Password" autocomplete="false" />
            <?php echo form_error('password');  ?>

            <input type="submit" name="btn-new-pass" id="btn-reset" value="LƯU MẬT KHẨU" />
            
            <?php echo form_error('account'); ?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=login"); ?>" id="lost-pass">Đăng nhập</a> |
        <a href="<?php echo base_url("?mod=users&action=reg"); ?>" id="lost-pass">Đăng Ký</a>
    </div>
</body>

</html>