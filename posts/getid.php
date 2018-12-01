<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");

    $type = $_GET['type'];
    if(strcmp($type,"idcard")==0){
        $sheet = "lost_found_idcard";
    }elseif(strcmp($type,"lost")==0){
        $sheet = "lost_found";
    }else{
        echo makeErrJson(40001,"illegal parameter");
        die();
    }
    $sql = "select id from :sheet";
    $query = $db->prepare($sql);
    $query->bindValue(':sheet',$sheet,PDO::PARAM_STR);
    $res = $query->execute();
    $count = $query->rowCount();
    $arr = array();
    //这里下面还没修好
    for($i=0;$i<$count;$i++){
        mysqli_data_seek($res,$i);
        $row = $res->fetch_array();
        $arr[$i] = array(
            "id" => $row['id']
        );
    }
        echo json_encode($arr);
?>