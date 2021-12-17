<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
	 header('Location: admin_login.php');
}
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
        <title>Trang chủ admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
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
                font-size: 20px;
            }
            li:hover,.dropdown:hover .dropbtn{
                background-color: #FFFF66;
                
            }
            img{
                width: 100px;
                height: 70px;
            }
            .login{
                background-color: burlywood;
                width: 400px;
                height: 150px;
            }
            form{
                
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            table{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            
            .container{
                
                width: 100%;
                background-color: wheat ;
            }
            

        </style>
    </head>

    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row">
                
                    <ul>
                        <li><img src="../image/logobank.png"></li>
                        <li><a href="../admin_index.php">Trang chủ</a></li>
                        <li><a href="">Nhân viên</a></li>
                
                        <li><a href="../khachhang/khachhang_index.php">Khách Hàng</a></li>
                        <li><a href="../hoadon/hoadon_index.php">Hóa đơn</a></li>
                        <li><a href="../account/account_index.php">Account</a></li>

                    </ul>
                
                
            </div>

        </div>
       
        <div>
        <form>
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>

            <?php 
            include("../../../Controller/getAllNhanVien.php");
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    
                }
            }
                         
            
            
            ?>
           </form>
        </div>
        <script src="" async defer></script>
    </body>
</html>