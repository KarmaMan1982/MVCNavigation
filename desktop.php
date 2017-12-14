<?php if (isset($_REQUEST['btLanguageCC'])) { header("Refresh:0"); } ?>
<?php
#var_dump($_SERVER["SCRIPT_FILENAME"]);
$scriptFeld = explode("/",$_SERVER["SCRIPT_FILENAME"]);
#var_dump($scriptFeld);
$scriptFeld[sizeof($scriptFeld)-1]='full_php_browscap.ini';
$browscapFile = '';
foreach($scriptFeld AS $scriptElement){
    if($scriptElement != ''){
        $browscapFile .= "/".$scriptElement;
    }
}
#var_dump($browscapFile);
if(file_exists($browscapFile)){
    ini_set('browscap',$browscapFile);
}
if(!isset($_SESSION['modus'])){
    session_start();
    $_SESSION['modus']='modern';
}
#var_dump($_SESSION['rotate']);
if(isset($_SESSION['screen_width']) AND isset($_SESSION['screen_height'])){
    if($_SESSION['screen_width'] < $_SESSION['screen_height']){ $_SESSION['rotation'] = 'portrait'; } else { $_SESSION['rotation'] = 'landscape';  }
    #if($_SESSION['screen_width'] < $_SESSION['screen_height']){ $_SESSION['rotation'] = 'landscape'; } else { $_SESSION['rotation'] = 'landscape';  }
    #echo 'User resolution: ' . $_SESSION['screen_width'] . 'x' . $_SESSION['screen_height'];
} else if(isset($_REQUEST['width']) AND isset($_REQUEST['height'])) {
    $_SESSION['screen_width'] = $_REQUEST['width'];
    $_SESSION['screen_height'] = $_REQUEST['height'];
    header('Location: ' . $_SERVER['PHP_SELF']);
} else {
    #echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+screen.width+"&height="+screen.height;</script>';
    echo '<script type="text/javascript">window.location = "' . $_SERVER['PHP_SELF'] . '?width="+window.innerWidth+"&height="+window.innerHeight;</script>';
}
?>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>KLARO Web-Dummy</title>
        <?php
        $oldFirefox = false;
        $veryOldFirefox = false;
        $veryNewFirefox = false;
        $browser = get_browser(null, true);
        if($browser['browser'] == 'Firefox' && $browser['majorver'] <= 10){ $oldFirefox = true; }
        if($browser['browser'] == 'Firefox' && $browser['majorver'] <= 4){ $veryOldFirefox = true; }
        if($browser['browser'] == 'Firefox' && $browser['majorver'] >= 57){ $veryNewFirefox = true; }
        if($browser['browser'] == 'Navigator' && $browser['majorver'] <= 9){ $oldFirefox = true; $veryOldFirefox = true; }
        if($browser['browser'] == 'IE'){
            echo '<meta http-equiv="x-ua-compatible" content="'.$browser['browser'].'='.$browser['majorver'].'">';
        }
        ?>
        <?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.') !== false || $oldFirefox == true) { ?>
        <link href="style/reset.css" rel="stylesheet" type="text/css"/> 
        <link href="lib/jquery-ui-1.9.2.custom/css/excite-bike/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-1.9.2.custom/selectmenu/themes/base/jquery.ui.selectmenu.css" rel="stylesheet" type="text/css"/>
        <link href="style/oldIE.css" rel="stylesheet" type="text/css"/>
        <?php if($oldFirefox == true || $veryOldFirefox == true) { ?>
        <link href="style/oldFF.css" rel="stylesheet" type="text/css"/>
        <?php } ?>
        <?php if($veryOldFirefox == true) { ?>
        <link href="style/veryOldFF.css" rel="stylesheet" type="text/css"/>
        <?php } ?>        
        <link href="lib/jquery.toggleinput.css" rel="stylesheet" type="text/css"/>
        <?php $_SESSION['oldBrowser'] = true; } else { $_SESSION['oldBrowser'] = false; ?>
        <link href="lib/jquery-ui-themes-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/themes/excite-bike/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/themes/excite-bike/theme.css" rel="stylesheet" type="text/css"/>
        <?php } ?>
        <link href="lib/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css"/>
        <link href="lib/switchBox/jquerysctipttop.css" rel="stylesheet" type="text/css"/>
        <link href="lib/switchBox/bootstrap.min.css" rel="stylesheet" type="text/css"/>        
        <link href="style/header.css" rel="stylesheet" type="text/css"/>
        <link href="style/mobile.css" rel="stylesheet" type="text/css"/>
        <link href="style/ProgressTable.css" rel="stylesheet" type="text/css"/>
        <!--
        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
        <link href="lib/uploader/css/style.css" rel="stylesheet" />
        https://192.168.10.242/chili/svn/p000135-klaro/firmware/webinterface

        --> 
       <?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.') !== false || $oldFirefox == true) { ?>
        <?php if($veryOldFirefox == true) { ?>
        <script src="lib/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js" type="text/javascript"></script>
        <?php } else { ?>
        <script src="lib/jquery-ui-1.9.2.custom/js/jquery-1.12.4.js" type="text/javascript"></script>
        <?php } ?>
        <script src="lib/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>
        <script src="lib/jquery.toggleinput.js" type="text/javascript"></script>
        <script src="lib/jquery-ui-1.9.2.custom/selectmenu/ui/jquery.ui.position.js" type="text/javascript"></script>
        <script src="lib/jquery-ui-1.9.2.custom/selectmenu/ui/jquery.ui.selectmenu.js" type="text/javascript"></script>
        <?php } else { ?>        
        <script src="lib/jquery-ui-1.12.1/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="lib/jquery-ui-1.12.1/jquery-ui.js" type="text/javascript"></script>
        <?php } ?>
        <script src="lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="lib/switchBox/jquery.twbs-toggle-buttons.min.js" type="text/javascript"></script>        
        <script src="js/index.js" type="text/javascript"></script>
        <?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.') !== false) { ?>
        <script src="js/indexIE6.js" type="text/javascript"></script>
        <?php } ?>
        <?php if($oldFirefox == true) { ?>
        <script src="js/indexOldFF.js" type="text/javascript"></script>
        <?php } ?>  
        <?php if($veryNewFirefox == true) { ?>
        <script src="js/indexNewFF.js" type="text/javascript"></script>
        <?php } ?>          
    </head>
    <body>
        <?php
        require_once('./lib/classMVC.php');
        //initiate the triad
        $model = new Model();
        //It is important that the controller and the view share the model
        $controller = new Controller($model);
        $view = new View($model);
        if (isset($_GET['action'])) $controller->{$_GET['action']}();   
        echo $view->output();
        ?>
    </body>
</html>

