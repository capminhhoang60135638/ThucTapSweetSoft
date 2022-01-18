<?php
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    //xoa loai nv
    $sql_khachhang_lkh="DELETE FROM `khachhang_loaikh` WHERE makh=".$_GET['id'];
    mysqli_query($conn,$sql_khachhang_lkh);

    //xoa tai khoan
       
        
     
        
        $sql_taikhoan="DELETE FROM `taikhoan` WHERE ma_khachhang=".$user_id;
     mysqli_query($conn,$sql_taikhoan);


     //xoa nhanvien
     $sql_khachhang="DELETE FROM `khachhang` where khachhang_id=".$_GET['id'];
     mysqli_query($conn,$sql_khachhang);
     header('Location: khachhang_index.php');
}
?>