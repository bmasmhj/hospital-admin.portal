<?php 
    require 'controller/info-fetcher.php';

if(isset($_POST['maildata'])){
    foreach( $contactdata as $key => $contactdataval){
        $invert = '';
        $status = 'text-ll';
        $icon = 'mdi-email-open';
        if($key%2 == 0){
            // $invert = 'bg-light';
        }
        if($contactdataval['status']=='0'){
            $status = 'text-dark font-weight-bold';
        $icon = 'mdi-email';
        }
    ?>
<div id="mailrow_<?php echo $contactdataval['id']?>"  onmouseover="emailaction(<?php echo $contactdataval['id']?>)" onmouseout="emailactionnvert(<?php echo $contactdataval['id']?>)" id="mailrow_<?php echo $contactdataval['id'] ?>" class="row p-2 <?php echo $invert?> emaillist d-flex flex-dierction-column align-items-center">
    <div class="col-3">
    <i class="mdi <?php echo $icon?> mx-2"></i>
    <span class=" <?php echo $status?>"><?php echo $contactdataval['fullname'] ?></span>
    </div>
    <div class="col-8">
    <span class=" <?php echo $status?>"><?php echo substr($contactdataval['subject'].'&nbsp;&nbsp; &ndash; &nbsp;&nbsp;'.$contactdataval['message'] , 0,175) ;
        if(strlen($contactdataval['subject'].'&nbsp;&nbsp;–&nbsp;&nbsp;'.$contactdataval['message']) > 175 ){ echo '...'; }

    ?></span>
    </div>
    <div class="col-1">
        <div id="show_<?php echo $contactdataval['id'] ?>">
        
            <?php echo time_elapsed_string($contactdataval['time']) ?>

        </div>
        <div id="mailaction_<?php echo $contactdataval['id'] ?>"class="d-none">
            <a data-bs-toggle="modal" data-bs-target="#centermodal" class="h4 <?php echo $status?> mx-2" onclick="viewthismail(<?php echo $contactdataval['id'] ?>);"><i class="mdi mdi-eye email-action-icons-item"></i></a>
            <a  class="<?php echo $status?> mx-2 h4" href="javascript: deletethismail(<?php echo $contactdataval['id'] ?>);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
        </div>
    </div>
</div>

<?php }    
    }
    else if(isset($_POST['mailviewdata'])){
        $id = $_POST['mailviewdata'];
        $update = "UPDATE `contact` SET `status`='1' WHERE id = $id";
        if ($con->query($update)) {
            // echo "sucess"; 
        }
        foreach( $contactdata as $key => $contactviewval){
        // $message = wordwrap($contactviewval["message"], 150, "<br />\n");
        $message = str_replace("\n","<br>" ,$contactviewval["message"] );
            $dateq = date_create($contactviewval["time"]);
            $date =  date_format($dateq , 'M d Y, h:i:A');
            if($contactviewval['id'] === $id ){
                echo'<div class="modal-body">
                <div class="mt-3">
                <h5 class="font-18">'.$contactviewval["subject"].'</h5>
                    <hr>
                    <div class="d-flex mb-3 mt-1">
                        <div class="w-100 overflow-hidden">
                            <small class="float-end">'.$date.'</small>
                            <h6 class="m-0 font-14">'.$contactviewval["fullname"].'</h6>
                            <small class="text-muted">From: '.$contactviewval["email"].'</small>
                           <br>
                           <br>

                            <p class="w-100" style="overflow:hidden">'.$message.'<p> 
                        </div>
                    </div>
                    <hr>
                </div>';
            }
        }
    }
    
    if(isset($_POST['feeddata'])){
        foreach( $feedbackdata as $key => $feedbackval){
            $invert = '';
            $status = 'text-ll';
            $icon = 'mdi-email-open';
            if($key%2 == 0){
                // $invert = 'bg-light';
            }
            if($feedbackval['status']=='0'){
                $status = 'text-dark font-weight-bold';
            $icon = 'mdi-email';
            }
        ?>
    <div id="feedrow_<?php echo $feedbackval['id']?>"  onmouseover="feedactin(<?php echo $feedbackval['id']?>)" onmouseout="feedactinnvert(<?php echo $feedbackval['id']?>)" id="mailrow_<?php echo $feedbackval['id'] ?>" class="row p-2 <?php echo $invert?> emaillist d-flex flex-dierction-column align-items-center">
        <div class="col-3">
        <i class="mdi <?php echo $icon?> mx-2"></i>
        <span class=" <?php echo $status?>"><?php echo $feedbackval['name'] ?></span>
        </div>
        <div class="col-8">
        <span class=" <?php echo $status?>"><?php echo substr($feedbackval['subject'].'&nbsp;&nbsp; &ndash; &nbsp;&nbsp;'.$feedbackval['message'] , 0,175) ;
            if(strlen($feedbackval['subject'].'&nbsp;&nbsp;–&nbsp;&nbsp;'.$feedbackval['message']) > 175 ){ echo '...'; }
    
        ?></span>
        </div>
        <div class="col-1">
            <div id="show_<?php echo $feedbackval['id'] ?>">
            
                <?php echo time_elapsed_string($feedbackval['time']) ?>
    
            </div>
            <div id="mailaction_<?php echo $feedbackval['id'] ?>"class="d-none">
                <a data-bs-toggle="modal" data-bs-target="#centermodal" class="h4 <?php echo $status?> mx-2" onclick="viewthisfeed(<?php echo $feedbackval['id'] ?>);"><i class="mdi mdi-eye email-action-icons-item"></i></a>
                <a  class="<?php echo $status?> mx-2 h4" href="javascript: deletethisfeedback(<?php echo $feedbackval['id'] ?>);"><i class="mdi mdi-delete email-action-icons-item"></i></a>
            </div>
        </div>
    </div>
    
    <?php }    
        }
        else if(isset($_POST['feedviewdata'])){
            $id = $_POST['feedviewdata'];
            $update = "UPDATE `feedback` SET `status`='1' WHERE id = $id";
            if ($con->query($update)) {
                // echo "sucess"; 
            }
            foreach( $feedbackdata as $key => $feedviewvls){
            // $message = wordwrap($feedviewvls["message"], 150, "<br />\n");
            $message = str_replace("\n","<br>" ,$feedviewvls["message"] );
                $dateq = date_create($feedviewvls["time"]);
                $date =  date_format($dateq , 'M d Y, h:i:A');
                if($feedviewvls['id'] === $id ){
                    echo'<div class="modal-body">
                    <div class="mt-3">
                    <h5 class="font-18">'.$feedviewvls["subject"].'</h5>
                        <hr>
                        <div class="d-flex mb-3 mt-1">
                            <div class="w-100 overflow-hidden">
                                <small class="float-end">'.$date.'</small>
                                <h6 class="m-0 font-14">'.$feedviewvls["name"].'</h6>
                                <small class="text-muted">From: '.$feedviewvls["email"].'</small>
                               <br>
                               <br>
    
                                <p class="w-100" style="overflow:hidden">'.$message.'<p> 
                            </div>
                        </div>
                        <hr>
                    </div>';
                }
            }
        }
        
        ?>


<?php 

function time_elapsed_string($time, $full = false) {
    $now = new DateTime('Asia/Kathmandu');
    $ago = new DateTime($time, new DateTimeZone('Asia/Kathmandu'));
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>