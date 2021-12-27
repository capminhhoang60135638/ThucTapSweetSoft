<?php

if(isset($_POST['Cancel']))
{
    header('Location: nhanvien_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $nv= "select * from nhanvien nv, loainhanvien lnv, taikhoan tk where nv.nhanvien_loai=lnv.maloainv and nv.nhanvien_id='{$_GET['id']}' and nv.user_id=tk.user_id";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$nv);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $ho = $data['nhanvien_ho'];
    $ten = $data['nhanvien_ten'];
    $sdt = $data['nhanvien_sdt'];
    $gt = $data['nhanvien_gioitinh'];
    $loai = $data['nhanvien_loai'];
    //anh
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
        <title>Chỉnh sửa thông tin nhân viên </title>
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
            
            #footer
            {
            position: absolute;
                width: 100%;
            height: 100px;
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
                <h2>CHỈNH SỬA NHÂN VIÊN</h2>
                <table>
                    <tr>
                        <th>Họ:</th>
                        <td><input type="text" name="ho" value="" placeholder="<?php echo $ho?>"></td>
                    </tr>
                    <tr>
                        <th>Tên:</th>
                        <td><input type="text" name="ten" value="" placeholder="<?php echo $ten?>"></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><input type="text" name="sdt" value="" placeholder="<?php echo $sdt?>"></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td>
                            <input type="radio" name="gt" value="1" <?php if($gt==1) echo "checked";?> >Nam 
                            <input type="radio" name="gt" value="0" <?php if($gt==0) echo "checked";?> >Nữ
                        
                        </td>

                    </tr>
                    <tr>
                        <th>Chức vụ:</th>
                        <td>
                            <select name="lnv">
                            
                            <?php 
                                $str="";
                                include "../../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        $str.="<option value=".$row['maloainv'];
                                        if($row['maloainv']=$loai) 
                                            $str.=" checked".">".$row['tenloainv'];;

                                        echo "</option>";
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                            <th>Ảnh đại diện:</th>
                            <td>
                                <input type="file" name="image">
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="button_submit"><input name="Submit" type="submit" value="Chỉnh sửa">  <input type="submit" name="Cancel" value="Hủy"></td>
                    </tr>
                </table>
            </form>
        
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>