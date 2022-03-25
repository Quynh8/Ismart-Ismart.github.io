<?php
get_header();
?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <?php foreach ($list_slider as $item) {
                    ?>
                        <div class="item">
                            <img src="<?php echo "admin/" . $item['slider_thumb'] ?>" alt="">
                        </div>
                    <?php
                    } ?>

                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                <ul class="list-item">
                <?php $list_product_feather= get_list_product_feather();
                foreach ($list_product_feather as $item) {
                    // $info_product = get_info_product_by_id($item['product_id']);
                ?>
                    <li>
                            <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="thumb">
                                <img src="<?php echo "admin/" . $item['product_thumb'] ?>">
                            </a>
                            <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price'], ".VNĐ") ?></span>
                                <!-- <span class="old">22.900.000đ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=addCart&id=<?php echo $item['product_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buyNow&id=<?php echo $item['product_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                <?php
                }
                ?>

            </ul>
                </div>
            </div>
            <?php $list_product_cat=get_list_product_cat(); ?>
            <?php foreach ($list_product_cat as $item) {
                $list_product = get_list_product_by_cat_id( $item['product_cat_id']);
                // show_array($list_product);
            ?>
                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title"><?php if (!empty($list_product_cat)) echo $item['product_cat_title'] ?></h3>
                    </div>
                    <div class="section-detail">
                        <?php if (!empty($list_product)) {
                        ?>
                            <ul class="list-item clearfix">
                                <?php foreach ($list_product as $item) {
                                ?>
                                    <li>
                                        <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="thumb">
                                            <img src="<?php echo "admin/" . $item['product_thumb'] ?>">
                                        </a>
                                        <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                        <div class="price">
                                            <span class="new"><?php echo currency_format($item['price'], '.VNĐ') ?></span>
                                            <!-- <span class="old">8.990.000đđ</span> -->
                                        </div>
                                        <div class="action clearfix">
                                            <a href="?mod=cart&action=addCart&id=<?php echo $item['product_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                            <a href="?mod=cart&action=buyNow&id=<?php echo $item['product_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                        </div>
                                    </li>
                                <?php
                                } ?>

                            </ul>
                        <?php
                        }  ?>

                    </div>
                </div>
            <?php
            } ?>


        </div>
        <div class="sidebar fl-left">
       <?php 
       get_sidebar('cat'); 
       get_sidebar('selling');
       get_sidebar('banner');
       ?>
      </div>
    </div>
</div>
<?php

//show_array($list_users);
get_footer();
?>