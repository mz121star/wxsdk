<?php
   error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();
   include_once('../base/dbhelper.php');

   $menustring=$_POST["menustring"];


   $dbhelper=new dbhelper();
   $r=$dbhelper->updateMenu($_SESSION["uname"],$menustring);
    echo  json_encode('{"msg":"ok"}');




?>
