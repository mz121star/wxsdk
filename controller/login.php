<?php
   //error_reporting(E_ALL);
   //ini_set('display_errors', '1');
   session_start();

   include_once('../base/dbhelper.php');
   $wxid=$_POST["wxid"];
   $wxpwd=$_POST["wxpwd"];
   $dbhelper=new dbhelper();
   $islogin=$dbhelper->userLogin($wxid,$wxpwd);
   if($islogin){
		$_SESSION["uname"]=$wxid;
		return  json_encode('{"msg":"true"}');
   }
   else{
	   return  json_encode('{"msg":"false"}');
   }
 ?>