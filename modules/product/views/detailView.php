<?php get_header(); ?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <div style="position:relative;">
                                <img id="zoom" class="zoom"  src="<?php echo "admin/" . $info_product['product_thumb'] ?>" data-zoom-image="<?php echo "admin/" . $info_product['product_thumb'] ?>" />
                            </div>
                        </a>
                        <?php if (!empty($list_img_relative)) {
                        ?>
                            <div id="list-thumb">
                                <?php foreach ($list_img_relative as $item) {
                                ?>
                                    <a href="" data-image="<?php echo "admin/" . $item['img_relative_thumb'] ?>" data-zoom-image="<?php echo "admin/" . $item['img_relative_thumb'] ?>">
                                        <img id="zoom" src="<?php echo "admin/" . $item['img_relative_thumb'] ?>" />
                                    </a>
                                <?php
                                } ?>
                            </div>
                        <?php
                        } ?>

                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo "admin/" . $info_product['product_thumb'] ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $info_product['product_title'] ?></h3>
                        <div class="desc">
                            <?php echo $info_product['product_desc'] ?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status"><?php echo get_name_tracking($info_product['tracking'])  ?></span>
                        </div>
                        <p class="price"><?php echo currency_format($info_product['price']) ?></p>
                        <form action="?" method="GET">
                        <input type="hidden" name="mod" value="cart">
                        <input type="hidden" name="action" value="addCart">
                        <input type="hidden" name="id" value="<?php echo $info_product['product_id'] ?>">
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num_order" data-qty="<?php echo $info_product['qty'] ?>" value="1" min="1" max="10" id="num-order"  >
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <?php if ($info_product['tracking'] =="stocking") {
                            ?>
                                <input type="submit" name="add_cart" value="Thêm giỏ hàng" class="add-cart"></input>
                            <?php
                            } else {
                            ?>
                                <div class="out-of-stock">Hết hàng</div>
                            <?php
                            } ?>
                       
                        </form>
                       
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php echo $info_product['product_content'] ?>
                </div>
            </div>
            <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="UDp9q3Bt"></script>
<div class="fb-comments" data-href="http://localhost/ismart.com/san-pham/chi-tiet/" data-width="885" data-numposts="7"></div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                <ul class="list-item">
                <?php 
                foreach ($list_product_same as $item) {
                    $info_product = get_info_product_by_id($item['product_id']);
                ?>
                    <li class="clearfix">
                        <a href="san-pham/chi-tiet/<?php echo create_slug($info_product['product_title']) ?>-<?php echo $info_product['product_id'] ?>.html" title="" class="thumb fl-left">
                            <img src="<?php echo "admin/" . $info_product['product_thumb'] ?>" alt="">
                        </a>
                        <div class="info fl-right">
                            <a href="san-pham/chi-tiet/<?php echo create_slug($info_product['product_title']) ?>-<?php echo $info_product['product_id'] ?>.html" title="" class="product-name"><?php echo $info_product['product_title'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($info_product['price'], ".VNĐ") ?></span>
                                <!-- <span class="old">7.190.000đ</span> -->
                            </div>
                            <div class="action clearfix">
                                <a href="?mod=cart&action=addCart&id=<?php echo $item['product_id'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="?mod=cart&action=buyNow&id=<?php echo $item['product_id'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>

            </ul>
                </div>
            </div>
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