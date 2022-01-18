<?php
session_start();
$str="";
if(isset($_POST['Add']))
{
    if ($_POST['pass']==$_POST['repass'])
    {
        include "../../Controller/connect.php";
        //them vao bang khach hang
        $sql_addkhachhang="INSERT INTO `khachhang`(`khachhang_ho`, `khachhang_ten`, `khachhang_ngaysinh`, `gioi_tinh`, `khachhang_sdt`, `sodu`) VALUES ('".$_POST['ho']."','".$_POST['ten']."','".$_POST['ngaysinh']."',b'".$_POST['gt']."','".$_POST['sdt']."','".$_POST['sodu']."')"; 
        mysqli_query($conn,$sql_addkhachhang);
        
        
        //tim ma khach hàng
        $sql_timmakh= "SELECT * FROM khachhang kh ORDER BY kh.khachhang_id DESC LIMIT 1";
        $query_makh=mysqli_query($conn,$sql_timmakh);
        $data = mysqli_fetch_array($query_makh);
        $makh=$data['khachhang_id'];
        
        //add vào bang loai khach hang
        $sql_addlkh="insert into khachhang_loaikh(makh,maloaikh) values('$makh','".$_POST['lkh']."')";
        mysqli_query($conn,$sql_addlkh);
    
    
        //add vào bảng tk
        $sql_addtaikhoan="insert into taikhoan( `ma_khachhang`, `password`) values('".$makh."','".$_POST['pass']."')";
        mysqli_query($conn,$sql_addtaikhoan);
    
        
        
        header('Location: khachhang_index.php?id='.$_GET['id']);
    }
    else{
        $str.="Nhập mật khẩu lại không đúng";
    }
   





    

}

if(isset($_POST['Cancel']))
{
    header('Location: khachhang_index.php?id='.$_GET['id']);
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
        <title>Thêm khách hàng  </title>
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
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="container">
        <div id="header">
            <?php include "header/header.php"?>
        </div>
        <div id="add">
            <form method="POST" action="" id="form_add">
                <h3 align="center">ĐĂNG KÝ KHÁCH HÀNG</h3>
                <fieldset>
                    <legend>Thông tin khách hàng</legend>
                <table>
                    <tr>
                        <th>Họ:</th>
                        <td><input type="text" name="ho" value="" placeholder="Nguyễn Văn"></td>
                    </tr>
                    <tr>
                        <th>Tên:</th>
                        <td><input type="text" name="ten" value="" placeholder="An"></td>
                    </tr>
                     <tr>
                        <th>Ngày sinh:</th>
                        <td><input type="date" name="ngaysinh" value=""></td>
                    </tr>
                    
                    <tr>
                        <th>Giới tính:</th>
                        <td><input type="radio" name="gt" value="1">Nam <input type="radio" name="gt" value="0">Nữ</td>

                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><input type="text" name="sdt" value="" ></td>
                    </tr>
                    <tr>
                        <th>Loại khách Hàng:</th>
                        <td>
                            <select name="lkh">
                            <option value="" selected>---Chọn---</option>
                            <?php 
                                include "../../Controller/getAllLoaiKhachHang.php";
                                if (mysqli_num_rows($resultlkh) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlkh->fetch_assoc()) {
                                       
                                        echo "<option value=".$row['maloaikh'].">".$row['tenloaikh']."</option>";
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Số tiền:</th>
                        <td><input type="text" name="sodu" value="" ></td>
                    </tr>
                   
                    
                </table>
                </fieldset>
                <fieldset>
                    <legend>Đăng ký tài khoản</legend>
                    <table>
                        <tr>
                            <th>Mật khẩu:</th>
                            <td><input type="password" name="pass"></td>
                        </tr>
                        <tr>
                            <th>Nhập lại mật khẩu</th>
                            <td><input type="password" name="repass"></td>
                        </tr>
                    </table>
                </fieldset>
                <p><?php if($str!="") echo $str;?></p>
                <div id="bt">
                    <input name="Add" type="submit" value="Thêm">&emsp; <input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>