<?php

    //header('Content-Type:text/plain;charset=utf-8');
    require_once("../../inc/tool.php");
    require_once("../../inc/dblocal.php");
    //require_once("dbhduhelp.php");
	$id = $_GET['id'];
	$find_id = "select * from lost_found_idcard where id = :id";
    $query = $db->prepare($find_id);
	$query->bindValue(':id',$id,PDO::PARAM_STR);
    $query->execute();
    if(!$query->execute()){
        echo makeErrJson(50001,"Internal Server Error");
    }else{
        if($query->rowCount()!=0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $name_owner = $row['name_owner'];
            $stuno = $row['stuno'];
            $describe = $row['description'];
            $url = $row['url'];
            $name_pickup = $row['name_pickup'];
            $contactType = $row['contactType'];
            $contact = $row['contact'];
            $timestamp = $row['timestamp'];
            $data = array(
                "error" => 200,
                "msg" => "success",
                "data" => array(
                    "name_owner" => $name_owner,
                    "stuno" => $stuno,
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