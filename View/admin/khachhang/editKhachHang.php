<?php
session_start();

if(isset($_POST['Cancel']))
{
    header('Location: khachhang_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_kh = "select khachhang_ho, khachhang_ten, khachhang_ngaysinh, khachhang_sdt, gioi_tinh, password, kh_lkh.maloaikh, kh.sodu from khachhang kh join taikhoan tk join khachhang_loaikh kh_lkh join loaikhachhang lkh WHERE kh.khachhang_id=tk.ma_khachhang and kh.khachhang_id=kh_lkh.makh and kh_lkh.maloaikh=lkh.maloaikh and kh.khachhang_id='{$_GET['id']}'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$sql_kh);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $ho = $data['khachhang_ho'];
    $ten = $data['khachhang_ten'];
    $ngaysinh = $data['khachhang_ngaysinh'];
    $sdt = $data['khachhang_sdt'];
    $gt = $data['gioi_tinh'];
    $loai = $data['maloaikh'];
    $sodu = $data['sodu'];
   
    $password= $data['password'];
}
if(isset($_POST['Confirm']))
{
    include "../../../Controller/connect.php";
    
    


    $sql_update_kh="UPDATE `khachhang` SET `khachhang_ho`='".$_POST['ho']."',`khachhang_ten`='".$_POST['ten']."',`khachhang_ngaysinh`='".$_POST['ngaysinh']."',`gioi_tinh`=b'".$_POST['gt']."',`khachhang_sdt`='".$_POST['sdt']."',`sodu`='".$_POST['sodu']."' WHERE khachhang_id=".$_GET['id'];
    
    //"UPDATE `nhanvien` SET `nhanvien_ho`='".$_POST['ho']."',`nhanvien_ten`='".$_POST['ten']."',`nhanvien_sdt`='".$_POST['sdt']."',`nhanvien_gioitinh`='".$_POST['gt']."' WHERE nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_kh);


    
       
    $sql_update_lkh="UPDATE `khachhang_loaikh` kh_lkh SET `maloaikh`='".$_POST['lkh']."' WHERE kh_lkh.makh=".$_GET['id'];
    
    
   // "UPDATE `khachhang_loaikh` kh_lkh SET `loainv_id`='".$_POST['lnv']."' WHERE nv_lnv.nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_lkh);

  
 
     
   //update bang tk
     $sql_update_tk="UPDATE `taikhoan` tk SET `password`='".$_POST['pass']."' WHERE tk.user_id='".$user_id."'";
     mysqli_query($conn,$sql_update_tk);


     header('Location: khachhang_index.php');
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
        <title>Ch???nh s???a th??ng tin kh??ch h??ng </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            #container
            {
                position: relative;
                min-height: 100%;
            }
            #header
            {
            height: 100px;
                }
            #add
            {
                
                padding-bottom: 300px;
                
                }
            
          
            #form_add{
                position: absolute;
                top: 50%;
                left: 50%;
                 transform: translate(-50%);
                 background-color: whitesmoke;
                border-radius: 15px; 
            }
            #button_submit{
                text-align: center;
            }
            h2{
                text-align: center;
            }
            #bt{
                display: flex;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="container">
        <div id="header">
            <?php include "../header_footer/header.php"?>
        </div>
        <div id="add">
            <form method="POST" action="" id="form_add">
                <h3 align="center">CH???NH S???A KH??CH H??NG </h3>
                <fieldset>
                    <legend>Th??ng tin kh??ch h??ng </legend>
                <table>
                    <tr>
                        <th>H???:</th>
                        <td><input type="text" name="ho" value="<?php echo $ho?>"></td>
                    </tr>
                    <tr>
                        <th>T??n:</th>
                        <td><input type="text" name="ten" value="<?php echo $ten?>"></td>
                    </tr>
                    <tr>
                        <th>Ng??y sinh:</th>
                        <td><input type="date" name="ngaysinh" value="<?php echo $ngaysinh;//date_format(date_create($ngaysinh),"mm/dd/yyyy");?>"></td>
                    </tr>
                    <tr>
                        <th>S??? ??i???n tho???i:</th>
                        <td><input type="text" name="sdt" value="<?php echo $sdt?>"  ></td>
                    </tr>
                    <tr>
                        <th>Gi???i t??nh:</th>
                        <td><input type="radio" name="gt" value="1" <?php if($gt==1) echo "checked";?> >Nam <input type="radio" name="gt" value="0" <?php if($gt==0) echo "checked";?> >N???</td>

                    </tr>
                    <tr>
                        <th>Lo???i kh??ch h??ng:</th>
                        <td>
                            <select name="lkh">
                            <option value="">---Ch???n---</option>
                            <?php 
                                include "../../../Controller/getAllLoaiKhachHang.php";
                                if (mysqli_num_rows($resultlkh) > 0) {
                                    // output d??? li???u tr??n trang
                                    while($row = $resultlkh->fetch_assoc()) {
                                       
                                        $t="<option value=".$row['maloaikh'];

                                        if($row['maloaikh']==$loai)
                                        {
                                            $t.=" selected";
                                        }
                                        
                                        
                                        $t.=">".$row['tenloaikh']."</option>";
                                        echo $t;
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                        <th>S??? d??:</th>
                        <td><input type="text" name="sodu" value="<?php echo $sodu?>"  ></td>
                    </tr>
                    
                </table>
                
                </fieldset>
                <fieldset>
                    <legend>
                        Th??ng tin t??i kho???n
                    </legend>
                    <table>
                    <tr>
                        <?php 
                        $sql_tk= "select password from taikhoan tk where tk.ma_khachhang= '{$_GET['id']}' ";
                        $result_tk= mysqli_query($conn,$sql_tk);
                        $row_tk = $result_tk -> fetch_array(MYSQLI_ASSOC);
                        ?>
                            <th>M???t kh???u:</th>
                            <td><input type="password" name="pass" value="<?php echo $row_tk['password']?>" ></td>
                        </tr>
                        <tr>
                            <th>Nh???p l???i m???t kh???u</th>
                            <td><input type="password" name="repass" value="<?php echo $row_tk['password']?>" ></td>
                        </tr>
                    </table>
                </fieldset>
                <div id="bt">
                    <input name="Confirm" type="submit" value="X??c nh???n"> &emsp; <input type="submit" name="Cancel" value="H???y">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>