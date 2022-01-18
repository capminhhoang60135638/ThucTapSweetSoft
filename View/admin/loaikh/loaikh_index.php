<?php
session_start(); 
//require_once "../php/check_username.php"
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
        <link rel="stylesheet" href="../../../include/css/index.css"> 
       
        
       
    </head>

    <body>
    
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        
 <div id="containner">
            <div id="header">
                <?php include "../header_footer/header.php"?>
            </div>
            <div id="body">
                <!-- php getAll... -->
                <?php include"../../../Controller/getAllLoaiKhachHang.php"?>
                <form id="form">
                <a href="addloaikh.php">Thêm loại khách hàng</a>
<table border="1px;" align="center">
	<thead>
		<tr>
            <td bgcolor="#E6E6FA">STT</td>
			<td bgcolor="#E6E6FA">ID</td>
			<td bgcolor="#E6E6FA">Tên loại</td>
			
            
		<tr>
	</thead>
	<tbody>
	<?php
    	$i = 1; 
		while ( $data = mysqli_fetch_array($resultlkh) ) {
		
			
	?>
		<tr>
			<td><?php echo $i; ?></td>
            <td><?php echo $data['maloaikh'];?></td>
			


            
            <td><?php echo $data['tenloaikh'];?></td>
            



            
			<td>
                <a href="detailsloaikh.php?id=<?php echo $data['maloaikh']?>">Chi tiết</a>
				<a href="editloaikh.php?id=<?php echo $data['maloaikh'];?>">Sửa</a>
                <a href="deleteloaikh.php?id=<?php echo $data['maloaikh'];?>">Xóa</a>
				
			</td>
		</tr>
	<?php 
			$i++;
		}
	?>
	</tbody>
</table>
                </form>

            </div>
       </div>
        <script src="" async defer></script>
    </body>
</html>