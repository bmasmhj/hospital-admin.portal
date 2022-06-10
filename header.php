<!DOCTYPE html>
<?php require 'session.php'; ?>
<html lang="en">
<?php require 'controller/usercontroller.php';?>

    <head>
        <meta charset="utf-8">
        <title>Dashboard | <?php echo $websitename ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <link rel="shortcut icon" href="../Hospital/assets/images/favicon.png">
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" id="dark-style">

        <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />


    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
        <?php require 'model/menu.php' ?>
            <div class="content-page">
                <div class="content">
                    <?php require 'model/topbar.php' ?>