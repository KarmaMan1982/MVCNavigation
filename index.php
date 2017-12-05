<?php
$mobile = array('Iphone', 'Androind', 'Android', 'iPhone', 'iPad'); //etc add more


//We won't use global keyword
//We would pass an array as arg instead
#var_dump($_SERVER['HTTP_USER_AGENT']);
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
if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
    $_SESSION['scale']= '0.79';
} else {
    $_SESSION['scale']= '0.45';
}

$useragent=$_SERVER['HTTP_USER_AGENT'];
if( isMobile($mobile) ){
    $_SESSION['modus'] = 'mobile';
    header('Location: ./mobile.php');
} else {
    $_SESSION['modus'] = 'desktop';
    header('Location: ./desktop.php');
}
?>