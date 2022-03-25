<?php get_header() ?>

<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar() ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách nhân viên</h3>
                    <a href="?mod=users&action=reg" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?">Tất cả <span class="count">(<?php echo count(get_list_users()) ?>)</span></a> |</li>
                           
                        </ul>

                    </div>

                    <form method="POST" action="" class="form-actions">
                        <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Tên đăng nhập</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Phone</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                </tr>
                            </thead>
                           <?php if(!empty(get_list_users())){
                               ?>
                               
                               <?php
                               $t=0;
                               foreach(get_list_users() as $item){
                                   $t ++;
                                //    $name_cat = get_name_cat_by_cat_id($item['post_cat_id']);//lấy ra tên danh mục
                                   ?>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $item['user_id'] ?>"></td>
                                    <td><span class="tbody-text"><?php echo $t; ?></h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="?mod=users&action=update&user_id=<?php echo $item['user_id'] ?>" title=""><?php echo $item['fullname'] ?></a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="?mod=users&action=update&user_id=<?php echo $item['user_id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="?mod=users&action=delete&user_id=<?php echo $item['user_id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text"><?php echo $item['username']  ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['email'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo $item['phone_number'] ?></span></td>
                                    <td><span class="tbody-text"><?php echo ($item['address']); ?></span></td>
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
    // echo get_pagging($num_page,$page,"?mod=post&action=index")
   ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>