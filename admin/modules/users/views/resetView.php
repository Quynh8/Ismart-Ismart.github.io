<?php get_header(); ?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=reg" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
    <?php get_sidebar('users'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo form_error('success'); ?>
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="password" id="pass-old">
                        <?php echo form_error('password'); ?>
                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="newPass" id="pass-new">
                        <?php echo form_error('newPass'); ?>
                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="cofirmPass" id="confirm-pass">
                        <?php echo form_error('cofirmPass'); ?>
                        <button type="submit" name="btn-change-pass" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>