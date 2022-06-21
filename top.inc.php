<?php
require('connection.inc.php');
require('functions.inc.php');

if(isset($_SESSION['CUSTOMER_LOGIN']) && $_SESSION['CUSTOMER_USERNAME']!=''){

}else{
    header('location:login.php');
    die();
}
?>