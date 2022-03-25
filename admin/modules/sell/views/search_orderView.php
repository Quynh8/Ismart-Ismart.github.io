<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=sell&action=index">Tất cả <span class="count">(<?php echo count($result_search) ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=sell&action=list_pending">Chờ xác nhận <span class="count">(<?php echo count(get_list_customer_by_status('pending')) ?>)</span></a> |</li>
                            <li class="shipping"><a href="?mod=sell&action=list_shipping">Đang giao<span class="count">(<?php echo count(get_list_customer_by_status('shipping')) ?>)</span> |</a></li>
                            <li class="completed"><a href="?mod=sell&action=list_completed">Đã nhận hàng<span class="count">(<?php echo count(get_list_customer_by_status('completed')) ?>)</span></a></li>
                            <li class="cancel"><a href="?mod=sell&action=list_cancel">Hủy<span class="count">(<?php echo count(get_list_customer_by_status('cancel')) ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right" >
                            <input type="hidden" name="mod" value="sell"> 
                            <input type="hidden" name="action" value="search_order">
                            <input type="text" name="key" id="key" value="<?php echo $key ?>">
                            <input type="submit" name="sm_search" value="Tìm kiếm">
                            
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="pending">Chờ xác nhận</option>
                                <option value="shipping">Đang giao</option>
                                <option value="completed">Đã nhận hàng</option>
                                <option value="cancel">Hủy</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                            <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td><span class="thead-text">STT</span></td>
                                            <td><span class="thead-text">Mã đơn hàng</span></td>
                                            <td><span class="thead-text">Họ và tên</span></td>
                                            <td><span class="thead-text">Số sản phẩm</span></td>
                                            <td><span class="thead-text">Tổng giá</span></td>
                                            <td><span class="thead-text">Trạng thái</span></td>
                                            <td><span class="thead-text">Thời gian</span></td>
                                            <td><span class="thead-text">Chi tiết</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($result_search)){
                               ?>
                               
                               <?php
                               $temp=0;
                               foreach($result_search as $item){
                                   $temp ++;
                                   ?>
                            <tbody>
                            <tr>
                                                <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $item['order_code'] ?>"></td>
                                                <td><span class="tbody-text"><?php echo $temp ?></span>
                                                <td><span class="tbody-text"><?php echo $item['order_code'] ?></span>
                                                <td>
                                                    <div class="tb-title fl-left">
                                                        <a href="?mod=sell&action=detail_order&order_code=<?php echo $item['order_code'] ?>" title=""><?php echo $item['fullname'] ?></a>
                                                    </div>
                                                    <ul class="list-operation fl-right">
                                                        <li><a href="?mod=sell&action=update_order&id=<?php echo $item['customer_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                        <li><a href="?mod=sell&action=delete_order&id=<?php echo $item['customer_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </td>
                                                <td><span class="tbody-text"><?php echo $item['num_order'] ?></span></td>
                                                <td><span class="tbody-text"><?php echo currency_format($item['total'], ".VNĐ") ?></span></td>
                                                <td><span class="tbody-text status-<?php echo $item['status'] ?>"><?php echo get_name_status("tbl_customer","customer_id",$item['customer_id']) ?></span></td>
                                                <td><span class="tbody-text"><?php echo  $item['time'] ?></span></td>
                                                <td><a href="?mod=sell&action=detail_order&order_code=<?php echo $item['order_code'] ?>" title="" class="tbody-text">Chi tiết</a></td>
                                            </tr>
                            </tbody>
                            <?php
                               } 
                               
                    
                           } ?>
                        </table>
                    </div>
                        </form>
                    </div>
                   
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>