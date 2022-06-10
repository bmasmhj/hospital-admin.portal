<?php require 'header.php' ?>
<style>
    strong{
        color : #29b4eb;
    }
    
</style>
<div class="row m-4 ">
    <h4 class="col-6">Notifications</h4>
    <a href="javascript:clearall();" class="col-6 text-end"> Clear all </a>
</div>



    <div class="container" id="notificationcontain">
    <?php foreach($notificationdata as $key => $notificationvalues){
         
        ?>
        <a id="notify_<?php echo $notificationvalues['id']?>" href="javascript:void(0);" class="dropdown-item notify-item">
        <div  class="mb-3 d-flex justify-content-between align-items-center " style="flex-direction:row" >
            <div class="d-flex flex-direction-row align-items-center">
                <div class="rounded-circle mx-3 d-flex  align-items-center justify-content-center bg-<?php echo $notificationvalues['color']?>" style="width:50px; height:50px">
                    <i class="mdi <?php echo $notificationvalues['icon']?> text-white" style="font-size : 22px"></i>
                </div>
                 <span><?php echo $notificationvalues['reason'] ?></span>
            </div>  
                 <i onclick="deletenotification(<?php echo $notificationvalues['id']?>)" class="float-end btn text-danger mdi mdi-bell-remove-outline" style="font-size : 20px;"> </i>
        </div>
        </a>
    <?php   }?> 

    </div>

<?php require 'footer.php' ?>

<script>
    function deletenotification(id) {
        // alert(id);
        document.getElementById('notify_'+id).style.display = 'none';  
        $.ajax({
            url : 'controller/update.php',
            data: {'deletenoti' : id},
            method : 'post',
            dataType : 'text',
            success :function (response){
                document.getElementById('notify_'+id).style.display = 'none';                
            }
        });
        
    }
    function clearall(){
        
        $.ajax({
            url : 'controller/update.php',
            data: {'clearnnoti' : 'any'},
            method : 'post',
            dataType : 'text',
            success :function (response){
                document.getElementById('notificationcontain').innerHTML = '';  
            }
        });
    }
    
    </script>