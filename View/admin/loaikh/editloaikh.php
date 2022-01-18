<?php
session_start();

if(isset($_POST['Cancel']))
{
    header('Location: loaikh_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_lkh = "select * from `loaikhachhang` where maloaikh='".$_GET['id']."'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
   $result_lkh= mysqli_query($conn,$sql_lkh);
   $data = $result_lkh -> fetch_array(MYSQLI_ASSOC);
   //$data = mysqli_fetch_array($result);
   $malkh = $data['maloaikh'];
   $tenlkh = $data['tenloaikh'];
}
if(isset($_POST['Confirm']))
{
    include "../../../Controller/connect.php";
    
    


    $sql_update_kh="UPDATE `loaikhachhang` SET `tenloaikh`='".$_POST['tenlkh']."' WHERE  maloaikh='".$_GET['id']."'";
    mysqli_query($conn,$sql_update_kh);


    
       
  


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
        <title>Chỉnh sửa thông tin loại khách hàng </title>
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
            #button_submit{
                text-align: center;
            }
            h2{
                text-align: center;
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
        <div id="add">
            <form method="POST" action="" id="form_add">
                <h3 align="center">CHỈNH SỬA LOẠI KHÁCH HÀNG </h3>
                <fieldset>
                    
                <table>
                    <tr>
                        <th>Mã loại khách hàng:</th>
                        <td><input type="text" name="malkh" disabled value="<?php echo $malkh?>"></td>
                    </tr>
                    <tr>
                        <th>Tên loại khách hàng:</th>
                        <td><input type="text" name="tenlkh" value="<?php echo $tenlkh?>"></td>
                    </tr>
                    
                    
                    
                </table>
                
                </fieldset>
             
                <div id="bt">
                    <input name="Confirm" type="submit" value="Xác nhận"> &emsp; <input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>