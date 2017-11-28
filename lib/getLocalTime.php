<?php
require_once ('./globalFunctions.php');
$Datum = new DateTime($_REQUEST['systemTime']);
$DateTimeData = array(
    'inputTime' => $_REQUEST['systemTime'],
    'dateFormat' => loadString('pageDateClockDTdateFormat').' '.loadString('pageDateClockDTtimeFormat'),
    'systemTime' => $Datum->format(loadString('pageDateClockDTdateFormat').' '.loadString('pageDateClockDTtimeFormat'))
);
echo json_encode($DateTimeData);
?>