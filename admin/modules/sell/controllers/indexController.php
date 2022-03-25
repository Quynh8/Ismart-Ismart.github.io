
<?php

function construct() {

    load_model('index');
   
    
}
function indexAction(){

   
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == "shipping") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "completed" or $info_order['status'] == "cancel" ) {
                        $data = array(
                            'status' => "shipping"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    } 
                }
            } elseif ($_POST['actions'] == "completed") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "completed"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            } elseif ($_POST['actions'] == "pending") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "shipping" or $info_order['status'] == "completed" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "pending"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }else {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping"  or $info_order['status'] == "completed") {
                        $data = array(
                            'status' => "cancel"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
     $num_rows=db_num_rows("SELECT * FROM `tbl_customer` ");
     $num_per_page=10 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
    $list_customer=get_customer_by_pagging($start,$num_per_page,'tbl_customer');
    $data=array(
        'list_customer'=>$list_customer,
        'num_page'=>$num_page,
        'page'=>$page,
        'start'=>$start,
        'num_rows'=>$num_rows
    );
    load_view('index',$data);
}


function list_customerAction() {
    if(isset($_POST['sm_action'])){
        if(!empty($_POST['checkItem'])){
            if($_POST['actions'] == 'trash'){
                foreach($_POST['checkItem'] as $item){
                    $id=$item;
                        db_delete("tbl_customer", "`customer_id`={$id}");
                    }
                }
            }
        
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_customer`");
    // echo $num_rows;
     //Số lượng bản ghi trên mỗi trang
     $num_per_page=10 ;
     //Tổng số bản ghi
     $total_row=$num_rows;
     //=>Tổng số trang
     $num_page = ceil($total_row/$num_per_page);
    //  echo "Số trang:{$num_page}<br>";

     
    $page=isset($_GET['id'])?(int)$_GET['id']:1;
    $start=($page -1)*$num_per_page;
   
    $list_customer= get_customer_by_pagging($start,$num_per_page,'tbl_customer');
    // $list_customer=get_list_customer();
    $data=array(
        'list_customer'=>$list_customer,
        'num_page'=>$num_page,
        'page'=>$page,
        'start'=>$start,
        'num_rows'=>$num_rows
    );
   load_view('list_customer',$data);
}
function delete_customerAction(){
    $id = $_GET['id'];
    db_delete("tbl_customer", "`customer_id`={$id}");
    redirect_to("?mod=sell&action=list_customer");

}

function search_customerAction(){
    
    if(isset($_GET['sm_search'])){
        $key=$_GET['key'];
        $result_search= Search('tbl_customer',$key,'fullname');
    }
    
    $data['result_search']=$result_search;
    $data['key']=$key;
    load_view('search_customer',$data);
}
function search_orderAction(){
    if(isset($_GET['sm_search'])){
        $key=$_GET['key'];
        $result_search= Search_order('tbl_customer',$key,'fullname');
    }
    
    $data['result_search']=$result_search;
    $data['key']=$key;
    load_view('search_order',$data);
}
function detail_orderAction(){
    $order_code = $_GET['order_code'];
    if (isset($_POST['sm_status'])) {
        $status = $_POST['status'];
        $data = array(
            'status' => $status
        );
        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
    }
    //lấy được thông tin của khách hàng dựa vào order_code
    $data['info_customer_order']=get_info_customer_order_by_order_code($order_code);
    //lấy thông tin của hóa đơn
    $data['info_order']=get_info_order_by_order_code($order_code);
    $data['list_order']=get_list_order_by_order_code($order_code);
    // show_array(get_list_order_by_order_code($order_code));
    foreach ($data['list_order'] as $item) {
        $result = get_list_product_order_by_product_id($item['product_id']);
        // show_array(get_list_product_order_by_product_id($item['product_id']));
        $result['qty_order'] = $item['qty'];
        $result['sub_total'] = $item['sub_total'];
        $result['status']=$item['status'];
        $list_product_order[]  = $result;
    }
    $data['list_product_order'] = $list_product_order;
    load_view('detail_order',$data);
}
function delete_orderAction(){
    $id = $_GET['id'];
    db_delete("tbl_customer", "`customer_id`={$id}");
    redirect_to("?mod=sell&action=index");
}
function update_orderAction(){

}
function list_completedAction(){
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == "shipping") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "completed" or $info_order['status'] == "cancel" ) {
                        $data = array(
                            'status' => "shipping"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    } 
                }
            } elseif ($_POST['actions'] == "completed") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "completed"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }else {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping"  or $info_order['status'] == "completed") {
                        $data = array(
                            'status' => "cancel"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_customer` WHERE `status`='completed' ");
    $num_per_page=3 ;
    //Tổng số bản ghi
    $total_row=$num_rows;
    //=>Tổng số trang
    $num_page = ceil($total_row/$num_per_page);

    
   $page=isset($_GET['id'])?(int)$_GET['id']:1;
   $start=($page -1)*$num_per_page;
   $list_customer=get_customer_by_pagging($start,$num_per_page,'tbl_customer',"`status`='completed'");
   $data=array(
       'list_customer'=>$list_customer,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start,
       'num_rows'=>$num_rows
   );
    load_view('list_completed',$data);
}
function list_cancelAction(){
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == "shipping") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "completed" or $info_order['status'] == "cancel" ) {
                        $data = array(
                            'status' => "shipping"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    } 
                }
            } elseif ($_POST['actions'] == "completed") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "completed"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }else {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping"  or $info_order['status'] == "completed") {
                        $data = array(
                            'status' => "cancel"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_customer` WHERE `status`='cancel' ");
    $num_per_page=3 ;
    //Tổng số bản ghi
    $total_row=$num_rows;
    //=>Tổng số trang
    $num_page = ceil($total_row/$num_per_page);

    
   $page=isset($_GET['id'])?(int)$_GET['id']:1;
   $start=($page -1)*$num_per_page;
   $list_customer=get_customer_by_pagging($start,$num_per_page,'tbl_customer',"`status`='cancel'");
   $data=array(
       'list_customer'=>$list_customer,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start,
       'num_rows'=>$num_rows
   );
    load_view('list_cancel',$data);
}
function list_pendingAction(){
   
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == "shipping") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "completed" or $info_order['status'] == "cancel" ) {
                        $data = array(
                            'status' => "shipping"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    } 
                }
            } elseif ($_POST['actions'] == "completed") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "completed"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }else {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping"  or $info_order['status'] == "completed") {
                        $data = array(
                            'status' => "cancel"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_customer` WHERE `status`='pending' ");
    $num_per_page=3 ;
    //Tổng số bản ghi
    $total_row=$num_rows;
    //=>Tổng số trang
    $num_page = ceil($total_row/$num_per_page);

    
   $page=isset($_GET['id'])?(int)$_GET['id']:1;
   $start=($page -1)*$num_per_page;
   $list_customer=get_customer_by_pagging($start,$num_per_page,'tbl_customer',"`status`='pending'");
   $data=array(
       'list_customer'=>$list_customer,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start,
       'num_rows'=>$num_rows
   );
    load_view('list_pending',$data);
}
function list_shippingAction(){
    if (isset($_POST['sm_action'])) {
        if (!empty($_POST['checkItem'])) {
            if ($_POST['actions'] == "shipping") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "completed" or $info_order['status'] == "cancel" ) {
                        $data = array(
                            'status' => "shipping"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    } 
                }
            } elseif ($_POST['actions'] == "completed") {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping" or $info_order['status'] == "cancel") {
                        $data = array(
                            'status' => "completed"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }else {
                foreach ($_POST['checkItem'] as $item) {
                    $order_code = $item;
                    $info_order = get_info_customer_order_by_order_code($order_code);
                    if ($info_order['status'] == "pending" or $info_order['status'] == "shipping"  or $info_order['status'] == "completed") {
                        $data = array(
                            'status' => "cancel"
                        );
                        db_update("tbl_customer", $data, "`order_code`='{$order_code}'");
                    }
                }
            }
        }
    }
    //xử lý phân trang
    //
    $num_rows=db_num_rows("SELECT * FROM `tbl_customer` WHERE `status`='shipping' ");
    $num_per_page=3 ;
    //Tổng số bản ghi
    $total_row=$num_rows;
    //=>Tổng số trang
    $num_page = ceil($total_row/$num_per_page);

    
   $page=isset($_GET['id'])?(int)$_GET['id']:1;
   $start=($page -1)*$num_per_page;
   $list_customer=get_customer_by_pagging($start,$num_per_page,'tbl_customer',"`status`='shipping'");
   $data=array(
       'list_customer'=>$list_customer,
       'num_page'=>$num_page,
       'page'=>$page,
       'start'=>$start,
       'num_rows'=>$num_rows
   );
    load_view('list_shipping',$data);
}