<?php
function get_list_post(){
    $result=db_fetch_array("SELECT * FROM `tbl_post`");
    return $result;
}
function get_page_by_id($id){
    global $list_page;
    if(array_key_exists($id,$list_page)){
        return $list_page[$id];
    }
    return false;
}
function get_info_post_by_id($id){
    $result =db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id`={$id}");
    return $result;
}
function get_post_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}
//sắp xếp sản phẩm
function sort_product_by_sql_product_by($value, $start, $num_per_page, $sql_product_by, $id)
{
    if (empty($value)) {
        $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id} LIMIT {$start},{$num_per_page}");
        return $result;
    } else {
        if ($value == 1) {
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id}  ORDER BY `product_title` ASC LIMIT {$start},{$num_per_page}");
            return $result;
        } elseif ($value == 2) {
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id}  ORDER BY `product_title` DESC LIMIT {$start},{$num_per_page}");
            return $result;
        } elseif ($value == 3) {
            //theo giá
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id}  ORDER BY `price` DESC LIMIT {$start},{$num_per_page}");
            return $result;
        } else {
            //theo giá
            $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `{$sql_product_by}`={$id}  ORDER BY `price` ASC LIMIT {$start},{$num_per_page}");
            return $result;
        }
    }
}