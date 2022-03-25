<?php 


?>
<?php
//cập nhật lại mk cho user
function  update_newPass($username,$data){
    return db_update('tbl_users',$data,"`username`='{$username}'");
}
//tiến hành kiểm tra xem mật khẩu mới và nhập lại mk có trùng nhau hay ko
function check_newPass_and_confirmPass($newPass,$confirmPass){
    if($newPass==$confirmPass)
        return true;
    return false;
}
//hàm kiểm tra MK cũ có tồn tại trên hệ thống ko
function check_oldPass($oldPass,$username){
    $check=db_num_rows("SELECT * FROM `tbl_users` WHERE `password`='{$oldPass}' and `username`='{$username}'");
        if($check>0)
            return true;
        return false;
}
function get_user_by_username($username)
{
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username`='{$username}'");
    if (!empty($result))
        return $result;
}
function  update_user_login($username,$data){
    return db_update('tbl_users',$data,"`username`='{$username}'");
}


function check_login($username,$password){
    $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' and `password`='{$password}'");
    // echo $check_user;
    if($check_user>0)
        return true;
    return false;
}

function add_user($data){
    return db_insert('tbl_users',$data);
}

function user_exists($username,$email){
    $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `email`='{$email}' or `username`='{$username}'");
    echo $check_user;
    if($check_user>0)
        return true;
    return false;
}

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}


function delete_user_reg($reg_date,$now){
    $reg_date=db_fetch_row("SELECT `reg_date` FROM `tbl_users`WHERE `active_token`='{$active_token}' ");
    $now = time(); // or your date as well
  
    $datediff = $now - $reg_date;
    if( round($datediff / (60 * 60 * 24)) >86400)
        return true;
    return false;
    // echo round($datediff / (60 * 60 * 24));

}