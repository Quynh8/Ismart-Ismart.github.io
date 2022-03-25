<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail"><?php echo $info_customer_order['order_code'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $info_customer_order['address'] ?> / <?php echo $info_customer_order['phone'] ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php echo get_name_payment_method_order($info_customer_order['payment_method']) ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                            <option <?php if ($info_customer_order['status'] == "pending") echo "selected" ?> value='pending'>Đang chờ xác nhận </option>
                                <option <?php if ($info_customer_order['status'] == "shipping") echo "selected" ?> value='shipping'>Đang vận chuyển</option>
                                <option <?php if ($info_customer_order['status'] == "completed") echo "selected" ?> value='completed'>Đã nhận hàng</option>
                                <option <?php if ($info_customer_order['status'] == "cancel") echo "selected" ?> value='cancel'>Hủy</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $t = 0;
                            // show_array($list_product_order);
                            foreach ($list_product_order as $item) {
                                $t++;
                            ?>
                                <tr>
                                    <td class="thead-text"><?php echo $t ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $item['product_title'] ?></td>
                                    <td class="thead-text"><?php echo currency_format($item['price'], ".VNĐ") ?></td>
                                    <td class="thead-text"><?php echo $item['qty_order'] ?></td>
                                    <td class="thead-text"><?php echo currency_format($item['sub_total'], ".VNĐ") ?></td>
                                </tr>
                            <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                        <span class="total-fee"><?php echo $info_customer_order['num_order'] ?> sản phẩm</span>
                            <span class="total"><?php echo currency_format($info_customer_order['total'], ".VNĐ") ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>