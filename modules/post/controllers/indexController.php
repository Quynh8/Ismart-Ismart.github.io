

<?php

function construct() {

    load_model('index');
    
    
}

function indexAction() {
    // $list_post=get_list_post();
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_post`");
     $num_per_page=6 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
   
    $list_post=get_post_by_pagging($start,$num_per_page,'tbl_post');
    $data=array(
        'list_post'=>$list_post,
        'num_page'=>$num_page,
        'page'=>$page,
        'start'=>$start
    );
    load_view('index',$data);
   
}
function detailAction(){
    $id=(int)$_GET['id'];
    // echo $id;
    $item=get_info_post_by_id($id);
    $data['item']=$item;
    load_view('detail',$data);
}
