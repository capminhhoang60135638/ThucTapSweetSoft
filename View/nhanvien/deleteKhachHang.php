<?php
if(isset($_GET['id_kh']))
{
    include "../../Controller/connect.php";
    //xoa loai nv
    $sql_khachhang_lkh="DELETE FROM `khachhang_loaikh` WHERE makh=".$_GET['id_kh'];
    mysqli_query($conn,$sql_khachhang_lkh);

    //xoa tai khoan
        
       
        
        $sql_taikhoan="DELETE FROM `taikhoan` WHERE ma_khachhang=".$_GET['id_kh'];
     mysqli_query($conn,$sql_taikhoan);


     //xoa nhanvien
     $sql_khachhang="DELETE FROM `khachhang` where khachhang_id=".$_GET['id_kh'];
     mysqli_query($conn,$sql_khachhang);
     $link="khachhang_index.php?id=".$_GET['id'];
    header('Location: '.$link);
}
?>