<?php get_header() ?>
<style>
    #show_list_file {
        width: 200px;
        height: 200px;
        overflow: hidden;
    }

    #show_list_file img {
        max-width: 100%;
        max-height: 100%;
    }
</style>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                         <?php echo form_error('success') ?>
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="title" value="<?php echo set_value("post_title"); ?>">
                        <?php echo form_error('post_title') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" va>
                        <?php
                                    if (!empty(form_error("slug"))) {
                                        echo form_error("slug");
                                    } else {
                                    ?>
                                        <span class="note">(*) Nếu không chọn mặc định sẽ là <strong>Tiêu đề bài viết</strong></span>
                                    <?php
                                    }
                                    ?>
                        <!-- <span>*Nếu không viết link thân thiện sẽ tự động là tiêu đề</span> -->
                        <label for="desc">Mô tả bài viết</label>
                        <textarea name="post_desc" id="desc" class=""><?php echo set_value("post_desc") ?></textarea>
                        <?php echo form_error("post_desc"); ?>
                        <label for="desc">Nội dung bài viết</label>
                        <textarea name="post_content" id="desc" class="ckeditor"><?php echo set_value("post_content") ?></textarea>
                        <?php echo form_error('post_content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=post&action=upload_img_post">
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div class="show_error"></div>
                            <div id="show_list_file">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <?php echo form_error("post_thumb") ?>
                        <label>Danh mục cha</label>
                        
                        <select name="parent_cat">
                            <?php if (!empty($list_post_cat)) {
                            ?>
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($list_post_cat as $list_post_cat_item) {
                                ?>
                                    <option <?php if (set_value_form("parent_cat") == $list_post_cat_item['post_cat_id']) {
                                                echo "selected";
                                            } ?> value="<?php echo $list_post_cat_item['post_cat_id'] ?>"><?php echo $list_post_cat_item['post_cat_title'] ?></option>
                                <?php
                                } ?>

                            <?php
                            } else {
                            ?>
                                <option value="">Hiện tại không có danh mục nào</option>
                            <?php
                            } ?>

                        </select>
                        <?php echo form_error("parent_cat") ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đã đăng</option>
                        </select>
                        <?php echo form_error("status") ?>
                        <button type="submit" name="btn_add" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>