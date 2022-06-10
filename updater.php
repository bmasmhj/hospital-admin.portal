
<?php 

// $i = 91 ;
require 'controller/connection.php';
// for($i=1 ; $i < 92 ; $i++){
//     $hr = rand(0,23);
//     $m = rand(0,59);
//     $s = "00";
//     $sta = $hr.':'.$m.':'.$s;

//     $hrt = rand(0,23);
//     $mt = rand(0,59);
//     $st = "00";
//     $stb = $hrt.':'.$mt.':'.$st;

//     $spc = rand(0,32);

//     $dayarr = array("SUN","MON","TUE","WED","THU","FRI","SAT");
//     $zq = rand(0,6);
//     $zw = rand(0,6);

//     $day = $dayarr[$zq];
//     $day2 = $dayarr[$zw];

//     $imgs = $i.'.jpg';


//     if($spc!= "26"){
//         if($spc!= "27"){
//             if($spc!= "28"){
//             if($spc!= "29"){
//             if($spc!= "30"){

//             $updaate = "UPDATE `doctor` SET `scheduledaystart`='$day',`scheduledaayend`='$day2',`scheduletimestart`='$sta',`scheduletimeend`='$stb',`specialityid`='$spc' WHERE image = '$imgs' ";
//             if($con->query($updaate)) {
//                 echo $imgs.' - '.$sta.' - '.$stb.' - '.$day.' - '.$day2.'<br>';    
        
//             }
//         }
//         }

//         }   
//     }   

//     }
// }


// for($i=1 ; $i < 92 ; $i++){
//     $imgs = $i.'.jpg';

//     $updaate = "UPDATE `doctor` SET `id` = '$i' WHERE image = '$imgs' ";
//             if($con->query($updaate)) {   
//                 echo 'ok <br>';
//             }
// }




// $eduarr = array("National Academy of Medical Sciences (NAMS), Kathmandu, Nepal (2004-2005)","MBBS, Manipal College of Medical Sciences, Kathmandu University (1992-1994)","Fellowship in Pediatric Gastroenterology,Hepatology & Nutrition, Sri Gangaram Hospital, New Delhi (2011-2012)","Masters in Pediatric Medicine","Lorem ipsum dolor sit amet, consectetuer adipiscing elit.","Aliquam tincidunt mauris eu risus.","Donec quis dui at dolor tempor interdum.","Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.","Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.");

// $workarr = array ("Lecturer, Kathmandu Medical College, Nepal (2007- 2010)","First Pediatric Gastroenterologist of Nepal.","Performing diagnostic and therapeutic endoscopies colonoscopies, liver biopsies, esophageal dilatations, band ligation, foreign body removal, sclerotherapy.	","Working as Pediatric Gastroenterology at Norvic International Hospital from 2012 till date.","Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.","Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.","Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.","Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat");

// $random_keys1=array_rand($eduarr, 5);

// $random_keys2=array_rand($workarr,5);

// for($j = 1; $j <92 ; $j++ ) {

// for($i = 0 ; $i<5 ; $i++ ){
//     $des =  $eduarr[$random_keys1[$i]];
//     echo $des."<br>";
//     echo $workarr[$random_keys2[$i]]."<br>";

//     $updaate1 =  "INSERT INTO `education`(`description`, `docid`) VALUES ('$des','$j')";
//     if($con->query($updaate1)) {   
//         // echo 'ok <br>';
//     }
//     $updaate2 =  "INSERT INTO `workexperiene`(`description`, `docid`) VALUES ('$des','$j')";
//     if($con->query($updaate2)) {   
//         // echo 'ok <br>';
//     }

// }
// }
?>