<?php
   error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();
   include_once('base/dbhelper.php');

   $menustring=$_POST["menustring"];
   $menustring=urldecode($r["menustring"])

   $dbhelper=new dbhelper();
   $accesstoken=$dbhelper->GetAccseeToken($_SESSION["uname"]);
    echo  $dbhelper->createMenu($menustring,$accesstoken);





?>
