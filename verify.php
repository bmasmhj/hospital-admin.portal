<?php
if(isset($_POST['codez'])){
    $codez = $_POST['codez'];
    $code = str_replace(',', '', $codez);
    require 'controller/connection.php';

    $verifysql = "SELECT  * FROM admin WHERE pincode = '$code'";
    $verifyresult = $con->query($verifysql);
    $verifydata = [];
    if ($verifyresult->num_rows > 0) {
      while ($verifyrow = $verifyresult->fetch_assoc()) {
        //   echo 'Logging in as '.$verifyrow['username'];
          session_start();
          $_SESSION['pincode'] = $code;
          $_SESSION['adminlogin'] = $verifyrow['email'];
          echo 'Loggin in  as '.$verifyrow['email'];
      }
    }	
    else{
        return false;
    }
  
}
else if(isset($_POST['username']) && isset($_POST['password'])){
  $email = $_POST['username'];
  $password = $_POST['password'];
  require 'controller/connection.php';
  

  $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
      $res = mysqli_query($con, $chewckuser);
      if(mysqli_num_rows($res) > 0){
          $fetch = mysqli_fetch_assoc($res);
          $fetch_pass = $fetch['password'];
          if(password_verify($password, $fetch_pass)){
              session_start();
              $_SESSION['pincode'] = $fetch['pincode'];
              $_SESSION['adminlogin'] = $fetch['email'];
              echo 'success';
          }else{
              session_start();
              session_unset();
              session_destroy();
              echo 'incorrect';
          }
      }else{
          session_start();
          session_unset();
          session_destroy();
          echo 'nouser';
      }

}
else{
header("Location: LOGIN");
}

?>