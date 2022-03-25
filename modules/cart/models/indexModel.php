<?php
function add_cart($id,$num_order){
    // global $list_product;
    $item = get_info_product_by_id($id);
//Thuật toán:kiểm tra xem giỏ hàng đã tồn tại chưa(tức là đã có sản phẩm) và ktra 'id' 
//đã từng xuất hiện(từng được mua hay chưa) thì xử lý $qty
    $qty=$num_order;
if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']['buy'])){
    $qty=$_SESSION['cart']['buy'][$id]['qty'] + $qty;
}
$_SESSION['cart']['buy'][$id]=array(
        'id'=>$item['product_id'],
        // 'url'=>$item['url_delete_cart'],
        'product_title'=>$item['product_title'],
        'price'=>$item['price'],
        'product_thumb'=>$item['product_thumb'],
        'code'=>$item['code'],
        'qty'=>$qty,
        // 'url' => "?mod=product&action=detai",
        'sub_total'=>$item['price'] * $qty
);
//Cập nhật lại hóa đơn cart

update_info_cat();
}
//Tổng kết lại thông tin số lượng đã mua  và tổng  tiền
//Thuật toán:Cộng tổng số lượng và giá tiền của tất cả các sp đã mua lưu vào $num_order và $total
function update_info_cat(){
    if(isset($_SESSION['cart'])){
        $num_order = 0;
        $total = 0;
        foreach($_SESSION['cart']['buy'] as $item){
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }
        $_SESSION['cart']['info']=array(
            'num_order'=>$num_order,
            'total'=>$total
        );
    }
  
}
function get_list_buy_cart(){
    if(isset($_SESSION['cart'])){
        //Muốn thêm 1 trường mới vào mảng ta phải duyệt mảng rồi đẩy phần tử đấy vào
        foreach($_SESSION['cart']['buy'] as &$item){
            $item['url_delete_cart']="?mod=cart&action=delete&id={$item['id']}";
           //Ở đây ta thêm dấu & trước $item là tham trị,tức là khi ta muốn cập nhật lại
           //giỏ hàng thì khi thêm tham trị nó sẽ tự động cập nhật
         
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}


//Hàm xóa sản phẩm
function delete_cart_by_id($id){
    if(isset($_SESSION['cart'])){
        #Xóa sản phẩm trong giỏ hàng
        #TH1:Có id thì xóa theo id
        #TH2:Không có id thì xóa toàn bộ    
        if(!empty($id)){
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cat();
           
        }else{
            unset($_SESSION['cart']);
        }
    }
}

#hàm gửi danh sách sản phẩm đã mua vào email
// function send_order_email($list_buy){
    
//     $str_order="<table style='width: 960px; max-width: 100%;'>";
//     $str_order .="<thead style='border-top: 1px solid #ddd;'>
//     <tr >
    
//     <td style='font-size: 15px;line-height: normal; text-transform: uppercase;padding: 18px 25px;color: #333; background: #f1f1f1;  border: 0;'>Tên sản phẩm</td>
//     <td style='font-size: 15px;line-height: normal; text-transform: uppercase;padding: 18px 25px;color: #333; background: #f1f1f1;  border: 0;'>Số lượng</td>
//     <td style='font-size: 15px;line-height: normal; text-transform: uppercase;padding: 18px 25px;color: #333; background: #f1f1f1;  border: 0;'>Giá</td>
//     <td style='font-size: 15px;line-height: normal; text-transform: uppercase;padding: 18px 25px;color: #333; background: #f1f1f1;  border: 0;'>Thành tiền</td>
//     </tr>
//  </thead>";
//  foreach($list_buy as $item){
//      $product_title=$item['product_title'];
//      $qty=$item['qty'];
//      $price=currency_format($item['price']);
//      $sub_total= currency_format($item['sub_total']);
//      $total=currency_format(get_total_cart());
//      $str_order .="<tbody>
//      <tr >
//      <td style='display: table-cell; vertical-align: middle; text-align: center;'>$product_title</td>
//      <td style='display: table-cell; vertical-align: middle; text-align: center;'>$qty</td>
//      <td style='display: table-cell; vertical-align: middle; text-align: center;'>$price</td>
//      <td style='display: table-cell; vertical-align: middle; text-align: center;'>$sub_total</td>
//      </tr>
//      </tbody>";
//  }
//     $str_order .="</table>";
//     $str_order .="<p>Tổng giá: <strong>$total</strong></p>";
//      return $str_order;
//  }

function send_order_email($list_buy){
    
$str_order="<table border='1' cellspacing='0' cellpadding='10' bordercolor='#305eb3' width='100%'>";
    $str_order .="<thead>
    <tr bgcolor='#305eb3'>
    <td width='50%' >Tên sản phẩm</td>
    <td width='10%'>Số lượng</td>
    <td width='20%'>Giá</td>
    <td width='20%'>Thành tiền</td>
    </tr>
 </thead>";
 foreach($list_buy as $item){
     $product_title=$item['product_title'];
     $qty=$item['qty'];
     $price=currency_format($item['price']);
     $sub_total= currency_format($item['sub_total']);
     $total=currency_format(get_total_cart());
     $product_thumb=$item['product_thumb'];
     $str_order .="<tbody>
     <tr >
     <td width='50%'>$product_title</td>
     <td width='10%'>$qty</td>
     <td width='20%'>$price</td>
     <td width='20%'>$sub_total</td>
     </tr>
     </tbody>";
 }
 
    $str_order .="</table>";
    $str_order .="<p><strong>Tổng giá: </strong><span>$total</span></p>";
     return $str_order;
 }

