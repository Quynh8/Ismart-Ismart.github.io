<?php


//==========================POST_CAT======================
//hàm lấy ra danh mục bài viết
function get_list_cat()
{
    $result = db_fetch_array("SELECT * FROM `tbl_post_cat`");
    return $result;
}
function add_cat($data)
{
    db_insert("tbl_post_cat", $data);
}
function check_post_cat_title($cat_title)
{
    $result = db_num_rows("SELECT * FROM `tbl_post_cat` WHERE `post_cat_title`='{$cat_title}'");
    if ($result > 0)
        return true;
    return false;
}
function add_post($data)
{
    db_insert("tbl_post", $data);
}
function get_info_cat_by_id($id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `post_cat_id`={$id}");
    return $result;
}
//=============================POST=====================
// ====== ADD POST ======//
# check post title exists
function title_post_exists($post_title){
    $check = db_num_rows("SELECT * FROM `tbl_post` WHERE `post_title` = '{$post_title}'");
    if ($check > 0) return true;
    return false;
}
#check slug_url_exists
function slug_url_exists($friendly_url){
    $check = db_num_rows("SELECT * FROM `tbl_post` WHERE `post_url` = '{$friendly_url}'");
    if ($check > 0) return true;
    return false;
}
function get_list_post()
{
    $result = db_fetch_array("SELECT *FROM `tbl_post`");
    return $result;
}
// function get_name_cat_by_cat_id($cat_id)
// {
//     $result = db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `post_cat_id` ='{$cat_id}'");
//     return $result['post_cat_title'];
// }
//hàm lấy ra thông tin bài viết dựa theo post_id
function get_info_post_by_post_id($post_id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_post` WHERE `post_id`={$post_id}");
    return $result;
}
function update_post($data, $post_id)
{
    db_update("tbl_post", $data, "`post_id`={$post_id}");
}
function get_list_post_by_status($status = "")
{
    if (empty($status)) {
        $result = db_fetch_array("SELECT * FROM `tbl_post`");
    } else {
        $result = db_fetch_array("SELECT * FROM `tbl_post` WHERE `status`='{$status}'");
    }

    return $result;
}
//hàm lấy ra tên danh mục dựa vào post_cat_id
function get_name_cat_by_cat_id($cat_id){
    $result = db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `post_cat_id`='{$cat_id}'");
    return $result['post_cat_title'];
}
//hàm search
function Search($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%'  ORDER BY `post_id` DESC");
    return $result_search;
}
//phân trang
function get_post_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}