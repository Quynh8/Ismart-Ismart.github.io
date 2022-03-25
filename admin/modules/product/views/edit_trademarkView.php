<?php get_header() ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <?php echo form_error('add_success') ?>
                        <label for="title">Tên thương hiệu</label>
                        <input type="text" name="cat_title" id="title" value="<?php echo  $info_trademark['trademark_title'] ?>">
                        <?php echo form_error("cat_title") ?>
                        <label>Danh mục thương hiệu sản phẩm</label>
                        <select name="parent_id">
                            <?php if (!empty($list_product_cat)) {
                            ?>
                                <option value="">-- Chọn danh mục --</option>
                                <?php foreach ($list_product_cat as $item) {
                                ?>
                                    <option <?php if (  $info_trademark['product_cat_id'] == $item['product_cat_id']) {
                                                echo "selected";
                                            } ?> value="<?php echo $item['product_cat_id'] ?>"><?php echo $item['product_cat_title'] ?></option>
                                <?php
                                } ?>

                            <?php
                            } else {
                            ?>
                                <option value="">Hiện tại không có danh mục nào</option>
                            <?php
                            } ?>

                        </select>
                        <?php echo form_error('parent_id') ?>
                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="">-- Chọn trạng thái --</option>
                            <option <?php if($info_trademark['status'] =="publish") echo "selected"?> value="publish">Hoạt động</option>
                            <option <?php if($info_trademark['status'] =="waiting") echo "selected"?> value="waiting">Chờ xác nhận</option>
                            <option <?php if($info_trademark['status'] =="trash") echo "selected"?> value="trasg">Thùng rác</option>
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