<?php require 'header.php' ?>
<link rel="stylesheet" href="assets/tinymce/skins/lightgray/skin.min.css">
<div class="row m-4">
    <h4>Health Services</h4>
</div>


<section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>Add Service</h3>
            <form action="controller/add.php" method="post"  enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-5">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="text" name="title" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-5">
                        <label for="simpleinput" class="form-label">Thumbnail</label>
                        <input type="file" name="thumbnail" id="simpleinput" class="form-control">
                    </div>
                    <div class="mb-3 col-2">
                        <label for="simpleinput" class="form-label">&nbsp;&nbsp; </label>
                        <input type="submit" name="addnewhealthpwoeifjg" value="Save" id="simpleinput" class="form-control">
                    </div>
                </div>
                <label for="message">Description</label>
            <textarea name="message" id="message"></textarea>
            </form>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
        <?php  foreach($healthdata as $key => $specname){ ?>
            <div class="col-md-3" id="healthboxqwkt_<?php echo $specname['id']?>">
                <div class="card bg-info specializecard">
                <div class="card-body m-0 p-0">
                    <h3 onclick="removehealthboxas(<?php echo $specname['id']?>)" class="text-white mx-3 float-end mdi mdi-trash-can"></h3>
                </div>
                <div onclick="viewhealthijsfd(<?php echo $specname['id']?>)"  data-bs-toggle="modal" data-bs-target="#centermodal" class="card-body bg-info text-center">
                    <img  src="../Hospital/assets/images/uploads/health/<?php echo $specname['image'] ?>" alt="" style="width : 90px; height:90px; object-fit : contain">
                    <h4 class='text-white' id="healttitle_<?php echo $specname['id']?>" ><?php echo $specname['name'] ?></h4>
                </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
  
</section>


<div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myCenterModalLabel"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body" id="healthpackagecontent">
                
            </div>
        </div>
    </div>
</div>


       

<?php require 'footer.php' ?>
<script src="assets/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:"textarea",plugins:["code","paste","link"],toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",menubar:false,statusbar:false,content_style:".mce-content-body {font-size:15px;font-family:Arial,sans-serif;}",height:400,style_formats:[{title:"Headers",items:[{title:"Header 1",format:"h1"},{title:"Header 2",format:"h2"},{title:"Header 3",format:"h3"},{title:"Header 4",format:"h4"},{title:"Header 5",format:"h5"},{title:"Header 6",format:"h6"}]},{title:"Inline",items:[{title:"Underline",icon:"underline",format:"underline"},{title:"Strikethrough",icon:"strikethrough",format:"strikethrough"},{title:"Superscript",icon:"superscript",format:"superscript"},{title:"Subscript",icon:"subscript",format:"subscript"},]},{title:"Blocks",items:[{title:"Paragraph",format:"p"},{title:"Blockquote",format:"blockquote"},{title:"Div",format:"div"},{title:"Pre",format:"pre"}]},],setup:function(ed){var fileInput=$('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');$(ed.getElement()).parent().append(fileInput);fileInput.on("change",function(){var file=this.files[0];var reader=new FileReader();var formData=new FormData();var files=file;formData.append("file",files);formData.append('filetype','image');jQuery.ajax({url:"controller/file.php",type:"post",data:formData,contentType:false,processData:false,async:false,success:function(response){var fileName=response;if(fileName){ed.insertContent('<img src="../assets/image/'+fileName+'"/>');}}});reader.readAsDataURL(file);});ed.addButton('image_upload',{tooltip:'Upload Image',icon:'image',onclick:function(){fileInput.trigger('click');}});}});function readURL(input){if(input.files&&input.files[0]){var reader=new FileReader();reader.onload=function(e){$('#blah').html('<img src="'+e.target.result+'" class="imagepreview">');}
reader.readAsDataURL(input.files[0]);}}</script>
<script>
    function removehealthboxas(id){
        if(confirm('are you sure ?')==true){
    $.ajax({
        url: "controller/delete.php",
        method: 'POST',
        data:{'deletehealth':id},
        success:function(data){
            var result = $.trim(data);
            if(result == 'success'){
                document.getElementById('healthboxqwkt_'+id).style.display = "none"; 
            }else{
                alert("fail");
           }
           }
        }); 
    }
    }

    function viewhealthijsfd(id){
        // document.getElementById("healthpackagecontent").innerHTML = id;
        const title = document.getElementById("healttitle_"+id).innerHTML;
        document.getElementById("myCenterModalLabel").innerHTML = title;
        $.ajax({
        url: "controller/show.php",
        method: 'POST',
        data:{'showhealthcontent':id},
        success:function(data){
            document.getElementById("healthpackagecontent").innerHTML = data;
           }
        });
    }
</script>