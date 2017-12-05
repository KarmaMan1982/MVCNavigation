<?php
//http://zserge.com/jsmn.html

function loadString($stringName){
    $stringContent = '';
    $globalSettingsFile = './globalSettings.json';
    if(!is_file($globalSettingsFile)){ $globalSettingsFile = '.'.$globalSettingsFile; }
    $globalSettings = json_decode(file_get_contents($globalSettingsFile));
    $languageCC = $globalSettings->languageCC;
    $languagesFile = './languageEditor/languages.json';
    if(!is_file($languagesFile)){ $languagesFile = '.'.$languagesFile; }    
    $languageBlock = json_decode(file_get_contents($languagesFile));
    foreach($languageBlock AS $Block => $Languages){
        if($Block == $stringName){
            $stringContent = $Languages->$languageCC;
        }
    }
    return $stringContent;
}
function createProgressTable($Aktiv){
    echo '<table class="progressTable" style="width: 100%;"><tr>';
    $Zyklus = array('Verdichter 1', 'Pumpen', 'Kühlfilter 1', 'Kühlfilter 2', 'Ausgang frei Wählbar');
    $Width = 100 / sizeof($Zyklus);
    $widthStyle = 'width: '.$Width.'%;';
    foreach ($Zyklus AS $Vorgang){
        if($Vorgang == $Aktiv) { echo '<td class="aktiv" style="'.$widthStyle.'">'.$Vorgang.'</td>'; }
        else { echo '<td style="'.$widthStyle.'">'.$Vorgang.'</td>'; }
    }
    echo '</tr></table>';
}
?>