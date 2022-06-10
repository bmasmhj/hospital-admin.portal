<?php require 'header.php' ?>
<div class="row m-4">
    <h4>Website Carousel</h4>
</div>


<section>
        <div class="card">
            <div class="card-body">
                <h3>Add Specialities</h3>
            <form action="controller/add.php" method="post" class="needs-validation" novalidate   enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-5">
                        <label for="simpleinput" class="form-label">Title</label>
                        <input required type="text" name="title" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="simpleinput" class="form-label">Thumbnail</label>
                        <input required type="file" name="thumbnail" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="simpleinput" class="form-label">&nbsp;&nbsp; </label>
                        <input type="submit" name="addcroseldwiqjo" value="Save" id="simpleinput" class="btn btn-rounded btn-success mt-3">
                    </div>
                </div>
            </form>
            </div>
        </div>

</section>

<div class="card">
    <div class="card-body">
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>
            <?php 
            foreach($carouseldata as $key => $carouselval){ 

            ?>
            <tr id="crosel_<?php echo $carouselval['id']?>">
                <td><img src="../Hospital/assets/images/uploads/crosel/<?php echo $carouselval['image']?>" alt="" style="width:100px"></td>
                <td><?php echo $carouselval['name']?></td>
                <td><h3 onclick="removecrosel(<?php echo $carouselval['id']?>)" class="mdi mdi-trash-can text-danger"></h3></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>

<link rel="stylesheet" href="assets/css/style.css">
<h5>Preview</h5>
<div class="container-fluid">
    <section class="m-0 p-0">
    <div class="row">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" >
                <div class="carousel-inner">
                    <?php foreach($carouseldata as $key => $carouselvals){   ?>
                    <div class="carousel-item <?php if($key == 0){ echo 'active';}?>">
                        <img class="d-block img-fluid image-head" src="../Hospital/assets/images/uploads/crosel/<?php echo $carouselvals['image']?>" alt="<?php echo $carouselvals['name']; ?>">
                        <div class="carousel-caption caption-head d-none d-md-block">
                            <span><?php echo $carouselvals['name']; ?>
                            </span>
                            
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
    </div>
    </section>
    </div>
<?php require 'footer.php' ?>

<script>
    function removecrosel(code){
        if(confirm('are you sure ?')==true){
    $.ajax({
        url: "controller/delete.php",
        method: 'POST',
        data:{'deletecrosel':code},
        success:function(data){
            var result = $.trim(data);
            if(result == 'success'){
                document.getElementById("crosel_"+code).style.display = "none";
            }else{
                alert("fail");
           }
           }
        }); 
    }

    }
    </script>