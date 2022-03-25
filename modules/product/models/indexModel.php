<?php

function get_list_product(){
    $result=db_fetch_array("SELECT * FROM `tbl_product`");
    return $result;
}
function get_page_by_id($id){
    global $list_page;
    if(array_key_exists($id,$list_page)){
        return $list_page[$id];
    }
    return false;
}

function get_post_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}
function get_name_tracking($tracking){
    if($tracking=="stocking"){
       return $result="Còn hàng";
    }elseif($tracking=="out of stock"){
        return $result="Hết hàng";
    }
}
function get_list_img_relative_product($id){
    $result=db_fetch_array("SELECT * FROM `tbl_img_relative_product` WHERE `product_id`={$id}");
    return $result;
}
function get_list_product_by_product_cat($id){
    $result=db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_cat_id`={$id} AND `status`='publish'");
    return $result;
}
function get_list_product_by_trademark_product($id){
    $result=db_fetch_array("SELECT * FROM `tbl_product` WHERE `trademark_id`={$id} AND `status`='publish'");
    return $result;
}
function get_info_cat_by_id($table, $sql_product_by, $id)
{
    $result = db_fetch_row("SELECT * FROM `{$table}` WHERE `{$sql_product_by}`={$id}  ");
    return $result;
}
function show_cat_title($type = "")
{

    if ($type == "product_cat") {
        return 'product_cat_title';
    } else {
        return 'trademark_title';
    }
}
function get_num_product()
{
    $result = db_num_rows("SELECT * FROM `tbl_product`");
    return $result;
}
//sản phẩm cùng chuyên mục
function get_list_product_same($cat_id, $id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_cat_id`={$cat_id} AND `status`='publish' AND NOT `product_id`={$id}");
    return $result;
}
function get_total_row_by_sql_product_by($sql_product_by, $id)
{
    $result = db_num_rows("SELECT * FROM `tbl_product` WHERE `$sql_product_by`={$id} ");
    return $result;
}
function get_list_product_by_sql_product_by($status, $start, $num_per_page, $sql_product_by, $id)
{
    if (!empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='{$status}' LIMIT {$start},{$num_per_page} ");
        return $result;
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND LIMIT {$start},{$num_per_page} ");
        return $result;
    }
}
//sắp xếp sản phẩm
function sort_product_by_sql_product_by($value, $start, $num_per_page, $sql_product_by, $id)
{
    if (empty($value)) {
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='publish' LIMIT {$start},{$num_per_page}");
        return $result;
    } else {
        if ($value == 1) {
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='publish'  ORDER BY `product_title` ASC LIMIT {$start},{$num_per_page}");
            return $result;
        } elseif ($value == 2) {
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='publish' ORDER BY `product_title` DESC LIMIT {$start},{$num_per_page}");
            return $result;
        } elseif ($value == 3) {
            //theo giá
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='publish' ORDER BY `price` ASC LIMIT {$start},{$num_per_page}");
            return $result;
        } else {
            //theo giá
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} AND `status`='publish' ORDER BY `price` DESC LIMIT {$start},{$num_per_page}");
            return $result;
        }
    }
}
//Lọc sản phẩm theo mức giá
function  get_list_product_by_filter($id, $sql, $value){
    if($value==0){
        $result=db_fetch_array("SELECT * FROM `tbl_product`  WHERE `{$sql}`={$id} AND `status`='publish'");
        return $result;
    }elseif($value==1){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql}`={$id} AND `price` < 500000 AND `status`='publish'");
        return $result;
    }elseif($value==2){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql}`={$id} AND `price` > 500000 AND `price` < 1000000 AND `status`='publish'");
        return $result;
    }elseif($value==3){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql}`={$id} AND `price` > 1000000 AND `price` < 5000000 AND `status`='publish'");
        return $result;
    }elseif($value==4){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql}`={$id} AND `price` > 5000000 AND `price` < 10000000 AND `status`='publish'");
        return $result;
    }elseif($value==5){
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql}`={$id} AND `price` > 10000000 AND `status`='publish'");
        return $result;
    }
    
   
}