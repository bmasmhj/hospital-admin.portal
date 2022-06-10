<?php require 'header.php' ?>
<link href="assets/css/vendor/britecharts.min.css" rel="stylesheet" type="text/css"><link href="assets/css/vendor/britecharts.min.css" rel="stylesheet" type="text/css">
<div class="row m-4">
    <h4>Dashboard</h4>
</div>
<?php require 'controller/analyser.php';?>
<?php require 'controller/info-fetcher.php';?>

<?php require 'model/counts.php'?>

<?php require 'model/viewcountgraph.php';?>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Money Chart</h4>
                <div dir="ltr">
                    <div class="line-container" style="width: 100%;"></div>
                </div>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Doctor's avaibility</h4>
            <br>
            <br>
            <br>

            <div dir="ltr">
                <div class="bar-container-horizontal" style="width: 100%;height: 300px;" data-colors="#727cf5,#0acf97,#6c757d,#fa5c7c,#ffbc00,#39afd1,#e3eaef"></div>
            </div>
            <br>
            <br>
            <br>

        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
</div>

</div>




<?php require 'footer.php' ?>
<?php require 'graphscript.php' ?>
<script src="assets/js/vendor/d3.min.js"></script>
<script src="assets/js/vendor/britecharts.min.js"></script> 
<!-- <script src="assets/js/pages/demo.britechart.js"></script>  -->
