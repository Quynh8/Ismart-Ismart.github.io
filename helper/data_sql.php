<?php
//===========MOD HOME==========//

function get_list_product_cat(){
    $result=db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `status`='publish'");
    return $result;
}
function get_list_slider(){
    $result=db_fetch_array("SELECT * FROM `tbl_slider` WHERE `status`='publish'");
    return $result;
}
// function get_list_trademark($id){
//     $result=db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `status`='publish' AND `product_cat_id`={$id}");
//     return $result;
// }
function get_list_trademark($id=""){
    if(empty($id)){
        $result=db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `status`='publish' ");
        return $result;
    }else{
        $result=db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `status`='publish' AND `product_cat_id`={$id}");
        return $result;
    }
}
//hiển thị thông tin sản phẩm theo id
function get_info_product_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id`={$id}");
    return $result;
}
//sản phẩm bán chạy nhất
//Thuật toán:Lấy ra sản phẩm có tổng số lượng mua giảm dần(lấy 8sp)
function get_list_best_sell(){
    $result = db_fetch_array("SELECT `product_id`, SUM(`qty`) AS `order_total` FROM `tbl_order` GROUP BY `product_id` ORDER BY `order_total` DESC LIMIT 8");
    // $result=db_fetch_array("SELECT `product_id`,SUM(`qty`) AS `order_total` FROM `tbl_order` GROUP BY `product_id` ORDER BY `order_total` DESC LIMIT 8");
    return $result;
}
//sản phẩm nổi bật
function get_list_product_feather(){
    $result=db_fetch_array("SELECT * FROM `tbl_product` WHERE `feather`='1' AND `status`='publish' LIMIT 0,10");
    return $result;
}
//hiển thị hãng
function get_list_trademark_product_by_product_cat_id($product_cat_id){
    $result=db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `product_cat_id`='{$product_cat_id}' AND `status`='publish' ");
    return $result;
}
//================CART===================//
//Tổng Số lượng sản phẩm đã mua
function get_num_order_cat(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['num_order'];
    }
}
//Tổng thanh toán
function get_total_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}