<?php
require_once ('./globalFunctions.php');
$timeField = array(
    'currentText' => loadString('pageDateClockDTPcurrentText'),
    'closeText' => loadString('pageDateClockDTPcloseText'),
    'amNames' => array('AM', 'A'),
    'pmNames' => array('PM', 'P'),
    'monthNames' => array(
        loadString('pageDateClockDTPmonth1'),
        loadString('pageDateClockDTPmonth2'),
        loadString('pageDateClockDTPmonth3'),
        loadString('pageDateClockDTPmonth4'),
        loadString('pageDateClockDTPmonth5'),
        loadString('pageDateClockDTPmonth6'),
        loadString('pageDateClockDTPmonth7'),
        loadString('pageDateClockDTPmonth8'),
        loadString('pageDateClockDTPmonth9'),
        loadString('pageDateClockDTPmonth10'),
        loadString('pageDateClockDTPmonth11'),
        loadString('pageDateClockDTPmonth12')        
    ), 'dayNames' => array(
        loadString('pageDateClockDTPday1'),
        loadString('pageDateClockDTPday2'),
        loadString('pageDateClockDTPday3'),
        loadString('pageDateClockDTPday4'),
        loadString('pageDateClockDTPday5'),
        loadString('pageDateClockDTPday6'),
        loadString('pageDateClockDTPday7')        
    ), 'dayNamesShort' => array(
        loadString('pageDateClockDTPdayNamesShort1'),
        loadString('pageDateClockDTPdayNamesShort2'),  
        loadString('pageDateClockDTPdayNamesShort3'),  
        loadString('pageDateClockDTPdayNamesShort4'),  
        loadString('pageDateClockDTPdayNamesShort5'),  
        loadString('pageDateClockDTPdayNamesShort6'),  
        loadString('pageDateClockDTPdayNamesShort7')        
    ), 'dayNamesMin' => array(
        loadString('pageDateClockDTPdayNamesMin1'),
        loadString('pageDateClockDTPdayNamesMin2'),  
        loadString('pageDateClockDTPdayNamesMin3'),  
        loadString('pageDateClockDTPdayNamesMin4'),  
        loadString('pageDateClockDTPdayNamesMin5'),  
        loadString('pageDateClockDTPdayNamesMin6'),  
        loadString('pageDateClockDTPdayNamesMin7')        
    ), 
    'timeFormat' => loadString('pageDateClockDTtimeFormat'),
    'dateFormat' => loadString('pageDateClockDTdateFormat'),
    'timeSuffix' => '',
    'timeOnlyTitle' => loadString('pageDateClockDTPtimeOnlyTitle'),
    'timeText' => loadString('pageDateClockDTPtimeText'),
    'hourText' => loadString('pageDateClockDTPhourText'),
    'minuteText' => loadString('pageDateClockDTPminuteText'),
    'secondText' => loadString('pageDateClockDTPsecondText'),
    'millisecText' => loadString('pageDateClockDTPmillisecText'),
    'microsecText' => loadString('pageDateClockDTPmicrosecText'),
    'timezoneText' => loadString('pageDateClockDTPtimezoneText'),
    'isRTL' => false,
    'firstDay' => 1,
    'gotoCurrent' => true    
);
echo json_encode($timeField);
?>