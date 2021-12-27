<?php
    include "connect.php";
    $nv= "select * from nhanvien nv, loainhanvien lnv where nv.nhanvien_loai=lnv.maloainv and nv";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$nv);


    

?>