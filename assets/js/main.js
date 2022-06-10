$('#updatepin').on('submit', function(e) {
    e.preventDefault();
    const oldpw = $('#oldpws').val();
    const pincode = $('#pincode').val();
    if(oldpw !='' && pincode !=''){ 
      $.ajax({
            url: "controller/update.php",
            type: "POST",
            data: {"pincode" : pincode  ,'oldpws': oldpw},
            success:function(response){
                var result = $.trim(response);
    
                if(result == 'oldwrong'){
                    $('#msgz').html('Old Password Wrong');
                    $('#msgz').removeClass('text-success');
                    $('#msgz').addClass('text-danger');
                    $('#oldpw').val('');
                }
                else if(result == 'sucess'){
                    $('#msgz').html('Pin Changed');
                    $('#msgz').removeClass('text-danger');
                    $('#msgz').addClass('text-success');
                    document.getElementById("updatepin").reset();
                }
                else{
                    $('#msgz').html(response );
                }
            }
      });
    }
  });
  
    function deleteprovides(id){
        //  alert('cancelling');
         Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "controller/delete.php",
                    method: 'POST',
                    data:{'deleteprovides':id},
                    success:function(data){
                        var result = $.trim(data);
                        if(result == 'success'){
                        document.getElementById('providerow_'+id).style.display = 'none';  
                        document.getElementById('providepreviewrow_'+id).style.display = 'none'; 
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            );
                        }else{
                            Swal.fire(
                            'Delete Fail!',
                            'Internal Server error.',
                            'error'
                            ); 
                        }
                    }
                }); 
                
            }
            });
        
           
    }
    $(document).ready(function(e) {

    $('#provideaddform').on('submit', function(e) {
        e.preventDefault();
        
        const title = $('#addprovidetitleytfdv').val();

        if(title!= ''){

        $('#messages').html('Please wait...');
        $('#addprovideprocessing').html('Please wait...');
        setTimeout(() => {
            $('#messages').html('Authenticating...');
            $('#addprovideprocessing').html('Authenticating...');
        $.ajax({
            url: "controller/add.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(response){
                var result = $.trim(response);
                if(result == 'failed'){
                    $('#messages').html('Failed while Saving data!');
                }
                if(result == 'success'){
                    // $('#messages').html('Report Saved please reload page to see changes');/
                    document.getElementById("provideaddform").reset();
                    $('#messages').html('Saved Successfully...');
                    $('#addprovideprocessing').html('Saved Successfully...');
                    setTimeout(() => {
                    document.getElementById("btncloseadd").click();
                    }, 1100);
                    setTimeout(() => {
                    document.getElementById("centralmodelbtn").click();
                    }, 1200);
                }
                else{
                    $('#messages').html(response );
                }
            }
        });
            }, 1000);
        
    } });
    
    });



    $('#editprovideform').on('submit', function(e) {
        e.preventDefault();
        $('#editmsg').html('Please wait...');
        setTimeout(() => {
            $('#editmsg').html('Authenticating...');
                $.ajax({
                    url: "controller/edit.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success:function(response){
                        var result = $.trim(response);
                        if(result == 'failed'){
                            $('#editmsg').html('Failed while Saving data!');
                        }   
                        if(result == 'success'){
                            $('#editmsg').html('Updated Successfully... ');
                            setTimeout(() => {
                               location.reload();
                            }, 1500);
                        }
                        else{
                            $('#editmsg').html(response );
                        }
                    }
                });
            }, 1000);
    });
    function editprovides(id){
        var image = document.getElementById('imagesrc_'+id).alt;
        var name = $('#title_'+id).text();
        var detail = $('#description_'+id).text();
        // $('#editmsg').html(image+name+detail);
        document.getElementById('editprovidetitleytfdv').value = name;
        document.getElementById('editprovideimageurl').value = image;
        document.getElementById('editprovidetails').value = detail;  
        document.getElementById('editproductid').value = id;        

    }
    function reloadafteradd(){
        location.reload();
    }

    function cancelit(id){
        $.ajax({
        url: "controller/update.php",
        method: 'POST',
        data:{'cancelapp':id},
        success:function(data){
            document.getElementById('appointmenttable_'+id).innerHTML = data;
    
        }
    }); 
    }
    function closemodel(){
        document.getElementById('preview').style.display = 'none';
    }
    function acceptit(id){
        $.ajax({
        url: "controller/update.php",
        method: 'POST',
        data:{'aceptapp':id},
        success:function(data){
            document.getElementById('appointmenttable_'+id).innerHTML = data;
    
        }
    }); 
    
    }
    function viewappointment(id){
        $.ajax({
        url: "modelview.php",
        method: 'POST',
        data:{'viewapoint':id},
        success:function(data){
            document.getElementById('preview').innerHTML = data;
            document.getElementById('preview').style.display = 'block';
        }
    }); 
    
    }
    
    function closemodel(){
        // document.getElementById('preview').style.display = 'none';
        document.getElementById('closemodelnow').click();

    }
    
    
    
    function viewhealthpkg(id){
        $.ajax({
        url: "modelview.php",
        method: 'POST',
        data:{'viewhealth':id},
        success:function(data){
            document.getElementById('preview').innerHTML = data;
            document.getElementById('preview').style.display = 'block';
        }
    }); 
    
    }
    
    function removemedicalreport(id){
        if(confirm("Sure want to delete ?")==true){
            $.ajax({
                url: "controller/delete.php",
                method: 'POST',
                data:{'deleterecords':id},
                success:function(data){
                document.getElementById('row_'+id).style.display = 'none';   
                }
            }); 
        }
        
    }
    function deletesocial(id){
        if(confirm("Sure want to delete ?")==true){
            $.ajax({
                url: "controller/delete.php",
                method: 'POST',
                data:{'deletesocial':id},
                success:function(data){
                    document.getElementById('socialrow_'+id).style.display = 'none';   
                }
            }); 
        }
        
    }
    
    function viewimg(id){
        var image = document.getElementById('imagesrc_'+id).src;
        document.getElementById('preview').style.display = 'block';
        document.getElementById('medicalreportimage').innerHTML = '<img id="reportimage" src = "'+image+'">';
    
    }
    
    
    function deleteuser(id){
        var name = $('#name_'+id).text();
       Swal.fire({
           title: 'Are you sure user '+name+' ?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.isConfirmed) {
             jQuery.ajax({
             url:'controller/delete.php',
             type:'post',
             data:'deleteuser='+id,
             success:function(datas){
               var results = $.trim(datas);
     
               if(results == 'success'){
                 Swal.fire(
                   'Deleted!',
                   'User '+name+' has been deleted.',
                   'success'
                 )
                 jQuery('#tr_'+id).hide(500);
     
               }else{  
                 alert('no'+datas);
               }
             } 
         });      
           }
         })
     }
    
    
    
     function deleterecept(id){
        var name = $('#name_'+id).text();
       Swal.fire({
           title: 'Are you sure user '+name+' ?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.isConfirmed) {
             jQuery.ajax({
             url:'controller/delete.php',
             type:'post',
             data:'deleterecept='+id,
             success:function(datas){
               var results = $.trim(datas);
     
               if(results == 'success'){
                 Swal.fire(
                   'Deleted!',
                   'User '+name+' has been deleted.',
                   'success'
                 )
                 jQuery('#tr_'+id).hide(500);
     
               }else{  
                 alert('no'+datas);
               }
             } 
         });
     
     
           
           }
         })
     
         
     
     }

     function deletedoctor(id){
         const ides = id ;
        var name = $('#name_'+id).text();
       Swal.fire({
           title: 'Are you sure user '+name+' ?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.isConfirmed) {
             jQuery.ajax({
             url:'controller/delete.php',
             type:'post',
             data:'deletedoctor='+ides,
             success:function(datas){
               var results = $.trim(datas);
               if(results == 'deleted'){
                 Swal.fire(
                   'Deleted!',
                   'User '+name+' has been deleted.',
                   'success'
                 )
                 jQuery('#tr_'+id).hide(500);
     
               }else{  
                 alert('no'+datas);
               }
             } 
         });
     
     
           
           }
         })
     
         
     
     }
    
     function addreportform(){
      document.getElementById('reportformmodal').style.display = 'block';
    
    }
    function closeform(){
    document.getElementById('reportformmodal').style.display = 'none';
    }
    
    function editrecords(id){
    
      var name = $('#patienname_'+id).text();
      var checkupfor = $('#nameofrecord_'+id).text();
      var details = $('#detail_'+id).text();
      var message = $('#messange_'+id).text();
      var image = document.getElementById('imagesrc_'+id).alt;
      var time = $('#time_'+id).text();
    
      document.getElementById('editrecordform').style.display = 'block';
      document.getElementById('patientnames').value = name;
      document.getElementById('checkupfors').value = checkupfor;
      document.getElementById('reportdetailss').value = details;
      document.getElementById('reportmessages').value = message;
      document.getElementById('imageurl').value = image;
      document.getElementById('id').value = id;
      document.getElementById('time').value = time; 

    
    }
    
    
    $(document).ready(function(e) {
    $('#patientreportform').on('submit', function(e) {
        e.preventDefault();
        var patientname = $('#patientname').val();
        var checkupfor = $('#checkupfor').val();
        var reportdetails = $('#reportdetails').val();
        var reportmessage = $('#reportmessage').val();
        
    
        if( checkupfor!="" && patientname != "" && reportdetails  != ""  && reportdetails != "" ){
                $('#alert').html('Saving records');
                setTimeout(() => {
                  $.ajax({
                        url: "controller/add.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(response){
                            var result = $.trim(response);
                            if(result == 'failed'){
                                $('#alert').html('Failed while Saving data!');
                            }
                            if(result == 'success'){
                                $('#alert').html('Report Saved please reload page to see changes');
                                document.getElementById("patientreportform").reset();
                            }
                            else{
                                $('#alert').html(response );
                            }
                        }
                    });
                }, 1000);
            }
            else{    
              $('#alert').html("Can't save Empty Data !");
            }
    });
    });
    
    
    $('#patienteditform').on('submit', function(e) {
        e.preventDefault();
        var id = document.getElementById("id").value;
        var patientname = $('#patientnames').val();
        var checkupfor = $('#checkupfors').val();
        var reportdetails = $('#reportdetailss').val();
        var reportmessage = $('#reportmessages').val();
    
        
        if( checkupfor!="" && patientname != "" && reportdetails  != ""  && reportdetails != "" ){
                $('#alerts').html('Saving records');
                setTimeout(() => {
                  $.ajax({
                        url: "controller/update.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(response){
                            var result = $.trim(response);
    
                            if(result == 'failed'){
                                $('#alerts').html('Failed while Saving data!');
                            }else{
                                $('#alerts').html('Edit Saved');
                                $('#row_'+id).html(response );
                                closemodel();
                                $('#row_'+id).css("background","#0000000a");
                                setTimeout( 
                                   function change(){ 
                                $('#row_'+id).css("background","#fff");
                                   }, 8000);
                                   
                            }
                        }
                    });
                }, 1000);
            }
            else{    
              $('#alerts').html("Can't save Empty Data !");
            }
    
    });
    
    
    function viewdoctordetail(id){
      $.ajax({
      url: "modelview.php",
      method: 'POST',
      data:{'viewdoctordetail':id},
      success:function(data){
          document.getElementById('preview').innerHTML = data;
          document.getElementById('preview').style.display = 'block';
      }
    }); 
    
    }
    
    function viewuserdetail(id){
      $.ajax({
      url: "modelview.php",
      method: 'POST',
      data:{'viewuserdetail':id},
      success:function(data){
          document.getElementById('preview').innerHTML = data;
          document.getElementById('preview').style.display = 'block';
      }
    }); 
    
    }
    function atohere(){
        setTimeout(() => {
          $('#descending').click();
        }, 100);
      }

      function removehealthpackagewwpds(id){
        if(confirm('are you sure ?')==true){
        $.ajax({
            url: "controller/delete.php",
            method: 'POST',
            data:{'bookedhealth':id},
            success:function(data){
                var result = $.trim(data);
                if(result == 'success'){
                    document.getElementById('bookedhealthrow_'+id).style.display = "none"; 
                }else{
                    alert("fail");
               }
               }
            }); 
        }
      }

      function deletethismail(id){
        const idse = id;
         if(confirm('are you sure ?')==true){

        $.ajax({
            url: "controller/delete.php",
            method: 'POST',
            data:{'contactmail':idse},
            success:function(data){
                var result = $.trim(data);
                if(result == 'success'){
                    document.getElementById('mailrow_'+id).style.display = "none !important"; 
                    $('#mailrow_'+id).removeClass('row p-2  emaillist d-flex flex-dierction-column align-items-center');
                    $('#mailrow_'+id).addClass('d-none');

                }else{
                    alert("fail");
               }
               }    
            }); 
        }

    }


    function deletethisfeedback(id){
        const idse = id;
         if(confirm('are you sure ?')==true){
        $.ajax({
            url: "controller/delete.php",
            method: 'POST',
            data:{'feedbackmsg':idse},
            success:function(data){
                var result = $.trim(data);
                if(result == 'success'){
                    $('#feedrow_'+id).removeClass('row p-2  emaillist d-flex flex-dierction-column align-items-center');
                    $('#feedrow_'+id).addClass('d-none');
                }else{
                    alert("fail");
               }
               }
            }); 
        }

    }

$('#iconnoti').click(function(){
    $.ajax({
        url : 'controller/usercontroller.php',
        data: {'notific' : 'notific'},
        method : 'post',
        dataType : 'text',
        success :function (response){
            $("#anynew").removeClass('noti-icon-badge'); 
            // $("#notficationdata").empty();
            $("#notficationdata").html(response);
        }
    });
});
function loaddata(){
    document.getElementById('newreq').click();
}
setInterval( notificon , 1000); 


function notificon(){
    $.ajax({
        url : 'controller/statecheck.php',
        data: {'check' : 'check'},
        method : 'post',
        dataType : 'text',
        success :function (response){
           var results = $.trim(response);
            if(results == 'true'){
                $("#anynew").addClass('noti-icon-badge');
            }
            else {
                $("#anynew").removeClass('noti-icon-badge');
                // $("#anynew").html(response);                
            }
        }
    });
}


    // mailviewdata 