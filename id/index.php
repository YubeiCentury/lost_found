<?php
    
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/token.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/header.php");
    $method = $_SERVER['REQUEST_METHOD'];
    $header = getHttpHeader();
    $token = $header['Authorization'];
    if(isValidToken($token)){
        switch($method){
            case 'GET':{
                require_once('get.php');
                break;
            }
            default: echo makeErrJson(40501,"未找到相应请求方式");
        }
    }else{
        echo makeErrJson(40101,"无效token");
    }
?>