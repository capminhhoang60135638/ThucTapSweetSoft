<?php

session_start();
if(isset($_POST['Back']))
{
    header('Location: loainv_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_lnv = "select * from `loainhanvien` where maloainv='".$_GET['id']."'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result_lnv= mysqli_query($conn,$sql_lnv);
    $data = $result_lnv -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $malnv = $data['maloainv'];
    $tenlnv = $data['tenloainv'];
    
}
if(isset($_POST['Edit']))
{
    


    header('Location: editloainv.php?id='.$_GET['id']);
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
        <title></title>
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
            #info
            {
                
                padding-bottom: 300px;
                
                }
            
          
            #form_info{
                position: absolute;
                top: 50%;
                left: 50%;
                 transform: translate(-50%);
                 background-color: whitesmoke;
                border-radius: 15px; 
            }
            #button_submit{
                text-align: center;
            }
            h2{
                text-align: center;
                color: red;
            }
            #bt{
                display: flex;
                justify-content: center;
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
        <div id="info">
        <form method="POST" action="" id="form_info">
           
                <h2>Thông tin chức vụ</h2>
                <table>
                    <tr>
                        <th>Mã chức vụ:</th>
                        <td><p><?php echo $malnv?></p></td>
                    </tr>
                    
                    <tr>
                        <th>Tên chức vụ:</th>
                        <td><p><?php echo $tenlnv?></p></td>
                    </tr>
                   
                 
                
                    
                </table>
                <div id="bt">
                <input name="Edit" type="submit" value="Chỉnh sửa"> &emsp;
                        <input type="submit" name="Back" value="Quay lại">
                </div>
              
           
        </form>
        </div>
        </div>
       
        <script src="" async defer></script>
    </body>
</html>