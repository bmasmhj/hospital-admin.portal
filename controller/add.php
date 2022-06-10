<?php 
require 'connection.php';

if(isset($_POST['addprovidetitleytfdv'])){
    $title = $_POST['addprovidetitleytfdv'];
    $detail = $_POST['providetails'];

    if (isset($_FILES['provideimage'])) {
        $tmpFilePath = $_FILES['provideimage']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['provideimage']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/provide/".$url;
            $result = move_uploaded_file($_FILES['provideimage']['tmp_name'], $name);
            $imageofrecord = $url;
          }
      }
      else{
          echo "file unp";
      }

      $insert = "INSERT INTO `provide`( `img`, `title`, `descripton`) VALUES ('$imageofrecord','$title','$detail')";

      if ($con->query($insert)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }

    }
}

else if(isset($_POST['emergencyserviceqwecv'])){

        $title = $_POST['title'];
        $message = $_POST['message'];

        $codez = str_replace( " " , "_" ,$title);
        $codes = strtolower($codez);

        $code_check = "SELECT * FROM emergency WHERE eservicecode = '$codes'";
        $res = mysqli_query($con, $code_check);
        if(mysqli_num_rows($res) > 0){
        $code = $codes."_".rand(0,9);
        }else{
            $code = $codes;
        }

        $sql = "INSERT INTO `emergency`(`servicename`, `eservicecode`, `details`) VALUES ('$title','$code','$message')";

        if($con->query($sql)){
            header('Location: ../EmergencyServices?success');
        }

}

else if(isset($_POST['regularserviceqwecv'])){

    $title = $_POST['title'];
    $messagex = $_POST['message'];

    $messagez = str_replace( '"' , "&quot;" ,$messagex);
    $message = str_replace( "'" , "&apos;" ,$messagez);

    $codez = str_replace( " " , "_" ,$title);
    $codes = strtolower($codez);

    $code_check = "SELECT * FROM regularservices WHERE codeid = '$codes'";
    $res = mysqli_query($con, $code_check);
    if(mysqli_num_rows($res) > 0){
    $code = $codes."_".rand(0,9);
    }else{
        $code = $codes;
    }

    $sql = "INSERT INTO `regularservices`(`name`, `codeid`, `details`) VALUES ('$title','$code','$message')";

    if($con->query($sql)){
        header('Location: ../RegularServices?success');
    }

}


else if(isset($_POST['addnewhealthpwoeifjg'])){
$title = $_POST['title'];
$message = "";
$messagex = $_POST['message'];

$codez = str_replace( " " , "_" ,$title);
$codes = strtolower($codez);

$code_check = "SELECT * FROM healthservices WHERE codeid = '$codes'";
$res = mysqli_query($con, $code_check);
if(mysqli_num_rows($res) > 0){
   $code = $codes."_".rand(0,9);
}else{
    $code = $codes;
}

$messagez = str_replace( '"' , "&quot;" ,$messagex);
$message = str_replace( "'" , "&apos;" ,$messagez);

if (isset($_FILES['thumbnail'])) {
        $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
        if ($tmpFilePath != ""){
        $maxsize = 524288895959;
        $extsAllowed = array( 'jpg', 'jpeg', 'png' );
        $uploadedfile = $_FILES['thumbnail']['name'];
        $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
        if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/health/".$url;
            $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $name);
            $imageofrecord = $url;
        }
    }
    else{
        echo "file unp";
    }
    $insert = "INSERT INTO `healthservices`( `name`, `image`, `details` ,`codeid` ) VALUES ('$title','$imageofrecord','$message', '$code')";

    if ($con->query($insert)) {
            header('Location: ../HealthPackageServices?success');
        }
        else{
            die("Update failed $con->error");
        }

    }
}

