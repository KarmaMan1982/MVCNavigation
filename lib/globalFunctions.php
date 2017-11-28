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
?>