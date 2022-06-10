
<?php 

require 'connection.php' ;

if(isset($_POST['aceptapp'])){

     $id =  $_POST['aceptapp'];

    $update = "UPDATE appointment SET status = 'accepted' WHERE id = '$id' ";
    if ($con->query($update)) {
    $appointmentsql = "SELECT  * FROM appointment WHERE id = '$id' ";
    $appointmentresult = $con->query($appointmentsql);
    $appointmentdata = [];
    if ($appointmentresult->num_rows > 0) {
      while ($appointmentrow = $appointmentresult->fetch_assoc()) {
          array_push($appointmentdata, $appointmentrow);
          }
      }   
 foreach ($appointmentdata as $key => $appoint) {
    
    ?>
    <td><?php echo $appoint['appointdate']?></td>

    <td><?php echo $appoint['fullname']?></td>
    <td><?php echo $appoint['address']?></td>
    <td><?php echo $appoint['docname']?></td>
    <td><?php echo $appoint['age']?></td>
    <td><?php echo $appoint['gender']?></td>

    <?php if($appoint['status']=='pending') {?>
    <td><h4 class="badge bg-warning"><?php echo $appoint['status']?></h4></td>
    <td> 
        <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button>  
        <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 


    <?php }else if($appoint['status']=='accepted'){?>

    <td><h4 class="badge bg-success"><?php echo $appoint['status']?></h4></td>
    <td> <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button> 

    <?php }else if($appoint['status']=='cancelled'){ ?>
    <td><h4 class="badge bg-danger"><?php echo $appoint['status']?></h4></td>
        <td>   
    <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 

    <?php }else{ ?>
        <td><h4 class="badge bg-success"><?php echo $appoint['status']?></h4></td>
        <td>
    <?php } ?>
    <button  class='btn btn-success m-0 p-2'  data-bs-toggle="modal" data-bs-target="#previewz" onclick="viewappointment(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 mdi mdi-eye text-white'></h4></button>  </td>

<?php  } }else{
    echo 'failed';
}
} ?>



<?php 

require 'connection.php' ;

if(isset($_POST['cancelapp'])){

     $id =  $_POST['cancelapp'];

    $update = "UPDATE appointment SET status = 'cancelled' WHERE id = '$id' ";
    if ($con->query($update)) {
    $appointmentsql = "SELECT  * FROM appointment WHERE id = '$id' ";
    $appointmentresult = $con->query($appointmentsql);
    $appointmentdata = [];
    if ($appointmentresult->num_rows > 0) {
      while ($appointmentrow = $appointmentresult->fetch_assoc()) {
          array_push($appointmentdata, $appointmentrow);
          }
      }   
 foreach ($appointmentdata as $key => $appoint) {
    
    ?>
    <td><?php echo $appoint['appointdate']?></td>
    <td><?php echo $appoint['fullname']?></td>
    <td><?php echo $appoint['address']?></td>
    <td><?php echo $appoint['docname']?></td>
    <td><?php echo $appoint['age']?></td>
    <td><?php echo $appoint['gender']?></td>

    <?php if($appoint['status']=='pending') {?>
    <td><h4 class="badge bg-warning"><?php echo $appoint['status']?></h4></td>
    <td> 
        <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button>  
        <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 


    <?php }else if($appoint['status']=='accepted'){?>

    <td><h4 class="badge bg-success"><?php echo $appoint['status']?></h4></td>
    <td> <button onclick="cancelit(<?php echo $appoint['id']?>)"  class='btn btn-danger'>Cancel <i class='ion ion-close-round text-white'></i></button> 

    <?php }else if($appoint['status']=='cancelled'){ ?>
    <td><h4 class="badge bg-danger"><?php echo $appoint['status']?></h4></td>
        <td>   
    <button onclick="acceptit(<?php echo $appoint['id']?>)"  class='btn btn-success'>Accept <i class='ion ion-checkmark-round text-white'></i></button> 

    <?php }else{ ?>
        <td><h4 class="badge bg-success"><?php echo $appoint['status']?></h4></td>
        <td>
    <?php } ?>
    <button  class='btn btn-success m-0 p-2'  data-bs-toggle="modal" data-bs-target="#previewz" onclick="viewappointment(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 mdi mdi-eye text-white'></h4></button>  </td>

<?php  } }else{
    echo 'failed';
}
} ?>

<?php 


