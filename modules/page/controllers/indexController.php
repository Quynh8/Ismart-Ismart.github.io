

<?php

function construct() {

    load_model('index');
    
    
}

function indexAction() {
  
    load_view('index');
   
}

function detailAction(){
    $page_id=(int)(isset($_GET['page_id']));
    global $list_page;
    $list_page=get_list_page();
    // show_array($list_page);
    $item=get_page_by_id($page_id);
    $data['item']=$item;

    load_view('detail',$data);
}
