

<?php

function construct() {

    load_model('index');
    
    
}

function indexAction() {
    if(isset($_GET['sm-s'])){
        $key=$_GET['key'];
        $result_search= Search('tbl_product',$key,'product_title');
    }
    $data['result_search']=$result_search;
    $data['key']=$key;
    
    load_view('index',$data);
   
   
}
