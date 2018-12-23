<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");

    $type = $_GET['type'];
    if(strcmp($type,"idcard")==0){
        $sql = "select id from lost_found_idcard";
    }elseif(strcmp($type,"lost")==0){
        $sql = "select id from lost_found";
    }else{
        echo makeErrJson(40001,"illegal parameter");
        die();
    }
    $query = $db->prepare($sql);
    $res = $query->execute();
    $count = $query->rowCount();
    $arr = array();
    for($i=0;$i<$count;$i++){
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $arr[$i] = array(
            "id" => $row['id']
        );
    }
    echo json_encode($arr);
?>