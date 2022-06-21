<?php
session_start();
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
header('location:login_cutomer_en.php');
die();
?>