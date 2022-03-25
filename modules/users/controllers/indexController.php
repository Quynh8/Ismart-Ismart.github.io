

<?php

function construct() {
load_model('index');
  
    
    
}

function indexAction() {
    
   
}
function registerAction(){
    global $error,$username,$password,$email,$fullname;
    // echo send_mail('hailongsport2020@gmail.com','Hải Long Sport(Chuyên thời trang nam)','Kích hoạt tài khoản PHP Master','Xác thực tài khoản tại đây',"<a href=''>Kích hoạt tài khoản</a>");
    if(isset($_POST['btn-reg'])){
        $error=array();
        #Chuẩn hóa full name
        if(empty($_POST['fullname'])){
            $error['fullname'] = "Bạn không được để trống họ và tên";
        }
        else{
            $fullname=$_POST['fullname'];
        }
        #Chuẩn hóa email
        if(empty($_POST['email'])){
            $error['email'] = "Bạn không được để trống email";
        }
        else{
            if(!is_email($_POST['email'])){
                $error['email']="Email không đúng định dạng";
            }else{
                $email=$_POST['email'];
            }
        }
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
            //Kiểm tra tài khoản xem có tồn tại trên hệ thống chưa
           
                //Nếu tk mà chưa tồn tại trên hệ thống thì đăng ký thành công,dữ liệu sẽ được lưu lại trên DB
                $data=array(
                    'fullname'=>$fullname,
                    'email'=>$email,
                    'username'=>$username,
                    'password'=>$password
                  
                    
                );
                 //Tiến hành thêm dl vào DB
                 db_insert("tbl_users",$data);
                //  add_user($data);
                 
                //  $link_active=base_url("?mod=users&action=active&active_token={$active_token}");
                //  $content="<p>Chào bạn {$fullname}</p>
                //  <p>Bạn vui lòng click vào đường link này để kích hoạt tài khoản:{$link_active}</p>
                //  <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này</p>
                //  <p>TeamSupport Hải Long Sport </p>";

                //  send_mail('hailongsport2020@gmail.com','Hải Long Sport(Chuyên thời trang nam)','Kích hoạt tài khoản PHP Master',$content,'Ok');
                  //Thông báo cho người dùng hoặc
                redirect_to("?mod=users&action=login");
                // echo "thêm thành công";
            
        }else{
            $error['account']="Email hoặc username đã tồn tại trên hệ thống";
        }
    }

    load_view('register');
}
function loginAction(){
    // echo time();
    // echo date("d/m/Y h:m:s");

    // $format = "%H:%M:%S %d-%B-%Y";
    // $timestamp = time();
    // echo $strTime = strftime($format, $timestamp );
    // echo  "<br />";
    // echo "Timestamp:" . $timestamp;

    global $error,$username,$password;
    if (isset($_COOKIE['is_login'])) {
        $_SESSION['is_login'] = $_COOKIE['is_login'];
        $_SESSION['user_login'] = $_COOKIE['user_login'];
        redirect_to();
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
            redirect_to('?');
        }else{
            $error['account']="Tài khoản không tồn tại trên hệ thống";
        }
    }
}
}

    load_view('login');
}
