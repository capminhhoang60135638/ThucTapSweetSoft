<?php
    include "connect.php";
    $kh= "select * from khachhang kh join khachhang_loaikh kh_lkh join loaikhachhang lkh where kh.khachhang_id=kh_lkh.makh and kh_lkh.maloaikh=lkh.maloaikh ORDER BY khachhang_id ASC";
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $allkh= mysqli_query($conn,$kh);


    

?>