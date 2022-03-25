<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=sell&action=list_customer">Tất cả <span class="count">(<?php echo $num_rows ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right" >
                            <input type="hidden" name="mod" value="sell"> 
                            <input type="hidden" name="action" value="search_customer">
                            <input type="text" name="key" id="key">
                            <input type="submit" name="sm_search" value="Tìm kiếm">
                            
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="trash">Xóa</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                            <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Hình thức thanh toán</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($list_customer)){
                               ?>
                               
                               <?php
                               $temp=$start;
                               foreach($list_customer as $item){
                                   $temp ++;
                                   ?>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $item['customer_id'] ?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="?mod=sell&action=list_customer" title=""><?php echo $item['fullname'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=sell&action=list_customer" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=sell&action=delete_customer&id=<?php echo $item['customer_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['phone'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['email'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['address'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['time'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo get_name_payment_method_order($item['payment_method'])?></span></td>
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
                    <?php 
   //Cần truyền vào hàm tổng số trang,trang hiện tại và đường dẫn mặc định
    echo get_pagging($num_page,$page,"?mod=sell&action=list_customer")
   ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>