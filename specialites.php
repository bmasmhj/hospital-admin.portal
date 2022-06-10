<?php require 'header.php' ?>
<div class="row m-4">
    <h4>Specialities</h4>
</div>

<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Add Specialities</h3>
            <form action="controller/add.php" class="needs-validation" novalidate method="post"   enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-5">
                        <label for="simpleinput"  class="form-label">Name</label>
                        <input type="text" name="title" required id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="simpleinput" class="form-label">Thumbnail</label>
                        <input type="file" required name="thumbnail" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="simpleinput" class="form-label">&nbsp;&nbsp; </label>
                        <input type="submit" name="addnewspecialjf" value="Save" id="simpleinput" class=" mt-3 btn btn-rounded btn-success">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">

        <div class="row mt-4 pt-4">
            <?php  foreach($specialitydata as $key => $specname){ ?>
            <div class="col-md-3" id="specializecard_<?php echo $specname['id']?>">
                <div class="card w-100 specializecard" >
                <div class="card-body m-0 p-0">
                    <h3 onclick="removehealthboxas(<?php echo $specname['id']?>)" class="text-danger mx-3 float-end mdi mdi-trash-can"></h3>
                </div>
                    <div class="card-body w-100 text-center">
                        <img src="../Hospital/assets/images/uploads/speciality/<?php echo $specname['image']?>" alt="" class="rounded-circle" style="width: 150px!important; height: 150px!important;">
                    </div>
                    <div class="card-body w-100 "><p class="text-center"><?php echo $specname['name']?></p></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php require 'footer.php' ?>

<script>
    function removehealthboxas(id){
        const idez = id;
        if(confirm('are you sure ?')==true){
    $.ajax({
        url: "controller/delete.php",
        method: 'POST',
        data:{'deletespeciality':idez},
        success:function(data){
            var result = $.trim(data);
            if(result == 'success'){
                document.getElementById("specializecard_"+id).style.display = "none";
            }else{
                alert(data);
           }
           }
        }); 
    }
    }
    
</script>