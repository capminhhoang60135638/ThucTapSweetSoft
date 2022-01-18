<?php session_start();?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Danh sách khách hàng</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
      
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../include/css/index.css"> 
       <style>
           table{
               width: 900px;
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
                    <?php include"../../Controller/getAllKhachHang.php"?>
                <form id="form">
                <a href="addKhachHang.php?id=<?php echo $_GET['id']?>">Thêm khách hàng</a>
<table border="1px;" align="center">
	<thead>
		<tr>
            <td bgcolor="#E6E6FA">STT</td>
			<td bgcolor="#E6E6FA">ID</td>
			<td bgcolor="#E6E6FA">Họ</td>
			<td bgcolor="#E6E6FA">Tên</td>
            <td bgcolor="#E6E6FA">Ngày sinh</td>
            <td bgcolor="#E6E6FA">Giới tính</td>
			<td bgcolor="#E6E6FA">Số điện thoại</td>
			<td bgcolor="#E6E6FA">Loại khách hàng</td>
            
		<tr>
	</thead>
	<tbody>
	<?php
    	$i = 1; 
		while ( $data = mysqli_fetch_array($allkh) ) {
		
			$id = $data['khachhang_id'];
	?>
		<tr>
			<td><?php echo $i; ?></td>
            <td><?php echo $data['khachhang_id'];?></td>
			<td><?php echo $data['khachhang_ho']; ?></td>
			<td><?php echo $data['khachhang_ten']; ?></td>
            <td><?php echo $data['khachhang_ngaysinh']; ?></td>
            <td><?php echo ($data['gioi_tinh'] == 1) ? "Nam" : "Nữ"; ?></td>
			<td><?php echo $data['khachhang_sdt']; ?></td>
			


            
            <td><?php echo $data['tenloaikh'];?></td>
            



            
			<td>
                <a href="detailskhachhang.php?id=<?php echo $_GET['id']?>&id_kh=<?php echo $id;?>">Chi tiết</a>
				<a href="editKhachHang.php?id=<?php echo $_GET['id']?>&id_kh=<?php echo $id;?>">Sửa</a>
                <a href="deleteKhachHang.php?id=<?php echo $_GET['id']?>&id_kh=<?php echo $id;?>">Xóa</a>
				
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