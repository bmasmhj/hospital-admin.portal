<?php require 'header.php' ?>
<div class="row m-4">
    <h4>Doctors</h4>
</div>
             
<style>
     .modal{
        overflow : scroll !important;
     }
     .modal-dialog{
        margin : 9rem auto !important;
     }

 </style>

<section>
  <div class="card">
      <div class="card-body">
          <h3>Add Reception</h3>
      <form action="controller/add.php" method="post"  enctype="multipart/form-data">
          <div class="row">
              <div class="mb-3 col-3">
                  <label for="simpleinput" class="form-label">Full Name </label>
                  <input type="text" name="name" id="simpleinput" class="form-control">
              </div>
              <div class="mb-3 col-2">
                  <label for="simpleinput" class="form-label">&nbsp;&nbsp; </label>
                  <input type="submit" name="addnewreceptioniu" value="Create" id="simpleinput" class="form-control">
              </div>
          </div>
      </form>
      <span class="text-danger">(Note: Default password is always <span class="text-info">login </span>)</span>   
      </div>
  </div>
</section>
<section class="section">
    <div class="section-body">
      <div class="card">
        <div class="card-body">
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          
         $today = date('w'); // today 
            // echo $today.'<br>' ;
            date_default_timezone_set("Asia/Kathmandu");
                $now = date("H:i" );
                // echo $now ;
            foreach($receptionsdata as $key => $receptionval){ 
               
              ?> 

                <tr id='tr_<?php echo $receptionval['id']?>'>
                  <td id='name_<?php echo $receptionval['id']?>'><?php echo $receptionval['name']?></td>
                  <td ><?php echo base64_decode($receptionval['username']);?></td>     
                  <td id="stat_<?php echo $receptionval['id'];?>"><?php echo $receptionval['status'];?></td>                  
                  <td><h4 class='d-inline mdi mdi-trash-can text-danger' onclick="deleterecept(<?php echo $receptionval['id']?>)"></h4> 
                      <h4 class='d-inline mdi mdi-refresh text-info'     onclick="resetpasswordrecept('<?php echo $receptionval['id']?>')"></h4> 
                </td>
              </tr>
            <?php
            }

    ?>
        </tbody>
      </table>
      </div>
      </div>
      <div class="modal fade" id="previewz" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="preview">

            </div>
        </div>
      </div>


</section>
</div>
<?php require 'footer.php' ?>



<script>
  function resetpasswordrecept(username){
    var name = $('#name_'+username).text();  
    Swal.fire({
        title: 'Reset password for '+name+' ?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reset!'
        }).then((result) => {
        if (result.isConfirmed) {
            let timerInterval
                Swal.fire({
                title: 'Resetting password',
                html: 'Generating reset code in <b></b> milliseconds.',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    jQuery.ajax({
                            url:'controller/update.php',
                            type:'post',
                            data: {
                                'changerecept': username		
				            },
                            success:function(nameresult){
                                $('#stat_'+username).html("reset");
                            }
                        });
                     }
                else{
                    $('#adstatus').html('cancelled');
                }
                })
        }
        })
}
  </script>