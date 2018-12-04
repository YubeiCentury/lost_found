<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    
    $id = $_POST['id'];
    $describe = $_POST['describe'];
    if(empty($id)){
        echo makeErrJson(40001,"id不能为空");
        die();
    }else{
        $sql = "update lost_found set description = :describe where id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(':describe',$describe,PDO::PARAM_STR);
        $query->bindValue(':id',$id,PDO::PARAM_STR);
        $query->execute();
        if($query->execute()){
            echo makeErrjson(0,"success");
        }else{
            echo makeErrJson(50001,"failed");
        }
    }
    
?>