<?php

	require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/upload.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/token.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/header.php");
	
    $id = $name_pickup = $fromStuno = $timestamp = $Type = $descripe = $image = $contactType = $contact="";
    $id = getRandChar(6);
	$name_pickup = test_input($_POST['name_pickup']);
    $header = getHttpHeader();
    $token = $header['Authorization'];
	$fromStuno   = getStuno($token);	//获取用户学号
	$timestamp   = getTime();
	$Type        = test_input($_POST['type']);
	$descripe    = test_input($_POST['descripe']);
    $contactType = $_POST['contactType'];
    $contact = test_input($_POST['contact']);
	$fileName 	 = $_FILES["file"]["name"];
	$filePath	 = "../image/".$fileName;
	move_uploaded_file($_FILES["file"]["tmp_name"],$filePath);
		//判断图片大小是否符合要求
		$file_size = $_FILES['file']['size'];  
        if($file_size>5*1024*1024) {  
            echo makeErrJson("40001","图片不能大于5M");
            exit();  
		}
		//判断图片类型是否正确
        $file_type=$_FILES['file']['type'];
        if($file_type!="image/jpeg" && $file_type!='image/pjpeg' && $file_type!='image/jpg' && $file_type!='image/png'){  
            echo makeErrJson("40002","图片类型错误");
            exit();  
        }
		$data = upload($filePath,$fileName);
		$dataarr = json_decode($data,true);
		$url = $dataarr['url'];
		if(!empty($url)){
			$sql = "INSERT INTO lost_found
			(id , name_pickup, Type, description, url, contactType, contact, fromStuno, timestamp) 
			VALUES (:id,:name_pickup,:Type,:descripe,:url,:contactType,:contact,:fromStuno,:timestamp)";
			$query = $db->prepare($sql);
			$query->bindValue(':id',$id,PDO::PARAM_STR);
			$query->bindValue(':name_pickup',$name_pickup,PDO::PARAM_STR);
			$query->bindValue(':Type',$Type,PDO::PARAM_STR);
			$query->bindValue(':descripe',$descripe,PDO::PARAM_STR);
			$query->bindValue(':url',$url,PDO::PARAM_STR);
			$query->bindValue(':contactType',$contactType,PDO::PARAM_STR);
			$query->bindValue(':contact',$contact,PDO::PARAM_STR);
			$query->bindValue(':fromStuno',$id,PDO::PARAM_STR);
			$query->bindValue(':timestamp',$timestamp,PDO::PARAM_STR);
			$res = $query->execute();
			if(!$res){
				echo makeErrJson(50002,"Internal Server Error");
			}else{
				echo makeErrJson(0,"success");
			}
		}else{
			echo makeErrJson(40003,"invalid parameter");
		}
	
?>