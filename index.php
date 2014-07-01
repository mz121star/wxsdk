   <?php
      //error_reporting(E_ALL);
      //ini_set('display_errors', '1');
      session_start();
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">


    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/iconFont.css">
    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <!--  <link rel="stylesheet" href="css/bootstrap-theme.min.css">-->
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body class="metro">


<div class="container">
   欢迎：<?php echo $_SESSION["uname"] ?>
               <textarea class="form-control" id="menu">
                   <?php
                                                        include_once('base/dbhelper.php');
                                                        $dbhelper=new dbhelper();
                                                        $r=$dbhelper->getMenuString($_SESSION["uname"]);
                                                        echo urldecode($r["menustring"]);
                                                        $menustring= urldecode($r["menustring"]) ;
                   ?>

               </textarea>
               <input type="button" classs="btn btn-success" id="updatemenu" value="更新菜单"/>
               <input type="button" classs="btn btn-success" id="publicmenu" value="发布菜单"/>
</div>




<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="js/vendor/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>


<!--<script src="js/plugins.js"></script>
<script src="js/main.js"></script>-->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>
<script>

  $("#publicmenu").on("click",function(){
    var menustr=$("#menu").val();
       $.ajax({
                         url:"controller/publicmenu.php",
                         method:"post",
                         data:{"menustring":encodeURI(menustr)},
                         dataType:"json"
                     }).success(function(d){

                                alert(r);

                             })
  })
   $("#updatemenu").on("click",function(){
             var menustr=$("#menu").val();
           $.ajax({
                   url:"controller/menu.php",
                   method:"post",
                   data:{"menustring":encodeURI(menustr)},
                   dataType:"json"
               }).success(function(d){
                           var r=JSON.parse(d)["msg"];
                          alert(r);

                       })
   })
</script>
</html>
