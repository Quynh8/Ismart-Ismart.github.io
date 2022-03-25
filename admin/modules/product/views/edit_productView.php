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
                        <input type="text" name="product_title" id="product-name" value="<?php echo $info_product_by_id['product_title'] ?>">
                        <?php echo form_error('product_title') ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" id="product-code" value="<?php echo $info_product_by_id['code'] ?>">
                        <?php echo form_error('code') ?>
                        <label for="">Nổi bật</label>
                        <input type="checkbox" name="feather" value="<?php echo $info_product_by_id['feather'] ?>" <?php if($info_product_by_id['feather']==1) echo "checked" ?>>
                        <label for="qty">Số lượng</label>
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo $info_product_by_id['price'] ?>">
                        <?php echo form_error('price') ?>
                        <label for="qty">Số lượng</label>
                        <input type="number" min="1" name="qty" id="qty" value="<?php echo $info_product_by_id['qty'] ?>">
                        <?php echo form_error('qty') ?>
                        <label for="">Hình ảnh liên quan</label>
                        <div id="img-relative">
                            <div id="upload_multi">
                                <input type="file" name="images[]" id="file" multiple="" data-uri="?mod=product&action=upload_multi_img">
                                <input type="submit" id="bt_upload" name="bt_upload" value="Upload">
                            </div>
                            <div id="show_list_file_relative">
                            <?php if (!empty($list_relative_img)) {
                                // show_array($list_relative_img);
                                    foreach ($list_relative_img as $item) {
                                ?>
                                        <input type='hidden' name='img_relative[]' value='<?php echo $item['img_relative_thumb'] ?>'>
                                        <img src="<?php echo $item['img_relative_thumb'] ?>">
                                <?php
                                    }
                                } ?>
                              
                            </div>
                        </div>
                        <?php echo form_error('img_relative') ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc"><?php echo $info_product_by_id['product_desc'] ?></textarea>
                        <?php echo form_error('img_relative') ?>
                        <label for="desc">Chi tiết</label>
                        <textarea name="product_content" id="desc" class="ckeditor"><?php echo $info_product_by_id['product_content'] ?></textarea>
                        <?php echo form_error('product_content') ?>
                        <label>Hình ảnh sản phẩm</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=product&action=upload_img_product">
                            <input type="hidden" id="thumbnail_url" name="thumbnail_url" value="<?php echo $info_product_by_id['product_thumb'] ?>">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">
                            <div class="show_error"></div>
                            <div id="show_list_file">
                                <img src="<?php echo $info_product_by_id['product_thumb'] ?>">
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
                               <option <?php if ($info_product_by_id['product_cat_id'] == $item['product_cat_id']) echo "selected" ?> value="<?php echo $item['product_cat_id'] ?>"><?php echo $item['product_cat_title'] ?></option>

                                    
                                <?php
                                } ?>
                            <?php
                            } else {
                            ?>
                                <option value="">Hiện không có danh mục nào</option>
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
                            <option <?php if($info_product_by_id['status'] =="waiting") echo "selected"?> value="waiting">Chờ duyệt</option>
                            <option <?php if($info_product_by_id['status'] =="publish") echo "selected"?> value="publish">Đã đăng</option>
                            <option <?php if($info_product_by_id['status'] =="trash") echo "selected"?> value="trash">Bản nháp</option>
                        </select>
                        <?php echo form_error('status') ?>
                        <label>Tình trạng</label>
                        <select name="tracking">
                            <option  value="">-- Chọn danh mục --</option>
                            <option <?php if($info_product_by_id['tracking']=="stocking") echo "selected" ?> value="stocking">Còn hàng</option>
                            <option <?php if($info_product_by_id['tracking']=="out of stock") echo "selected" ?> value="out of stock">Hết hàng</option>
                        </select>
                        <?php echo form_error('tracking') ?>
                        <button type="submit" name="btn-edit-product" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>