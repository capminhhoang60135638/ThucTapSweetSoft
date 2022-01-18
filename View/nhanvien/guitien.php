<?php
session_start();
    $str="";
    include "../../Controller/connect.php";
    if(isset($_POST['id_gui'])||isset($_POST['id_nhan']))
    {
        if($_POST['id_gui']!="")
        {
        $sql_info_nguoigui="SELECT * FROM khachhang kh WHERE kh.khachhang_id=".$_POST['id_gui'];
        $data_info_nguoigui=mysqli_fetch_array(mysqli_query($conn,$sql_info_nguoigui));
        $hoten_gui=$data_info_nguoigui['khachhang_ho']." ".$data_info_nguoigui['khachhang_ten'];
        $gt_gui=$data_info_nguoigui['gioi_tinh'];
        $sdt_gui=$data_info_nguoigui['khachhang_sdt'];
        $sodu=$data_info_nguoigui['sodu'];
        }
        if($_POST['id_nhan']!="")
        {
            $sql_info_nguoinhan="SELECT * FROM khachhang kh WHERE kh.khachhang_id=".$_POST['id_nhan'];
            $data_info_nguoinhan=mysqli_fetch_array(mysqli_query($conn,$sql_info_nguoinhan));
            $hoten_nhan=$data_info_nguoinhan['khachhang_ho']." ".$data_info_nguoinhan['khachhang_ten'];
            $gt_nhan=$data_info_nguoinhan['gioi_tinh'];
            $sdt_nhan=$data_info_nguoinhan['khachhang_sdt'];
        }
    }
    
    if(isset($_POST['Cancel']))
    {
        header("Location: khachhang_index.php");
    }
    if(isset($_POST['Confirm']))
    {
        
        if($sodu>$_POST['tien'])
        {
            echo $sodu;
            if($_POST['id_nhan']=="")
            {
                $str.="Chưa có người nhận";
            }
            else if ($_POST['tien']=="")
            {
                $str.="Chưa nhập số tiền chuyển";
            }
            else
            {

                $id_gui=$_POST['id_gui'];
            $id_nhan=$_POST['id_nhan'];
            $noidung=$_POST['noidung'];
            $tiengui=$_POST['tien'];
            $ngaygui=date("Y-m-d",);
            //tru tien ben khach hang gui
                $sql_tru_gui="UPDATE `khachhang` kh SET `sodu`=kh.sodu-".$tiengui." WHERE kh.khachhang_id=".$id_gui;
                mysqli_query($conn,$sql_tru_gui);
            //them tien ben khach hàng nhan
                $sql_them_nhan="UPDATE `khachhang` kh SET `sodu`=kh.sodu+".$tiengui." WHERE kh.khachhang_id=".$id_nhan;
                mysqli_query($conn,$sql_them_nhan);

            //add vao bang hoa don
           
            //echo $ngaygui;
            $sql_add_hoadon="INSERT INTO `hoadon`(`nhanvien_id`,`khgui_id`) VALUES (".$_GET['id'].",".$id_gui.")";
            mysqli_query($conn,$sql_add_hoadon);
            // add vao bang chi tiet hoa don
            //tim ma hoa don
            $sql_timmahoadon="SELECT hoadon_id FROM `hoadon`  ORDER BY hoadon_id DESC LIMIT 1";
            $row=mysqli_fetch_array(mysqli_query($conn,$sql_timmahoadon));
            $mahoadon=$row['hoadon_id'];
           // echo $mahoadon;
            $sql_add_cthoadon="INSERT INTO `cthoadon`(`hoadon_id`, `khnhan_id`, `giaodich_date`, `noidung`, `tien`) VALUES ('".$mahoadon."','".$id_nhan."','".$ngaygui."','".$noidung."','".$tiengui."')";
            mysqli_query($conn,$sql_add_cthoadon);
            header("Location: nhanvien_index.php");

            }
            
        }
        else 
            $str="Số tiền không đủ để thực hiện giao dịch";
        
        
    }
    else{
        if(isset($_POST['search1']))
        {
            
            if(isset($_POST['id_gui']))
            {
                //echo "search";
                $sql_info_nguoigui="SELECT * FROM khachhang kh WHERE kh.khachhang_id=".$_POST['id_gui'];
                    $data_info_nguoigui=mysqli_fetch_array(mysqli_query($conn,$sql_info_nguoigui));
                    $hoten_gui=$data_info_nguoigui['khachhang_ho']." ".$data_info_nguoigui['khachhang_ten'];
                    $gt_gui=$data_info_nguoigui['gioi_tinh'];
                    $sdt_gui=$data_info_nguoigui['khachhang_sdt'];
                    $sodu=$data_info_nguoigui['sodu'];
            }
           
        }
        if(isset($_POST['search2']))
        {
            if(isset($_POST['id_nhan']))
            {
                //echo "search";
                $sql_info_nguoinhan="SELECT * FROM khachhang kh WHERE kh.khachhang_id=".$_POST['id_nhan'];
                    $data_info_nguoinhan=mysqli_fetch_array(mysqli_query($conn,$sql_info_nguoinhan));
                    $hoten_nhan=$data_info_nguoinhan['khachhang_ho']." ".$data_info_nguoinhan['khachhang_ten'];
                    $gt_nhan=$data_info_nguoinhan['gioi_tinh'];
                    $sdt_nhan=$data_info_nguoinhan['khachhang_sdt'];
            }
        }

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
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../include/css/index.css">
        <style>
            h2{
                color: red;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="containner">
            <div id="header">
                <?php include "header/header.php"?>
            </div>
            <div id="body">
                <!-- php getAll... -->
                <form id="form" method="POST">
                    <h2>BẢNG CHUYỂN TIỀN</h2>
                    
                        <fieldset>
                            <legend>Thông tin người gửi:</legend>
                            <table>
                                <tr>
                                    <th>Mã người gửi:</th>
                                    <td><input type="search" name="id_gui" value="<?php if(isset($_POST['id_gui'])) echo $_POST['id_gui']?>"><button type="submit" name="search1"><i class="fa fa-search"></i></button></td>
                                </tr>
                                <tr>
                                    <th>Họ và tên người gửi:</th>
                                    <td>
                                        <input type="text" name="tennguoigui" disabled value="<?php if(isset($hoten_gui)) echo $hoten_gui?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><input type="text" name="gtnguoigui" disabled value="<?php if(isset($gt_gui)){if($gt_gui==1) echo "Nam"; else echo "Nữ";} else echo "";?>"></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><input type="text" name="sdtnguoigui" disabled value="<?php if(isset($sdt_gui)) echo $sdt_gui;?>"></td>
                                </tr>
                                <tr>
                                    <th>Số dư:</th>
                                    <td><input type="text" name="sodu" disabled value="<?php if(isset($sodu)) echo $sodu;?>"></td>
                                </tr>


                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Thông tin người nhận:</legend>
                            <table>
                                <tr>
                                    <th>Mã người nhận:</th>
                                    <td><input type="search" name="id_nhan" value="<?php if(isset($_POST['id_nhan'])) echo $_POST['id_nhan']?>"><button type="submit" name="search2"><i class="fa fa-search"></i></button></td>
                                </tr>
                                <tr>
                                    <th>Họ và tên người nhận:</th>
                                    <td>
                                        <input type="text" name="tennguoinhan" disabled value="<?php if(isset($hoten_nhan)) echo $hoten_nhan?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Giới tính:</th>
                                    <td><input type="text" name="gtnguoinhan" disabled value="<?php if(isset($gt_nhan)){if($gt_nhan==1) echo "Nam"; else echo "Nữ";} else echo "";?>"></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><input type="text" name="sdtnguoinhan" disabled value="<?php if(isset($sdt_nhan)) echo $sdt_nhan;?>"></td>
                                </tr>



                            </table>
                        </fieldset>
                        <fieldset>
                            <legend>Thông tin chuyển tiền:</legend>
                            <table>
                                <tr>
                                    <th>Số tiền gửi:</th>
                                    <td><input type="search" name="tien" value=""></td>
                                </tr>
                                <tr>
                                    <th>Nội dung gửi:</th>
                                    <td>
                                        <textarea name="noidung"></textarea>
                                    </td>
                                </tr>
                               



                            </table>
                            
                        </fieldset>
                            <p><?php if($str!="") echo $str?></p>
                        <div id="bt">
                                
                            <input name="Confirm" type="submit" value="Xác nhận"> &emsp; <input type="submit" name="Cancel" value="Hủy">
                        </div>
                        
                    </div>
                </form>

            </div>
       </div>
        <script src="" async defer></script>
    </body>
</html>