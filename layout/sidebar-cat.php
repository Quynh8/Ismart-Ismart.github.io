
       <?php $list_product_cat=get_list_product_cat(); ?>    
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                <?php
                if (!empty($list_product_cat)) {
            ?>
                <ul class="list-item">
                    <?php foreach ($list_product_cat as $item) {
                        $list_trademark = get_list_trademark($item['product_cat_id']);
                    ?>
                        <li>
                        <a href="san-pham/danh-muc/<?php echo create_slug($item['product_cat_title']) ?>-<?php echo $item['product_cat_id'] ?>.html" title=""><?php echo $item['product_cat_title'] ?></a>
                            <?php
                            if (!empty($list_trademark)) {
                            ?>
                                <ul class="sub-menu">
                                    <?php foreach ($list_trademark as $item) {
                                    ?>
                                        <li>
                                        <a href="san-pham/thuong-hieu/<?php echo create_slug($item['trademark_title']) ?>-<?php echo $item['trademark_id'] ?>.html" title=""><?php echo $item['trademark_title'] ?></a>
                                        </li>
                                    <?php
                                    } ?>
                                </ul>
                            <?php
                            }
                            ?>

                        </li>
                    <?php
                    } ?>

                </ul>
            <?php
            }

            ?>

                    
                </div>
            </div>
           
            
        