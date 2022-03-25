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
                    <h3 id="index" class="fl-left">Cập nhật bài viết</h3>
                    
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                    <?php echo form_error('success') ?>
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="post_title" id="title" value="<?php echo $info_post_by_post_id['post_title'] ?>">
                        <?php echo form_error('post_title') ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug" value="<?php echo $info_post_by_post_id['post_url'] ?>">
                        <!-- <span>*Nếu không viết link thân thiện sẽ tự động là tiêu đề</span> -->
                        <label for="desc">Mô tả bài viết</label>
                        <textarea name="post_desc" id="desc" class=""><?php echo $info_post_by_post_id['post_desc'] ?></textarea>
                        <?php echo form_error("post_desc"); ?>
                        <label for="desc">Nội dung bài viết</label>
                        <textarea name="post_content" id="desc" class="ckeditor"><?php echo $info_post_by_post_id['post_content'] ?></textarea>
                        <?php echo form_error('post_content') ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=post&action=upload_img_post" >
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="<?php echo $info_post_by_post_id['post_thumb'] ?>">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div id="show_list_file">
                                <img src="<?php echo $info_post_by_post_id['post_thumb'] ?>"> 
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
                                    <option <?php if ($info_post_by_post_id['post_cat_id'] == $list_post_cat_item['post_cat_id']) {
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
                            <option value="">-- Chọn trạng thái --</option>
                            <option <?php if($info_post_by_post_id['status'] =="publish") echo "selected"?> value="publish">Hoạt động</option>
                            <option <?php if($info_post_by_post_id['status'] =="waiting") echo "selected"?> value="waiting">Chờ xác nhận</option>
                        </select>
                        <button type="submit" name="btn_edit" id="btn-submit">Cập nhật bài viết</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>