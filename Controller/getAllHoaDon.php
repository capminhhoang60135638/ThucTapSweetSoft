<?php
    include "connect.php";
    $kh= "select * from hoadon where kh.khachhang_id=kh_lkh.makh and kh_lkh.maloaikh=lkh.maloaikh";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $allkh= mysqli_query($conn,$kh);


    

?>