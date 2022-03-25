<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa danh mục bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <?php echo form_error('add_success') ?>
                        <input type="text" name="cat_title" id="title" value="<?php echo $info_cat['product_cat_title'] ?>">
                        <?php echo form_error("cat_title") ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option <?php if($info_cat['status'] =="publish") echo "selected"?> value="publish">Hoạt động</option>
                            <option <?php if($info_cat['status'] =="waiting") echo "selected"?> value="waiting">Chờ xác nhận</option>
                        </select>
                        <?php echo form_error("status") ?>
                        <button type="submit" name="btn_edit" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>