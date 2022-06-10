<?php require 'info-fetcher.php'; ?>

<?php 
$websitesensetivedatasql = "SELECT  * FROM website ";
$websitesensetivedataresult = $con->query($websitesensetivedatasql);
$websitesensetivedatadata = [];
if ($websitesensetivedataresult->num_rows > 0) {
  while ($websitesensetivedatarow = $websitesensetivedataresult->fetch_assoc()) {
        $websitename = $websitesensetivedatarow['websitename'];
        $websitedescription = $websitesensetivedatarow['description'];
        $websitecontact= $websitesensetivedatarow['contact'];
        $websitecontact2= $websitesensetivedatarow['contact2'];
        $websiteemail = $websitesensetivedatarow['email'];
        $websiteemergencynum = $websitesensetivedatarow['emergencynum'];
        $websitemarquedata = $websitesensetivedatarow['marquedata'];
        $websitelocation = $websitesensetivedatarow['location'];
  }
}

if(isset($_POST['notific'])){
    require 'timeago.php';

    $active = '';
    $notimsgsql = "SELECT * FROM notification  ORDER BY id desc ";
    $notimsgeresult = $con->query($notimsgsql);
    if ($notimsgeresult->num_rows > 0) {
        while ($notimsgerow = $notimsgeresult->fetch_assoc()) {
            $time = $notimsgerow['created'];
            $timeago = time_elapsed_string($time);  
            if($notimsgerow['status']==0){
                $active = 'active';
            }
            else {
                $active = '';
            }
        echo '
            <a class="dropdown-item notify-item '.$active.' ">
                <div class="notify-icon bg-'.$notimsgerow["color"].'">
                    <i class="mdi '.$notimsgerow["icon"].'"></i>
                </div>
                <p class="notify-details">
                    '.$notimsgerow["reason"].'
                    <small class="text-muted">'.$timeago.'</small>
                </p>
            </a>';
        }
        $update = "UPDATE `notification` SET `status`='1' ";
        if ($con->query($update)) { 
            
        }
        else{
            die("Update failed $connection->error");
        }
    } 
    
}
// else if(){

// }


?>

