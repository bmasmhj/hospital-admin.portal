<?php require 'header.php' ?>
<?php $name = 'testname'; ?>
<style>
    .emaillist:hover {
    background: #eef2f7!important;
    cursor : pointer;

}
.font-weight-bold{
    font-weight: bold;
    }
.text-ll{
    color: #6c757d;
}
</style>
<div class="row m-4">
    <h4>FeedBacks</h4>
    <div class="mt-3" id="feedbackdata">
        
    </div>
</div>

<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="feeddataviewthis">        

            </div>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>

<script>

    

    function feedactin(id){
        $('#show_'+id).addClass('d-none');
        $('#mailaction_'+id).removeClass('d-none');   
    }
    function feedactinnvert(id){
        $('#show_'+id).removeClass('d-none');
        $('#mailaction_'+id).addClass('d-none');    

    }

    function feedbackdetails(){
        $.ajax({
        url: "maildata.php",
        method: 'POST',
        data:{'feeddata':'feeddata'},
        success:function(data){
            document.getElementById('feedbackdata').innerHTML = data;
        }
    }); 

    }
    feedbackdetails();


   
    
</script>

<script>
        function viewthisfeed(id){
            const no = id;
        $.ajax({
        url: "maildata.php",
        method: 'POST',
        data:{'feedviewdata': no},
        success:function(data){
            $('#feeddataviewthis').html(data);
            feedbackdetails();
            // document.getElementById('mailfromcontact').innerHTML = data;
        }
    }); 

    }
            </script>