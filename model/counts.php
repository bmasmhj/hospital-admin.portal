<div class="row mt-4">
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-wrap">
        <div class="card-header">   
            <h4 class="row d-flex align-items-center">
        <div style="width:50px;height:50px" class="col-2 d-flex  rounded-circle bg-success text-white p-2 align-items-center justify-content-center mx-2">
            <i class="mdi mdi-doctor"></i>
        </div>
                Total Doctors</h4>
        </div>
        <div class="card-body">
        <?php echo $doctor_count?>

        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-wrap">
        <div class="card-header">

            <h4 class="row d-flex align-items-center">
        <div style="width:50px;height:50px" class="col-2 d-flex  rounded-circle bg-primary text-white p-2 align-items-center justify-content-center mx-2">
            <i class="mdi mdi-account"></i>
        </div>

                Total Users</h4>
        </div>
        <div class="card-body">
            <?php echo $user_count?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-wrap">
        <div class="card-header">
            <h4 class="row d-flex align-items-center">
        <div style="width:50px;height:50px" class="col-2 d-flex  rounded-circle bg-info text-white p-2 align-items-center justify-content-center mx-2">
            <i class="mdi mdi-file-document"></i>
        </div>

                Appointments</h4>
        </div>
        <div class="card-body">
        <?php echo $appointment_count?>
        </div>
        </div>
    </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-3">
    <div class="card card-sm-4">
        <div class="card-wrap">
        <div class="card-header">
            <h4 class="row d-flex align-items-center">
        <div style="width:50px;height:50px" class="col-2 d-flex  rounded-circle bg-danger text-white p-2 align-items-center justify-content-center mx-2">

            <i class="mdi  mdi-account-heart"></i>
            </div>
                
            Booked Packages</h4>
        </div>
        <div class="card-body">
         <?php echo $booked_count?>
        </div>
        </div>
    </div>
    </div>
</div>
