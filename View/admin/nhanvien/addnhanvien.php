<?php
if(isset($_POST['Add']))
{
    

    include "../../../Controller/connect.php";
    
    $sql_addnhanvien= "insert into nhanvien(nhanvien_ho,nhanvien_ten,nhanvien_sdt,nhanvien_gioitinh) values ('{$_POST['ho']}','{$_POST['ten']}','{$_POST['sdt']}','{$_POST['gt']}')";
    mysqli_query($conn,$sql_addnhanvien);
    $sql_timmanv= "SELECT * FROM nhanvien nv ORDER BY nv.nhanvien_id DESC LIMIT 1";
    $query_manv=mysqli_query($conn,$sql_timmanv);
    $data = mysqli_fetch_array($query_manv);
    $manv=$data['nhanvien_id'];
    
    $sql_addlnv="insert into nhanvien_loainv(nhanvien_id,loainv_id) values('$manv','".$_POST['lnv']."')";
    mysqli_query($conn,$sql_addlnv);
    $sql_addtaikhoan="insert into taikhoan(user_id,username,password) values('$manv','".$_POST['username']."','".$_POST['pass']."')";
   
    mysqli_query($conn,$sql_addtaikhoan);
    header('Location: nhanvien_index.php');





    

}
if(isset($_POST['Cancel']))
{
    header('Location: nhanvien_index.php');
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
                <h3 align="center">ĐĂNG KÝ NHÂN VIÊN</h3>
                <fieldset>
                    <legend>Thông tin nhân viên</legend>
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
                        <th>Số điện thoại:</th>
                        <td><input type="text" name="sdt" value="" ></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><input type="radio" name="gt" value="1">Nam <input type="radio" name="gt" value="0">Nữ</td>

                    </tr>
                    <tr>
                        <th>Chức vụ:</th>
                        <td>
                            <select name="lnv">
                            <option value="" selected>---Chọn---</option>
                            <?php 
                                include "../../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        echo "<option value=".$row['maloainv'].">".$row['tenloainv']."</option>";
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                   
                    
                </table>
                </fieldset>
                <fieldset>
                    <legend>Đăng ký tài khoản</legend>
                    <table>
                        <tr>
                            <th>Username:</th>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="pass"></td>
                        </tr>
                    </table>
                </fieldset>
                <div>
                    <input name="Add" type="submit" value="Thêm"> <input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>