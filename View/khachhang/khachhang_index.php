<?php session_start();
if(isset($_POST['Confirm']))
{
    
    header('Location: editKhachHang.php?id='.$_SESSION['makh']);
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
        <title>Trang chủ</title>
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
                <?php include "header/header.php";
                
                
                if(isset($_SESSION['makh']))
                {
                    include "../../Controller/connect.php";
                    $sql_nv = "select khachhang_ho, khachhang_ten, khachhang_sdt, gioi_tinh, password, kh_lkh.maloaikh , sodu
                    from khachhang kh join taikhoan tk join khachhang_loaikh kh_lkh join loaikhachhang lkh 
                    WHERE kh.khachhang_id=tk.ma_khachhang and kh.khachhang_id=kh_lkh.makh AND kh_lkh.maloaikh=lkh.maloaikh and kh.khachhang_id='{$_SESSION['makh']}'";
                     
                   //$querynv = mysqli_query($conn,$nv);
                   // $row = mysqli_fetch_array($querynv,MYSQLI_ASSOC);
                    $result= mysqli_query($conn,$sql_nv);
                    $data = $result -> fetch_array(MYSQLI_ASSOC);
                    //$data = mysqli_fetch_array($result);
                    $ho = $data['khachhang_ho'];
                    $ten = $data['khachhang_ten'];
                    $sdt = $data['khachhang_sdt'];
                    $gt = $data['gioi_tinh'];
                    $sodu= $data['sodu'];
                    $loai = $data['maloaikh'];
                  
                }
                
                
                ?>
            </div>
            <div id="body">
                <!-- php getAll... -->
                <form method="POST" action="" id="form">
           
                <h2>Thông tin khách hàng</h2>
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
                        <th>Loại khách hàng:</th>
                        <td>
                           
                           
                            <?php 
                                include "../../Controller/getAllLoaiKhachHang.php";
                                if (mysqli_num_rows($resultlkh) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlkh->fetch_assoc()) {
                                       
                                        if($row['maloaikh']==$loai)
                                        {
                                            echo $row['tenloaikh'];
                                        }
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Số dư:</th>
                        <td><p><?php echo $sodu?></p></td>
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