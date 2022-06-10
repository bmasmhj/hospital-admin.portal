<?php $profile = "true"; ?>
<?php require 'header.php' ?>
 <section>
  <div class="row m-4">
    <h4>Payment History</h4>
  </div>
<div class="container">
  <div class="row">
    <div class="col-md-5 offset-md-3">
      <div class="card">
        <div class="card-body">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="fullname" placeholder="Name" value="<?php echo $adminname?>" aria-label="Name" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-success" id="updatename" type="button">Update</button>
            </div>
          </div>
          <input type="text" disabled class="form-control mb-3" value="juman@user">
          </form>
          <form method="post" id="updatepass" >
              <label class="mb-2" >Change Password</label>
              <div class="input-group input-group-merge mb-3">
                <input type="password" id="oldpw" name="oldpw" class="form-control" placeholder="Old Password">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
              </div>
              <div class="input-group input-group-merge mb-3">
                <input type="password" id='newpw'name="newpw" class="form-control" placeholder="New Password">
                  <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                  </div>
              </div>
              <div class="input-group input-group-merge mb-3">
              <input type="password" id='cnewps' name="cnewps" class="form-control" placeholder="Confirm Password">

                  <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                  </div>
              </div>



              <span id="stat" class="text-danger"></span> <br>
              <input type="submit" class="btn btn-success" value="Change Password" name="changepass">
          </form>
          <form action="" id="updatepin" class="mt-3">
            <label for="" class="mb-2">Change Pin Code</label> <span id="msgz"></span>
            <div class="input-group input-group-merge mb-3">
                <input type="password" id="oldpws" name="oldpws" class="form-control" placeholder="Old Password">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
            <div class="input-group input-group-merge mb-3">
              <input type="password" id="pincode" name="pincode" class="form-control" placeholder="Pincode : XXXXXX" maxlength="6" minlength="6">
                <div class="input-group-text" data-password="false">
                    <span class="password-eye"></span>
                </div>
            </div>
  
            <input type="submit" class="btn btn-success" value="Update Password" name="updatepin">

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    </section>
<?php require 'footer.php' ?>
<script src="assets/js/verifyuser.js"></script>

<script>
 
  </script>