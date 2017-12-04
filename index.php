<?php
$mobile = array('Iphone', 'Androind', 'Android'); //etc add more


//We won't use global keyword
//We would pass an array as arg instead
function isMobile(array $mobile){
  foreach($mobile as $agent){

     if ( strpos($_SERVER['HTTP_USER_AGENT'], $agent) ){
         //mobile detected
         //or return its name, do it the way you like
         return true;
     }
  }
}
session_start();
$useragent=$_SERVER['HTTP_USER_AGENT'];
if( isMobile($mobile) ){
    $_SESSION['modus'] = 'mobile';
    header('Location: ./mobile.php');
} else {
    $_SESSION['modus'] = 'desktop';
    header('Location: ./desktop.php');
}
?>