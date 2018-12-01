<?php
    
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case 'POST':{
            require_once('post.php');
            break;
        }
        default: echo makeErrJson(400,"请求方式错误");
    }
?>