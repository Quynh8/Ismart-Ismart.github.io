<?php get_header(); ?>
<div id="wrapper" class="wp-inner clearfix">
    <p class='success'>Chúc mừng bạn đã đặt hàng thành công!</p>
    <div class="info">
    <p>Mã đơn hàng: <strong><?php echo $order_code; ?></strong> </p>
    <p>Vui lòng kiểm tra <a href="https://mail.google.com/" target="blank">email</a> để xem thông tin chi tiết đơn hàng.Cám ơn bạn đã cho chúng tôi cơ hội được phục vụ.</p>
    <p>Hotline: <strong> 0859.128.666</strong></p>
    <p>Bấm vào <a href="?">đây</a>để quay lại trang chủ</p>
    </div>
    
</div>

<?php get_footer(); ?>
<style>
p.success{
    font-size: 50px;
    color: #27ae60;
    margin-top: 80px;
    text-align:center;
}
.info{
    margin-top:50px;
}
.info p{
    font-size: 20px;
    line-height: 1.5;
}
</style>