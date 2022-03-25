<?php get_header(); ?>
</div>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                <?php echo form_error('success'); ?>
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="page_title" id="title" value="<?php echo set_value('page_title'); ?>">
                        <?php echo form_error('page_title'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="friendly_url" id="slug" value="<?php echo set_value('friendly_url'); ?>" >
                        <?php
                                    if (!empty(form_error("friendly_url"))) {
                                        echo form_error("friendly_url");
                                    } else {
                                    ?>
                                        <span class="note">(*) Nếu không chọn mặc định sẽ là <strong>Tiêu đề bài viết</strong></span>
                                    <?php
                                    }
                                    ?>
                        <label for="desc">Mô tả</label>
                        <textarea name="page_desc" id="desc" class=""><?php echo set_value('page_desc'); ?></textarea>
                        <?php echo form_error('page_desc'); ?>
                        <label for="desc">Nội dung</label>
                        <textarea name="page_content" id="desc" class="ckeditor"><?php echo set_value('page_content'); ?></textarea>
                        <?php echo form_error('page_content'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=page&action=upload_img_page">
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div class="show_error"></div>
                            <div id="show_list_file">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <?php echo form_error("page_thumb") ?>
                        <button type="submit" name="btn-add-page" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>