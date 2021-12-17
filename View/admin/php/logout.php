<?php
session_start();
session_unset();
session_destroy();
header("location: ../admin_page/admin_login.php");

?>