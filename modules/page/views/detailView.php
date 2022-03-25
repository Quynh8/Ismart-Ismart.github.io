<?php get_header(); ?>
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giới thiệu</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-gioi-thieu-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $item['page_title'] ?></h3>
                </div>
                <div class="section-detail">
                    <img src="<?php echo $item['page_thumb'] ?>" alt="">
                    <div class="detail">
                        <p><strong><?php echo $item['page_desc'] ?></strong></p>
                        <?php echo $item['page_content'] ?>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
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