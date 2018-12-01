<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    $user = $_POST['user'];
    $pswd = $_POST['password'];
    $salt = 520;
    $hash = password_hash($pswd,$salt);
    echo $hash;
    if(!empty($user)&&!empty($hash)){
        $sql = "insert into login(user,password,flag) values (:user,:pswd,0)";
        $query = $db->prepare($sql);
        $query->bindValue(':user',$user,PDO::PARAM_STR);
        $query->bindValue(':pswd',$hash,PDO::PARAM_STR);
        $res = $query->execute();
        if(!$res){
            echo makeErrJson(50001,"Internal Server Error");
        }else{
            echo makeErrJson(0,"success");
        }
    }else{
        echo makeErrJson(40001,"illegal params");
    }
    
?>