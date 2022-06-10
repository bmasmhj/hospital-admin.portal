<?php 
require 'connection.php';

if(isset($_POST['showhealthcontent'])){
    $id = $_POST['showhealthcontent'];
$healthsql = "SELECT  * FROM healthservices  WHERE id = '$id' ";
$healthresult = $con->query($healthsql);
$healthdata = [];
if ($healthresult->num_rows > 0) {
  while ($healthrow = $healthresult->fetch_assoc()) {
        echo $healthrow['details'];
      }
  }  
  }

?>