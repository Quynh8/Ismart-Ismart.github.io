<?php

function construct(){
   
    load_model('index');
    
}

function indexAction(){
    if(isset($_POST['sm_action'])){
        if(!empty($_POST['checkItem'])){
            if($_POST['actions'] == 'waiting'){
                // show_array($_POST['checkItem']);
                // echo "ok";
                foreach($_POST['checkItem'] as $item){
                    // show_array($item);
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['status']=='publish' or $product['status']=='trash'){
                        $data=array(
                            'status'=>'waiting'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'trash'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['status']=='publish' or $product['status']=='waiting'){
                        $data=array(
                            'status'=>'trash'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'publish'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['status']=='trash' or $product['status']=='waiting'){
                        $data=array(
                            'status'=>'publish'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'stocking'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['tracking']=='out of stock'){
                        $data=array(
                            'tracking'=>'stocking'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'out of stock'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['tracking']=='stocking'){
                        $data=array(
                            'tracking'=>'out of stock'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_product`  ");//lấy ra tất cả các bản ghi có tên chứa n
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=6;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);
    //  echo "Số trang:{$num_page}<br>";

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
    // echo "Trang:{$page}<br>";
    // echo "Xuất phát:{$start}";
    // $list_users=get_users($start,$num_per_page,"`username` LIKE '%nh%'");
    // $list_product_by_pagging=get_product_by_pagging($start,$num_per_page);
    $list_product=get_product_by_pagging($start,$num_per_page,'tbl_product');
    // $list_product=get_list_product();
    // show_array($list_product);
   $data_view=array(
       'list_product'=>$list_product,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
   );
   load_view('index',$data_view);

}
function show_product_publishAction()
{
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == 'waiting') {
                foreach ($_POST['checkItem'] as $item) {
                    // echo $item;
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'publish' or $product['status'] == 'trash') {
                        $data = array(
                            'status' => 'waiting'
                        );
                        db_update("tbl_product", $data, "`product_id`={$id}");
                    }
                }
            } elseif ($_POST['actions'] == 'trash') {
                foreach ($_POST['checkItem'] as $item) {
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'publish' or $product['status'] == 'waiting') {
                        $data = array(
                            'status' => 'trash'
                        );
                        db_update("tbl_product", $data, "`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'stocking'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['tracking']=='out of stock'){
                        $data=array(
                            'tracking'=>'stocking'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'out of stock'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product=get_info_product_by_id($id);
                    if($product['tracking']=='stocking'){
                        $data=array(
                            'tracking'=>'out of stock'
                        );
                        db_update("tbl_product",$data,"`product_id`={$id}");
                    }
                }
            }
        }
    }
 //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_product` WHERE `status`='publish'  ");
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=6 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);
    //  echo "Số trang:{$num_page}<br>";

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
    // echo "Trang:{$page}<br>";
    // echo "Xuất phát:{$start}";
    // $list_users=get_users($start,$num_per_page,"`username` LIKE '%nh%'");
    // $list_product_by_pagging=get_product_by_pagging($start,$num_per_page);
    $list_product_by_status=get_product_by_pagging($start,$num_per_page,'tbl_product',"`status`='publish'");
    // $list_product=get_list_product();
    // show_array($list_product);
    // $list_product_by_status = get_list_product_by_status("publish");
    $data = array(
        'list_product_by_status' => $list_product_by_status,
        'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
    );
    load_view("show_product_publish", $data);
}
function show_product_waitingAction()
{
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == 'publish') {
                foreach ($_POST['checkItem'] as $item) {
                    // echo $item;
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'waiting' or $product['status'] == 'trash' ) {
                        $data = array(
                            'status' => 'publish'
                        );
                        db_update("tbl_product", $data, "`product_id`={$id}");
                    }
                }
            } elseif ($_POST['actions'] == 'trash') {
                foreach ($_POST['checkItem'] as $item) {
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'publish' or $product['status'] == 'waiting') {
                        $data = array(
                            'status' => 'trash'
                        );
                        db_update("tbl_product", $data, "`product_id`={$id}");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_product` WHERE `status`='waiting'  ");
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=6 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
    $list_product_by_status=get_product_by_pagging($start,$num_per_page,'tbl_product',"`status`='waiting'");
    // $list_product_by_status = get_list_product_by_status("waiting");
    $data = array(
        'list_product_by_status' => $list_product_by_status,
        'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
    );
    load_view("show_product_waiting", $data);
}
function show_product_trashAction()
{
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            //khôi phục sản phẩm
            if ($_POST['actions'] == 'restore') {
                foreach ($_POST['checkItem'] as $item) {
                    // echo $item;
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'trash') {
                        $data = array(
                            'status' => 'waiting'
                        );
                        db_update("tbl_product", $data, "`product_id`={$id}");
                    }
                }
            } elseif ($_POST['actions'] == 'delete') {
                foreach ($_POST['checkItem'] as $item) {
                    $id = $item;
                    $product = get_info_product_by_id($id);
                    if ($product['status'] == 'trash') {
                        db_delete("tbl_product", "`product_id`={$id}");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_product` WHERE `status`='trash'  ");
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=6 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
    $list_product_by_status=get_product_by_pagging($start,$num_per_page,'tbl_product',"`status`='trash'");
    // $list_product_by_status = get_list_product_by_status("waiting");
    // $list_product_by_status = get_list_product_by_status("trash");
    $data = array(
        'list_product_by_status' => $list_product_by_status,
        'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
    );
    load_view("show_product_trash", $data);
}
// == ADD PAGE==
/* Check list:
  1.Tạo giao diện
  2.Validation
  3.Thêm dl vào DB
  4.Thông báo cho người dùng thêm sản phẩm thành công*/
//
function addAction(){
    global $error,$product_title,$product_content,$code,$price,$product_desc,$img_relative,$thumbnail_url,$parent_id,$trademark_id,$status,$tracking,$feather;
    if(isset($_POST['btn-add-product'])){
        // show_array($_POST);
        $error=array();
        //check product-title
        if (empty($_POST['product_title'])) {
            $error['product_title'] = "<span class='error'>(*) Không được bỏ trống tên sản phẩm</span>";
        } else {
            if (title_product_exists($_POST['product_title'])) {
                $error['product_title'] = "<span class='error'>(*) Tên sản phẩm này đã tồn tại trước đó</span>";
            } else {
                $product_title = $_POST['product_title'];
            }
        }
        //check code
        if (empty($_POST['code'])) {
            $error['code'] = "<span class='error'>(*) Không được bỏ trống mã sản phẩm</span>";
        } else {
            if (check_code_product_exists($_POST['code'])) {
                $error['code'] = "<span class='error'>(*) Mã sản phẩm này đã tồn tại trước đó</span>";
            } else {
                $code = $_POST['code'];
            }
        }
        //feather
        if (isset($_POST['feather'])) {
            $feather = 1;
        } else {
            $feather = 0;
        }
        //check price
        if(empty($_POST['price'])){
            $error['price']="<span class='error'>(*) Không được bỏ trống giá sản phẩm</span>";
        }else {
            $price=$_POST['price'];
        }
        //check qty
        if(empty($_POST['qty'])){
            $error['qty']="<span class='error'>(*) Vui lòng nhập số lượng sản phẩm</span>";
        }else {
            $qty=$_POST['qty'];
        }
        //check img_realtive
        if(empty($_POST['img_relative'])){
            $error['img_relative']="<span class='error'>(*) Không được bỏ trống ảnh chi tiết sản phẩm</span>";
        }else {
            $img_relative=array();
            $img_relative =$_POST['img_relative'];
        }
        //check product_desc
        if(empty($_POST['product_desc'])){
            $error['product_desc']="<span class='error'>(*) Không được bỏ trống mô tả ngắn</span>";
        }else {
            $product_desc=$_POST['product_desc'];
        }
        //check product_content
        if(empty($_POST['product_content'])){
            $error['product_content']="<span class='error'>(*) Không được bỏ trống mô tả chi tiết</span>";
        }else {
            $product_content=$_POST['product_content'];
        }
        //check thumbnail_url
        if(empty($_POST['thumbnail_url'])){
            $error['thumbnail_url']="<span class='error'>(*) Không được bỏ trống đường dẫn ảnh</span>";
        }else {
            $thumbnail_url=$_POST['thumbnail_url'];
        }
        //check parent_id
        if(empty($_POST['parent_id'])){
            $error['parent_id']="<span class='error'>(*) Không được bỏ trống danh mục sản phẩm</span>";
        }else {
            $parent_id=$_POST['parent_id'];
        }
        //check trademark_id
        if(empty($_POST['trademark_id'])){
            $error['trademark_id']="<span class='error'>(*) Không được bỏ trống thương hiệu sản phẩm</span>";
        }else {
            $trademark_id=$_POST['trademark_id'];
        }
        //check status
        if (empty($_POST['status'])) {
            $error['status']="<span class='error'>(*) Vui lòng chọn trạng thái sản phẩm</span>";
        } else {
            $status = $_POST['status'];
        }
        //check tracking
        if(empty($_POST['tracking'])){
            $error['tracking']="<span class='error'>(*) Vui lòng chọn tình trạng sản phẩm</span>";
        }else {
            $tracking=$_POST['tracking'];
        }

        if(empty($error)){
            $date = date('Y-m-d');
            $creator=user_login();
            $data=array(
                'product_title'=>$product_title,
                'product_desc'=>$product_desc,
                'product_content'=>$product_content,
                'qty'=>$qty,
                'price'=>$price,
                'code'=>$code,
                'product_thumb'=>$thumbnail_url,
                'product_cat_id'=>$parent_id,
                'trademark_id'=>$trademark_id,
                'creator'=>$creator,
                'created_date'=>$date,
                'status'=>$status,
                'feather'=>$feather,
                'tracking'=>$tracking

            );
           
            // db_insert('tbl_product',$data);
            $id_product = db_insert("tbl_product", $data);
            foreach ($img_relative as $item) {
                $data = array(
                    'img_relative_thumb' => $item,
                    'product_id' => $id_product
                );
                db_insert("tbl_img_relative_product", $data);
            }
            
            $error['success']="Thêm sản phẩm thành công";
            
        }
    }
    $list_product_cat=get_list_product_cat();
    
           
    $data=array(
        'list_product_cat'=>$list_product_cat
        
    );
    load_view('add',$data);
}
//upload nhiều ảnh chi tiết sản phẩm 
function upload_multi_imgAction(){
    $result = "";
    // Số lượng ảnh upload 
    $num_images = count($_FILES['file']['name']);
    $target_dir = "public/uploads/products/muli_upload_products/";
    // Duyệt từng ảnh để upload lên server 
    for ($i = 0; $i < $num_images; $i++) {
        $target_file = $target_dir . basename($_FILES['file']['name'][$i]);
        $name_file   = pathinfo($_FILES['file']['name'][$i], PATHINFO_FILENAME);
        $exten_file  = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
        if (file_exists($target_file)) {
            $name_new = $name_file . " - Copy.";
            $path_file_new = $target_dir . $name_new . $exten_file;
            $k = 1;
            while (file_exists($path_file_new)) {
                $name_new = $name_file . " - Copy({$k}).";
                $path_file_new = $target_dir . $name_new . $exten_file;
                $k++;
            }
            $target_file = $path_file_new;
        }
        if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file)) {
            // Tạo html hiển thị hình ảnh đã upload 
            $result .= "<img src=\"{$target_file}\" >";
            $result .= "<input type='hidden' name='img_relative[]'  value='{$target_file}'>";
            //    echo "Upload {$i} ok";
        }
    }
    echo $result;
}
//upload ảnh product ajax
function upload_img_productAction()
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
            $target_dir  = "public/uploads/products/";
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
//xu ky ket noi danh muc san pham và tên thương hiệu
function getTrademarkAction(){
    if(isset($_POST['id'])){
        $id = $_POST['id'];
      
    }
    $list_trademark_by_id=get_list_trademark_by_id($id);
    $trademark_arr = array();
    foreach($list_trademark_by_id as $item){
        $trademark_id=$item['trademark_id'];
        $trademark_title=$item['trademark_title'];
        $trademark_arr[]=array("id"=>$trademark_id,"name"=>$trademark_title);
    }
    echo json_encode($trademark_arr);
}
//Sửa bài viết
function edit_productAction(){
    $product_id = (int)$_GET['id'];
    global $error,$feather,$product_title,$product_content,$code,$price,$product_desc,$img_relative,$thumbnail_url,$parent_id,$trademark_id,$status,$tracking;
    if(isset($_POST['btn-edit-product'])){
        // show_array($_POST);
        $error=array();
        //check product-title
        if (empty($_POST['product_title'])) {
            $error['product_title'] = "<span class='error'>(*) Không được bỏ trống tên sản phẩm</span>";
        } else {
            
                $product_title = $_POST['product_title'];
            
        }
        //check code
        if (empty($_POST['code'])) {
            $error['code'] = "<span class='error'>(*) Không được bỏ trống mã sản phẩm</span>";
        } else {
            
                $code = $_POST['code'];
            
        }
         //feather
         if (isset($_POST['feather'])) {
            $feather = 1;
        } else {
            $feather = 0;
        }
        //check price
        if(empty($_POST['price'])){
            $error['price']="<span class='error'>(*) Không được bỏ trống giá sản phẩm</span>";
        }else {
            $price=$_POST['price'];
        }
        //check qty
        if(empty($_POST['qty'])){
            $error['qty']="<span class='error'>(*) Vui lòng nhập số lượng sản phẩm</span>";
        }else {
            $qty=$_POST['qty'];
        }
        //check img_realtive
        if(empty($_POST['img_relative'])){
            $error['img_relative']="<span class='error'>(*) Không được bỏ trống ảnh chi tiết sản phẩm</span>";
        }else {
            $img_relative=array();
            $img_relative =$_POST['img_relative'];
        }
        //check product_desc
        if(empty($_POST['product_desc'])){
            $error['product_desc']="<span class='error'>(*) Không được bỏ trống mô tả ngắn</span>";
        }else {
            $product_desc=$_POST['product_desc'];
        }
        //check product_content
        if(empty($_POST['product_content'])){
            $error['product_content']="<span class='error'>(*) Không được bỏ trống mô tả chi tiết</span>";
        }else {
            $product_content=$_POST['product_content'];
        }
        //check thumbnail_url
        if(empty($_POST['thumbnail_url'])){
            $error['thumbnail_url']="<span class='error'>(*) Không được bỏ trống đường dẫn ảnh</span>";
        }else {
            $thumbnail_url=$_POST['thumbnail_url'];
        }
        //check parent_id
        if(empty($_POST['parent_id'])){
            $error['parent_id']="<span class='error'>(*) Không được bỏ trống danh mục sản phẩm</span>";
        }else {
            $parent_id=$_POST['parent_id'];
        }
        //check trademark_id
        if(empty($_POST['trademark_id'])){
            $error['trademark_id']="<span class='error'>(*) Không được bỏ trống thương hiệu sản phẩm</span>";
        }else {
            $trademark_id=$_POST['trademark_id'];
        }
        //check status
        if (empty($_POST['status'])) {
            $error['status']="<span class='error'>(*) Vui lòng chọn trạng thái sản phẩm</span>";
        } else {
            $status = $_POST['status'];
        }
        //check tracking
        if(empty($_POST['tracking'])){
            $error['tracking']="<span class='error'>(*) Vui lòng chọn tình trạng sản phẩm</span>";
        }else {
            $tracking=$_POST['tracking'];
        }

        if(empty($error)){
            $date = date('Y-m-d');
            $creator=user_login();
            $data=array(
                'product_title'=>$product_title,
                'product_desc'=>$product_desc,
                'product_content'=>$product_content,
                'qty'=>$qty,
                'price'=>$price,
                'code'=>$code,
                'product_thumb'=>$thumbnail_url,
                'product_cat_id'=>$parent_id,
                'trademark_id'=>$trademark_id,
                'creator'=>$creator,
                'created_date'=>$date,
                'status'=>$status,
                'feather'=>$feather,
                'tracking'=>$tracking

            );
           
            
            //cập nhật lại dữ liệu
            //xóa dữ liệu ở bảng tbl_img_relative_product
            $id_product = db_update("tbl_product", $data,"`product_id`={$product_id}");
            db_delete("tbl_img_relative_product","`product_id`={$product_id}");
            foreach ($img_relative as $item) {
                $data = array(
                    'img_relative_thumb' => $item,
                    'product_id' => $product_id
                );
                db_insert("tbl_img_relative_product", $data);
                // db_update("tbl_img_relative_product", $data,"`product_id`={$product_id}");
            }
            
            $error['success']="Cập nhật sản phẩm thành công";
            
        }
    }
    $info_product_by_id=get_info_product_by_id($product_id);
    $list_product_cat=get_list_product_cat();
    $list_relative_img=get_list_relative_img($product_id);
    $list_trademark_by_id=get_list_trademark_by_id($product_id);
    
    $data_view=array(
        'info_product_by_id'=>$info_product_by_id,
        'list_product_cat'=>$list_product_cat,
        'list_relative_img'=>$list_relative_img,
        'list_trademark_by_id'=>$list_trademark_by_id
    );
    load_view("edit_product",$data_view);
}
function delete_productAction(){
    $id = $_GET['id'];
    //ở đây muốn xóa được sản phẩm ta phải xóa ở bảng có khóa ngoại kết nối trước(tức là bảng tbl_img_relative_product)
    db_delete("tbl_img_relative_product", "`product_id`={$id}");
    db_delete("tbl_product", "`product_id`={$id}");
    redirect_to("?mod=product&action=index");
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
//hàm search product
function search_productAction(){
    //Check list:
    //1.Tạo giao diện,tạo form có phương thức GET(thêm 2 trường <input type="hidden" name="mod" value="post"> 
                            //<input type="hidden" name="action" value="search_post">)
    //2.Xây dựng hàm xử lý
    if(isset($_GET['sm_search'])){
        $key=$_GET['key'];
        // $result_search=db_fetch_array("SELECT * FROM  `tbl_post` WHERE `post_title` LIKE '%{$key}%'");
        // $table="tbl_post";
        // $field="post_title";
        $result_search= Search('tbl_product',$key,'product_title');
    }
    $data['result_search']=$result_search;
    $data['key']=$key;
    load_view('search_product',$data);
}
