<?php 
$stamp = $visits['date'];
$date = strtotime($stamp);
$day = date('D',$date);

$unique = $visits['utv'];
$uniquenow = $visits['unv'];
$yesterday =  $visits['ptv'] ;
$now = $visits['pnv'];
$total = $now+$uniquenow;

if($unique == 0){
    $unique=1;  
}
if($yesterday == 0){
    $yesterday=1;  
}


// in decreased page view
if($yesterday>$now){
    $percentage = $now/$yesterday*100;
    $pers = round(100-$percentage,2);
    // final value
    $perclass = "mdi mdi-arrow-down-bold" ;
    $color = "danger";
    $perz = '-'.$pers;

}
// in increase page view
else{
    $per = $yesterday/$now*100;
    $pers = round(100-$per,2);
    $color = "success";
    $perclass = " mdi mdi-arrow-up-bold ";
    // final value
    $perz = $pers;
}

    // in decreased uniq view
    if($unique>$uniquenow){
    $perss = $uniquenow/$unique*100;
    $persz = round(100-$perss,2);
    // final value
    $perclasss = "mdi mdi-arrow-down-bold" ;
    $colors = "danger";
    $perzu = '-'.$persz;

}
// in increase uniq view
else{
    $pers = $unique/$uniquenow*100;
    $perss = round(100-$pers,2);
    $colors = "success";
    $perclasss = " mdi mdi-arrow-up-bold ";
    // final value
    $perzu = $perss;
}
?>