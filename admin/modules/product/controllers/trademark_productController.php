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
                    $product= get_info_product_cat_by_id($id);
                    if($product['status']=='publish' or $product['status']=='trash'){
                        $data=array(
                            'status'=>'waiting'
                        );
                        db_update("tbl_product_cat",$data,"`product_cat_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'trash'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product= get_info_product_cat_by_id($id);
                    if($product['status']=='publish' or $product['status']=='waiting'){
                        $data=array(
                            'status'=>'trash'
                        );
                        db_update("tbl_product_cat",$data,"`product_cat_id`={$id}");
                    }
                }
            }elseif($_POST['actions'] == 'publish'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                    $product= get_info_product_cat_by_id($id);
                    if($product['status']=='trash' or $product['status']=='waiting'){
                        $data=array(
                            'status'=>'publish'
                        );
                        db_update("tbl_product_cat",$data,"`product_cat_id`={$id}");
                    }
                }
            }
        }
    }
     //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_trademark`");
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
   
    $list_trademark=get_product_by_pagging($start,$num_per_page,'tbl_trademark');
//    $list_trademark=get_list_trademark();
   $data=array(
       'list_trademark'=>$list_trademark,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
    ); 
   load_view('list_trademark',$data);

}



//tạo giao diện
//validation
function add_trademarkAction()
{
    global $error, $cat_title,$status,$parent_cat;
    if (isset($_POST['btn_add'])) {
        $error = array();
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Tên danh mục bài viết không để trống";
        } else {
                $cat_title = $_POST['cat_title']; 
        }
        //danh mục thương hiệu
        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = " Vui lòng chọn danh mục thương hiệu";
        } else {
            $parent_cat = $_POST['parent_id'];
        }
        if (empty($_POST['status'])) {
            $error['status'] = "Bạn vui lòng chọn trạng thái";
        } else {
            $status = $_POST['status'];
        }
        //kết luận
        if (empty($error)) {
            $date = date('Y-m-d');
            $data = array(
                'trademark_title' => $cat_title,
                'product_cat_id'=>$parent_cat,
                'status' => $status,
                'creator' => user_login(),
                'created_date' => $date

            );
            db_insert("tbl_trademark",$data);
            $error['add_success'] = "Thêm danh mục thành công";
           
        }
    }
    $list_product_cat = get_list_product_cat();
    $data = array(
        'list_product_cat' => $list_product_cat
    );

    load_view('add_trademark',$data);
}
function edit_trademarkAction()
{
    $id = $_GET['trademark_id'];
    global $error, $cat_title,$status,$parent_cat;
    if (isset($_POST['btn_edit'])) {
        $error = array();
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Tên danh mục bài viết không để trống";
        } else {
            if (check_trademark_product($_POST['cat_title'])) {
                $error['cat_title'] = "Tên thương hiệu đã tồn tại";
            } else {
                $cat_title = $_POST['cat_title'];
            }
        }
        //danh mục thương hiệu
        if (empty($_POST['parent_id'])) {
            $error['parent_id'] = " Vui lòng chọn danh mục thương hiệu";
        } else {
            $parent_cat = $_POST['parent_id'];
        }
        if (empty($_POST['status'])) {
            $error['status'] = "Bạn vui lòng chọn trạng thái";
        } else {
            $status = $_POST['status'];
        }
        //kết luận
        if (empty($error)) {
            $date = date('Y-m-d');
            $data = array(
                'trademark_title' => $cat_title,
                'product_cat_id'=>$parent_cat,
                'status' => $status,
                'creator' => user_login(),
                'created_date' => $date

            );
            $error['add_success'] = "Cập nhật thành công";
            db_update("tbl_trademark", $data, "`trademark_id`={$id}");
        }
    }
    
    $info_trademark =get_info_trademark_by_id($id);
    $list_product_cat = get_list_product_cat();
    $data=array(
        'info_trademark'=>$info_trademark,
        'list_product_cat'=>$list_product_cat,
    );
    load_view("edit_trademark", $data);
}
function delete_trademarkAction(){
    $id=$_GET['trademark_id'];
    //muốn xóa được thương hiệu ta cần phải xóa ở bảng chứa khóa ngoại trước
    db_delete("tbl_product","`trademark_id`={$id}");
    db_delete("tbl_trademark","`trademark_id`={$id}");
    
    redirect_to("?mod=product&controller=trademark_product&action=index");
}



// function search_productAction(){
//     if(isset($_GET['sm_search'])){
//         $key=$_GET['key'];
       
//         $result_search= Search_cat('tbl_product_cat',$key,'product_cat_title');
//     }
//     $data['result_search']=$result_search;
//     $data['key']=$key;
//     load_view('search_product',$data);
// }
