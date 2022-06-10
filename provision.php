<?php require 'header.php' ?>
<div class="row m-4">
    <h4>Hospital Provides</h4>
</div>

<div class="card">
    <div class="card-body">
    <button  type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#scrollable-modal">Add</button>
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>

            </tr>
        </thead>


        <tbody>
        <?php foreach($providedata as $key => $providevalue) { ?>
            <tr id="providerow_<?php echo $providevalue['id']?>">
                <td>
                <img class="p-2" style='width:50px;' id="imagesrc_<?php echo $providevalue['id']?>" src="../Hospital/assets/images/uploads/provide/<?php echo $providevalue['img'] ?>" alt="<?php echo $providevalue['img'] ?>"></td>
                <td id="title_<?php echo $providevalue['id']?>"><?php echo $providevalue['title'] ?></td>
                <td id="description_<?php echo $providevalue['id']?>" ><?php echo $providevalue['descripton'] ?></td>
                <td class="table-action">
                <span onclick="editprovides(<?php echo $providevalue['id']?>)"  class="btn action-icon" data-bs-toggle="modal" data-bs-target="#editscrollable-modal" > <i class="mdi mdi-pencil"></i></span >
                <span onclick="deleteprovides(<?php echo $providevalue['id']?>)" class="btn action-icon"> <i class="mdi mdi-delete"></i></span>
            </td>
            </tr>
        <?php } ?>   
        </tbody>
        </table>
    </div>
</div>

<?php require 'model/saved.php' ?>

<!-- add new provide -->

<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Add Provides 
                <span id="messages" class="text-danger"></span>
                </h5>
                <button type="button" class="btn-close" id="btncloseadd" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form   enctype="multipart/form-data" method="post" class="form-horizontal needs-validation" id="provideaddform" novalidate="">
                <div class="modal-body">
                <div class="form-floating mb-3">
                        <input name="addprovidetitleytfdv" required type="text" class="form-control" id="addprovidetitleytfdv" placeholder="titile" />
                        <label for="floatingtitile">Title</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input name="provideimage" required class="form-control" type="file" id="provideimage">
                    </div>
                <div class="form-floating mb-3">
                        <textarea name="providetails" class="form-control" required placeholder="Description" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>

                </div>
                <div class="modal-footer" id="addprovideprocessing">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="addnewprovide" class="btn btn-primary" value="Save changes">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- edit provide -->

<div class="modal fade" id="editscrollable-modal" tabindex="-1" role="dialog" aria-labelledby="editscrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editscrollableModalTitle">edit Provides 
                <span id="editmsg" class="text-danger"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form   enctype="multipart/form-data" method="post" class="form-horizontal" id="editprovideform">
                <div class="modal-body">
                <div class="form-floating mb-3">
                        <input name="editprovidetitleytfdv" id="editprovidetitleytfdv"  type="text" class="form-control" id="floatingtitile" placeholder="titile" />
                        <label for="floatingtitile">Title</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input name="editprovideimage"  class="form-control" type="file" id="inputGroupFile04">
                        <input type="hidden" name="editprovideimageurl" id="editprovideimageurl" value="">
                        
                        <input type="hidden" name="editproductid" id="editproductid" value="">
                    </div>
                <div class="form-floating mb-3">
                        <textarea name="editprovidetails" id="editprovidetails" class="form-control"  placeholder="Description" id="floatingTextarea" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>

                </div>
                <div class="modal-footer" id="addprovideprocessing">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" name="editprovide" class="btn btn-primary" value="Update changes">
                </div>
            </form>
        </div>
    </div>
</div>




<div class="container-fluid">
    <h5>Preview</h5>
    <div class="card">
        <div class="card-body">
            <section class="bg-grey features-var-two">
                <div class="container-fluid mt-3">
                    <div class="row">
                    <?php foreach($providedata as $key => $providevaluez) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 single-feature" id="providepreviewrow_<?php echo $providevaluez['id']?>">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                    <img class="w-100 p-2" src="../Hospital/assets/images/uploads/provide/<?php echo $providevaluez['img'] ?>" alt="<?php echo $providevaluez['title'] ?>">                            
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    <h3><?php echo $providevaluez['title'] ?> </h3>
                                    <p class="passageintro"><?php echo $providevaluez['descripton'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php require 'footer.php' ?>


