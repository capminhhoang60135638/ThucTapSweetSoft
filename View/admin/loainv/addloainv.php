<?php
session_start();
$str="";
if(isset($_POST['Add']))
{
    

    include "../../../Controller/connect.php";
    $sql_kiemtra="select * from loainhanvien where maloainv='".$_POST['maloainv']."'or tenloainv='".$_POST['loainv']."'";
    if (mysqli_num_rows(mysqli_query($conn,$sql_kiemtra)) != 0)
    {
        $str.="Mã loại nhân viên hoặc tên loại đã tồn tại";
    }
    else{
        $sql_addloainv= "insert into loainhanvien(maloainv,tenloainv) values ('{$_POST['maloainv']}','{$_POST['loainv']}')";
        mysqli_query($conn,$sql_addloainv);
       
        header('Location: loainv_index.php');
    }
   





    

}
if(isset($_POST['Cancel']))
{
    header('Location: loainv_index.php');
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
        <title>Thêm nhân viên </title>
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
            p{
                color: red;
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
                <h3 align="center">THÊM CHỨC VỤ</h3>
                <fieldset>
                  
                <table>
                    <tr>
                        <th> Mã chức vụ:</th>
                        <td><input type="text" name="maloainv" value="" placeholder="NV0x"></td>
                    </tr>
                    <tr>
                        <th> Chức vụ:</th>
                        <td><input type="text" name="loainv" value="" placeholder="Thư ký"></td>
                    </tr>
                    
                   
                    
                </table>
                </fieldset>
                <div>
                    <p align="center" ><?php if($str!="") echo $str;?></p>
                </div>
                <div id="bt">
                    <input name="Add" type="submit" value="Thêm" >&emsp;<input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>