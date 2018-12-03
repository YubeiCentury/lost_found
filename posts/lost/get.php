<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    //require_once("dbhduhelp.php");
	$id = $_GET['id'];
	$find_id = "select * from lost_found where id = :id ";
    $query = $db->prepare($find_id);
	$query->bindValue(':id',$id,PDO::PARAM_STR);
    $query->execute();
    if(!$query->execute()){
        echo makeErrJson(50001,"Internal Server Error");
    }else{
        if($query->rowCount()!=0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $name_pickup = $row['name_pickup'];
            $type = $row['Type'];
            $describe = $row['description'];
            $url = $row['url'];
            $contactType = $row['contactType'];
            $contact = $row['contact'];
            $timestamp = $row['timestamp'];
            $data = array(
                "error" => 0,
                "msg" => "success",
                "data" => array(
                    "name_pickup" => $name_pickup,
                    "type" => $type,
                    "describe" => $describe,
                    "url" => $url,
                    "name_pickup" => $name_pickup,
                    "contactType" => $contactType,
                    "contact" => $contact,
                    "timestamp" => $timestamp
                )
            );
            echo json_encode($data);
        }else{
            echo makeErrJson(103201,"No such id");
        }
    }
	
?>