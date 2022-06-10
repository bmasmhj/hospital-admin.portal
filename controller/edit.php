<?php 
require 'connection.php';
if(isset($_POST['editprovidetitleytfdv'])){
        $title = $_POST['editprovidetitleytfdv'];
        $details = $_POST['editprovidetails'];
        $id = $_POST['editproductid'];

        if (isset($_FILES['editprovideimage'])) {
            if($_FILES['editprovideimage']['name']!=''){
                $tmpFilePath = $_FILES['editprovideimage']['tmp_name'];
                if ($tmpFilePath != ""){
                  $maxsize = 524288895959;
                  $extsAllowed = array( 'jpg', 'jpeg', 'png' );
                  $uploadedfile = $_FILES['editprovideimage']['name'];
                  $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
                  if (in_array($extension, $extsAllowed) ) {
                    $newpicture = uniqid();
                    $url = $newpicture.$uploadedfile ;
                    $name = "../../Hospital/assets/images/uploads/provide/".$url;
                    $result = move_uploaded_file($_FILES['editprovideimage']['tmp_name'], $name);
                    $imageofrecord = $url;
                  }
                }
            }
            else {
                $imageofrecord = $_POST['editprovideimageurl'];
            }
        }
        else {
            $imageofrecord = $_POST['editprovideimageurl'];
        }

        $update = "UPDATE `provide` SET `img`='$imageofrecord',`title`='$title',`descripton`='$details' WHERE id = '$id'";
        if ($con->query($update)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
    
}

?>