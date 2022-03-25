<?php

function get_pagging($num_page,$page,$base_url=""){
    $str_pagging="<ul class='list-item clearfix'>";
    //Xử lý nút pre(Tư duy:trang hiện tại phải lớn hơn 1 thì mới xuất hiện nút Prev)
    if($page >1){
        $page_prev = $page -1;
        $str_pagging .="<li><a href=\"{$base_url}&id={$page_prev}\">Trước</a></li>";
    }
    for($i=1;$i<=$num_page;$i++){
        //Thuật toán:kiểm tra xem cái $page mà ta get xuống nó trùng với page nào trong li thì thêm class active
        $active = "";
        if($i==$page) $active="class='active'";
        $str_pagging .="<li {$active}><a href=\"{$base_url}&id={$i}\">{$i}</a></li>";
    }
    //Xử lý đến nút next(Tư duy:nút Next xuất hiện khi nó còn nhỏ hơn tổng số trang)
    if($page <$num_page){
        $page_next = $page +1;
        $str_pagging .="<li><a href=\"{$base_url}&id={$page_next}\">Sau</a></li>";
    }
    $str_pagging .="</ul>"; //nối chuỗi 
    return $str_pagging;

    
}

function get_pagging_product($num_page,$page,$base_url="")
{
    $str_pagging="<ul class='list-item clearfix'>";
    //Xử lý nút pre(Tư duy:trang hiện tại phải lớn hơn 1 thì mới xuất hiện nút Prev)
    if($page >1){
        $page_prev = $page -1;
        $str_pagging .="<li><a href=\"{$base_url}&page={$page_prev}\">Trước</a></li>";
    }
    for($i=1;$i<=$num_page;$i++){
        //Thuật toán:kiểm tra xem cái $page mà ta get xuống nó trùng với page nào trong li thì thêm class active
        $active = "";
        if($i==$page) $active="class='active'";
        $str_pagging .="<li {$active}><a href=\"{$base_url}&page={$i}\">{$i}</a></li>";
    }
    //Xử lý đến nút next(Tư duy:nút Next xuất hiện khi nó còn nhỏ hơn tổng số trang)
    if($page <$num_page){
        $page_next = $page +1;
        $str_pagging .="<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";
    }
    $str_pagging .="</ul>"; //nối chuỗi 
    return $str_pagging;

    
}



