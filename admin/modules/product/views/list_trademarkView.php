<?php get_header() ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách thương hiệu sản phẩm</h3>
                    <a href="?mod=product&controller=trademark_product&action=add_trademark" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=product&controller=product_cat&action=index">Tất cả <span class="count">(<?php echo count(get_list_product_cat_by_status()) ?>)</span></a> |</li>
                            <li class="publish"><a href="?mod=product&controller=product_cat&action=index">Đã đăng <span class="count">(<?php echo count(get_list_product_cat_by_status('publish')) ?>)</span></a> |</li>
                            <li class="pending"><a href="?mod=product&controller=product_cat&action=index">Chờ xét duyệt <span class="count">(<?php echo count(get_list_product_cat_by_status('waiting')) ?>)</span></a></li>
                            <li class="trash"><a href="?mod=product&controller=product_cat&action=index">Thùng rác <span class="count">(<?php echo count(get_list_product_cat_by_status('trash')) ?>)</span></a></li>
                        </ul>
                       
                    </div>

                    <form method="POST" action="" class="form-actions">
                        <div class="actions">
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <option value="publish">Duyệt</option>
                                <option value="waiting">Tạm gỡ, chỉnh sửa</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                                
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </div>
                        <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên thương hiệu</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                           <?php if(!empty($list_trademark)){
                               ?>
                               
                               <?php
                               $temp=$start;
                               foreach($list_trademark as $item){
                                   $temp ++;
                                   $name_cat = get_name_cat_by_cat_id($item['product_cat_id']);//lấy ra tên danh mục
                                   ?>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $item['trademark_id'] ?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?mod=product&controller=trademark_product&action=edit_trademark&trademark_id=<?php echo $item['trademark_id'] ?>" title=""><?php echo $item['trademark_title'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=product&controller=trademark_product&action=edit_trademark&trademark_id=<?php echo $item['trademark_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=product&controller=trademark_product&action=delete_trademark&trademark_id=<?php echo $item['trademark_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                   
                                    <td><span class="tbody-text"><?php echo show_status("tbl_trademark","trademark_id",$item['trademark_id']); ?></span></td>
                                    <td><span class="tbody-text"><?php echo $name_cat ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['creator'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo ($item['created_date']); ?></span></td>
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
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                <?php 
   //Cần truyền vào hàm tổng số trang,trang hiện tại và đường dẫn mặc định
    echo get_pagging($num_page,$page,"?mod=product&controller=trademark_product&action=index")
   ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>