<?php
session_start();
if(isset($_POST['Add']))
{
    

    include "../../../Controller/connect.php";
    
    $sql_addloaikh= "insert into loaikhachhang(maloaikh,tenloaikh) values ('".$_POST['maloaikh']."','".$_POST['loaikh']."')";
    mysqli_query($conn,$sql_addloaikh);
   
    header('Location: loaikh_index.php');





    

}
if(isset($_POST['Cancel']))
{
    header('Location: loaikh_index.php');
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
        <title>Thêm khách hàng </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            #container
            {
                position: relative;
                min-height: 100%;
            }
            #header
            {
            height: 100px;
                }
            #add
            {
                
                padding-bottom: 300px;
                
                }
            
          
            #form_add{
                position: absolute;
                top: 50%;
                left: 50%;
                 transform: translate(-50%);
                 background-color: whitesmoke;
                border-radius: 15px; 
            }
            #bt{
                display: flex;
                justify-content: center;
            }
            h2{
                text-align: center;
            }
            body{
                background-image: url("../image/backgroundbank.png");
                background-size: cover;
            }
           
            
            
            
            form{
                
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            table{
               background-color: snow;
            }
            
            
            
            a{
                color: blue;
            }

        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="container">
        <div id="header">
            <?php include "../header_footer/header.php"?>
        </div>
        <div id="add">
            <form method="POST" action="" id="form_add">
                <h3 align="center">THÊM LOẠI KHÁCH HÀNG</h3>
                <fieldset>
                  
                <table>
                    <tr>
                        <th> Mã loại:</th>
                        <td><input type="text" name="maloaikh" value="" placeholder="KH0x"></td>
                    </tr>
                    <tr>
                        <th> Tên loại:</th>
                        <td><input type="text" name="loaikh" value="" placeholder="Bạc"></td>
                    </tr>
                    
                   
                    
                </table>
                </fieldset>
                
                <div id="bt">
                    <input name="Add" type="submit" value="Thêm" >&emsp;<input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>