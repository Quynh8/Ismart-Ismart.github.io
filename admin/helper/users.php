<?php

// Kiểm tra is_login,trả về true nếu đã login
function is_login(){
    if(isset($_SESSION['is_login'])){
        return true;
    }
    return false;
}
//Kiểm tra userlogin,trả về username khi người dùng login thành công
function user_login(){
   if(!empty($_SESSION['user_login'])){
       return $_SESSION['user_login'];

   }
   return false;
}
//Ở đây hàm array_key_exists() là hàm kiểm tra xem 1 khóa có tồn tại trong ds mảng ko
function info_user($field){
    global $list_users;
    foreach($list_users as $user){
        if($_SESSION['user_login'] == $user['username']){
            if(array_key_exists($field,$user)){
                return $user[$field];
            }
        }

    }
    return false;
    
}

function get_info_account($data){
    $info = db_fetch_row("SELECT `$data` FROM `tbl_users` WHERE `username` = '{$_SESSION['user_login']}'");
    if(!empty($info)) return $info[$data];
    return false;
}