<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/inc/tool.php");
    require 'QiniuPHPsdk/autoload.php';

        //默认域名：qiniu.yubei.online
        // 引入鉴权类
        use Qiniu\Auth;
        // 引入上传类
        use Qiniu\Storage\UploadManager;
        // 需要填写你的 Access Key 和 Secret Key
        
    function upload($filePath,$fileName){
        require 'asKey.php';
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);
        // 生成上传 Token
        $token = $auth->uploadToken($bucket);
        // 要上传文件的本地路径

        //判断图片是否存在
        if(empty($filePath)||empty($fileName)){
            echo makeErrJson("40201","图片不存在");
        }

        // 上传到七牛后保存的文件名
        $key = 'lost-found/image/test/'.$fileName;
        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = new UploadManager();
        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if($ret){
            $url = array(
                    "error" => "0",
                    "msg" => "success",
                    "url" => "http://qiniu.yubei.online/".$key
                );
            return json_encode($url);
        }else{
            require_once 'tool.php';
            return makeErrJson("40202","图片上传七牛错误");
        }
    }
    
    //echo $data;
?>