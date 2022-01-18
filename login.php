<?php
session_start();



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
        <title>Đăng nhập</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <style>
            body{
                background-image: url("View/image/backgroundbank.png");
                background-size: cover;
            }
            ul{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: skyblue;
            }
            li{
                float: left;
            }
            li,a, .dropbtn{
                display: inline-block;
                color: snow;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 20px;
            }
            li:hover,.dropdown:hover .dropbtn{
                background-color: blue;
            }
            img{
                width: 100px;
                height: 70px;
            }
            
            form{
                
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            fieldset{
                background-color:#CCC;
                width:500px;
                height: 200px;
                padding:16px;
                border-radius: 20px;	
            }
            legend{
                margin-bottom:0px;
                margin-left:16px;
                color: indigo;
            }
            
            table{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                width: 450px;
            }
            p{
                color: red;
            }

            

        </style>
    </head>
    
    <body>
    <?php
    $str=NULL;
	//Gọi file connection.php
	require_once("Controller/connect.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			$str="username hoặc password bạn không được để trống!!!";
		}else if(str_contains($username," ")||str_contains($password," "))
        {
            $str="username hoặc password không được có khoảng trắng";
        }
        
        else
        
        {
            if(str_starts_with($username,"1"))
			    $sql = "select  nv.nhanvien_id,password, nv_lnv.loainv_id 
                from taikhoan tk JOIN nhanvien nv JOIN nhanvien_loainv nv_lnv
                                where tk.ma_nv=nv.nhanvien_id AND nv_lnv.nhanvien_id=nv.nhanvien_id and nv_lnv.loainv_id!='NV01' and nv.nhanvien_id = '$username' and password = '$password' ";
            if(str_starts_with($username,"8"))
                $sql = "select  kh.khachhang_id,password from taikhoan tk join khachhang kh  where tk.ma_khachhang=kh.khachhang_id and tk.ma_khachhang = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
            
			if ($row==0) {
				$str="tên đăng nhập hoặc mật khẩu không đúng !!!";
               
			}
            //có thể quay về trang index.php để điều hướng sang trang khách hàng hoặc nhân viên index.php
            else{
                if(str_starts_with($username,"1"))
                {
				    $_SESSION['manv'] = $username;
                    
                    header('Location: View/nhanvien/nhanvien_index.php');
                }
                else{
                    //$str = "Bạn không phải nhanvien!!!";
                    $_SESSION['makh'] = $username;
                    
                    header('Location: View/Khachhang/khachhang_index.php');
                }
			}
		}
	}
    if(isset($_POST['btn_regis']))
    {
        header('Location: register.php');
    }
?>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <form method="POST" action="">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<th>Mã người dùng</th>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<th>Password</th>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
                <?php 
                if(isset($_SESSION['makh_dk']) && $_SESSION['makh_dk']!="")
                {
                    $str.="Mã khách hàng sau khi đăng ký là ".$_SESSION['makh_dk'];
                }
                
                if($str!=NULL)
                echo "<tr>
                    <td colspan='2' align='center'> <p>$str</p> </td>
                </tr>";
                ?>
	    		<tr>
                    <td></td>
	    			<td> <input type="submit" name="btn_submit" value="Đăng nhập"><input type="submit" name="btn_regis" value="Đăng ký"></td>
	    		</tr>
                
	    	</table>
  </fieldset>
  
  </form>
  <?include "../../../Controller/disconnect.php"?>
        <script src="" async defer></script>
    </body>
</html>