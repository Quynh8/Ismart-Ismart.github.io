<?php get_header(); ?>
<form action="?mod=cart&action=update" method="POST">
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php 
                if(!empty($_SESSION['cart']['buy'])){
                    ?>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <?php 
                        foreach($_SESSION['cart']['buy'] as $product){
                            $info_product=get_info_product_by_id($product['id']);
                            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $product['code'] ?></td>
                                <td>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['id'] ?>" title="" class="thumb">
                                        <img src="<?php echo "admin/". $product['product_thumb'] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="?mod=product&action=detail&id=<?php echo $product['id'] ?>" title="" class="name-product"><?php echo $product['product_title'] ?></a>
                                </td>
                                <td><?php echo currency_format($product['price']) ?></td>
                                <td>
                                <input type="number" data-id="<?php echo $product['id'] ?>" min="1" max="<?php echo $info_product['qty'] ?>" name="qty[<?php echo $product['id']; ?>]" value="<?php echo $product['qty'] ?>" class="num-order">
                                </td>
                                <td id="sub-total-<?php echo $product['id'] ?>"><?php echo currency_format($product['sub_total']) ?></td>
                                <td>
                                    <a href="?mod=cart&action=delete&id=<?php echo $product['id'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            
                        </tbody>
                        
                        <?php
                        }
                        ?>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format(get_total_cart()) ?></span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                            <a href="?mod=cart&action=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="trang-chu.html" title="" id="buy-more">Mua tiếp</a><br/>
                    <a href="?mod=cart&action=delete" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
        </div>
        <?php
                }else{
                    ?>
                    <div id="empty_cart">
                    <p class="empty">Không có sản phẩm nào trong giỏ hàng!Click <a href="trang-chu.html">vào đây</a>để quay lại trang chủ  </p>
                    </div>
                
                    <?php
                }
            ?>
    </div>
</form>

<?php get_footer(); ?>