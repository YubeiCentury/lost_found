<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    
    $id = $_GET['id'];
    $type = $_GET['type'];
    if(empty($id)||empty($type)){
        echo makeErrJons(40001,"参数不能为空");
        die();
    }else{
        if(strcmp($type,"idcard")==0){
            $sql = "delete from lost_found_idcard where id = :id";
        }elseif(strcmp($type,"lost")==0){
            $sql = "delete from lost_found where id = :id";
        }else{
            echo makeErrjson(40001,"illegal parameter");
            die();
        }
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