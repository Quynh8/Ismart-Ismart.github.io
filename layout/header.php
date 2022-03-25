<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <base href="<?php echo base_url(""); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/app.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?page=home" title="">Trang chủ</a>
                                    </li>
                                    <!-- <li>
                                        <a href="san-pham.html" title="">Sản phẩm</a>
                                    </li> -->
                                    <li>
                                        <a href="bai-viet.html" title="">Tin tức</a>
                                    </li>
                                    <li>
                                        <a href="gioi-thieu.html" title="">Giới thiệu</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="trang-chu.html" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                           
                            <form method="GET" action="?">
                                <input type="hidden" name="mod" value="search">
                                <input type="hidden" name="action" value="index">
                                <input type="text" name="key" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s" name="sm-s" value="Tìm kiếm">Tìm kiếm</button>
                            </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0359.208.872</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="gio-hang.html" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <?php
                                      $num_order=get_num_order_cat();
                                     if($num_order >0){
                                    ?>
                                     <span id="num-fake"><?php echo $num_order ?></span>
                                    <?php
                                }
                                ?>
                                   
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <a href="gio-hang.html" id="btn-cart" style="color:#fff">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <?php
                                      $num_order=get_num_order_cat();
                                     if($num_order >0){
                                    ?>
                                     <span id="num"><?php echo $num_order ?></span>
                                    <?php
                                }
                                ?>
                                       
                                    </a>
                                   
                                       <?php if(!empty($_SESSION['cart']['buy'])){ 
                                           ?>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php echo $num_order ?> sản phẩm</span> trong giỏ hàng</p>
                                           
                                        <ul class="list-cart">
                                        <?php foreach($_SESSION['cart']['buy'] as $product){
                                               ?>
                                            <li class="clearfix">
                                                <a href="?mod=product&action=detail&id=<?php echo $product['id'] ?>" title="" class="thumb fl-left">
                                                    <img src="<?php echo "admin/". $product['product_thumb'] ?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="?mod=product&action=detail&id=<?php echo $product['id'] ?>" title="" class="product-name"><?php echo $product['product_title'] ?></a>
                                                    <p class="price sub-total-<?php echo $product['id'] ?>"><?php echo currency_format($product['sub_total']) ?></p>
                                                   
                                                    <p class="qty">Số lượng: <span class="qty-<?php echo $product['id'] ?>"><?php echo $product['qty'] ?></span></p>
                                                </div>
                                            </li>
                                            <?php
                                           } ?>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right"><?php echo currency_format(get_total_cart()) ?></p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="gio-hang.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="thanh-toan.html" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                              
                                           <?php
                                       }else {
                                          ?>

                                     <div id="dropdown" style="min-height:100px;">
                                        <p class="desc">Bạn chưa có <span>sản phẩm nào</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"></a>
                                                    <p class="price sub-total-"></p>
                                                    <!-- <p class="qty">Số lượng: <span class="">0</span></p> -->
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng: 0.VNĐ</p>
                                            <p class="price fl-right"></p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="gio-hang.html" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="<?php echo redirect_cart(); ?>" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                          <?php
                                       }
                                       ?>
                                       
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>