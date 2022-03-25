<?php

function construct()
{
    load_model('index');
    // load('lib','validation');
}
function indexAction()
{
    load_view('index');
}


function regAction()
{
    global $error,$fullname,$username,$email,$phone_number,$password,$address,$avatar,$creator,$role ;
    if(isset($_POST['btn-reg'])){
        $error=array();
        
        #chuẩn hóa fullname
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Tên hiển thị không được để trống ";
        }else{
            $fullname=$_POST['fullname'];
        }
         #chuẩn hóa username
         if(empty($_POST['username'])){
            $error['username'] = "Tên đăng nhập không được để trống ";
        }else{
            if(!(strlen($_POST['username']) >=6 && strlen($_POST['username']) <=32)){
                $error['username'] ="Username cần có từ 6 đến 32 ký tự";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username'] ="Tên đăng nhập cho phép sử dụng ký tự,chữ số,dấu chấm,dấu gạch dưới,dấu chấm,đấu gạch dưới,từ 6 đến 32 ký tự";
                }else{
                    $username = $_POST['username'];
                }
            }
        }
        #Chuẩn hóa password
        
         if(empty($_POST['password'])){
            $error['password'] = "Mật khẩu không được để trống ";
        }else{
           if(!is_password($_POST['password'])){
               $error['password'] = "Mật khẩu sử dụng chữ cái số và ký tự đặc biệt bắt đầu bằng chữ cái in hoa và có từ 6 đến 32 kí tự";
           }else{
            $password = md5($_POST['password']);
           }
        }
       #Chuẩn hóa email
       if(empty($_POST['email'])){
        $error['email'] = "Email không được để trống ";
        }
        else{
            if(!is_email($_POST['email'])){
                $error['email']="Email không đúng định dạng";
            }else{
                $email=$_POST['email'];
            }
        }
     #chuẩn hóa address
    //  if(empty($_POST['address'])){
    //     $error['address'] = "Địa chỉ không được để trống ";
    //     }
    //     else{
    //         $address=$_POST['address'];
    //     }
    #chuẩn hóa phone_number
        // if(empty($_POST['phone_number'])){
        //     $error['phone_number'] = "Số điện thoại không được để trống ";
        // }else{
        //    if(!is_phone_number($_POST['phone_number'])){
        //        $error['phone_number'] = "Số điện thoại không đúng định dạng";
        //    }else{
        //     $phone_number = $_POST['phone_number'];
        //    }
        // }
        if(empty($_POST['avatar'])){
            $error['avatar']="<span class='error'>(*) Không được bỏ trống ảnh</span>";
        }else {
            $avatar=$_POST['avatar'];
        }
    // check role
        if (empty($_POST['role'])) {
            $error['role'] = 'Bạn chưa chọn quyền';
        } else {
            $role = $_POST['role'];
        }
        # Kết luận 
        if (empty($error)) {
            if (!user_exists($username, $email)) {
                // $active_token = md5($username . time());
                // $creator =  get_admin_info($fullname);
                $creator=user_login();
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'avatar' => $avatar,
                    'role' => $role,
                    // 'active_token' => $active_token,
                    'create_date' =>date('d-m-Y'),
                    'creator' => $creator,
                );
                
                // show_array();
                add_user($data);
                $error['success'] ="Thêm admin thành công";
                // $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                // $content = "<p>Chào bạn {$fullname}</p>
                // <p>Bạn vui lòng click vào đuòng link này để kích hoạt tài khoản : {$link_active} </p>
                // <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này </p>";
                // send_mail('nguyenquynhhaycuoi@gmail.com', 'Nguyễn Văn Quỳnh', 'Kích hoạt tài khoản', $content);
                // Thông báo 
                //redirect("?mod=users&action=login");
            } else {
                $error['account'] = "Thêm admin không thành công";
            }
        }
    }
    // show_array($_POST);
   
    load_view('reg');
}
//upload nhiều ảnh chi tiết sản phẩm 
// function upload_multi_imgAction(){
//     $result = "";
//     // Số lượng ảnh upload 
//     $num_images = count($_FILES['file']['name']);
//     $target_dir = "public/uploads/products/muli_upload_products/";
//     // Duyệt từng ảnh để upload lên server 
//     for ($i = 0; $i < $num_images; $i++) {
//         $target_file = $target_dir . basename($_FILES['file']['name'][$i]);
//         $name_file   = pathinfo($_FILES['file']['name'][$i], PATHINFO_FILENAME);
//         $exten_file  = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
//         if (file_exists($target_file)) {
//             $name_new = $name_file . " - Copy.";
//             $path_file_new = $target_dir . $name_new . $exten_file;
//             $k = 1;
//             while (file_exists($path_file_new)) {
//                 $name_new = $name_file . " - Copy({$k}).";
//                 $path_file_new = $target_dir . $name_new . $exten_file;
//                 $k++;
//             }
//             $target_file = $path_file_new;
//         }
//         if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
//             // Tạo html hiển thị hình ảnh đã upload 
//             $result .= "<img src=\"{$target_file}\" >";
//             $result .= "<input type='hidden' name='img_relative[]'  value='{$target_file}'>";
//             //    echo "Upload {$i} ok";
//         }
//     }
//     echo $result;
// }

