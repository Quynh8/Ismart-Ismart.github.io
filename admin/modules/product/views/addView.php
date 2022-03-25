<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
<style>
    #show_list_file_relative img{
        max-height: 200px;
		/* height: auto; */
        width:200px;
    }
</style>
    <div class="wrap clearfix">
      <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo form_error('success'); ?>
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_title" id="product-name" value="<?php echo set_value("product_title"); ?>">
                        <?php echo form_error('product_title') ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" id="product-code" value="<?php echo set_value("code"); ?>">
                        <?php echo form_error('code') ?>
                        <label for="">Nổi bật</label>
                        <input type="checkbox" name="feather" value="1">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value("price"); ?>">
                        <?php echo form_error('price') ?>
                        <label for="qty">Số lượng</label>
                        <input type="number" min="1" name="qty" id="qty" value="1">
                        <?php echo form_error('qty') ?>
                        <label for="">Hình ảnh liên quan</label>
                        <div id="img-relative">
                            <div id="upload_multi">
                                <input type="file" name="images[]" id="file" multiple="" data-uri="?mod=product&action=upload_multi_img">
                                <input type="submit" id="bt_upload" name="bt_upload" value="Upload">
                            </div>
                            <div id="show_list_file_relative">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <?php echo form_error('img_relative') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc"><?php echo set_value("product_desc"); ?></textarea>
                        <?php echo form_error('img_relative') ?>
                        <label for="desc">Chi tiết</label>
                        <textarea name="product_content" id="desc" class="ckeditor"><?php echo set_value("product_content"); ?></textarea>
                        <?php echo form_error('product_content') ?>
                        <label>Hình ảnh sản phẩm</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=product&action=upload_img_product">
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div class="show_error"></div>
                            <div id="show_list_file">
                                <img src="public/images/img-thumb.png">
                            </div>
                        </div>
                        <?php echo form_error('thumbnail_url') ?>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_id" id="product_cat" data-uri="?mod=product&action=load_trademark">
                        <?php if (isset($list_product_cat)) {
                            ?>
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($list_product_cat as $item) {
                                ?>
                                <option <?php if (set_value_form("parent_id") == $item['product_cat_id']) {
                                                echo "selected";
                                            } ?> value="<?php echo $item['product_cat_id'] ?>"><?php echo $item['product_cat_title'] ?></option>

                                    
                                <?php
                                } ?>
                            <?php
                            } else {
                            ?>
                                <option value="">Hiện không có thứ tự nào</option>
                            <?php
                            } ?>
                        </select>
                        <?php echo form_error('parent_id') ?>
                        <label>Danh mục thương hiệu </label>
                        <select name="trademark_id" id="trademark">
                        <option value="">-- Chọn danh mục --</option>
                        </select>
                        <?php echo form_error('trademark_id') ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="waiting">Chờ duyệt</option>
                            <option value="publish">Đã đăng</option>
                            <option value="trash">Bản nháp</option>
                        </select>
                        <?php echo form_error('status') ?>
                        <label>Tình trạng</label>
                        <select name="tracking">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="stocking">Còn hàng</option>
                            <option value="out of stock">Hết hàng</option>
                        </select>
                        <?php echo form_error('tracking') ?>
                        <button type="submit" name="btn-add-product" id="btn-submit">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>