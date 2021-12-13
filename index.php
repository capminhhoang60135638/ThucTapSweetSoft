<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Trang chủ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <link rel="stylesheet" type="text/css" href="include/css/bootstrap.css">
        <script type="text/javascript" src="include/js/bootstrap.js"></script>
    </head>
    <body>
      
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php include "View/header_footer/header.php"?>
        <div class="row">
            
			<?php
      //kiểm tra nếu tồn tại biến $_GET["page"] = "register" thì gọi register.php vào
			if(isset($_GET["page"]) && $_GET["page"] == "register")
				include "View/login/register.php";
			?>
        </div>

        <?php include "View/header_footer/footer.php"?>
        <script src="" async defer></script>
    </body>
</html>