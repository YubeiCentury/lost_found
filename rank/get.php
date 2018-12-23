<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");

    $sql = "select Type as type,count(Type) as count from lost_found group by Type order by count(Type) desc";
    $query = $db->prepare($sql);
    $query->execute();
    $count = $query->rowCount();
    $arr = array();
    for($i=0;$i<$count;$i++){
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $arr[$i] = array(
            "type" => $row['type'],
            "count" => $row['count']
        );
    }
    echo json_encode($arr);
?>