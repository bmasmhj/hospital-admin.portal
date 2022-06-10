<?php require 'controller/analyser.php';?>

<div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="mdi mdi-dots-vertical"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <a href="Overview" class="dropdown-item">See all</a>
        </div>
    </div>
        <h4 class="header-title mb-3">Visitor Graph</h4>
        <div class="chart-content-bg">
            <div class="row text-center">
                <div class="col-md-4">
                    <p class="text-muted mb-0 mt-3">Unique Viewers</p>
                    <h2 class="fw-normal mb-3">
                        <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                        <span><?php echo $uniqview?></span>
                    </h2>
                </div>
                <div class="col-md-4">
                    <p class="text-muted mb-0 mt-3">Total page view</p>
                    <h2 class="fw-normal mb-3">
                        <small class="mdi mdi-checkbox-blank-circle text-success align-middle me-1"></small>
                        <span><?php echo $ttlview?></span>
                    </h2>
                </div>
                <div class="col-md-4">
                    <p class="text-muted mb-0 mt-3">Today page view</p>
                    <h2 class="fw-normal mb-3">
                        <small class="mdi mdi-checkbox-blank-circle text-<?php echo $countcolor?> align-middle me-1"></small>
                        <span><?php echo $todayview?></span>
                        <span  style="font-size:16px;"class="<?php echo $countperclass.' text-'.$countcolor ?>"><?php echo $countpers ?>%</span>
                    </h2>
                </div>
            </div>
        </div>

        
        <div dir="ltr">
            <div id="revenue-chart" class="apex-charts mt-3" data-colors="#727cf5,#0acf97"></div>
        </div>
    </div> 
</div>

