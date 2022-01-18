
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
                width: 105px;
                height: 55px;
            }
            li,a, .dropbtn{
                
                display: inline-block;
                
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 20px;
                
            }
            a:hover, li:hover,.dropdown:hover .dropbtn{
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
                width: 100%;
            }
          

            ul li {
            list-style: none;
            float: left;
            }
            a:last-child{
                float: right;
            }
            .logobank{
                background-image: url("../image/logobank.png");
                background-size: cover;
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
                        <li class="logobank"></li>
                        <a href="khachhang_index.php"><li>Trang chủ</li></a>
                        <a href="guitien.php?id=<?php echo $_SESSION['makh']?>"><li>Chuyển tiền</li></a>
                        <a href="hoadon.php?id=<?php echo $_SESSION['makh']?>"><li>Lịch sử giao dịch</li></a>
                        <!-- <li><a href="../account/account_index.php">Account</a></li> -->
                        <?php
                            if(isset($_SESSION["makh"]))
                            {
                          
                            
                                   
                                
                                 echo    "<a href='logout.php'><li>Logout</li></a>
    
                                
                            </li>";
                            
                            }
                            
                        ?>
                        
                        
                    </ul>
                    
                
           
            </nav>
        </div>
        <script src="" async defer></script>
    </body>
</html>
