<?php 
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/inc/dblocal.php");
    $user = $_POST['user'];
    $pswd = $_POST['passwd'];
    $salt = 520;
    $hash = password_hash($pswd,$salt);
    $find_user = "select * from login where user = :user";
    $query = $db->prepare($find_user );
    $query->bindValue(':user',$user,PDO::PARAM_STR);
    $res = $query->execute();
    if(!$res){
        echo makeErrJson(50001,"Internal Server Error");
    }else{
        if($query->rowCount()!=0){
                $data = $query->fetch(PDO::FETCH_ASSOC);
                var_dump($data['password']);
                echo "------------".$hash;
                if(strcmp($data['password'],$hash)==0){
                    if(strcmp($data['flag'],'1')==0){
                        $_SESSION['admin'] = $user;
                        header("location:../index-admin.php");
                    }else{
                        $_SESSION['user'] = $user;
                        header("location:../index-user.php");
                    }
                }else{
                    echo makeErrJson(40101,"wrong password");
                }
            }else{
                echo makeErrJson(103201,"No such user");
            }
        }
?>