<?php
session_start();
$ho=null;$ten=null;$sdt=null;$gt=null;$loai=null;$username=null;$password=null;

if(isset($_POST['Cancel']))
{
    header('Location: nhanvien_index.php');
}
if(isset($_GET['id']))
{
    include "../../../Controller/connect.php";
    $sql_nv = "select nhanvien_ho, nhanvien_ten, nhanvien_sdt, nhanvien_gioitinh, password, loainv_id 
    from nhanvien nv join taikhoan tk join nhanvien_loainv nv_lnv join loainhanvien lnv 
    where nv.nhanvien_id=tk.ma_nv and nv.nhanvien_id= nv_lnv.nhanvien_id and nv_lnv.loainv_id=lnv.maloainv and nv.nhanvien_id='{$_GET['id']}'";
     
   //$querynv = mysqli_query($conn,$nv);
   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
    $result= mysqli_query($conn,$sql_nv);
    $data = $result -> fetch_array(MYSQLI_ASSOC);
    //$data = mysqli_fetch_array($result);
    $ho = $data['nhanvien_ho'];
    $ten = $data['nhanvien_ten'];
    $sdt = $data['nhanvien_sdt'];
    $gt = $data['nhanvien_gioitinh'];
    $loai = $data['loainv_id'];
    
    $password= $data['password'];
}
if(isset($_POST['Confirm']))
{
    include "../../../Controller/connect.php";
    
    


    $sql_update_nv="UPDATE `nhanvien` SET `nhanvien_ho`='".$_POST['ho']."',`nhanvien_ten`='".$_POST['ten']."',`nhanvien_sdt`='".$_POST['sdt']."',`nhanvien_gioitinh`=b'".$_POST['gt']."' WHERE nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_nv);


    
       
    $sql_update_lnv="UPDATE `nhanvien_loainv` nv_lnv SET `loainv_id`='".$_POST['lnv']."' WHERE nv_lnv.nhanvien_id=".$_GET['id'];
    mysqli_query($conn,$sql_update_lnv);

    


    
  //update bang tk
    $sql_update_tk="UPDATE `taikhoan` tk SET `password`='".$_POST['pass']."' WHERE tk.ma_nv='".$_GET['id']."'";
    mysqli_query($conn,$sql_update_tk);


    header('Location: nhanvien_index.php');
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
        <title>Ch???nh s???a th??ng tin nh??n vi??n </title>
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
                <h3 align="center">CH???NH S???A NH??N VI??N </h3>
                <fieldset>
                    <legend>Th??ng tin nh??n vi??n </legend>
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
                        <th>S??? ??i???n tho???i:</th>
                        <td><input type="text" name="sdt" value="<?php echo $sdt?>"  ></td>
                    </tr>
                    <tr>
                        <th>Gi???i t??nh:</th>
                        <td><input type="radio" name="gt" value="1" <?php if($gt==1) echo "checked";?> >Nam <input type="radio" name="gt" value="0" <?php if($gt==0) echo "checked";?> >N???</td>

                    </tr>
                    <tr>
                        <th>Ch???c v???:</th>
                        <td>
                            <select name="lnv">
                            <option value="">---Ch???n---</option>
                            <?php 
                                include "../../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output d??? li???u tr??n trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        $t="<option value=".$row['maloainv'];

                                        if($row['maloainv']==$loai)
                                        {
                                            $t.=" selected";
                                        }
                                        
                                        
                                        $t.=">".$row['tenloainv']."</option>";
                                        echo $t;
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        
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
                        $sql_tk= "select * from taikhoan tk WHERE tk.ma_nv= '{$_GET['id']}' ";
                        $result_tk= mysqli_query($conn,$sql_tk);
                        $row_tk = $result_tk -> fetch_array(MYSQLI_ASSOC);
                        ?>
                            <th>M?? ng?????i d??ng:</th>
                            <td><input type="text" name="username" disabled value="<?php echo $row_tk['ma_nv']?>" ></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="text" name="pass" value="<?php echo $row_tk['password']?>" ></td>
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