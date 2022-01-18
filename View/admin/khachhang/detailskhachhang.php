<?php
session_start();
$ho=null;$ten=null;$sdt=null;$gt=null;$loai=null;$username=null;$password=null;

if(isset($_POST['Back']))
{
    header('Location: khachhang_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_nv = "select khachhang_ho, khachhang_ngaysinh, khachhang_ten, khachhang_sdt, gioi_tinh, password, kh_lkh.maloaikh , sodu
    from khachhang kh join taikhoan tk join khachhang_loaikh kh_lkh join loaikhachhang lkh 
    WHERE kh.khachhang_id=tk.ma_khachhang and kh.khachhang_id=kh_lkh.makh AND kh_lkh.maloaikh=lkh.maloaikh and kh.khachhang_id='{$_GET['id']}'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$sql_nv);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $ho = $data['khachhang_ho'];
    $ten = $data['khachhang_ten'];
    $ngaysinh= $data['khachhang_ngaysinh'];
    $sdt = $data['khachhang_sdt'];
    
    $gt = $data['gioi_tinh'];
    $loai = $data['maloaikh'];
    $password= $data['password'];
}
if(isset($_POST['Edit']))
{
    


    header('Location: editKhachHang.php?id='.$_GET['id']);
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
           
                <h2>Thông tin nhân viên</h2>
                <table>
                    <tr>
                        <th>Họ và tên:</th>
                        <td><p><?php echo $ho." ".$ten?></p></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td><p><?php echo date_format(date_create($ngaysinh),"d/m/Y");?></p></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><p><?php echo $sdt?></p></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><p><?php if($gt==1) echo "Nam"; else echo "Nữ";?></p></td>

                    </tr>
                    <tr>
                        <th>Loại khách hàng:</th>
                        <td>
                           
                           
                            <?php 
                                include "../../../Controller/getAllLoaiKhachHang.php";
                                if (mysqli_num_rows($resultlkh) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlkh->fetch_assoc()) {
                                       
                                        if($row['maloaikh']==$loai)
                                        {
                                            echo $row['tenloaikh'];
                                        }
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
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