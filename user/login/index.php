<?php
    
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case 'GET':{
            require_once('get.php');
            break;
        }
        default: echo makeErrJson(40501,"未找到相应请求方式");
    }
    
?>