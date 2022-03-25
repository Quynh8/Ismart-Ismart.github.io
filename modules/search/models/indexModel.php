<?php
//hàm search
function Search($table,$key,$field){
    $result_search=db_fetch_array("SELECT * FROM  `{$table}` WHERE `{$field}`  LIKE '%{$key}%' AND `status`='publish'  ORDER BY `product_id` DESC");
    return $result_search;
}