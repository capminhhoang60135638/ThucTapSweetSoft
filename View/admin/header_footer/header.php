<?php
session_start(); 
//require_once "../php/check_username.php"
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
              body{
                background-image: url("../image/backgroundbank.png");
                background-size: cover;
            }
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
               
            }
            li{
                float: left;
            }
            li,a, .dropbtn{
                display: inline-block;
                
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 15px;
            }
            li:hover,.dropdown:hover .dropbtn{
                background-color: #FFFF66;
                
            }
            .logobank{
                width: 100px;
                height: 70px;
            }
            .login{
                background-color: burlywood;
                width: 400px;
                height: 150px;
            }
            
           
            
            .container{
                
             
                background-color: wheat ;
            }
          

            ul li {
            list-style: none;
            float: left;
            }
            ul li:last-child{
            float: right;
            
            }
</style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <nav>
            
                
                    <ul>
                        <li><img class="logobank" src="../image/logobank.png"></li>
                        <li><a href="">Trang chủ</a></li>
                        <li><a href="../nhanvien/nhanvien_index.php">Nhân viên</a></li>
                        <li><a href="../loainv/loainv_index.php">Chức vụ</a></li>
                        <li><a href="../khachhang/khachhang_index.php">Khách Hàng</a></li>
                        <li><a href="../hoadon/hoadon_index.php">Hóa đơn</a></li>
                        <li><a href="../account/account_index.php">Account</a></li>
                        <?php
                            if(isset($_SESSION["username"]))
                            {
                            ?>
                            <li class='dropdown'>
                                    <!-- <a class='dropbtn'><img src='<?php ?>'></a> -->
                                <div class='dropdown-content'>
                                    <a href='../php/logout.php'>Logout</a>
    
                                </div>
                            </li>
                            <?php
                            }
                            else{
                                echo "<li><a href=''>Login</a></li>";
                            }
                        ?>
                        
                        
                    </ul>
                    
                
           
            </nav>
        </div>
        <script src="" async defer></script>
    </body>
</html>
