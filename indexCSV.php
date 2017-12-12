<?php
    require_once('./scripts/getZyklus.php');
    require_once('./scripts/getZyklusCollection.php');
    require_once('lib/classZyklusEditor.php');
    require('./lib/html_table.php');
    $testFile = 'output.json';
    $ZyklusCollection->inputJSON($testFile);
    $TableElements = array(
        'Name',
        'Verdichter 1',
        'Verdichter 2 / Tauchpumpe',
        'UV-Ausgang',
        'Kühlfilter 1',
        'Kühlfilter 2',
        'Ausgang frei wählbar',
        'Ventil 1',
        'Ventil 2',
        'Ventil 3',
        'Ventil 4',
        'Dosierpumpe 1',
        'Dosierpumpe 2',
        'Dosierpumpe 3',
        'Warnlampe',
        'Kühlfilter',
        'Ausgang frei Wählbar bis 6W'
    );

    $ZyklusTable = new ZyklusEditor($TableElements);
    $ZyklusTable->loadJSON($testFile);
    $ZyklusTable->outputCSV();
   
?>