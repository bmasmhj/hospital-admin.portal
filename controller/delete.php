<?php 
require 'connection.php';
if(isset($_POST['deleteprovides'])){
    $id = $_POST['deleteprovides'];

    $delete = "DELETE FROM provide WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
    // echo 'success';
}
if(isset($_POST['deleteemergency'])){
    $id = $_POST['deleteemergency'];

    $delete = "DELETE FROM emergency WHERE eservicecode = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}

if(isset($_POST['contactmail'])){
    $id = $_POST['contactmail'];

    $delete = "DELETE FROM contact WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}
if(isset($_POST['feedbackmsg'])){
    $id = $_POST['feedbackmsg'];

    $delete = "DELETE FROM feedback WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}

if(isset($_POST['deleteregular'])){
    $id = $_POST['deleteregular'];

    $delete = "DELETE FROM regularservices WHERE codeid = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}
if(isset($_POST['deletehealth'])){
    $id = $_POST['deletehealth'];

    $delete = "DELETE FROM healthservices WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}
if(isset($_POST['deletespeciality'])){
    $id = $_POST['deletespeciality'];

    $delete = "DELETE FROM speciality WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}

if(isset($_POST['bookedhealth'])){
    $id = $_POST['bookedhealth'];

    $delete = "DELETE FROM bookedpkg WHERE id = '$id' ";
    if ($con->query($delete)) {
        echo 'success';
        }
        else{
            die("Update failed $con->error");
        }
}

if(isset($_POST['deleteuser'])){

    $id = $_POST['deleteuser'];
    $sql = "DELETE FROM users WHERE id = '$id' ";
    if ($con->query($sql)) {

        echo 'success';
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deletedoctor'])){

    $id = $_POST['deletedoctor'];
    $sql = "DELETE FROM doctor WHERE id = '$id' ";
    if ($con->query($sql)) {

        echo 'deleted';
    }
    else{
        echo 'failed';
    }
    

}

if(isset($_POST['deleterecords'])){

    $id = $_POST['deleterecords'];
    $sql = "DELETE FROM records WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}

if(isset($_POST['deletecrosel'])){

    $id = $_POST['deletecrosel'];
    $sql = "DELETE FROM carousel WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deleterecept'])){

    $id = $_POST['deleterecept'];
    $sql = "DELETE FROM cashier WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deletesocial'])){

    $id = $_POST['deletesocial'];
    $sql = "DELETE FROM socialmedia WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}
if(isset($_POST['deletepay'])){

    $id = $_POST['deletepay'];
    $sql = "DELETE FROM payment WHERE id = '$id' ";
    if ($con->query($sql)) {
        echo 'success'; 
    }
    else{
        echo 'failed';
    }
    

}


?>

