<?php
session_start();
if(isset($_POST['Back']))
{
    $link="hoadon.php?id=".$_GET['id'];
    header('Location: '.$link);
}
if(isset($_GET['id_hd']))
{
    include "../../Controller/connect.php";
    $sql_hd = "select hd.hoadon_id, hd.khgui_id, hd.nhanvien_id, cthd.khnhan_id, cthd.noidung, cthd.giaodich_date,cthd.tien from hoadon hd JOIN cthoadon cthd WHERE hd.hoadon_id = cthd.hoadon_id AND  hd.hoadon_id=".$_GET['id_hd'];
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$sql_hd);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);




    $hd_id = $data['hoadon_id'];
    $khgui = $data['khgui_id'];
    $nv = $data['nhanvien_id'];
    $khnhan = $data['khnhan_id'];
    $nd = $data['noidung'];
    $ngaygd= $data['giaodich_date'];
    $tien= $data['tien'];
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../include/css/index.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="container">
        <div id="header">
            <?php include "header/header.php"?>
        </div>
        <div id="body">
        <form method="POST" action="" id="form">
           
                <h2>Thông tin hóa đơn</h2>
                <table>
                    <tr>
                        <th>Mã hóa đơn:</th>
                        <td><p><?php echo $hd_id?></p></td>
                    </tr>
                    
                    <tr>
                        <th>Khách hàng gửi:</th>
                        <td><p><?php 
                        $sql_ten_gui="SELECT concat(kh.khachhang_ho,' ',kh.khachhang_ten) as hoten FROM khachhang kh WHERE kh.khachhang_id=".$khgui;
                        $result_gui= mysqli_query($conn,$sql_ten_gui);
                        $data_gui = $result_gui -> fetch_array(MYSQLI_ASSOC);
                        echo $data_gui['hoten']?></p></td>
                    </tr>
                    <tr>
                        <th>Khách hàng nhận:</th>
                        <td><p><?php 
                        $sql_ten_nhan="SELECT concat(kh.khachhang_ho,' ',kh.khachhang_ten) as hoten FROM khachhang kh WHERE kh.khachhang_id=".$khnhan;
                        $result_nhan= mysqli_query($conn,$sql_ten_nhan);
                        $data_nhan = $result_nhan -> fetch_array(MYSQLI_ASSOC);
                        echo $data_nhan['hoten']?></p></td>

                    </tr>
                    <tr>
                            <th>Nhân viên phụ trách:</th>
                            <td>
                                <p><?php if($nv!=NULL)  
                                {
                                   $sql_nv="SELECT concat(nv.nhanvien_ho,' ',nv.nhanvien_ten) as hoten FROM nhanvien nv WHERE nv.nhanvien_id=".$nv;
                                   $result_nv= mysqli_query($conn,$sql_nv);
                                   $data_nv = $result_nv -> fetch_array(MYSQLI_ASSOC);
                                   echo $data_nv['hoten']; 
                                    } 
                                else echo "Không có nhân viên";?></p>
                            </td>
    
                    </tr>
                    <tr>
                        <th>Nội dung:</th>
                        <td>
                           
                           
                            <?php 
                                echo $nd;
                            ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <th>Ngày giao dịch:</th>
                        <td><p><?php echo date_format(date_create($ngaygd),"d/m/Y");?></p></td>

                    </tr>
                    <tr>
                        <th>Tiền:</th>
                        <td><p><?php echo $tien?></p></td>

                    </tr>
                    
                </table>
                <div id="bt">
                        <input type="submit" name="Back" value="Quay lại">
                </div>
              
           
        </form>
        </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>