<?php if (isset($_REQUEST['btLanguageCC'])) { header("Refresh:0"); } ?>
<?php
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
        <link href="lib/jquery-ui-themes-1.12.1/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/themes/excite-bike/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-themes-1.12.1/themes/excite-bike/theme.css" rel="stylesheet" type="text/css"/>
        <link href="lib/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css"/>
        <link href="lib/switchBox/jquerysctipttop.css" rel="stylesheet" type="text/css"/>
        <link href="lib/switchBox/bootstrap.min.css" rel="stylesheet" type="text/css"/>        
        <link href="style/header.css" rel="stylesheet" type="text/css"/>
        <link href="style/mobile.css" rel="stylesheet" type="text/css"/>
        <!--
        <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
        <link href="lib/uploader/css/style.css" rel="stylesheet" />
        -->
        <script src="lib/jquery-ui-1.12.1/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="lib/jquery-ui-1.12.1/jquery-ui.js" type="text/javascript"></script>
        <script src="lib/jquery-ui-timepicker-addon.js" type="text/javascript"></script>
        <script src="lib/switchBox/jquery.twbs-toggle-buttons.min.js" type="text/javascript"></script>        
        <script src="js/index.js" type="text/javascript"></script>
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

