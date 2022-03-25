

<?php

function construct() {

    load_model('index');
    
    
}

function indexAction(){
    // show_array($_SESSION['cart']);
    // $get_list_buy=get_list_buy_cart();
    load_view('index');
}
function addCartAction(){
    $id=(int)$_GET['id'];
    $num_order = $_GET['num_order'];
   
    $info_product=get_info_product_by_id($id);
    if($num_order>1){
        $num_order = $_GET['num_order'];
        add_cart($id,$num_order);
    }else {
        $num_order = 1;
        add_cart($id, $num_order);
    }
    // add_cart($id);
   redirect_to('?mod=cart&action=index');
}
function deleteAction(){
    $id=(int)$_GET['id'];
    delete_cart_by_id($id);
    redirect_to('?mod=cart&action=index');
}
//cập nhật giỏ hàng bằng Ajax
function update_ajaxAction(){
    $id=$_POST['id'];
    $qty=$_POST['qty'];

    //Lấy thông tin sản phẩm
    $item = get_info_product_by_id($id);

    if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']['buy'])){
    //Cập nhật số lượng
    $_SESSION['cart']['buy'][$id]['qty']=$qty;

    //Cập nhật tổng tiền
    $sub_total=$qty*$item['price'];
    $_SESSION['cart']['buy'][$id]['sub_total']=$sub_total;

    //cập nhật toàn bộ giỏ hàng
    update_info_cat();

    //lấy tổng giá trị trong giỏ hàng
    $total=get_total_cart();
    //lấy ra tổng số đơn hàng
    $num_order=get_num_order_cat();
    //giá trị trả về
    $data=array(
        'sub_total'=>currency_format($sub_total),
        'total'=>currency_format($total),
        'num_order'=>$num_order,
        'qty'=>$qty
    );
    echo json_encode($data);
    }
}   
function buyNowAction(){
    $id=(int)$_GET['id'];
    $num_order=1;
    add_cart($id,$num_order);
    redirect_to("?mod=cart&action=checkout");
}
function checkoutAction(){
   
    global $error,$fullname,$email,$address,$phone,$note,$payment;
    if(isset($_POST['btn-order'])){
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
        //check address
        if(empty($_POST['address'])){
            $error['address']="Bạn không được để trống địa chỉ nhận hàng";
        }else {
            $address=$_POST['address'];
        }
        //check phone
        if(empty($_POST['phone'])){
            $error['phone']="Bạn không được để trống số điện thoại nhận hàng";
        }else {
            if(!is_phone_number($_POST['phone'])){
                $error['phone']="Số điện thoại không đúng định dạng";
            }else {
                $phone=$_POST['phone'];
            }
        }
        //check note
        if(empty($_POST['note'])){
            $error['note']="Bạn không được để trống ghi chú";
        }else {
            $note=$_POST['note'];
        }
        //check payment method
        if(empty($_POST['payment-method'])){
            $error['payment']="Vui lòng chọn 1 trong 2 hình thức thanh toán";
        }else {
           $payment=$_POST['payment-method'];
        }
        if(empty($error)){
            if(isset($_SESSION['cart'])){
                $date = date('Y-m-d');
                $order_code="ISMART"."_".rand(1,100000);
                //DỮ LIỆU BẢNG KHÁCH HÀNG
                $data=array(
                'fullname'=>$fullname,
                'email'=>$email,
                'address'=>$address,
                'phone'=>$phone,
                'note'=>$note,
                'num_order'=>get_num_order_cat(),
                'total'=>get_total_cart(),
                'time'=>$date,
                'status'=>'pending',
                'payment_method'=>$payment,
                'note'=>$note,
                'order_code'=>$order_code
                );
                db_insert("tbl_customer",$data);
                ////dữ liệu bảng hóa đơn
                foreach($_SESSION['cart']['buy'] as $item){
                    $data=array(
                        'order_code'=>$order_code,
                        'product_id'=>$item['id'],
                        'qty'=>$item['qty'],
                        'sub_total'=>$item['sub_total'],
                        'created_date'=>$date,
                        'status'=>'pending'
                    );
                    db_insert("tbl_order",$data);
                    $info_product =  get_info_product_by_id($item['id']);
                    $qty_product = $info_product['qty'] - $item['qty'];
                    $data_update = array(
                    'qty' => $qty_product
                    );
                    db_update("tbl_product", $data_update, "product_id={$item['id']}");
                    //gửi thông tin đơn hàng vào mail của người dùng
                    $info_order=send_order_email($_SESSION['cart']['buy']);
         
                    $content=" <p>Chào bạn <strong>{$fullname}</strong></p>
                    <p><strong>Chúc mừng bạn đã đặt hàng thành công!</strong></p>
                    <p>Mã đơn hàng:<strong>{$order_code}</strong></p>
                    <p>Tên khách hàng:<strong>{$fullname}</strong></p>
                    <p>Địa chỉ:<strong>{$address}</strong></p>
                    <p>Số điện thoại:<strong>{$phone}</strong></p>
                    <p>Ghi chú:<strong>{$note}</strong></p>
                   
                    <p>Thông tin chi tiết đơn hàng: {$info_order}</p>
                    <p>Support Hải Long Sport Team</p>";
 
                 send_mail($email,$fullname,'Thông tin đơn hàng',$content,'Ok');
                unset($_SESSION['cart']);
                    redirect_to("?mod=cart&action=thanks&order_code=$order_code");
                    // $error['success']="Chúc mừng bạn đã đặt hàng thành công";
                }
                
                
            }
        }
        
}
    load_view('checkout');
}
function thanksAction(){
    $order_code=$_GET['order_code'];
    $data['order_code']=$order_code;
    load_view('thanks',$data);
}