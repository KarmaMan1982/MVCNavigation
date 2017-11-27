<?php
    require_once ('../lib/globalFunctions.php');
    require_once('../lib/classUpdateController.php');
    $Update = new UpdateController($_REQUEST['data']);
    if (isset($_REQUEST['method'])){
        $Update->{$_REQUEST['method']}();
        $Update->Output();
    }
?>