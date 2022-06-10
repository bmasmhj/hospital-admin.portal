<?php 
session_start();
require 'controller/connection.php';
if(isset($_SESSION['adminlogin']) && isset($_SESSION['pincode'] ) ){
    $email = $_SESSION['adminlogin'] ;
    $code = $_SESSION['pincode'];
    $verifysql = "SELECT  * FROM admin WHERE email = '$email' AND pincode = '$code' ";
    $verifyresult = $con->query($verifysql);
    $verifydata = [];
    if ($verifyresult->num_rows > 0) {
      while ($verifyrow = $verifyresult->fetch_assoc()) {
        $adminname = $verifyrow['name'];
      }
    }
    else {
        session_start();
        session_unset();
        session_destroy();
        header('Location: LOGIN');
    }

}else{
    header('Location: LOGIN ');
}


?>