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
    <h4>Message from Contact page</h4>
    <div class="mt-3" id="mailfromcontact">
        
    </div>
</div>

<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="maildataviewthis">        

            </div>
        </div>
    </div>
</div>


<?php require 'footer.php' ?>

<script>

    

    function emailaction(id){
        $('#show_'+id).addClass('d-none');
        $('#mailaction_'+id).removeClass('d-none');   
    }
    function emailactionnvert(id){
        $('#show_'+id).removeClass('d-none');
        $('#mailaction_'+id).addClass('d-none');    

    }

    function maildetails(){
        $.ajax({
        url: "maildata.php",
        method: 'POST',
        data:{'maildata':'maildata'},
        success:function(data){
            document.getElementById('mailfromcontact').innerHTML = data;
        }
    }); 

    }
    maildetails();


   
    
</script>

<script>
        function viewthismail(id){
            const no = id;
        $.ajax({
        url: "maildata.php",
        method: 'POST',
        data:{'mailviewdata': no},
        success:function(data){
            $('#maildataviewthis').html(data);
            maildetails();
            // document.getElementById('mailfromcontact').innerHTML = data;
        }
    }); 

    }
            </script>