<?php

	//表单验证
	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	/*
    *获取随机字符串
    *
    *@param int $length 定义要生成的字符串长度
    *@return string
    */
	function getRandChar($length){
		$str = null;
		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($strPol)-1;
		for($i=0;$i<$length;$i++){
			$str.=$strPol[rand(0,$max)];
		}
		return $str;
	}


	//获取unix时间戳
    function getTime(){
		return time();
    }

	function makeErrJson($code,$msg){
		$json = array(
			"error" => $code,
			"msg" => $msg
		);
		return json_encode($json);
	}

		


	/*
    *判断是否符合提交条件：24小时内只允许提交一条
    *
	*@param string $fromStuno 拾取人学号
	*@param string $timeNow 拾取时间戳
    *@return bool
    */
    function isPemmit($fromStuno,$timeNow){
		if(!(empty($fromStuno)&&empty($timeNow))){
			require_once("dblocal.php");
			//require_once("dbhduhelp.php");
			$conn = new MySQLi($servername,$username,$password,$dbname);
			if($conn->connect_error){
				echo makeErrJson(50002,"Internal Server Error");
			}else{
				$sql = "select * from lost_found where fromStuno = :fromStuno order by timestamp desc";	//按时间戳降序排序
				$query = $db->prepare($sql);
				$query->bindValue(':title',$fromStuno,PDO::PARAM_STR);
				$query->execute();
				$res = $conn->query($sql);
				if(mysqli_num_rows($res)!=0){
					mysqli_data_seek($res,0);	//在结果集中寻找行号为0的数据
					$row = $res->fetch_array();
					//var_dump($row);
					$timeLast = $row["timestamp"];	//上一次提交时间
					$time = $timeNow-$timeLast;
					if($time>=86400){
						//如果时间差大于24小时，返回true:今日还未发送过
						return true;
					}else{
							//如果时间差小于24小时，返回false:超过次数
						return false;
					}
				}else{
					//如果是第一次提交，返回true:未发送过
					return true;
				}
			}
		}else{
			echo makeErrJson(40002,"invalid parameter");
		}
	}	
?>