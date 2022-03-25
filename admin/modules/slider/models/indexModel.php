<?php

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