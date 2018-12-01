<?php

	require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/inc/upload.php");

	$id = $name_owner = $stuno = $describe =$name_pickup = $contact = $image = $url =$contactType = $fromStuno = $timestamp = $err = "" ;
	$id          = getRandChar(6);	//获取id
	$name_owner  = test_input($_POST['name_owner']);		//失主姓名
	$stuno       = test_input($_POST['stuno']);	//失主学号
	$describe    = test_input($_POST['describe']);		//物品描述(类型)
	$name_pickup = test_input($_POST['name_pickup']);	//拾取人姓名
	$contactType = $_POST['contactType'];	//联系方式
	$contact     = test_input($_POST['contact']);	//具体QQ号、微信号、电话
	$fileName 	 = $_FILES["file"]["name"];
	$filePath	 = "../../image/".$fileName;
	var_dump($_FILES["file"]["tmp_name"]);
	move_uploaded_file($_FILES["file"]["tmp_name"],$filePath);
	/*/
	$data = upload($fileName);
	$dataarr = json_decode($data,true);
	/*/
	$timestamp   = getTime();	//获取当前时间
	$token       = NULL;
	$fromStuno   = NULL;
	//$token       = $_GET['token'];	//获取用户token
	//$fromStuno   = getStuno($token);	//获取用户学号
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
		$sql = "INSERT INTO lost_found_idcard 
		(id, name_owner, stuno, description, url, name_pickup, contactType, contact, fromStuno, timestamp)
		VALUES (:id,:name_owner,:stuno,:describe,:url,:name_pickup,:contactType,:contact,:fromStuno,:timestamp)";
		$query = $db->prepare($sql);
		$query->bindValue(':id',$id,PDO::PARAM_STR);
		$query->bindValue(':name_owner',$name_owner,PDO::PARAM_STR);
		$query->bindValue(':stuno',$stuno,PDO::PARAM_INT);
		$query->bindValue(':describe',$describe,PDO::PARAM_STR);
		$query->bindValue(':url',$url,PDO::PARAM_STR);
		$query->bindValue(':name_pickup',$name_pickup,PDO::PARAM_STR);
		$query->bindValue(':contactType',$contactType,PDO::PARAM_STR);
		$query->bindValue(':contact',$contact,PDO::PARAM_STR);
		$query->bindValue(':fromStuno',$fromStuno,PDO::PARAM_STR);
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