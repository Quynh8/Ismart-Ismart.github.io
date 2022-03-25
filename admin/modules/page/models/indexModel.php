<?php
//==== LIST PAGE CATE ====//
#get list page cat
function get_list_page_cat($status)
{
    if ($status == 'all') {
        $list_postCat = db_fetch_array("SELECT * FROM `tbl_postcat`");
    } else if ($status == "all_not_trash") {
        $list_postCat = db_fetch_array("SELECT * FROM `tbl_postcat` WHERE `status` != 'trash'");
    } else {
        $list_postCat = db_fetch_array("SELECT * FROM `tbl_postcat` WHERE `status` = '{$status}'");
    }
    return $list_postCat;
}
// ====== ADD POST ======//
# check post title exists
function title_page_exists($page_title){
    $check = db_num_rows("SELECT * FROM `tbl_page` WHERE `page_title` = '{$page_title}'");
    if ($check > 0) return true;
    return false;
}
#check slug_url_exists
function slug_url_exists($friendly_url){
    $check = db_num_rows("SELECT * FROM `tbl_page` WHERE `page_friendly_url` = '{$friendly_url}'");
    if ($check > 0) return true;
    return false;
}
//add page
function add_page($data){
    db_insert('tbl_page',$data);
}
//đếm tổng số bài viết
function count_total_page(){
    $check = db_num_rows("SELECT * FROM `tbl_page` ");
    return $check;
}
//lấy ra danh sách bài viết
function get_list_page(){
    $result=db_fetch_array("SELECT * FROM `tbl_page`");
    return $result;
}
//lấy ra ds bài viết dựa theo kết quả tìm kiếm
function get_list_page_by_result_search(){
    $result=db_fetch_rows(db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%' ORDER BY `page_id` DESC"));
    return $result;
}
//hàm hiển thị thời gian
function show_time($timestamp=""){
    $format = "%H:%M:%S %d-%B-%Y";
    return $strTime = strftime($format, $timestamp );
}
//search
function Search($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}` LIKE '%{$key}%' ORDER BY `page_id` DESC");
    return $result_search;
}
//phân trang
function get_page_by_pagging($start=1,$num_per_page=20,$table,$where=""){
    if(!empty($where)){
        $where="WHERE {$where}";
    }
    $result=db_fetch_array("SELECT * FROM `{$table}` {$where} LIMIT {$start},{$num_per_page}");
    return $result;
}