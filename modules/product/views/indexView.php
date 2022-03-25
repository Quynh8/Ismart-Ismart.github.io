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
                        <a href="" title=""><?php echo $info_cat[show_cat_title($type)] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content product-ajax fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc"></p>
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
                    </div>
                </div>
                <div class="section-detail">
                <?php 
                    if(!empty($list_product)){
                       ?>
                    <ul class="list-item clearfix">    
                        <?php foreach($list_product as $item){
                            ?>
                        <li>
                            <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="thumb">
                                <img src="<?php echo "admin/" . $item['product_thumb'] ?>">
                            </a>
                            <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currency_format($item['price']) ?></span>
                                <span class="old"><?php echo currency_format($item['price']) ?></span>
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
                       <?php
                    }else{
                        ?>
                        <div class="not-found">
                        <img src="public/images/unnamed.jpg" alt="" style="width:960px;height:500px;">
                        <!-- <p style="text-align:center;">Không tìm thấy sản phẩm nào..</p> -->
                         </div>
                        
                        <?php
                    }
                ?>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                <?php echo get_pagging_product($num_page,$page, "?mod=product&action=index&type={$type}&id={$id}"); ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
       <?php 
       get_sidebar('cat'); 
       get_sidebar('filter');
       get_sidebar('banner');
       ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>