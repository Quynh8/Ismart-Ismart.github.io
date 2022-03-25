<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page list-slider">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách slider</h3>
                    <a href="?mod=slider&action=add_slider" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($list_slider)  ?>)</span></a> |</li>
                            <li class="publish"><a href="">Đã đăng <span class="count">(<?php echo count(get_list_slider_by_status('publish')) ?>)</span></a> |</li>
                            <li class="waiting"><a href="">Chờ xét duyệt<span class="count">(<?php echo count(get_list_slider_by_status('waiting'))  ?>)</span></a></li>
                            <li class="trash"><a href="">Thùng rác<span class="count">(<?php echo count(get_list_slider_by_status('trash'))  ?>)</span></a></li>
                        </ul>
                        <form method="GET" class="form-s fl-right" >
                            <input type="hidden" name="mod" value="slider"> 
                            <input type="hidden" name="action" value="search_slider">
                            <input type="text" name="key" id="key">
                            <input type="submit" name="sm_search" value="Tìm kiếm">
                            
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="0">Tác vụ</option>
                                <option value="publish">Công khai</option>
                                <option value="waiting">Chờ duyệt</option>
                                <option value="trash">Bỏ vào thủng rác</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                            <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Hình ảnh</span></td>
                                    <td><span class="thead-text">Link</span></td>
                                    <td><span class="thead-text">Thứ tự</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <?php if(!empty($list_slider)){
                               ?>
                               
                               <?php
                               $temp=0;
                               foreach($list_slider as $item){
                                   $temp ++;
                                   ?>
                            <tbody>
                            <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $item['slider_id'] ?>"></td>
                                    <td><span class="tbody-text"><?php echo $temp ?></h3></span>
                                    <td>
                                        <div class="tbody-thumb">
                                            <img src="<?php echo $item['slider_thumb'] ?>" alt="">
                                        </div>
                                    </td>
                                    
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?mod=slider&action=edit_slider&id=<?php echo $item['slider_id'] ?>" title=""><?php echo $item['slug'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=slider&action=edit_slider&id=<?php echo $item['slider_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=slider&action=delete_slider&id=<?php echo $item['slider_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['num_order'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['status'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['creator'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['created_date'] ?></span></td>
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