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
        <title>Trang chủ admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        
        <style>
            body{
                background-image: url("image/backgroundbank.png");
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
            .login{
                background-color: burlywood;
                width: 400px;
                height: 150px;
            }
            form{
                
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            table{
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }
            

            

        </style>
    </head>
    
    <body>
    <?php
    $str="";
	//Gọi file connection.php ở bài trước
	require_once("../../../Controller/connect.php");
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
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select user_id from taikhoan where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query,MYSQLI_ASSOC);
            
			if ($row==0) {
				$str="tên đăng nhập hoặc mật khẩu không đúng !";
			}
            else{
                $user_id=$row["user_id"];
                 $loainv= "select nhanvien_loai from nhanvien where nhanvien_id = '$user_id'";
                 $queryloainv = mysqli_query($conn,$loainv);
                 $rowloainv = mysqli_fetch_array($queryloainv,MYSQLI_ASSOC);
                if($rowloainv["nhanvien_loai"]=="NV01")
                {
				    //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				    $_SESSION['username'] = $username;
                    $_SESSION['user_id']=$user_id;
                    // Thực thi hành động sau khi lưu thông tin vào session
                    // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                    header('Location: admin_index.php');
                }
			}
		}
	}
?>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php include "../header_footer/header.php"?>
        <form method="POST" action="">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Đăng nhập"><input type="submit" name="btn_forgot" value="Quên mật khẩu"></td>
	    		</tr>
	    	</table>
  </fieldset>
  <?php if($str!="") echo "<script type='text/javascript'>alert('$str');</script>";?>
  </form>
        <script src="" async defer></script>
    </body>
</html>