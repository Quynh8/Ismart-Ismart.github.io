
<?php

function construct()
{
    load_model('index');
    // load('lib','validation');
}

function indexAction(){
    load_view('teamIndex');
}