//upload ảnh product ajax

function upload_img_usersAction()
{
    if ($_SERVER['REQUEST_METHOD']) {
        if (!isset($_FILES['file'])) {
            $error['file'] = "Bạn chưa chọn bấc kỳ file ảnh nào";
            $data = array(
                "status" => "error",
                "error" => $error
            );
            echo json_encode($data);
        } else {
            $error = array();
            $target_dir  = "public/images/uploads/admins/";
            $target_file = $target_dir . basename($_FILES['file']['name']);
            // check type file img valid
            $type_file = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
            if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['file'] = "Hệ thống không hỗ trợ file này, vui lòng chọn một file ảnh hợp lệ";
            } else {
                $file_size = $_FILES['file']['size'];
                if ($file_size > 5242880) {
                    $error['file'] = "File bạn chọn không được vược quá 5MB";
                } else {
                    if (file_exists($target_file)) {
                        $get_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                        $name_new = $get_name . " - Copy.";
                        $path_file_new = $target_dir . $name_new . $type_file;
                        $k = 1;
                        while (file_exists($path_file_new)) {
                            $get_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                            $name_new = $get_name . " - Copy({$k}).";
                            $path_file_new = $target_dir . $name_new . $type_file;
                            $k++;
                        }
                        $target_file = $path_file_new;
                    }
                }
            }
            // upload when not error
            if (empty($error)) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    $flag = true;
                    $data = array(
                        "status" => "ok",
                        "file_path" => $target_file
                    );
                } else {
                    $error['file'] = "Upload không thành công";
                    $data = array(
                        "status" => "error",
                        "error" => $error
                    );
                }
            } else {
                $data = array(
                    "status" => "error",
                    "error" => $error
                );
            }
            echo json_encode($data);
        }
    }
}

