<?php
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    
  
     $sql_lnv="DELETE FROM `loaikhachhang` WHERE maloaikh='".$_GET['id']."'";
     mysqli_query($conn,$sql_lnv);
     header('Location: loaikh_index.php');
}
?>