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
  
  
  
  else if(isset($_POST['cnewps'])){
    session_start();
    $email = $_SESSION['adminlogin'] ;
    $new = $_POST['cnewps'];
    $password = $_POST['oldpw'];
    $chewckuser = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $chewckuser);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $changepw = password_hash($new, PASSWORD_BCRYPT);
                $sql = "UPDATE admin SET password = '$changepw' WHERE email = '$email' ";
                if ($con->query($sql)) {
                     echo "sucess"; 
                     $_SESSION['password'] = $new;
                }
            }else{
                echo "oldwrong";  
            }
        }else {
            echo "error";

        }
}