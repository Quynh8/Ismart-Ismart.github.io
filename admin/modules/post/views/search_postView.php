<?php get_header() ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="?mod=post&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                       
                        <form method="GET" class="form-s fl-right" >
                            <input type="hidden" name="mod" value="post"> 
                            <input type="hidden" name="action" value="search_post">
                            <input type="text" name="key" id="key" value="<?php if(!empty($_GET['key'])) echo $_GET['key'] ?>">
                            <input type="submit" name="sm_search" value="Tìm kiếm">
                            
                        </form>
                    </div>

                    <form method="POST" action="" class="form-actions">
                        
                        <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                           <?php if(!empty($result_search)){
                               ?>
                               
                               <?php
                               $temp=0;
                               foreach($result_search as $item){
                                   $temp ++;
                                   $name_cat = get_name_cat_by_cat_id($item['post_cat_id']);//lấy ra tên danh mục
                                   ?>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?mod=post&action=edit_post&post_id=<?php echo $item['post_id'] ?>" title=""><?php echo $item['post_title'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=post&action=edit_post&post_id=<?php echo $item['post_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=post&action=delete_post&post_id=<?php echo $item['post_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $name_cat  ?></span></td>
                                    <td><span class="tbody-text"><?php echo show_status("tbl_post","post_id",$item['post_id']); ?></span></td>
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
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title="">
                                <</a> </li> <li>
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
<?php get_footer() ?>