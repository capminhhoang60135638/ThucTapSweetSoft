<?php
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    
  
     $sql_lnv="DELETE FROM `loainhanvien` WHERE maloainv='".$_GET['id']."'";
     mysqli_query($conn,$sql_lnv);
     header('Location: loainv_index.php');
}
?>