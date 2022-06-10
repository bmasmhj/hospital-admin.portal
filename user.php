<?php require 'header.php' ?>
<div class="row m-4">
    <h4>User</h4>
</div>

<section>
    <div class="card">
        <div class="card-body">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>DOB</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($userdata as $key => $userdet) {?>
                    <tr id='tr_<?php echo $userdet['id']?>'>
                        <td>
                        <img class='data-imge'  src='../Hospital/assets/images/uploads/users/<?php echo $userdet['image']?>'/>
                        <span id='name_<?php echo $userdet['id']?>'> <?php echo $userdet['name']?> </span>
                        </td>
                        <td><?php echo $userdet['address']?></td>
                        <td><?php echo $userdet['phone']?></td>
                        <td><?php echo $userdet['email']?></td>
                        <td><?php echo $userdet['sex']?></td>
                        <td><?php echo $userdet['age']?></td>
                        <td>
                        <?php 
                        $status = $userdet['status']; 
                        $statusc = ( $status == 'verified') ?  'success' : 'danger' ;?>

                        <h4 class="badge bg-<?php echo $statusc?>"><?php echo $userdet['status']?>
                        </h4></td>
                        <td>
                        <h4 class='mdi mdi-trash-can   text-danger' onclick="deleteuser(<?php echo $userdet['id']?>)"></h4> 
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>