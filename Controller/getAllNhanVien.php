<?php
    include "connect.php";
    $nv= "select * from nhanvien";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= $conn->query($nv);

    

?>