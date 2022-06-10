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
          <h3>Add Doctors</h3>
      <form action="controller/add.php" method="post"  enctype="multipart/form-data">
          <div class="row">
              <div class="mb-3 col-3">
                  <label for="simpleinput" class="form-label">Full Name</label>
                  <input type="text" name="name" id="simpleinput" class="form-control">
              </div>
              <div class="mb-3 col-3">
                  <label for="simpleinput" class="form-label">Email</label>
                  <input type="text" name="email" id="simpleinput" class="form-control">
              </div>
              <div class="mb-3 col-3">
                  <label for="simpleinput" class="form-label">Speciality</label>
                  <select class="form-select" required name="speciality" id="speciality">
                    <option selected disabled >Select Speciality</option>
                      <?php 
                      foreach($specialitydata as $key => $department){ ?>
                      <option value="<?php echo $department['id']?>"><?php echo $department['name']?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="mb-3 col-3">
                  <label for="simpleinput" class="form-label">Gender</label>
                  <div>
                        <input type="radio" id="gender1" name="gender" value="male" class="mx-2 form-check-input">
                        <label class="form-check-label" for="gender1">Male</label>
                        <input type="radio" id="gender2" name="gender" value="female" class="mx-2 form-check-input">
                        <label class="form-check-label" for="gender2">Female</label>
                        <input type="radio" id="gender3" name="gender" value="other" class="mx-2 form-check-input">
                        <label class="form-check-label" for="gender2">Other</label>
                  </div>
              </div>
              <div class="mb-3 col-2">
                  <label for="simpleinput" class="form-label">&nbsp;&nbsp; </label>
                  <input type="submit" name="addnewdoctorwef" value="Create" id="simpleinput" class="form-control">
              </div>
          </div>
      </form>
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
                <th>Email</th>
                <th>Sex</th>
                <th>Schedule Days</th>
                <th>Schedule Time</th>
                <th>Speciality</th>
                <th>Status</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
          
         $today = date('w'); // today 
            // echo $today.'<br>' ;
            date_default_timezone_set("Asia/Kathmandu");
                $now = date("H" );

            foreach($doctordata as $key => $docname){ 
              $stime =  date('H', strtotime($docname['scheduletimestart']));
              $etime =  date('H', strtotime($docname['scheduletimeend']));
                $timea =  date('h:i A', strtotime($docname['scheduletimestart']));
                $timeb =  date('h:i A', strtotime($docname['scheduletimeend']));
                // echo $now;  
                if($stime === $etime ){
                    $stat = "Not Set";
                    $color = "info";
                    $daystat = "Not Set";
                    $timestat = "Not Set";
                }
                else {
                  $daystat = strtoupper($docname['scheduledaystart'].' - '.$docname['scheduledaayend']);
                  $timestat = $timea.' - '.$timeb;
                  $starting = $docname['scheduledaystart']; //opening day
                  $closing =  $docname['scheduledaayend']; //closing day
                  $openday = date("w", strtotime($starting));  //coverting to number 
                  $closeday = date("w", strtotime($closing));  // coverting to number 
                    //checking if closing day is greater than opening day 
                    if($openday < $closeday ){ 
                        //checking if today lies starting and closing day
                          if($today > $openday && $today <= $closeday ){ 
                            $stat = 'Available';  //if today lies between starting day and ending day then available
                            $color = 'success';
                          }
                          //checking if today lies between sunday and closeday
                          else if( $openday == 0 ){   
                            $stat = 'Available';    
                            $color = 'success';
                          }
                          else{  
                                $stat = 'Not Available'; //else not available
                            $color = 'danger';
                          }
                    }
                    // if closing day is less than opening day 
                    else{  
                      //checking if today lies between opening day and friday
                      if($today > $openday && $today <=  6 ){ 
                        $stat = 'Available';   
                        $color = 'success';
                      }
                      //checking if today lies between sunday and closeday
                      else if( $today >= 0 && $today <= $closeday ){   
                        $stat = 'Available';    
                        $color = 'success';
                      }
                      else{
                            $color = 'danger';
                            $stat = 'Not Available';  // else not available
                      }
                    }
              }
  
              ?> 

                <tr id='tr_<?php echo $docname['id']?>'>
                  <td  data-bs-toggle="modal" data-bs-target="#previewz" onclick="viewdoctordetail(<?php echo $docname['id']?>)" style='cursor:pointer'>
                  <img class='data-imge' src='../Hospital/assets/images/uploads/doctors/<?php echo $docname['image'] ?>' />
                   <span id="name_<?php echo $docname['id']?>"> <?php echo ucfirst($docname['name'])?> </span></td>
                  <td><?php echo $docname['email']?></td>
                  <td><?php echo ucfirst($docname['sex'])?></td>
                  <td><?php echo $daystat; ?></td>
                  <td><?php echo $timestat ?></td>
                  <td><?php echo $docname['speciality']?></td>
                  <td><h4 class="badge bg-<?php echo $color?>"><?php echo $stat ?></h4></td>
                  <td id="stat_<?php echo $docname['username']?>">
                  <?php echo strtoupper($docname['code']) ; ?>
                </td>
                  <td><h4 class='d-inline mdi mdi-trash-can text-danger' onclick="deletedoctor(<?php echo $docname['id']?>)"></h4> 
                      <h4 class='d-inline mdi mdi-refresh text-info' onclick="resetpassworddoc('<?php echo $docname['username']?>')"></h4> 
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
  function resetpassworddoc(username){
    Swal.fire({
        title: 'Reset password for '+username+' ?',
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
                    const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        function generateString(length) {
                            let result = ' ';
                            const charactersLength = characters.length;
                            for ( let i = 0; i < length; i++ ) {
                                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                            }
                            return result;
                        }
                        var code = generateString(5);
                if (result.dismiss === Swal.DismissReason.timer) {
                    jQuery.ajax({
                            url:'controller/update.php',
                            type:'post',
                            data: {
                                'changeadmin': username, 
                                    'code' : code			
				            },
                            success:function(nameresult){
                                $('#stat_'+username).html(code);
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


  function checktime(){

  }
  </script>