function loginAction()
{
    global $error,$username,$password;
    if (isset($_COOKIE['is_login'])) {
        $_SESSION['is_login'] = $_COOKIE['is_login'];
        $_SESSION['user_login'] = $_COOKIE['user_login'];
        redirect_to();
        // redirect("?mod=users&action=index");
    } else {
    if(!empty($_POST['btn_login'])){
        $error=array();
         #chuẩn hóa username
         if(empty($_POST['username'])){
            $error['username'] = "Bạn không được để trống tên đăng nhập";
        }else{
            if(!(strlen($_POST['username']) >=6 && strlen($_POST['username']) <=32)){
                $error['username'] ="Username cần có từ 6 đến 32 ký tự";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username'] ="Username cho phép sử dụng ký tự,chữ số,dấu chấm,dấu gạch dưới,dấu chấm,đấu gạch dưới,từ 6 đến 32 ký tự";
                }else{
                    $username = $_POST['username'];
                }
            }
        }
         #chuẩn hóa password
        if(empty($_POST['password'])){
            $error['password'] = "Bạn không được để trống password";
        }else{
           if(!is_password($_POST['password'])){
               $error['password'] = "Password sử dụng chữ cái số và ký tự đặc biệt bắt đầu bằng chữ cái in hoa và có từ 6 đến 32 kí tự";
           }else{
            $password = md5($_POST['password']);
           }
        }

        #Kết luận
        if(empty($error)){
            if(check_login($username,$password)){
                //Lưu thông tin đăng nhập của người dùng
                $_SESSION['is_login']=true;
                $_SESSION['user_login']=$username;
                //Lưu trữ cookie
                if (isset($_POST['remember_me'])){
                    setcookie('user_login', $username, time() +3600);
                    setcookie('is_login', true, time() +3600);
                }
            //Chuyển hướng vào trong hệ thống
            // redirect("?mod=users&action=index");
            redirect_to();
        }else{
            $error['account']="Tài khoản không tồn tại trên hệ thống";
        }
    }
}
}

    load_view('login');
}

// function activeAction()
// {
//     $active_token = $_GET['active_token'];
//     $link_login = base_url("?mod=users&action=login");
//     if (check_active_token($active_token)) {
//         active_user($active_token);
//         echo "Bạn đã kích hoạt thành công, vui lòng click vào link sau để đăng nhập: <a href='{$link_login}'>Kích hoạt</a>";
//     } else {
//         echo "Yêu cầu kích hoạt không hợp lệ hoặc tài khoản đã được kích hoạt trước đó vui lòng click vào link sau để đăng nhập: <a href='{$link_login}'>Đăng Nhập</a>  nếu có!";
//     }
// }


function logoutAction()
{
    global $username;
    session_destroy();
    setcookie('user_login', $username, time() - 3600);
    setcookie('is_login', true, time() - 3600);
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect_to("?mod=users&action=login");
}

function resetAction()
{
    global $oldPass,$newPass,$confirmPass,$error;
    if(isset($_POST['btn-change-pass'])){
    //    show_array($_POST);
        $error=array();
        #chuẩn hóa password
        if(empty($_POST['password'])){
            $error['password'] = "Mật khẩu không được để trống ";
        }else{
           if(!is_password($_POST['password'])){
               $error['password'] = "Mật khẩu sử dụng chữ cái số và ký tự đặc biệt bắt đầu bằng chữ cái in hoa và có từ 6 đến 32 kí tự";
           }else{
            $oldPass = md5($_POST['password']);
           }
        }
         #chuẩn hóa newPassword
         if(empty($_POST['newPass'])){
            $error['newPass'] = "Mật khẩu mới không được để trống ";
        }else{
           if(!is_newPassword($_POST['newPass'])){
               $error['newPass'] = "Mật khẩu sử dụng chữ cái số và ký tự đặc biệt bắt đầu bằng chữ cái in hoa và có từ 6 đến 32 kí tự";
           }else{
            $newPass = md5($_POST['newPass']);
           }
        }
         #chuẩn hóa confirmPassword
         if(empty($_POST['cofirmPass'])){
            $error['cofirmPass'] = "Xác nhận mật khẩu mới không được để trống ";
        }else{
           if(!is_confirmPassword($_POST['cofirmPass'])){
               $error['cofirmPass'] = "Mật khẩu sử dụng chữ cái số và ký tự đặc biệt bắt đầu bằng chữ cái in hoa và có từ 6 đến 32 kí tự";
           }else{
            $confirmPass = md5($_POST['cofirmPass']);
           }
        }
        if(empty($error)){
           //kiểm tra mật khẩu cũ có tồn tại hay ko
           if(check_oldPass($oldPass,user_login())){
               //tiến hành kiểm tra xem mật khẩu mới và nhập lại mk có trùng nhau hay ko
               if(check_newPass_and_confirmPass($newPass,$confirmPass)){
                    $data=array(
                        'password'=>$newPass
                    );
                    update_newPass(user_login(),$data);
                    $error['success']="Cập nhật mật khẩu thành công";
               }else{
                   $error['success']="Yêu cầu nhập mật khẩu mới và xác nhận mật khẩu mới phải trùng nhau";
               }
           }else{
            $error['success']="Mật khẩu không tồn tại";
           }
        }
    }
    $info_user=get_user_by_username(user_login());
    // show_array($info_user);
    //chuyển dữ liệu qua view
    $data['info_user']=$info_user;
    load_view('reset',$data);
}

