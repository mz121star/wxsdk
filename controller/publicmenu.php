<?php
   error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

   include_once('../base/dbhelper.php');
$dbhelper=new dbhelper();
    $refresh=$_POST["refresh"]=="1"?true:false;
    if($refresh){
        $accesstoken=$dbhelper->GetAccseeToken($_SESSION["uname"],$refresh);
        echo "token刷新成功";
        exit;
    }
   $menustring=$_POST["menustring"];

   $menustring=urldecode($menustring);


   $accesstoken=$dbhelper->GetAccseeToken($_SESSION["uname"]);
    echo   $menustring;
    echo    $accesstoken;
  echo  $dbhelper->createMenu($menustring,$accesstoken);





?>
