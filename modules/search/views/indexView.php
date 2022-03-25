<?php get_header(); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Tìm kiếm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">BẠN ĐANG TÌM KIẾM VỚI TỪ KHÓA:"<?php echo $key; ?>"</h3>
                    <!-- <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị  trên  sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="sort">
                                    <option value="">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá thấp lên cao</option>
                                    <option value="4">Giá cao xuống thấp</option>
                                </select>
                                <button type="submit" name="btn_sort">Lọc</button>
                            </form>
                        </div>
                    </div> -->
                </div>
               
                <?php if (!empty($result_search)) {
                ?>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php foreach ($result_search as $item) {
                            ?>
                                <li>
                                    <a href="?page=detail_product" title="" class="thumb">
                                        <img src="<?php echo "admin/" . $item['product_thumb'] ?>">
                                    </a>
                                    <a href="?page=detail_product" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price'],".VNĐ") ?></span>
                                        <!-- <span class="old">20.900.000đ</span> -->
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?mod=cart&action=addCart&id=<?php echo $item['product_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?mod=cart&action=buyNow&id=<?php echo $item['product_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                            <?php
                            } ?>

                        </ul>
                    </div>
                <?php

                } else {
                ?>
                    <div class="not-found">
                        <img src="public/images/unnamed.jpg" alt="" style="width:960px;height:500px;">
                        <!-- <p style="text-align:center;">Không tìm thấy sản phẩm nào..</p> -->
                    </div>
                <?php
                } ?>
                
            </div>
            <!-- <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
        <div class="sidebar fl-left">
       <?php 
       get_sidebar('cat'); 
       get_sidebar('banner');
       ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>