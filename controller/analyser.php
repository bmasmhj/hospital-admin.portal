<?php
require 'connection.php';

// View count graph 
$utv = 0;
$ptv = 0 ;
$likes = 0;
$comments = 0;
//total analytic of viewers
$fe = "SELECT  * FROM analytic ORDER BY id desc";
  	$visitresult = $con->query($fe);
  	$visitdata = [];
      if ($visitresult->num_rows > 0) {
        while ($visitrow = $visitresult->fetch_assoc()) {
            array_push($visitdata, $visitrow);
        }
    }	
    foreach($visitdata as $key => $visits){ 
        $utv = $visits['utv'] + $utv;
        $ptv = $visits['ptv'] + $ptv;
    }

//today analytic 
    $fre = "SELECT  * FROM analytic ORDER BY id desc LIMIT 1";
    $nowresult = $con->query($fre);
    $nowdata = [];
    if ($nowresult->num_rows > 0) {
      while ($nowrow = $nowresult->fetch_assoc()) {
          $ntpv = $nowrow['unv']+$nowrow['pnv'];
          $unv =$nowrow['unv'];
          $pnv = $nowrow['pnv'];
          $ptvs =  $nowrow['ptv'];


      }
  }
  
  //7days analytic of viewers
  $fes = "SELECT  * FROM analytic ORDER BY date desc LIMIT 12";
  $sevenresult = $con->query($fes);
  $sevendata = [];
  if ($sevenresult->num_rows > 0) {
    while ($sevenrow = $sevenresult->fetch_assoc()) {
        array_push($sevendata, $sevenrow);
    }
}	


if($ptvs==0){
    $ptvs = 1;
}


// in decreased page view
if($ptvs>$pnv){
    $countpercentage = $pnv/$ptvs*100;
    $countpers = round(100-$countpercentage,2);
    // final value
    $countperclass = "mdi mdi-arrow-down-bold" ;
    $countcolor = "danger";
    $countperz = '-'.$countpers;

}
// in increase page view
else{
    $countper = $ptvs/$pnv*100;
    $countpers = round(100-$countper,2);
    $countcolor = "success";
    $countperclass = " mdi mdi-arrow-up-bold ";
    // final value
    $countperz = $countpers;
}





$uniqueview = $utv+$unv;
$totalview = $ptv+$pnv;
$todayview = $ntpv;
$uniqview = number_format($uniqueview);
$ttlview = number_format($totalview);



?>

