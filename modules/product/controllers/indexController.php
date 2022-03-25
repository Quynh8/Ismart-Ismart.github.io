

<?php

function construct() {

    load_model('index');
    
    
}

function indexAction() {
    $id=(int)$_GET['id'];
    $type=$_GET['type'];
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $num_per_page = 6;
    //num_page, $total_row
     $start = ($page - 1) * $num_per_page;
    if($type=="product_cat"){
        if(isset($_POST['btn_sort'])){
            $value=$_POST['sort'];
            $sql_product_by="product_cat_id";
            $list_product = sort_product_by_sql_product_by($value, $start, $num_per_page, $sql_product_by, $id);
            $info_cat=get_info_cat_by_id("tbl_product_cat",$sql_product_by,$id);
            $total_row = get_total_row_by_sql_product_by($sql_product_by, $id);
            $num_page = ceil($total_row / $num_per_page);
        }else {
            $sql_product_by = "product_cat_id";
            $list_product=get_list_product_by_sql_product_by("publish", $start, $num_per_page, $sql_product_by, $id);
            $info_cat = get_info_cat_by_id("tbl_product_cat", $sql_product_by, $id);
            $total_row = get_total_row_by_sql_product_by($sql_product_by, $id);
            $num_page = ceil($total_row / $num_per_page);
        }
        // $list_product=get_list_product_by_product_cat($id);
    }else {
        if (isset($_POST['btn_sort'])) {
            $value = $_POST['sort'];
            $sql_product_by = "trademark_id";
            $list_product = sort_product_by_sql_product_by($value, $start, $num_per_page, $sql_product_by, $id);
            $info_cat=get_info_cat_by_id("tbl_trademark",$sql_product_by,$id);
            $total_row = get_total_row_by_sql_product_by($sql_product_by, $id);
            $num_page = ceil($total_row / $num_per_page);
        } else {
            $sql_product_by = "trademark_id";
            $list_product=get_list_product_by_sql_product_by("publish", $start, $num_per_page, $sql_product_by, $id);
            $info_cat = get_info_cat_by_id("tbl_trademark", $sql_product_by, $id);
            $total_row = get_total_row_by_sql_product_by($sql_product_by, $id);
            $num_page = ceil($total_row / $num_per_page);
        }
    }
    
   
    $data=array(
        'list_product'=>$list_product,
        'type'=>$type,
        'id'=>$id,
        'info_cat'=>$info_cat,
        'page'=>$page,
        'num_page'=>$num_page
        
    );
    load_view('index',$data);
   
}

function detailAction(){
    $id=(int)$_GET['id'];
    $list_product_cat=get_list_product_cat();
    // echo $id;
    $info_product=get_info_product_by_id($id);
    //sản phẩm cùng chuyên mục
    $list_product_same=get_list_product_same($info_product['product_cat_id'],$id);
    // show_array($list_product_same);
    $list_img_relative=get_list_img_relative_product($id);
    //xử lý sản phẩm cùng chuyên mục
    //thuật toán lấy ra các sản phẩm có cùng product_id
    $data['info_product']=$info_product;
    $data['list_product_cat']=$list_product_cat;
    $data['list_img_relative']=$list_img_relative;
    $data['list_product_same']=$list_product_same;
    load_view('detail',$data);
}
function filter_productAction()
{
    $type=$_POST['type'];
    $id=$_POST['id'];
    $value=$_POST['val_filter'];
    if($type=="product_cat"){
        $sql="product_cat_id";
        $list_product= get_list_product_by_filter($id, $sql, $value);
        
    }else{
        $sql="trademark_id";
        $list_product= get_list_product_by_filter($id, $sql, $value);
    }
    

    ?>
    <div class="section" id="list-product-wp">
    <div class="section-head clearfix">
    <div class="section product-ajax" id="list-product-wp">
        <h3 class="section-title fl-left"></h3>
        <div class="filter-wp fl-right">
            <p class="desc">Hiển thị sản phẩm</p>
            <div class="form-filter">
                <form method="POST" action="">
                    <select name="sort">
                        <option value="">Sắp xếp</option>
                        <option value="1">Từ A-Z</option>
                        <option value="2">Từ Z-A</option>
                        <option value="3">Giá cao xuống thấp</option>
                        <option value="4">Giá thấp lên cao</option>
                    </select>
                    <button type="submit" name="btn_sort">Lọc</button>
                </form>
            </div>
        </div>
    </div>
    <div class="section-detail">
        <?php if (!empty($list_product)) {
        ?>
            <ul class="list-item clearfix">
                <?php foreach ($list_product as $item) {
                ?>
                    <li>
                        <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="thumb">
                            <img src="<?php echo "admin/" . $item['product_thumb'];  ?>">
                        </a>
                        <a href="san-pham/chi-tiet/<?php echo create_slug($item['product_title']) ?>-<?php echo $item['product_id'] ?>.html" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                        <div class="price">
                            <span class="new"><?php echo currency_format($item['price']) ?></span>
                            <!-- <span class="old">20.900.000đ</span> -->
                        </div>
                        <div class="action clearfix">
                            <a href="?mod=cart&action=addCart&id=<?php echo $item['product_id'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="?mod=cart&action=buyNow&id=<?php echo $item['product_id'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>
                <?php
                } ?>

            </ul>
        <?php
        } else {
        ?>
                        <div class="not-found">
                        <img src="public/images/unnamed.jpg" alt="" style="width:960px;height:500px;">
                        <!-- <p style="text-align:center;">Không tìm thấy sản phẩm nào..</p> -->
                         </div>
        <?php
        } ?>
    </div>
    </div>
  
<?php
}
?>