else if(isset($_POST['addnewspecialjf'])){ 

$title = $_POST['title'];

if (isset($_FILES['thumbnail'])) {
    $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
    if ($tmpFilePath != ""){
      $maxsize = 524288895959;
      $extsAllowed = array( 'jpg', 'jpeg', 'png' );
      $uploadedfile = $_FILES['thumbnail']['name'];
      $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
      if (in_array($extension, $extsAllowed) ) {
        $newpicture = uniqid();
        $url = $newpicture.$uploadedfile ;
        $name = "../../Hospital/assets/images/uploads/speciality/".$url;
        $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $name);
        $imageofrecord = $url;
      }
  }
  else{
      echo "file unp";
  }
  $insert = "INSERT INTO `speciality`(`name`, `image`) VALUES ('$title','$imageofrecord')";

  if ($con->query($insert)) {
        header('Location: ../Specialities?success');

    }
    else{
        die("Update failed $con->error");
    }

}

}
else if(isset($_POST['addcroseldwiqjo'])){ 

    $title = $_POST['title'];
    
    if (isset($_FILES['thumbnail'])) {
        $tmpFilePath = $_FILES['thumbnail']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' );
          $uploadedfile = $_FILES['thumbnail']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../Hospital/assets/images/uploads/crosel/".$url;
            $result = move_uploaded_file($_FILES['thumbnail']['tmp_name'], $name);
            $imageofrecord = $url;
          }
      }
      else{
          echo "file unp";
      }
      $insert = "INSERT INTO `carousel`(`name`, `image`) VALUES ('$title','$imageofrecord')";
    
      if ($con->query($insert)) {
            header('Location: ../Carousel?success');
    
        }
        else{
            die("Update failed $con->error");
        }
    
    }
    
    }
    else if(isset($_POST['addnewdoctorwef'])){
      
        $name = $_POST['name'];
        $email =$_POST['email'];
        $speciality =$_POST['speciality'];
        $gender =$_POST['gender'];

        $n=5;
        function getName($n) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $n; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            return $randomString;
        }
        
        $code = strtoupper(getName($n));

        $password = password_hash($code, PASSWORD_BCRYPT);
        
        $usernam =  strtolower(str_replace( " " , "" ,$name).rand(0,20));
        $username = base64_encode($usernam);
        $doccode =  strtolower(str_replace( " " , "-" ,$name));
        while(1==1){
            $code_check = "SELECT * FROM doctor WHERE doccode = '$doccode'";
            $res = mysqli_query($con, $code_check);
            if(mysqli_num_rows($res) > 0){
                $doccode = $doccode."-".rand(0,9);
            }else{ 
                break;
            }
        }; 
        // echo $username; 
        
       $sql =" INSERT INTO `doctor`(`name`, `username`, `email`, `sex`, `image`, `password`, `doccode`, `scheduledaystart`, `scheduledaayend`, `scheduletimestart`, `scheduletimeend`, `specialityid`, `code`, `accstatus`) VALUES 
                            ('$name','$username','$email','$gender','default.jpg','$password','$doccode','','','00:00:00','00:00:00','$speciality','$code','newacc')";

            if ($con->query($sql)) {
                header('Location: ../Doctors?success');

            }
            else{
                die("Update failed $con->error");
            }


    }
    else if(isset($_POST['addnewreceptioniu'])){
        echo"<pre>";
        print_r($_POST);
        
        $name = $_POST['name'];
        $password = password_hash("login", PASSWORD_BCRYPT);
        $status = "newacc" ;
        $users =  strtolower(str_replace( " " , "" ,$name).rand(0,20))."@reception";
        $usersz = $users;
        $username = base64_encode($usersz);
        
           echo $usersz;
           echo $username;
       $sql ="INSERT INTO `cashier`(`name`, `username`, `password`, `status`) VALUES ('$name','$username','$password','$status')";
            if ($con->query($sql)) {
                header('Location: ../Reception?success');
            }
            else{
                die("Update failed $con->error");
            }


    }else if(isset($_POST['patientname'])){
        $ptname = $_POST['patientname'];
        $checkupfor = $_POST['checkupfor'];
        $detail = $_POST['detail'];
        $message = $_POST['message'];
    
        $md = $ptname.$checkupfor.$detail.$message;
    
        $invoice = md5($md);
        // echo $name.'<br>'.$checkupfor.'<br>'.$detail.'<br>'.$message.'<br>'.$invoice;
    
        if (isset($_FILES['reportimage'])) {
            $tmpFilePath = $_FILES['reportimage']['tmp_name'];
            if ($tmpFilePath != ""){
              $maxsize = 524288895959;
              $extsAllowed = array( 'jpg', 'jpeg', 'png' );
              $uploadedfile = $_FILES['reportimage']['name'];
              $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
              if (in_array($extension, $extsAllowed) ) {
                $newpicture = uniqid();
                $url = $newpicture.$uploadedfile ;
                $name = "../../Hospital/assets/images/uploads/reports/".$url;
                $result = move_uploaded_file($_FILES['reportimage']['tmp_name'], $name);
                $imageofrecord = $url;
              }
          }
        }
        else{
            $imageofrecord = 'default.png';
        }
    
        $insert = "INSERT INTO `records` (`patientname`, `invoice`, `nameofrecord`, `detail`, `message`, `imageofrecord`) VALUES 
        ('$ptname','$invoice','$checkupfor','$detail','$message','$imageofrecord');";
    
        if ($con->query($insert)) {
            echo 'success';
        }
        else{
            die("Update failed $con->error");
    
        }
    
    }else if(isset($_POST['socialmediaurl'])){
    
        $socialmediaurl = $_POST['socialmediaurl'];
        $socialname = $_POST['socialname'];
        $socialicon =  "mdi ".$_POST['socialicon']." noti-icon";

        

        $insert = "INSERT INTO `socialmedia`(`name`, `url`, `icon`) VALUES ('$socialname','$socialmediaurl','$socialicon')";
        if ($con->query($insert)) {
            $fetch = "SELECT * FROM socialmedia";
            $fetchresult = $con->query($fetch);
            if ($fetchresult->num_rows > 0) {
                while ($fetchrow = $fetchresult->fetch_assoc()) {
                    echo '
                        <tr id="socialrow_'.$fetchrow['id'].'">
                            <td class="table-user">
                               <i class ="'.$fetchrow['icon'].'"></i>
                            </td>
                            <td>'.$fetchrow['name'].'</td>
                            <td>'.$fetchrow['url'].'</td>
                            <td class="table-action">
                                <a onclick="deletesocial('.$fetchrow['id'].')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    ';
                }
            } 
        }
        else{
            die("Update failed $con->error");
    
        }
    }
    else if(isset($_POST['savepaymentname'])){
        $name = $_POST['savepaymentname'];
        $email = $_POST['email'];
        $price = $_POST['price'];
    
        $md = $name.$email.$price;
        $invoice = md5($md);
        $sql = "INSERT INTO `payment`(`name`, `email`, `invoice`, `price`) VALUES ('$name' , '$email' , '$invoice' , '$price')";
        if ($con->query($sql)) {
            $date = date("Y-m-d");
            $visitsql = "SELECT  * FROM rich WHERE date = '$date' ";
            $visitresult = $con->query($visitsql);
            $visitdata = [];
            if ($visitresult->num_rows > 0) {
                mysqli_query($con,"update rich set moneytoday = moneytoday+'$price' where date='$date'");
                echo 'success'; 
    
            }
            else{
                $fe = "SELECT  * FROM rich ORDER BY id desc limit 1";
                $visitresult = $con->query($fe);
                $visitdata = [];
                if ($visitresult->num_rows > 0) {
                    while ($visitrow = $visitresult->fetch_assoc()) {
                        $ptv = $visitrow['moneytoday'];
                    }
                }
                // mysqli_query($con,"update post set  lastupdate = '$date' , views=newview , newview = 0 ");
                $visitsql = "INSERT INTO rich (`date`, `money`, `moneytoday`) VALUES ('$date','$ptv','0')";
                    if ($con->query($visitsql)){ 
                     echo 'success'; 
    
                } else {
                    die("Category creation failed $connection->error");
                }
            }
        }            
        else{
            die("Update failed $con->error");
    
        }
    
    
    }

    // echo"<pre>";
    // print_r($_POST);
// print_r($_FILES);




?>