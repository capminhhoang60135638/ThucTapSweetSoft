<?php
$host="localhost";
$username="root";
$password="";
$database="web_ngan_hang";
$conn=mysqli_connect($host,$username,$password,$database);
mysqli_query($conn,"SET NAMES 'utf8'");
if (mysqli_connect_error())
{
    echo mysqli_connect_error();
}




?>