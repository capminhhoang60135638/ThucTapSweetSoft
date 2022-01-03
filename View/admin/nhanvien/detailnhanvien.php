<?php
$ho=null;$ten=null;$sdt=null;$gt=null;$loai=null;$username=null;$password=null;

if(isset($_POST['Back']))
{
    header('Location: nhanvien_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_nv = "select nhanvien_ho, nhanvien_ten, nhanvien_sdt, nhanvien_gioitinh, username, password, loainv_id from nhanvien nv join taikhoan tk join nhanvien_loainv nv_lnv join loainhanvien lnv where nv.nhanvien_id=tk.user_id and nv.nhanvien_id= nv_lnv.nhanvien_id and nv_lnv.loainv_id=lnv.maloainv and nv.nhanvien_id='{$_GET['id']}'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$sql_nv);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $ho = $data['nhanvien_ho'];
    $ten = $data['nhanvien_ten'];
    $sdt = $data['nhanvien_sdt'];
    $gt = $data['nhanvien_gioitinh'];
    $loai = $data['loainv_id'];
    $username= $data['username'];
    $password= $data['password'];
}
if(isset($_POST['Edit']))
{
    include "../../../Controller/connect.php";
    
    


    $sql_update_nv="UPDATE `nhanvien` SET `nhanvien_ho`='".$_POST['ho']."',`nhanvien_ten`='".$_POST['ten']."',`nhanvien_sdt`='".$_POST['sdt']."',`nhanvien_gioitinh`='".$_POST['gt']."' WHERE nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_nv);


    
       
    $sql_update_lnv="UPDATE `nhanvien_loainv` nv_lnv SET `loainv_id`='".$_POST['lnv']."' WHERE nv_lnv.nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_lnv);



    
  
    $sql_update_tk="UPDATE `taikhoan` tk SET `username`='".$_POST['username']."',`password`='".$_POST['pass']."' WHERE tk.user_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_tk);


    header('Location: editnhanvien.php?id='.$_GET['id']);
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
                        <th>Số điện thoại:</th>
                        <td><p><?php echo $sdt?></p></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><p><?php if($gt==1) echo "Nam"; else echo "Nữ";?></p></td>

                    </tr>
                    <tr>
                        <th>Chức vụ:</th>
                        <td>
                           
                           
                            <?php 
                                include "../../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        if($row['maloainv']==$loai)
                                        {
                                            echo $row['tenloainv'];
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