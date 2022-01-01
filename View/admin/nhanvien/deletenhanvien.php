<?php
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    
    $sql_nhanvien_lnv="DELETE FROM `nhanvien_loainv` WHERE nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_nhanvien_lnv);
     $sql_taikhoan="DELETE FROM `taikhoan` WHERE user_id=".$_GET['id'];
     mysqli_query($conn,$sql_taikhoan);
     $sql_nhanvien="DELETE FROM `nhanvien` where nhanvien_id=".$_GET['id'];
     mysqli_query($conn,$sql_nhanvien);
     header('Location: nhanvien_index.php');
}
?>