<?php
    include "connect.php";
    $lnv= "select * from loainhanvien";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $resultlnv= mysqli_query($conn,$lnv);


    

?>