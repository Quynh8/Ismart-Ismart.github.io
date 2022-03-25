<div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                <ul class="list-item">
                <?php $list_best_sell = get_list_best_sell();
                foreach ($list_best_sell as $item) {
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
                            <a href="?mod=cart&action=buyNow&id=<?php echo $info_product['product_id'] ?>" title="" class="buy-now">Mua ngay</a>
                        </div>
                    </li>
                <?php
                }
                ?>

            </ul>
                </div>
            </div>