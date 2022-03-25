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
    $num_rows=db_num_rows("SELECT * FROM `tbl_product_cat`");
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
   
    $list_product_cat=get_product_by_pagging($start,$num_per_page,'tbl_product_cat');
   $data=array(
       'list_product_cat'=>$list_product_cat,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start
); 
   load_view('list_cat',$data);

}



//tạo giao diện
//validation
function add_catAction()
{
    global $error, $cat_title,$status;
    if (isset($_POST['btn_add'])) {
        $error = array();
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Tên danh mục bài viết không để trống";
        } else {
            if (check_product_cat_title($_POST['cat_title'])) {
                $error['cat_title'] = "Tên danh mục đã tồn tại";
            } else {
                $cat_title = $_POST['cat_title'];
            }
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
                'product_cat_title' => $cat_title,
                'status' => $status,
                'creator' => user_login(),
                'created_date' => $date

            );
            db_insert("tbl_product_cat",$data);
            $error['add_success'] = "Thêm danh mục thành công";
           
        }
    }
    $list_product_cat = get_list_product_cat();
    $data = array(
        'list_product_cat' => $list_product_cat
    );

    load_view('add_cat', $data);
}
function edit_catAction()
{
    $id = $_GET['product_cat_id'];
    global $error, $cat_title;
    if (isset($_POST['btn_edit'])) {
        $error = array();
        if (empty($_POST['cat_title'])) {
            $error['cat_title'] = "Tên danh mục bài viết không để trống";
        } else {
            if (check_product_cat_title($_POST['cat_title'])) {
                $error['cat_title'] = "Tên danh mục đã tồn tại";
            } else {
                $cat_title = $_POST['cat_title'];
            }
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
                'product_cat_title' => $cat_title,
                'status' => $status,
                'creator' => user_login(),
                'created_date' => $date

            );
            $error['add_success'] = "Cập nhật thành công";
            db_update("tbl_product_cat", $data, "`product_cat_id`={$id}");
        }
    }
    $info_cat = get_info_product_cat_by_id($id);
    $data['info_cat'] = $info_cat;
    load_view("edit_cat", $data);
}
function delete_catAction(){
    $id=$_GET['product_cat_id'];
    db_delete("tbl_trademark","`product_cat_id`={$id}");
    db_delete("tbl_product_cat","`product_cat_id`={$id}");
    redirect_to("?mod=product&controller=product_cat&action=index");
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
