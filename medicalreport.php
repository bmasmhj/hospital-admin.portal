<?php require 'header.php';

 ?>
 <style>
     .modal{
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        overflow : scroll !important;
     }
     .modal-dialog{
        max-width : 50% !important;
        margin : 9rem auto !important;
     }
     #reportimage{
         width: 100%!important;
     }

 </style>
<div class="main-content">
        <section class="section">
          <h3 class="section-header">
            <div>Medical Reports</div>
            <button  data-bs-toggle="modal" data-bs-target="#addnewrecrdform" class='btn btn-success float-right'>Add Report</button>

          </h3>

    <div class="section-body">
      <div class="card">
        <div class="card-body">

       
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th id="descending" >Date</th>
                <th>Patient Name</th>
                <th>Report</th>
                <th>Record Name</th>
                <th>Detail</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recordsdata as $key => $report) {
                $sn = $key+1;
             ?>

            <tr id='row_<?php echo $report['id']?>'>
                <td id='time_<?php echo $report['id']?>'><?php echo $report['time'] ?></td>
                <td id='patienname_<?php echo $report['id']?>'><?php echo $report['patientname']?></td>
                <td>
                  <img  data-bs-toggle="modal" data-bs-target="#viewimagereport" onclick="viewimg(<?php echo $report['id']?>)" id='imagesrc_<?php echo $report['id']?>' class='data-record' src='../Hospital/assets/images/uploads/reports/<?php echo $report['imageofrecord']?>' alt='<?php echo $report['imageofrecord']?>'/>
                </td>
                <td id='nameofrecord_<?php echo $report['id']?>'><?php echo $report['nameofrecord']?></td>
                <td id='detail_<?php echo $report['id']?>'><?php echo $report['detail']?></td>
                <td id='messange_<?php echo $report['id']?>'><?php echo $report['message']?></td>
                <td>
                    <button  class='btn btn-info m-0 p-2' data-bs-toggle="modal" data-bs-target="#editrecordform" onclick="editrecords(<?php echo $report['id']?>)"><h6 class='p-0 m-0 mdi mdi-pencil text-white'></h6></button>
                    <button  class='btn btn-danger m-0 p-2' onclick="removemedicalreport(<?php echo $report['id']?>)">
                    <h6 class='p-0 m-0 mdi mdi-trash-can text-white'></h6></button>  </td>
            </tr>
                <?php } ?>
        </tbody>
      </table>
      </div>
      </div>
      
</div>
<div class="modal fade" id="viewimagereport" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="medicalreportimage">

        </div>
    </div>
</div>

<div class="modal fade" id="editrecordform" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content" id="preview">
        <div class='modal-header'>
          <h4 class='modal-title'>Edit Reports</h4>
          <h5 id='alerts'></h5>
          <button type="button" class="btn-close" id="closemodelnow" data-bs-dismiss="modal" aria-hidden="true"></button>
          <!-- <button type='button' onclick='closemodel()' class='btn mdi mdi-cross' ></button> -->
        </div>
        <!-- Modal body -->
            <div class='modal-body'>
                <form method='post' enctype='multipart/form-data' novalidate id='patienteditform' data-index-number=''>
                <input type='hidden' class='form-control mb-3' id='time' name='time' value=''>
                <input type='text' class='form-control mb-3' id='patientnames' name='patientname' value='' required placeholder='Patient Name'>
                <input type='text' class='form-control mb-3' id='imageurl' name='imageurl' hidden value='' required placeholder='imagepath'>
                <input type='text' class='form-control mb-3' id='id' name='id' hidden value='' required placeholder='id'>
                <input type='text' class='form-control mb-3' id='checkupfors' name='checkupforrecords' value='' required placeholder='Checkup for'>
                <input type='file' class='form-control mb-3' name='reportimages' required >
                <textarea class='form-control mb-3' required id='reportdetailss'  name='detail' placeholder='Detail'></textarea>
                <textarea class='form-control mb-3' required id='reportmessages'  name='message' placeholder='Message'></textarea>
                <button type='submit' name='editrecorddetail' value='updaterecordsnow' class='btn btn-success'>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="addnewrecrdform" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Reports</h4>
        <h5 id='alert'></h5>
        <button type="button" onclick="closeform()" class="btn mdi mdi-cross" ></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" novalidate id='patientreportform'>
            <input type="text" class='form-control mb-3' id='patientname' name='patientname' required placeholder='Patient Name'>
            <input type="text" class='form-control mb-3' id='checkupfor' name='checkupfor' required placeholder='Checkup for'>
            <input type="file" class='form-control mb-3' name='reportimage' required >
            <textarea class='form-control mb-3' required id='reportdetails' name='detail' placeholder='Detail'></textarea>
            <textarea class='form-control mb-3' required id='reportmessage' name='message' placeholder='Message'></textarea>
            <button type='submit' class='btn btn-success'>Save</button>
          </form>
      </div>
    </div>
  </div>
</div>




</section>
</div>
<?php require 'footer.php' ?>

<script>
    atohere();
</script>