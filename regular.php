<?php require 'header.php' ?>
<link rel="stylesheet" href="assets/tinymce/skins/lightgray/skin.min.css">
<div class="row m-4">
    <h4>Regular Services</h4>
</div>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mb-2 mb-sm-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach($regservicedata as $key => $regvalue) {
                        $n = $key ; ?>
                    <a class="nav-link <?php if($n == 0){echo "active show"; } ?>" id="reg_<?php echo $regvalue['codeid'] ?>" data-bs-toggle="pill" href="#regs_<?php echo $regvalue['codeid'] ?>" role="tab" aria-controls="<?php echo $regvalue['codeid'] ?>"
                        aria-selected="true">

                        <span class="mx-3"><?php echo $regvalue['name']?></span>
                        <i class="mdi mdi-trash-can text-danger float-end" onclick="removeregular('<?php echo $regvalue['codeid']?>')"></i>
                    </a>
                    <?php } ?>
                </div>
            </div> 
        
            <div class="col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                <?php foreach($regservicedata as $key => $regsvalue) { $q = $key; ?>
                    <div class="tab-pane fade <?php if($q==0){echo "active show";} ?>" id="regs_<?php echo $regsvalue['codeid'] ?>" role="tabpanel" aria-labelledby="<?php echo $regsvalue['codeid'] ?>-tab">
                        <p class="mb-0"><?php echo $regsvalue['details']?></p>
                    </div>
                   <?php } ?>
                </div> 
            </div>
        </div>
    </div>
  
</section>
<div class="container mt-5">
    <h4>Add Services</h4>
    <div class="card">
        <div class="card-body">
        <form action="controller/add.php" method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control mb-4"> 
            <label for="message">Description</label>
            <textarea name="message" id="message"></textarea>
            <input type="Submit" name="regularserviceqwecv" value="Save" class="btn btn-success mt-3">
            </form>
        </div>
    </div>
</div>



       

<?php require 'footer.php' ?>

<script src="assets/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:"textarea",plugins:["code","paste","link"],toolbar:"undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code ",menubar:false,statusbar:false,content_style:".mce-content-body {font-size:15px;font-family:Arial,sans-serif;}",height:400,style_formats:[{title:"Headers",items:[{title:"Header 1",format:"h1"},{title:"Header 2",format:"h2"},{title:"Header 3",format:"h3"},{title:"Header 4",format:"h4"},{title:"Header 5",format:"h5"},{title:"Header 6",format:"h6"}]},{title:"Inline",items:[{title:"Underline",icon:"underline",format:"underline"},{title:"Strikethrough",icon:"strikethrough",format:"strikethrough"},{title:"Superscript",icon:"superscript",format:"superscript"},{title:"Subscript",icon:"subscript",format:"subscript"},]},{title:"Blocks",items:[{title:"Paragraph",format:"p"},{title:"Blockquote",format:"blockquote"},{title:"Div",format:"div"},{title:"Pre",format:"pre"}]},],setup:function(ed){var fileInput=$('<input id="tinymce-uploader" type="file" name="pic" accept="image/*" style="display:none">');$(ed.getElement()).parent().append(fileInput);fileInput.on("change",function(){var file=this.files[0];var reader=new FileReader();var formData=new FormData();var files=file;formData.append("file",files);formData.append('filetype','image');jQuery.ajax({url:"controller/file.php",type:"post",data:formData,contentType:false,processData:false,async:false,success:function(response){var fileName=response;if(fileName){ed.insertContent('<img src="../assets/image/'+fileName+'"/>');}}});reader.readAsDataURL(file);});ed.addButton('image_upload',{tooltip:'Upload Image',icon:'image',onclick:function(){fileInput.trigger('click');}});}});function readURL(input){if(input.files&&input.files[0]){var reader=new FileReader();reader.onload=function(e){$('#blah').html('<img src="'+e.target.result+'" class="imagepreview">');}
reader.readAsDataURL(input.files[0]);}}</script>

<script>
function removeregular(code){
    // alert(code);
    if(confirm('are you sure ?')==true){
    $.ajax({
        url: "controller/delete.php",
        method: 'POST',
        data:{'deleteregular':code},
        success:function(data){
            var result = $.trim(data);
            if(result == 'success'){
                document.getElementById('reg_'+code).style.display = 'none';  
                document.getElementById('regs_'+code).style.display = 'none';  
            }else{
                alert("fail");
           }
           }
        }); 
    }


}
</script>