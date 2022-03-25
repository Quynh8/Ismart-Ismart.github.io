<?php 

function set_value_form($field){
    if(!empty($_POST[$field])) return $_POST[$field];
    return false;
}

// 1. Hàm is_username()
function is_username($username){
    $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($partten,$_POST['username']))
        return false;
    
       
    return true;
}
// 2. Hàm is_password()
function is_password($password){
    $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
  if(!preg_match($parttern,$_POST['password'] ))
    return false;
return true;
}
//hàm is_newPassword
function is_newPassword($password){
    $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
  if(!preg_match($parttern,$_POST['newPass'] ))
    return false;
return true;
}
//hàm is_confirmPassword
function is_confirmPassword($password){
    $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
  if(!preg_match($parttern,$_POST['cofirmPass'] ))
    return false;
return true;
}

// 3. Hàm is_email()
function is_email($email){
    $parttern ="/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if (!preg_match($parttern, $email))
        return false;
        return true;
}
//Hàm is_phoneNumber()
//Biểu thức chính quy số điện thoại
function is_phone_number($phone_number){
    $parttern ="/^(09|03|07|06|08|01|[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($parttern, $_POST['phone_number']))
    return false;
    return true;

}
// Ảnh 
function is_image($file_type, $file_size) {

    $type_allow = array('png', 'jpg', 'gif', 'jpeg');

    if (!in_array(strtolower($file_type), $type_allow)) {
        return false;
    } else {
        if ($file_size > 21000000) {
            return false;
        }
    }
    return true;
}
//4.Hàm form_error()
function form_error($label_field){
    global $error;//ở đây làm cho biến error trở nên toàn cục
    if(!empty($error[$label_field])) 
    return "<p class='error'>{$error[$label_field]}</p>";

    
}
function set_value($label_field){ //$label_field ở đây chỉ là tên trường chứ ko phải biến,vd 'username','password'
    global $$label_field; // muốn nó trở thành biến ta cần thêm $
    if(!empty($$label_field)) return $$label_field;
}

function is_exists($table, $key, $value) {
    $check = db_num_rows("SELECT * FROM `{$table}` WHERE `{$key}` = '{$value}'");
    if ($check > 0) {
        return true;
    }
    return false;
}

function check_role($username) {
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $result['role'];
}

function get_admin_info($username) {
    $result = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$username}'");
    return $result['fullname'];
}