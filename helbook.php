<?php require 'header.php';
 ?>

  <section class="section">
    <div class="row m-4">
        <h4>Health Services</h4>
    </div>


    <div class="container">
      <div class="card">
        <div class="card-body">
          <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                  <th id="descending" >Booking Date</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Package</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookedpkgdata as $key => $appoint) {
                ?>
                <tr>
                    <td><?php echo $appoint['date']?></td>
                    <td><?php echo $appoint['name']?></td>
                    <td><?php echo $appoint['address']?></td>
                    <td><?php echo $appoint['pkgcode']?></td>
                    <td><?php echo $appoint['age']?></td>
                    <td><?php echo $appoint['sex']?></td>
                    <td><button  class='btn btn-success m-0 p-2' data-bs-toggle="modal" data-bs-target="#previewz" onclick="viewhealthpkg(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 mdi mdi-eye text-white'></h4></button> 
                    <button  class='btn btn-danger m-0 p-2' onclick="removehealthpackagewwpds(<?php echo $appoint['id']?>)"><h4 class='p-0 m-0 mdi mdi-trash-can text-white'></h4></button> 

                </td>
                </tr>
                    <?php } ?>
            </tbody>
          </table>
      </div>
      </div> 
    </div>
    <div class="modal fade" id="previewz" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="preview">

            </div>
        </div>
    </div>
  </section>
<?php require 'footer.php' ?>
<script>
    atohere();
</script>
<script>

  </script>

