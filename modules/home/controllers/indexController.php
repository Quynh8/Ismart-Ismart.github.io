<?php

function construct(){
   
    load_model('index');
    
}

function indexAction(){
    // $list_product_cat=get_list_product_cat();
    $list_slider=get_list_slider();
    $data=array(
        
        'list_slider'=>$list_slider,
        // 'list_product_cat'=>$list_product_cat
    );
   load_view('index',$data);

}
