<html>

<head>
    <title>Trang đăng nhập </title>
    <link rel="stylesheet" href="public/reset.css" type="text/css">
    <link rel="stylesheet" href="public/style.css" type="text/css">
    <link rel="stylesheet" href="public/login.css" type="text/css">

    <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="public/js/main.js" type="text/javascript"></script>
    <script src="public/js/app.js" type="text/javascript"></script>
</head>

<body>
    <div id="wp-form-login">
        <h1 class="page-title">ĐĂNG KÝ TÀI KHOẢN </h1>
        <form action="" id="form-login" method="POST" enctype="multipart/form-data">
            <?php echo form_error('success'); ?>
            <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname'); ?>" placeholder="Fullname" />
            <?php echo form_error('fullname');  ?>

            <input type="text" name="email" id=email value="<?php echo set_value('email'); ?>" placeholder="Email" />
            <?php echo form_error('email');  ?>

            <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" placeholder="Username" autocomplete="false" />
            <?php echo form_error('username');  ?>

            <input type="password" name="password" id="password" value="" placeholder="Password" autocomplete="false" />
            <?php echo form_error('password');  ?>
            <label style="color:#00f8ff; font-size:23px;">Hình ảnh cá nhân</label>
            <div id="uploadFile"  style="padding:5px">
                <input type="file" name="file" id="upload-thumb" data-uri="?mod=users&action=upload_img_users">
                <input type="hidden" id="avatar" name="avatar" value="">
                <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb" >
                <div class="show_error"></div>
                <div id="show_list_file">
                    <img src="public/images/img-thumb.png">
                </div>
            </div>
            <?php echo form_error('avatar') ?>
            <label for="role"style="color:#00f8ff; font-size:20px">Chọn quyền</label>
            <select name = 'role' style="padding:5px">
                <option value="">--Chọn--</option>
                <option <?php if(!empty($_POST['role']) && $_POST['role'] == '1') echo "selected='selected'"; ?> value="1">1</option>
                <option <?php if(!empty($_POST['role']) && $_POST['role'] == '2') echo "selected='selected'"; ?> value="2">2</option>
                <option <?php if(!empty($_POST['role']) && $_POST['role'] == '3') echo "selected='selected'"; ?> value="3">3</option>
            </select>
            <?php echo form_error('role')?>

            <input type="submit" name="btn-reg" id="btn-reg" value="Đăng Ký" />
            <?php echo form_error('account'); ?>
        </form>
        <a href="<?php echo base_url("?mod=users&action=login"); ?>" id="lost-pass">Đăng Nhập</a>
    </div>
</body>

</html>