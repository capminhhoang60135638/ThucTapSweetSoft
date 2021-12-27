<?php
if(isset($_POST['Cancel']))
{
    header('Location: nhanvien_index.php');
}
// Ấn định  dung lượng file ảnh upload
define ("MAX_SIZE","100");
 
// hàm này đọc phần mở rộng của file. Nó được dùng để kiểm tra nếu
// file này có phải là file hình hay không .
function getExtension($str) {
$i = strrpos($str,".");
if (!$i) { return ""; }
$l = strlen($str) - $i;
$ext = substr($str,$i+1,$l);
return $ext;
}
 
//This variable is used as a flag. The value is initialized with 0 (meaning no
// error  found)
//and it will be changed to 1 if an errro occures.
//If the error occures the file will not be uploaded.
$errors=0;
//checks if the form has been submitted
if(isset($_POST['Submit']))
{
// lấy tên file upload
$image=$_FILES['image']['name'];
// Nếu nó không rỗng
if ($image)
{
// Lấy tên gốc của file
$filename = stripslashes($_FILES['image']['name']);
//Lấy phần mở rộng của file
$extension = getExtension($filename);
$extension = strtolower($extension);
// Nếu nó không phải là file hình thì sẽ thông báo lỗi
if (($extension != "jpg") && ($extension != "jpeg") && ($extension !=
"png") && ($extension != "gif"))
{
// xuất lỗi ra màn hình
echo '<h1>Đây không phải là file hình!</h1>';
$errors=1;
}
else
{
//Lấy dung lượng của file upload
$size=filesize($_FILES['image']['tmp_name']);
if ($size > MAX_SIZE*1024)
{
echo '<h1>Vượt quá dung lượng cho phép!</h1>';
$errors=1;
}
 
// đặt tên mới cho file hình up lên
$image_name=time().'.'.$extension;
// gán thêm cho file này đường dẫn
$newname="images/".$image_name;
// kiểm tra xem file hình này đã upload lên trước đó chưa
$copied = copy($_FILES['image']['tmp_name'], $newname);
if (!$copied)
{
echo '<h1> File hình này đã tồn tại </h1>';
$errors=1;
}}}}
 
if(isset($_POST['Submit']) && !$errors)
{
echo "<h1>File hình đã được Upload thành công </h1>";
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
        <title>Thêm nhân viên </title>
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
                <h3 align="center">ĐĂNG KÝ NHÂN VIÊN</h3>
                <fieldset>
                    <legend>Thông tin nhân viên</legend>
                <table>
                    <tr>
                        <th>Họ:</th>
                        <td><input type="text" name="ho" value="" placeholder="Nguyễn Văn"></td>
                    </tr>
                    <tr>
                        <th>Tên:</th>
                        <td><input type="text" name="ten" value="" placeholder="An"></td>
                    </tr>
                    <tr>
                        <th>Số điện thoại:</th>
                        <td><input type="text" name="sdt" value="" ></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><input type="radio" name="gt" value="1">Nam <input type="radio" name="gt" value="0">Nữ</td>

                    </tr>
                    <tr>
                        <th>Chức vụ:</th>
                        <td>
                            <select name="lnv">
                            <option value="" selected>---Chọn---</option>
                            <?php 
                                include "../../../Controller/getAllLoaiNhanVien.php";
                                if (mysqli_num_rows($resultlnv) > 0) {
                                    // output dữ liệu trên trang
                                    while($row = $resultlnv->fetch_assoc()) {
                                       
                                        echo "<option value=".$row['maloainv'].">".$row['tenloainv']."</option>";
                                        
                                    }
                                }
                            ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                            <th>Ảnh đại diện:</th>
                            <td>
                                <input type="file" name="image">
                            </td>
                    </tr>
                    <tr>
                        
                        
                    </tr>
                </table>
                </fieldset>
                <fieldset>
                    <legend>Đăng ký tài khoản</legend>
                    <table>
                        <tr>
                            <th>Username:</th>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td><input type="password" name="pass"></td>
                        </tr>
                    </table>
                </fieldset>
                <div>
                    <input name="Submit" type="submit" value="Thêm"> <input type="submit" name="Cancel" value="Hủy">
                </div>
                
            </form>
        </div>
        
        </div>
        <script src="" async defer></script>
    </body>
</html>