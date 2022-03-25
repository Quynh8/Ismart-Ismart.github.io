<?php
//check product_cat_title()
function check_product_cat_title($product_cat_title){
    $check = db_num_rows("SELECT * FROM `tbl_product_cat` WHERE `product_cat_title` = '{$product_cat_title}'");
    if ($check > 0) return true;
    return false;
}
//check product_title
function title_product_exists($product_title){
    $check = db_num_rows("SELECT * FROM `tbl_product` WHERE `product_title` = '{$product_title}'");
    if ($check > 0) return true;
    return false;
}
function check_code_product_exists($code){
    $check = db_num_rows("SELECT * FROM `tbl_product` WHERE `code` = '{$code}'");
    if ($check > 0) return true;
    return false;
}
//lấy ra danh sách danh mục của sản phẩm
function get_list_product_cat(){
    $result=db_fetch_array("SELECT * FROM `tbl_product_cat`");
    return $result;
}
//lấy ra danh sách thương hiệu
function get_list_trademark_by_id($id){
    $result=db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `product_cat_id`='{$id}'");
    return $result;
}
//get list product
function get_list_product(){
    $result=db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}
//hàm lấy ra tên danh mục sản phẩm
function get_name_cat_by_cat_id($cat_id){
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `product_cat_id`='{$cat_id}'");
    return $result['product_cat_title'];
}
//hàm lấy ra thông tin sản phẩm dựa theo id
function get_info_product_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `product_id`='{$id}'");
    return $result;
}
//hàm lấy ra thông tin danh mục dựa theo id
function get_info_product_cat_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `product_cat_id`='{$id}'");
    return $result;
}
//hàm lấy ra danh sách các hình ảnh liên quan
function get_list_relative_img($id){
    $result=db_fetch_array("SELECT * FROM `tbl_img_relative_product` WHERE `product_id`='{$id}'");
    return $result;
}
//hàm search
function Search($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%' OR `code` LIKE '%{$key}%'  ORDER BY `product_id` DESC");
    return $result_search;
}
//hàm search danh mục
function Search_cat($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%'  ORDER BY `product_cat_id` DESC");
    return $result_search;
}
function get_list_product_by_status($status = "")
{
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_product`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `status`='{$status}'");
    }

    return $result;
}
function get_list_product_cat_by_status($status = "")
{
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_product_cat`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_product_cat` WHERE `status`='{$status}'");
    }

    return $result;
}
//hàm get list_trademark
function get_list_trademark($id = "")
{
    if (empty($id)) {
        $result = db_fetch_array("SELECT * FROM `tbl_trademark`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_trademark` WHERE `trademark_id`='{$id}'");
    }

    return $result;
}
function check_trademark_product($trademark_title){
    $check = db_num_rows("SELECT * FROM `tbl_trademark` WHERE `trademark_title` = '{$trademark_title}'");
    if ($check > 0) return true;
    return false;
}
function get_info_trademark_by_id($id){
    $result = db_fetch_row("SELECT * FROM `tbl_trademark` WHERE `trademark_id`='{$id}'");
    return $result;
}
//get_product_by_pagging
// function get_product_by_pagging($start=1,$num_per_page=20,$where=""){
//     if(!empty($where)){
//         $where="WHERE {$where}";
//     }
//     $result=db_fetch_array("SELECT * FROM `tbl_product` {$where} LIMIT {$start},{$num_per_page}");
//     return $result;
// }
function get_product_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}
