
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
               <textarea class="form-control" id="menu">

               </textarea>
               <input type="button" classs="btn btn-success" id="updatemenu" value="更新菜单"/>
</div>




<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="js/vendor/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>


<!--<script src="js/plugins.js"></script>
<script src="js/main.js"></script>-->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

</body>
<script>
   $("#updatemenu").on("click",function(){
             var menustr=$("#menu").val();
           $.ajax({
                   url:"controller/menu.php",
                   method:"post",
                   data:{"menustring":menustr},
                   dataType:"json"
               }).success(function(d){
                           var r=JSON.parse(d)["msg"];
                          alert(r);

                       })
   })
</script>
</html>
