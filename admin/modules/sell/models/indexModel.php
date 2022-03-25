<?php
function get_list_customer(){
    $result = db_fetch_array("SELECT * FROM `tbl_customer`");
    return $result;
}
function get_list_customer_by_status($status=""){
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_customer`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_customer` WHERE `status`='{$status}'");
    }

    return $result;
}
function check_exist_slider_title($title){
    $check = db_num_rows("SELECT * FROM `tbl_slider` WHERE `slider_title` = '{$title}'");
    if ($check > 0) return true;
    return false;
}
function slug_url_exists($slug){
    $check = db_num_rows("SELECT * FROM `tbl_slider` WHERE `slug` = '{$slug}'");
    if ($check > 0) return true;
    return false;
}
function get_list_slider_by_status($status = ""){
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_slider`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_slider` WHERE `status`='{$status}'");
    }

    return $result;
}
function get_info_slider_by_id($id){
    $result=db_fetch_row("SELECT * FROM `tbl_slider` WHERE `slider_id`='{$id}'");
    return $result;
}
function get_name_status($table,$id,$feild){
    $result = db_fetch_row("SELECT * FROM {$table} WHERE {$feild}={$id}");
    if ($result['status'] == "pending") {
        $status = "Chờ xử lý";
        return $status;
    } elseif ($result['status'] == "shipping") {
        $status = "Đang giao hàng";
        return $status;
    } elseif ($result['status'] == "completed") {
        $status = "Đã nhận hàng";
        return $status;
    }elseif($result['status'] == "cancel"){
        $status = "Hủy ";
        return $status;
    }
}
//phân trang
function get_customer_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}

function Search($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%' OR `phone` LIKE '%{$key}%' OR `order_code` LIKE '%{$key}%' ORDER BY `customer_id` DESC");
    return $result_search;
}
//===========================ORDER====================
function get_list_order(){
    $result = db_fetch_array("SELECT * FROM `tbl_order`");
    return $result;
}
function get_name_customer_by_order_code($code){
    $result = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `order_code`='{$code}'");
    return $result['fullname'];
}
function get_list_order_by_status($status = ""){
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_order`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_order` WHERE `status`='{$status}'");
    }

    return $result;
}
function get_info_order_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_order` WHERE `order_id`='{$id}'");
    return $result;
}
function Search_order($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%' OR `order_code` LIKE '%{$key}%'  ORDER BY `customer_id` DESC");
    return $result_search;
}
function get_info_customer_order_by_order_code($order_code){
    $result = db_fetch_row("SELECT * FROM `tbl_customer` WHERE `order_code`='{$order_code}'");
    return $result;
}
function get_name_payment_method_order($payment){
    if($payment=='payment at home'){
        $result="Thanh toán tại nhà";
        return $result;
    }elseif($payment=='payment at store'){
        $result="Thanh toán tại cửa hàng";
        return $result;
    }
}
function get_list_order_by_order_code($order_code)
{
    $result = db_fetch_array("SELECT * FROM `tbl_order` WHERE `order_code`='{$order_code}'");
    return $result;
}
function get_info_order_by_order_code($order_code){
    $result = db_fetch_row("SELECT * FROM `tbl_order` WHERE `order_code`='{$order_code}'");
    return $result;
}
function get_list_product_order_by_product_id($product_id){
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id`='{$product_id}'");
    return $result;
}