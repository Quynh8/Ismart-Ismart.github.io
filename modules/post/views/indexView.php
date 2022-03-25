<?php get_header(); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Tin tức</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Tin tức</h3>
                </div>
                <div class="section-detail">
                <?php if(!empty($list_post)){
                               ?>
                               
                               <?php
                               foreach($list_post as $item){
                                   ?>
                    <ul class="list-item">
                        <li class="clearfix">
                            <a href="bai-viet/chi-tiet/<?php echo create_slug($item['post_title']) ?>-<?php echo $item['post_id'] ?>.html" title="" class="thumb fl-left">
                                <img src="<?php echo "admin/" . $item['post_thumb'] ?>" alt="" value="<?php echo $item['post_thumb'] ?>">
                            </a>
                            <div class="info fl-right">
                                <a href="bai-viet/chi-tiet/<?php echo create_slug($item['post_title']) ?>-<?php echo $item['post_id'] ?>.html" title="" class="title"><?php echo $item['post_title'] ?></a>
                                <span class="create-date"><?php echo $item['created_date'] ?></span>
                                <p class="desc"><?php echo $item['post_desc'] ?></p>
                            </div>
                        </li>
                    </ul>
                    <?php
                               } 
                               
                           } ?>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                <?php 
   //Cần truyền vào hàm tổng số trang,trang hiện tại và đường dẫn mặc định
    echo get_pagging($num_page,$page,"?mod=post&action=index")
   ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
       <?php 
    //    get_sidebar('cat'); 
       get_sidebar('selling');
       get_sidebar('banner');
       ?>
      </div>
    </div>
</div>
<?php get_footer(); ?>