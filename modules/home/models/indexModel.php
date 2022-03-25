<?php
// echo "index Model";
function get_list_users(){
    $result=db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id){
    $item=db_fetch_row("SELECT * FROM   `tbl_users` WHERE `user_id`={$id}");
    return $item;
}
function get_list_product_by_cat_id($cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_cat_id`={$cat_id} AND `status`='publish'");
    return $result;
}