<?php
   //error_reporting(E_ALL);
   //ini_set('display_errors', '1');
   session_start();

   include_once('../base/dbhelper.php');
   $wxid=$_POST["wxid"];
   $wxpwd=$_POST["wxpwd"];
   $appid=$_POST["appid"];
   $appsecret=$_POST["appsecret"];
   $dbhelper=new dbhelper();
   $r=$dbhelper->userReg($wxid,$wxpwd,$appid,$appsecret);

if($r){

echo  json_encode('{"msg":true}');
}
else{
echo  json_encode('{"msg":false}');
}
?>