if(isset($_POST['checkupforrecords'])){
    $time = $_POST['time'];
    $ptname = $_POST['patientname'];
    $checkupfor = $_POST['checkupforrecords'];
    $detail = $_POST['detail'];
    $message = $_POST['message'];
    $id = $_POST['id'];
    if (isset($_FILES['reportimages']['error'] ) && $_FILES['reportimages']['error'] == 0){

        $tmpFilePath = $_FILES['reportimages']['tmp_name'];

        if ($tmpFilePath != ""){

          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['reportimages']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/reports/".$url;
            $result = move_uploaded_file($_FILES['reportimages']['tmp_name'], $name);
            $imageofrecord = $url;
          }
      }
    }
    else{
       $imageofrecord = $_POST['imageurl'];  
    }

    $record = "UPDATE `records` SET `patientname`='$ptname',`nameofrecord`='$checkupfor',`detail`='$detail',`message`='$message',`imageofrecord`='$imageofrecord' WHERE id = '$id'";
    
    if ($con->query($record)) {
          echo '
                <td id="time_'.$id.'">'.$time.'</td>
               <td id="patienname_'.$id.'">'.$ptname.'</td>
               <td>
                 <img onclick="viewimg('.$id.')" id="imagesrc_'.$id.'" class="data-record" src="../Hospital/assets/images/uploads/reports/'.$imageofrecord.'" alt="'.$imageofrecord.'"/>
               </td>
               <td id="nameofrecord_'.$id.'">'.$checkupfor.'</td>
               <td id="detail_'.$id.'">'.$detail.'</td>
               <td id="messange_'.$id.'">'.$message.'</td>
               <td>
                   <button  class="btn btn-info m-0 p-2" onclick="editrecords('.$id.')"><h6 class="p-0 m-0 ion-edit text-white"></h6></button>
                   <button  class="btn btn-danger m-0 p-2" onclick="removemedicalreport('.$id.')">
                   <h6 class="p-0 m-0 ion-trash-b text-white"></h6></button>  </td>
          
              ';
    }else{
        echo 'failed';
    }
}

if(isset($_POST['changeadmin'])){
    $username = $_POST['changeadmin'];
    $code = trim($_POST['code']);

    $password = password_hash($code, PASSWORD_BCRYPT);

    $updatename = "UPDATE `doctor` SET `code`='$code', `accstatus`= 'reset',`password` = '$password' WHERE username ='$username'";
    if ($con->query($updatename)) {
        // echo '';
        }
        else{
            die("Update failed $connection->error");
        }
}   
if(isset($_POST['changerecept'])){
    $username = $_POST['changerecept'];
    $password = password_hash("login", PASSWORD_BCRYPT);

    $updatename = "UPDATE `cashier` SET `password`='$password', `status`= 'reset' WHERE id ='$username'";
    if ($con->query($updatename)) {
        // echo 'success';
        }
        else{
            die("Update failed $connection->error");
        }
}
if(isset($_POST['websitedataupdatesioefw'])){

    $websitename = $_POST['websitename'];
    $websitecontact= $_POST['websitenum'];
    $websitecontact2= $_POST['websitenum2'];
    $websiteemail = $_POST['websiteemail'];
    $websiteemergencynum = $_POST['emergencynum'];
    $websitelocation = $_POST['location'];

    $updatename = "UPDATE `website` SET `websitename`='$websitename',`contact`='$websitecontact',`contact2`='$websitecontact2',`email`='$websiteemail',`emergencynum`='$websiteemergencynum',`location`='$websiteemergencynum' WHERE 1";
    if ($con->query($updatename)) {
        // echo 'success';
        header('Location: ../Basicinfo?success');

        }
        else{
            die("Update failed $connection->error");
        }

}
else if(isset($_POST['websitedataupdateoi'])){
    $messagex = $_POST['marquee'];
    $websitedesc = $_POST['description'];
    $messagez = str_replace( '"' , "&quot;" ,$messagex);
    $websitemmarquee = str_replace( "'" , "&apos;" ,$messagez);
    
    $updatename = "UPDATE `website` SET `marquedata`='$websitemmarquee', `description`='$websitedesc' WHERE id = 1";
    if ($con->query($updatename)) {
        // echo 'success';
        header('Location: ../Basicinfo?success');

        }
        else{
            die("Update failed $connection->error");
        }
}
else if(isset($_POST['cnewps'])){
    session_start();
    $email = $_SESSION['adminlogin'] ;
    $new = $_POST['cnewps'];
    $password = $_POST['oldpw'];
    $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE admin SET password = '$changepw' WHERE email = '$email' ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['password'] = $new;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }
}
else if(isset($_POST['updatereceptname'])){
    $name = $_POST['updatereceptname'];
    session_start();
    $email = $_SESSION['adminlogin'] ;
    $sql = "UPDATE admin SET name = '$name' WHERE email = '$email' ";
    if ($con->query($sql)) {
        echo "sucess"; 
    }else{
        print_r($_POST);
    }

}else if(isset($_POST['pincode'])){
    $pincode = strtoupper($_POST['pincode']);
    session_start();
    $email = $_SESSION['adminlogin'] ;
    $password = $_POST['oldpws'];
    $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $sql = "UPDATE admin SET pincode = '$pincode' WHERE email = '$email' ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['pincode'] = $pincode;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }

}
else if(isset($_POST['deletenoti'])){
    $ides = $_POST['deletenoti'];
   $deletestat ="DELETE FROM `notification` WHERE id = '$ides' ";
   if ($con->query($deletestat)) { $done = 'ok'; }

}
else if(isset($_POST['clearnnoti'])){
    // $ides = $_POST['clearnnoti'];
   $deletestat ="DELETE FROM `notification`";
   if ($con->query($deletestat)) { $done = 'ok'; }

}
?>