<?php

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
    $parttern ="/^(09|08|01|07|03|05|[2|6|8|9])+([0-9]{8})$/";
    if (!preg_match($parttern, $_POST['phone']))
    return false;
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
