<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    
    $id = $_GET['id'];
    if(empty($id)){
        echo makeErrJons(40001,"参数不能为空");
        die();
    }else{
        $sql = "delete from lost_found where id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_STR);
        $query->execute();
        if($query->execute()){
            echo makeErrjson(0,"success");
        }else{
            echo makeErrJson(50001,"failed");
        }
    }
    
?>