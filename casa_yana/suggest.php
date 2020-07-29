<?php
$house[] = "Bugalow";
$house[] = "Flat";
$house[] = "Duplex";
$house[] = "Self-contain";
$house[] = "Single-room";
$house[] = "lodge-room";




// Get Query String
$q = $_REQUEST['q'];

$suggestion = "";

// get $suggestions
if($q !== ""){
    $q = strtolower($q);
    $len = strlen($q);
    foreach($house as $home){
        if(stristr($q, substr($home, 0, $len))){
          if($suggestion == ""){
             $suggestion = $home;
          } else {
              $suggestion .= ", $home";
          }
        }
    }
}