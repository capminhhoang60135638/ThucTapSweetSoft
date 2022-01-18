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
        <title>Hóa đơn</title>
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
                <?php 
                include "../../Controller/connect.php";
                $sql_hoadon="select * from hoadon hd JOIN cthoadon cthd WHERE hd.hoadon_id = cthd.hoadon_id ";
                $allhd= mysqli_query($conn,$sql_hoadon);
                ?>

                
                <form id="form">
                    
                    <table border="1px;" align="center">
	                    <thead>
	    	            <tr>
                            <td bgcolor="#E6E6FA">STT</td>
			                <td bgcolor="#E6E6FA">Mã hóa đơn</td>
			                <td bgcolor="#E6E6FA">Ngày giao dịch</td>
                            <td bgcolor="#E6E6FA">Số tiền chuyển</td>
			              
            
                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
    	                        $i = 1; 
		                        while ( $data = mysqli_fetch_array($allhd) ) {
		
			                    $id = $data['hoadon_id'];
	                        ?>
		                    <tr>
			                    <td><?php echo $i; ?></td>
                                <td><?php echo $data['hoadon_id'];?></td>
			                    <td><?php echo date_format(date_create($data['giaodich_date']),"d/m/Y"); ?></td>
			                    <td><?php echo $data['tien']; ?></td>
            



            
			                    <td>
                                    <a href="detailhoadon.php?id=<?php echo $_GET['id']?>&id_hd=<?php echo $data['hoadon_id']?>">Chi tiết</a>
				                 
				
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