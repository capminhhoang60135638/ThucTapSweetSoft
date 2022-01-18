<?php session_start();
if(isset($_POST['Confirm']))
{
    
    header('Location: editnhanvien.php?id='.$_SESSION['manv']);
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
        <div id="containner">
            <div id="header">
                <?php include "header/header.php";
                if(isset($_SESSION['manv']))
                {
                    include "../../Controller/connect.php";
                    $sql_nv = "select nhanvien_ho, nhanvien_ten, nhanvien_sdt, nhanvien_gioitinh, password, loainv_id 
                    from nhanvien nv join taikhoan tk join nhanvien_loainv nv_lnv join loainhanvien lnv 
                    where nv.nhanvien_id=tk.ma_nv and nv.nhanvien_id= nv_lnv.nhanvien_id and nv_lnv.loainv_id=lnv.maloainv  and nv.nhanvien_id='{$_SESSION['manv']}'";
                     
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
                  
                }
                
                
                ?>
            </div>
            <div id="body">
                <!-- php getAll... -->
                <form method="POST" action="" id="form">
           
                <h2>Thông tin nhân viên</h2>
                <table>
                    <tr>
                        <th>Họ và tên:</th>
                        <td><p><?php echo $ho." ".$ten?></p></td>
                    </tr>
                    
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><p><?php echo $sdt?></p></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><p><?php if($gt==1) echo "Nam"; else echo "Nữ";?></p></td>

                    </tr>
                    <tr>
                        <th>Chức vụ:</th>
                        <td>
                           
                           
                            <?php 
                                include "../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        if($row['maloainv']==$loai)
                                        {
                                            echo $row['tenloainv'];
                                        }
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                 
                
                    
                </table>
                <div id="bt">
                    <input name="Confirm" type="submit" value="Chỉnh sửa">
                </div>
              
           
        </form>
            </div>
       </div>
        <script src="" async defer></script>
    </body>
</html>