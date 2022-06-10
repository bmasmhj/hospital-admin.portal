<?php 
require 'connection.php';
// require 'security.php';




$providesql = "SELECT  * FROM provide ";
  	$provideresult = $con->query($providesql);
  	$providedata = [];
      if ($provideresult->num_rows > 0) {
        while ($providerow = $provideresult->fetch_assoc()) {
            array_push($providedata, $providerow);
        }
    } 


$socialmediasql = "SELECT  * FROM socialmedia ";
$socialmediaresult = $con->query($socialmediasql);
$socialmediadata = [];
    if ($socialmediaresult->num_rows > 0) {
    while ($socialmediarow = $socialmediaresult->fetch_assoc()) {
        array_push($socialmediadata, $socialmediarow);
    }
} 

$notificationsql = "SELECT  * FROM notification ";
$notificationresult = $con->query($notificationsql);
$notificationdata = [];
    if ($notificationresult->num_rows > 0) {
    while ($notificationrow = $notificationresult->fetch_assoc()) {
        array_push($notificationdata, $notificationrow);
    }
} 

$emergencysql = "SELECT  * FROM emergency ";
$emergencyresult = $con->query($emergencysql);
$emerservicedata = [];
    if ($emergencyresult->num_rows > 0) {
    while ($emergencyrow = $emergencyresult->fetch_assoc()) {
        array_push($emerservicedata, $emergencyrow);
    }
} 

$regularsql = "SELECT  * FROM regularservices ";
$regularresult = $con->query($regularsql);
$regservicedata = [];
    if ($regularresult->num_rows > 0) {
    while ($regularrow = $regularresult->fetch_assoc()) {
        array_push($regservicedata, $regularrow);
    }
} 

$carouselsql = "SELECT  * FROM carousel ";
$carouselresult = $con->query($carouselsql);
$carouseldata = [];
    if ($carouselresult->num_rows > 0) {
    while ($carouselrow = $carouselresult->fetch_assoc()) {
        array_push($carouseldata, $carouselrow);
    }
} 

$healthsql = "SELECT  * FROM healthservices ";
$healthresult = $con->query($healthsql);
$healthdata = [];
if ($healthresult->num_rows > 0) {
  while ($healthrow = $healthresult->fetch_assoc()) {
      array_push($healthdata, $healthrow);
      }
  }  

$specialsql = "SELECT  * FROM speciality ";
$specialresult = $con->query($specialsql);
$specialitydata = [];
    if ($specialresult->num_rows > 0) {
    while ($specialrow = $specialresult->fetch_assoc()) {
        array_push($specialitydata, $specialrow);
    }
} 



$doctorsql = "SELECT  s.name as speciality,  d.*
FROM doctor d
JOIN speciality s
ON d.specialityid = s.id
ORDER BY d.name
";
$doctorresult = $con->query($doctorsql);
$doctordata = [];
if ($doctorresult->num_rows > 0) {
while ($doctorrow = $doctorresult->fetch_assoc()) {
array_push($doctordata, $doctorrow);
}
}	

$sun = 0; //0
$mon = 0; //1
$tue = 0; //2
$wed = 0; //3
$thur = 0; //4
$fri = 0; //5
$sat = 0; //6




  $usersql = "SELECT  * FROM users ORDER BY id desc  ";
    $userresult = $con->query($usersql);
    $userdata = [];
    if ($userresult->num_rows > 0) {
      while ($userrow = $userresult->fetch_assoc()) {
          array_push($userdata, $userrow);
      }
  }	

  $appointmentsql = "SELECT  * FROM appointment ORDER BY id desc ";
  $appointmentresult = $con->query($appointmentsql);
  $appointmentdata = [];
  if ($appointmentresult->num_rows > 0) {
    while ($appointmentrow = $appointmentresult->fetch_assoc()) {
        array_push($appointmentdata, $appointmentrow);
        }
    }   

    $bookedpkgsql = "SELECT  * FROM bookedpkg ORDER BY id desc  ";
  $bookedpkgresult = $con->query($bookedpkgsql);
  $bookedpkgdata = [];
  if ($bookedpkgresult->num_rows > 0) {
    while ($bookedpkgrow = $bookedpkgresult->fetch_assoc()) {
        array_push($bookedpkgdata, $bookedpkgrow);
        }
    }  
    
  
      
    $recordssql = "SELECT  * FROM records ORDER BY id desc ";
    $recordsresult = $con->query($recordssql);
    $recordsdata = [];
    if ($recordsresult->num_rows > 0) {
      while ($recordsrow = $recordsresult->fetch_assoc()) {
          array_push($recordsdata, $recordsrow);
          }
      }  

      $richsql = "SELECT  * FROM rich ORDER BY id desc LIMIT 7 ";
      $richresult = $con->query($richsql);
      $richdata = [];
      if ($richresult->num_rows > 0) {
        while ($richrow = $richresult->fetch_assoc()) {
            array_push($richdata, $richrow);
            }
        }  

      $receptionssql = "SELECT  * FROM cashier ORDER BY id desc ";
      $receptionsresult = $con->query($receptionssql);
      $receptionsdata = [];
      if ($receptionsresult->num_rows > 0) {
        while ($receptionsrow = $receptionsresult->fetch_assoc()) {
            array_push($receptionsdata, $receptionsrow);
            }
        }  

    $feedbacksql = "SELECT  * FROM feedback ORDER BY id desc  ";
    $feedbackresult = $con->query($feedbacksql);
    $feedbackdata = [];
    if ($feedbackresult->num_rows > 0) {
    while ($feedbackrow = $feedbackresult->fetch_assoc()) {
        array_push($feedbackdata, $feedbackrow);
        }
    } 

    $contactsql = "SELECT  * FROM contact ORDER BY id desc  ";
    $contactresult = $con->query($contactsql);
    $contactdata = [];
    if ($contactresult->num_rows > 0) {
        while ($contactrow = $contactresult->fetch_assoc()) {
            array_push($contactdata, $contactrow);
            }
        }   



?>




<?php 

// counter

$user_sql = "SELECT COUNT(id) FROM users ";
$doctor_sql = "SELECT COUNT(id) FROM doctor ";
$appointment_sql = "SELECT COUNT(id) FROM appointment ";
$booked_sql = "SELECT COUNT(id) FROM bookedpkg ";





$user_result = mysqli_query($con,$user_sql);
$doctor_result = mysqli_query($con,$doctor_sql);
$appointment_result = mysqli_query($con,$appointment_sql);
$booked_result = mysqli_query($con,$booked_sql);




$user_row = mysqli_fetch_array($user_result);
$booked_row = mysqli_fetch_array($booked_result);
$appointment_row = mysqli_fetch_array($appointment_result);
$doctor_row = mysqli_fetch_array($doctor_result);



$user_count = $user_row[0];
$appointment_count = $appointment_row[0];
$booked_count = $booked_row[0];
$doctor_count = $doctor_row[0];


?>