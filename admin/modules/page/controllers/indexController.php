<?php

function construct(){
   
    load_model('index');
   
}

function indexAction(){
    //lấy ra danh sách bài viết
    // $list_page=get_list_page();
    // show_array($list_page);
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_page`");
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=3 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);
    //  echo "Số trang:{$num_page}<br>";

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
   
    $list_page=get_page_by_pagging($start,$num_per_page,'tbl_page');
    $data_view=array(
        'list_page'=>$list_page,
        'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
    );
   
   load_view('index',$data_view);

}
// == ADD PAGE==
/* Check list:
  1.Tạo giao diện
  2.Validation
  3.Thêm dl vào DB
  4.Thông báo cho người dùng thêm trang thành công*/
//
function addAction(){
    if(isset($_POST['btn-add-page'])){
        global $error,$page_title,$friendly_url,$page_desc,$page_content;
        $error=array();

        //check page-title
        if (empty($_POST['page_title'])) {
            $error['page_title'] = "<span class='error'>(*) Không được bỏ trống tiêu đề bài viết</span>";
        } else {
            if (title_page_exists($_POST['page_title'])) {
                $error['page_title'] = "<span class='error'>(*) Tiêu đề này đã tồn tại trước đó</span>";
            } else {
                $page_title = $_POST['page_title'];
            }
        }
    
     //check friendly url
     if (empty($_POST['friendly_url'])) {
         $friendly_url = create_slug($_POST['page_title']);
        } else {
            if (slug_url_exists(create_slug($_POST['friendly_url']))) {
                $error['friendly_url'] = "<span class='error'>(*) Đường dẫn này đã tồn tại trước đó</span>";
            } else {
                $friendly_url = create_slug($_POST['friendly_url']);
            }
        }
    //check page_desc
    if(empty($_POST['page_desc'])){
        $error['page_desc']="<span class='error'>(*) Không được bỏ trống mô tả bài viết</span>";
    }else{
        $page_desc=$_POST['page_desc'];
    }
     // check page content
     if (empty($_POST['page_content'])) {
        $error['page_content'] = "<span class='error'>(*) Không được bỏ trống nội dung bài viết</span>";
    } else {
        $page_content = $_POST['page_content'];
    }
    //ảnh bài viết
    if (empty($_POST['thumbnail_url'])) {
        $error['page_thumb'] = "<span class='error'>(*) Không được bỏ trống ảnh của bài viết</span>";
    } else {
        $page_thumb = $_POST['thumbnail_url'];
    }
    //xử lý khi không có lỗi
        if(empty($error)){
            $created_date=time();
            $creator=user_login();
            $data=array(
                'page_title'=>$page_title,
                'created_date'=>$created_date,
                'page_desc'=>$page_desc,
                'page_content'=>$page_content,
                'page_creator'=>$creator,
                'page_thumb'=>$page_thumb,
                'page_friendly_url'=>$friendly_url
            );
            add_page($data);
            $error['success'] = "<span id='success'>(*) Thêm thành công</span>";
           
        }
    }
    $data_view['notification'] = "<div class='success'></div>";
    $data_view['process'] = "success";
    load_view('add',$data_view);
}
//upload ảnh page ajax
function upload_img_pageAction()
{
    if ($_SERVER['REQUEST_METHOD']) {
        if (!isset($_FILES['file'])) {
            $error['file'] = "Bạn chưa chọn bất kỳ file ảnh nào";
            $data = array(
                "status" => "error",
                "error" => $error
            );
            echo json_encode($data);
        } else {
            $error = array();
            $target_dir  = "public/uploads/pages/";
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

//Sửa bài viết
function editAction(){
    $page_id = (int)$_GET['page_id'];
    if(isset($_POST['btn-update-page'])){
        global $error,$page_title,$friendly_url,$page_desc,$page_content;
        $error=array();

        //check page-title
        if (empty($_POST['page_title'])) {
            $error['page_title'] = "<span class='error'>(*) Không được bỏ trống tiêu đề bài viết</span>";
        } else {
            if (title_page_exists($_POST['page_title'])) {
                $error['page_title'] = "<span class='error'>(*) Tiêu đề này đã tồn tại trước đó</span>";
            } else {
                $page_title = $_POST['page_title'];
            }
        }
    
     //check friendly url
     if (empty($_POST['friendly_url'])) {
         $friendly_url = create_slug($_POST['page_title']);
        } else {
            if (slug_url_exists(create_slug($_POST['friendly_url']))) {
                $error['friendly_url'] = "<span class='error'>(*) Đường dẫn này đã tồn tại trước đó</span>";
            } else {
                $friendly_url = create_slug($_POST['friendly_url']);
            }
        }
    //check page_desc
    if(empty($_POST['page_desc'])){
        $error['page_desc']="<span class='error'>(*) Không được bỏ trống mô tả bài viết</span>";
    }else{
        $page_desc=$_POST['page_desc'];
    }
     // check page content
     if (empty($_POST['page_content'])) {
        $error['page_content'] = "<span class='error'>(*) Không được bỏ trống nội dung bài viết</span>";
    } else {
        $page_content = $_POST['page_content'];
    }
    //ảnh bài viết
    if (empty($_POST['thumbnail_url'])) {
        $error['page_thumb'] = "<span class='error'>(*) Không được bỏ trống ảnh của bài viết</span>";
    } else {
        $page_thumb = $_POST['thumbnail_url'];
    }
    //xử lý khi không có lỗi
        if(empty($error)){
            $created_date=time();
            $creator=user_login();
            $data=array(
                'page_title'=>$page_title,
                'created_date'=>$created_date,
                'page_desc'=>$page_desc,
                'page_content'=>$page_content,
                'page_creator'=>$creator,
                'page_thumb'=>$page_thumb,
                'page_friendly_url'=>$friendly_url
            );
            db_update("tbl_page",$data,"`page_id`=$page_id");
            $error['success'] = "<span id='success'>(*) Cập nhật thành công</span>";
           
        }
    }
    //chỗ này phải để $item dưới phần cập nhật để nó không bị load lại dữ liệu của phần trước
    $item = db_fetch_row("SELECT * FROM `tbl_page` WHERE `page_id` ={$page_id}");
    $data_view['notification'] = "<div class='success'></div>";
    $data_view['process'] = "success";
    $data_view['item']=$item;
    load_view("edit",$data_view);
}
function deleteAction(){
    $page_id = (int)$_GET['page_id'];
    db_delete("tbl_page","`page_id`={$page_id}");
    redirect_to("?mod=page&action=index");
    
}
function search_pageAction(){
    if(isset($_GET['sm_search'])){
        $key=$_GET['key'];
        $result_search= Search('tbl_page',$key,'page_title');
    }
    $list_page=get_list_page();
    
    $data['result_search']=$result_search;
    $data['list_page']=$list_page;
    load_view('search_page',$data);
}