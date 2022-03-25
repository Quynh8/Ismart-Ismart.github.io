<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page slider-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm Slider</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo form_error('success'); ?>
                        <label for="title">Tên slider</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value("title"); ?>">
                        <?php echo form_error('title') ?>
                        <label for="title">Link</label>
                        <input type="text" name="slug" id="slug" value="<?php echo set_value("slug"); ?>">
                        <?php echo form_error('slug') ?>
                        <label>Thứ tự</label>
                        <select name="num_order">
                            <option value="">-- Chọn thứ tự slider--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <?php echo form_error('num_order') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=slider&action=upload_img_slider">
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div class="show_error"></div>
                            <div id="show_list_file">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <?php echo form_error('slider_thumb') ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option value="1">Công khai</option>
                            <option value="2">Chờ duyệt</option>
                            <option value="3">Bỏ vào thùng rác</option>
                        </select>
                        <?php echo form_error('status') ?>
                        <button type="submit" name="btn-add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>