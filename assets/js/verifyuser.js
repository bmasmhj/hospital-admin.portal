$('#updatename').click(function(){
    const name = $('#fullname').val();
    $.ajax({
      url: "controller/update.php",
      type: "POST",
      data: {'updatereceptname' : name},
      success:function(response){
          var result = $.trim(response);
          if(result == 'sucess'){
            $('#stat').html('Name has been changed!');
            $('#stat').removeClass('text-danger');
            $('#stat').addClass('text-success');
          }
          else{
              $('#stat').html(response );
          }
      }
  });
  });
  
  $('#cnewps').keyup(function(){
    const newpw = $('#newpw').val();
    const cnewps = $('#cnewps').val();
    if( newpw == cnewps ){
      $('#stat').html("Password matched");
      $('#stat').removeClass('text-danger');
      $('#stat').addClass('text-success');
    }else{
      $('#stat').html("Password did not matched");
      $('#stat').removeClass('text-success');
      $('#stat').addClass('text-danger');
    }
  });
  
  
  $('#newpw').keyup(function(){
    const newpw = $('#newpw').val();
    const cnewps = $('#cnewps').val();
    if(cnewps !== ''){
      if( newpw == cnewps ){
      $('#stat').html("Password matched");
      $('#stat').removeClass('text-danger');
      $('#stat').addClass('text-success');
    }else{
      $('#stat').html("Password did not matched");
      $('#stat').removeClass('text-success');
      $('#stat').addClass('text-danger');
    }
    }
  });
  
  $('#updatepass').on('submit', function(e) {
    e.preventDefault();
    const newpw = $('#newpw').val();
    const oldpw = $('#oldpw').val();
    const cnewps = $('#cnewps').val();
  
    if(oldpw !='' && newpw !='' && cnewps != '' ){
      console.log('first part');
      if(newpw == cnewps){
        $.ajax({
          url: "controller/update.php",
          type: "POST",
          data: {"newpw" : newpw  ,'oldpw': oldpw ,'cnewps':cnewps},
          success:function(response){
              var result = $.trim(response);
  
              if(result == 'oldwrong'){
                  $('#stat').html('Old Password Wrong');
                  $('#stat').removeClass('text-success');
                  $('#stat').addClass('text-danger');
                  $('#oldpw').val('');
              }
              else if(result == 'sucess'){
                  $('#stat').html('Password Changed');
                  $('#stat').removeClass('text-danger');
                  $('#stat').addClass('text-success');
                  document.getElementById("updatepass").reset();
              }
              else{
                  $('#stat').html(response );
              }
          }
      });
      }
    }
  });
  