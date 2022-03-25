
<?php

function construct() {

    load_model('index');
   
    
}

function indexAction() {
    if(isset($_POST['sm_action'])){
        if(!empty($_POST['checkItem'])){
            if($_POST['actions'] == 'waiting'){
                // show_array($_POST['checkItem']);
                // echo "ok";
                foreach($_POST['checkItem'] as $item){
                    // show_array($item);
                    $id=$item;
                    $slider= get_info_slider_by_id($id);
                    if($slider['status']=='publish' or $slider['status']=='trash'){
                        $data=array(
                            'status'=>'waiting'
                        );
                        db_update("tbl_slider",$data,"`slider_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'trash'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $slider= get_info_slider_by_id($id);
                    if($slider['status']=='publish' or $slider['status']=='waiting'){
                        $data=array(
                            'status'=>'trash'
                        );
                        db_update("tbl_slider",$data,"`slider_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'publish'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $slider= get_info_slider_by_id($id);
                    if($slider['status']=='trash' or $slider['status']=='waiting'){
                        $data=array(
                            'status'=>'publish'
                        );
                        db_update("tbl_slider",$data,"`slider_id`={$id}");
                    }
                }
            }
        }
    }
    $list_slider=get_list_slider_by_status();
    $data=array(
        'list_slider'=>$list_slider
    );
   load_view('index',$data);
}


//add slider
function add_sliderAction(){
    global $error,$title,$slug,$desc,$num_order,$slider_thumb,$status;
    if(isset($_POST['btn-add'])){
       $error=array();
       //check slider title
       if(empty($_POST['title'])){
           $error['title']="Không được để trống tên slider";
       }else{
           if(check_exist_slider_title($_POST['title'])){
            $error['title']="Tên slider đã tồn tại trước đó";
           }else{
               $title=$_POST['title'];
           }
       }
       //check slug
       if (empty($_POST['slug'])) {
        $slug = create_slug($_POST['title']);
       } else {
           if (slug_url_exists(create_slug($_POST['slug']))) {
               $error['friendly_url'] = " Đường dẫn này đã tồn tại trước đó";
           } else {
               $slug = create_slug($_POST['slug']);
           }
       }
       //check num_order
       if(empty($_POST['num_order'])){
           $error['num_order']="Không được bỏ trống thứ tự";
       }else {
           $num_order=$_POST['num_order'];
       }
       //check slider_thumb
       if (empty($_POST['thumbnail_url'])) {
        $error['slider_thumb'] = "Không được để trống ảnh slider";
    } else {
        $slider_thumb = $_POST['thumbnail_url'];
    }
    //    if(empty($_POST['slider_thumb'])){
    //        $error['slider_thumb']="Không được bỏ trống ảnh slider";
    //    }else {
    //        $slider_thumb=$_POST['slider_thumb'];
    //    }
       //check status
       if(empty($_POST['status'])){
        $error['status']="Không được bỏ trống trạng thái slider";
       }else {
        $status=$_POST['status'];
       }
       if(empty($error)){
        $date = date('Y-m-d');
        $creator=user_login();
        $data=array(
            'slider_title'=>$title,
            'num_order'=>$num_order,
            'slug'=>$slug,
            'slider_thumb'=>$slider_thumb,
            'status'=>$status,
            'creator'=>$creator,
            'created_date'=>$date,
        );
        db_insert("tbl_slider", $data);
        $error['success']="Thêm dữ liệu thành công";
       }

    }
    load_view('add_slider');
}
function upload_img_sliderAction()
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
            $target_dir  = "public/uploads/slider/";
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
//delete slider
function delete_sliderAction(){
    $id = $_GET['id'];
   
    db_delete("tbl_slider", "`slider_id`={$id}");
    redirect_to("?mod=slider&action=index");
}
//edit slider
function edit_sliderAction(){
    $id = $_GET['id'];
    global $error,$title,$slug,$desc,$num_order,$slider_thumb,$status;
    if(isset($_POST['btn-update'])){
       $error=array();
       //check slider title
       if(empty($_POST['title'])){
           $error['title']="Không được để trống tên slider";
       }else{
           if(check_exist_slider_title($_POST['title'])){
            $error['title']="Tên slider đã tồn tại trước đó";
           }else{
               $title=$_POST['title'];
           }
       }
       //check slug
       if (empty($_POST['slug'])) {
        $slug = create_slug($_POST['title']);
       } else {
           if (slug_url_exists(create_slug($_POST['slug']))) {
               $error['slug'] = " Đường dẫn này đã tồn tại trước đó";
           } else {
               $slug = create_slug($_POST['slug']);
           }
       }
       //check num_order
       if(empty($_POST['num_order'])){
           $error['num_order']="Không được bỏ trống thứ tự";
       }else {
           $num_order=$_POST['num_order'];
       }
       //check slider_thumb
       if (empty($_POST['thumbnail_url'])) {
        $error['slider_thumb'] = "Không được để trống ảnh slider";
    } else {
        $slider_thumb = $_POST['thumbnail_url'];
    }
       //check status
       if(empty($_POST['status'])){
        $error['status']="Không được bỏ trống trạng thái slider";
       }else {
        $status=$_POST['status'];
       }
       if(empty($error)){
        $date = date('Y-m-d');
        $creator=user_login();
        $data=array(
            'slider_title'=>$title,
            'num_order'=>$num_order,
            'slug'=>$slug,
            'slider_thumb'=>$slider_thumb,
            'status'=>$status,
            'creator'=>$creator,
            'created_date'=>$date,
        );
        $error['success']="Cập nhật dữ liệu thành công";
        db_update("tbl_slider", $data,"`slider_id`={$id}");
       }
    }
    $info_slider=get_info_slider_by_id($id);
       $data=array(
            'info_slider'=>$info_slider
       );
    load_view('edit_slider',$data);
}
