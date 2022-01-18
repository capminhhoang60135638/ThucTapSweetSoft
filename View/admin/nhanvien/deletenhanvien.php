<?php
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    //xoa loai nv
    $sql_nhanvien_lnv="DELETE FROM `nhanvien_loainv` WHERE nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_nhanvien_lnv);

    //xoa tai khoan
      
        
        
        $sql_taikhoan="DELETE FROM `taikhoan` WHERE ma_nv=".$user_id;
     mysqli_query($conn,$sql_taikhoan);


     //xoa nhanvien
     $sql_nhanvien="DELETE FROM `nhanvien` where nhanvien_id=".$_GET['id'];
     mysqli_query($conn,$sql_nhanvien);
     header('Location: nhanvien_index.php');
}
?>