function updateAction(){
    global $error,$username,$email,$phone_number,$password,$address,$fullname;

    if(isset($_POST['btn-update'])){
        // show_array($_POST);
        $error = array();
        // fullname
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Không được để trống tên hiển thị";
        }else{
            $fullname=$_POST['fullname'];
        }
        // username
        if(empty($_POST['username'])){
            $error['username'] = "Không được để trống tên đăng nhập";
        }else{
            if(!(strlen($_POST['username']) >=6 && strlen($_POST['username']) <=32)){
                $error['username'] ="Tên đăng nhập cần có từ 6 đến 32 ký tự";
            }else{
                if(!is_username($_POST['username'])){
                    $error['username'] ="Tên đăng nhập cho phép sử dụng ký tự,chữ số,dấu chấm,dấu gạch dưới,dấu chấm,đấu gạch dưới,từ 6 đến 32 ký tự";
                }else{
                    $username = $_POST['username'];
                }
            }
        }
        #Chuẩn hóa email
       if(empty($_POST['email'])){
        $error['email'] = "Email không được để trống";
        }
        else{
            if(!is_email($_POST['email'])){
                $error['email']="Email không đúng định dạng";
            }else{
                $email=$_POST['email'];
            }
        }
        #chuẩn hóa address
        if(empty($_POST['address'])){
            $error['address'] = "Địa chỉ không được để trống ";
        }
        else{
            $address=$_POST['address'];
        }
        #chuẩn hóa phone_number
        if(empty($_POST['phone_number'])){
            $error['phone_number'] = "Bạn không được để trống số điện thoại";
        }else{
        if(!is_phone_number($_POST['phone_number'])){
            $error['phone_number'] = "Số điện thoại không đúng định dạng";
        }else{
            $phone_number = $_POST['phone_number'];
        }
        }
        //anh
        if(empty($_POST['avatar'])){
            $error['avatar']="<span class='error'>(*) Không được bỏ trống ảnh</span>";
        }else {
            $avatar=$_POST['avatar'];
        }
        if(empty($error)){
            $data=array(
                'fullname'=>$fullname,
                'username'=>$username,
                'email'=>$email,
                'avatar'=>$avatar,
                'phone_number'=>$phone_number,
                'address'=>$address
            );
            // show_array($data);
            // db_update("tbl_users",$data);
            update_user_login(user_login(),$data);
            $error['success'] ="Cập nhật thành công";
        }else{
            $error['account']="Cập nhật thất bại";
        }

    }
    $info_user= get_user_by_username(user_login());
    // show_array($info_user);
    //chuyển dữ liệu qua view
    $data['info_user']=$info_user;
    load_view('update',$data);

}

    ///xóa tài khoản
function deleteAction(){
        // delete_admin(user_login());
        $user_id = $_GET['user_id'];
        delete($user_id);
        // xoa user va anh
        // $user_id = (int)$_GET['user_id'];
        // db_delete("`tbl_users`", "`user_id`={$user_id}");
        redirect_to("?mod=users&action=index");
}
