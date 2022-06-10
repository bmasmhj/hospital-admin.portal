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
        <title>Lock Screen</title>
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
                                    <h6 id="process">Please enter your pin code <br> to login in dasboard</h6>
                                <h6 id="code"></h6>
                                </div>

                                <form action="#">
                                
                        <div id='toggle'>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> 
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="second" maxlength="1" />
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> 
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" />
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" /> 
                                    <input class="m-2 p-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" /> </div>
                                <a href="logwithuser.php">Login with username</a>
                            </div>
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
<script src="verify.js"></script>
    </body>
</html>
