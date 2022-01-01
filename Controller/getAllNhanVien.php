<?php
    include "connect.php";
    $nv= "select * from nhanvien nv join nhanvien_loainv nv_lnv join loainhanvien lnv where nv.nhanvien_id=nv_lnv.nhanvien_id and nv_lnv.loainv_id=lnv.maloainv";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $allnv= mysqli_query($conn,$nv);


    

?>