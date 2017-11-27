<?php if (isset($_REQUEST['btLanguageCC'])) { header("Refresh:0"); } ?>
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

