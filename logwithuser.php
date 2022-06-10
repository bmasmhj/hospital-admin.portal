<?php 
session_start();
if(isset($_SESSION['adminlogin']) && isset($_SESSION['pincode'])){
    header("Location: Dashboard");
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-5">
                        <div class="card">
                            <!-- Logo -->
                        <div class="card-header text-center bg-dark">
                                <a href="index.html">
                                <span><img src="assets/images/favicon.png" alt="" width="40%" style="filter:invert(1)"></span>
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="text-center w-100">
                                    <h6 id="process">Please enter your username and password</h6>
                                <h6 id="code"></h6>
                                </div>

                                <form action="#" id="loginwithuser" class="needs-validation" novalidate>
                                     <label for="email">Username</label>
                                     <input type="text" required class="form-control mb-3" id="email">
                                     <label for="email">Password</label>
                                     <input type="password" required class="form-control mb-3" id="password">
                                     <button id="login" type="submit" class="btn btn-success">Login</button>
                                    <a class="float-end" href="LOGIN">Login with pincode</a>
                                </form>
                                
                            </div> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <footer class="footer footer-alt">
        <script>document.write(new Date().getFullYear())</script> © Shangxin - bimash.com.np
        </footer>
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
        
<script src="assets/js/jquery.min.js"></script>
<!-- <script src="verify.js"></script> -->

<script>
     $('#loginwithuser').on('submit', function(e) {
        e.preventDefault();
        const username = $('#email').val();
        const password = $('#password').val();

        if( username!='' && password !=''){
                $.ajax({
                url: "verify.php",
                type: "POST",
                data:{'username': username, 'password' : password},

                success:function(response){
                    var result = $.trim(response);
                    if(result == 'incorrect'){
                        $('#process').html('Failed while Saving data!');
                        $('#password').val('');
                    }
                    if(result == 'success'){
                        // $('#messages').html('Report Saved please reload page to see changes');/
                        $('#process').html('Loggin in');
                        setTimeout(() => {window.location.href = "Dashboard";}, 1000);
                    }
                    else{
                        $('#process').html(response );
                    }
                }
            });

        }
    
        
     });

</script>
    </body>
</html>
