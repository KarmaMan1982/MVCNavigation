<?php
    $now   = new DateTime;
    $displayNow = $now->format('H:i:s d.m.Y');
    require_once ('./lib/globalFunctions.php');
?>
<style type="text/css">
    .no-close .ui-dialog-titlebar-close {
        display: none;
    }      
    .infoName{
        font-variant: small-caps;
    }
    .infoError{
        color: #9e0505;
    }    
    #columnSettings1, #columnSettings2{
        width: 49%;
    }
    #columnSettings3{
        width: 98%;
    }    
    .columnSettings{  
        margin-right:.5%;  
        min-height:300px;  
        background:#fff;  
        float:left;  
    }  
    .columnSettings .dragbox{  
        margin:5px 2px  20px;  
        background:#fff;  
        position:relative;  
        border:1px solid #ddd;  
        -moz-border-radius:5px;  
        -webkit-border-radius:5px;  
    }  
    .columnSettings .dragbox h2{  
        margin:0;  
        font-size:12px;  
        padding:5px;  
        background:#f0f0f0;  
        color:#000;  
        border-bottom:1px solid #eee;  
        font-family:Verdana;  
        cursor:move;  
    }  
    .dragbox-content{  
        background:#fff;  
        min-height:100px; margin:5px;  
        font-family:'Lucida Grande', Verdana; font-size:0.8em; line-height:1.5em;  
    }  
    .columnSettings  .placeholder{  
        background: #f0f0f0;  
        border:1px dashed #ddd;  
    }  
    .dragbox h2.collapse{  
        background:#f0f0f0 url('collapse.png') no-repeat top rightright;  
    }  
    .dragbox h2 .update{  
        font-size:11px; font-weight:normal;  
        margin-right:5px; float:right;  
    }
    #btSetStartSettings, #btSetStopSettings {
        width: 100%;
    }
    .form-control {
        /* display: inline; */
        width: auto;
        border: none;
    }    
</style>


<?php if($_SESSION['modus'] == 'classic') { ?>
<div class="columnSettings" id="columnSettings1">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageSettingsHeaderWLANSettings'); ?></h2>  
        <div class="dragbox-content" >
        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
        <label class="btn active" role="button">
          <input type="radio" name="rbWLANType" value="Server" required>Server
        </label>
        <label class="btn" role="button">
          <input type="radio" name="rbWLANType" value="Client">Client
        </label>
      </div>
        <span id="serverType"></span>

        <form id="frmServer" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="controlgroup">
                <tbody>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANCreateNetwork'); ?></td><td><input type="text" name="tbCreateWLANName" id="tbCreateWLANName"></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANCreatePassword'); ?></td><td><input type="text" name="tbCreateWLANPasswort" id="tbCreateWLANPasswort"></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANCreateEncoding'); ?></td><td>
                    <select id="sbCreateWLANType">
                        <option>WEP</option>
                        <option>WPA</option>
                        <option>WPA2</option>
                    </select>
                </td></tr>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANCreatePasswordType'); ?></td><td>
                    <select id="sbCreateWLANPasswortType">
                        <option>ASCII</option>
                        <option>HEX</option>
                    </select>
                </td></tr>                
                <tr><td colspan="2"><input type="submit" name="btCreateWLAN" id="btCreateWLAN" value="<?php echo loadString('pageSettingsWLANCreateButtonCreate'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>

        <form id="frmClient" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="controlgroup">
                <tbody>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANJoinNetwork'); ?></td><td>
                    <select id="sbJoinWLAN">
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 1</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 2</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 3</option>
                    </select>                
                </td></tr>
                <tr><td class="infoName"><?php echo loadString('pageSettingsWLANJoinNetworkPassword'); ?></td><td><input type="text" name="tbJoinWLANPasswort" id="tbJoinWLANPasswort"></td></tr>
                <tr><td colspan="2"><input type="submit" name="btJoinWLAN" id="btJoinWLAN" value="<?php echo loadString('pageSettingsWLANJoinButtonJoin'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>                                
                </tbody>
        </table>        
        </form>

        </div>  
    </div>  
</div>
<div class="columnSettings" id="columnSettings2">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageSettingsHeaderSIMCard'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
            <form id="frmSIMCard" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class="controlgroup">
                    <tbody>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsSIMCardUserName'); ?></td><td><input type="text" name="tbSIMUser" id="tbSIMUser"></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsSIMCardPassword'); ?></td><td><input type="text" name="tbSIMPassword" id="tbSIMPassword"></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsSIMCardAPN'); ?></td><td><input type="text" name="tbSIMAPN" id="tbSIMAPN"></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsSIMCardIPAddress'); ?></td><td><input type="text" name="tbSIMIP" id="tbSIMIP"></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsSIMCardPort'); ?></td><td><input type="text" name="tbSIMPort" id="tbSIMPort"></td></tr>                                   
                    <tr><td colspan="2"><input type="submit" name="btSIMCard" id="btSIMCard" value="<?php echo loadString('pageSettingsSIMCardButtonSave'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                    </tbody>
            </table>         
            </form>
        </div>  
    </div>  
</div>
<div class="columnSettings" id="columnSettings3">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageSettingsHeaderUpdateLanguageCalibration'); ?></h2>  
        <div class="dragbox-content" >
        <table width="100%">
            <tr><td width="50%">
            <table class="controlgroup" width="100%">
                    <tbody>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationMC'); ?></td>
                        <td>
                            <form id="uploadMC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadMC" id="btUploadMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                        </td>
                    </tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationCC'); ?></td>
                        <td>
                            <form id="uploadCC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadCC" id="btUploadCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                        </td>
                    </tr>
                    </tbody>
            </table> 
            </td><td width="50%">
            <?php
                $languageRegister = array();
                $languageBlock = json_decode(file_get_contents('./languageEditor/languages.json'));
                foreach($languageBlock AS $Block => $Languages){
                    foreach ($Languages AS $Language => $Element){
                        if(!in_array($Language, $languageRegister)) { array_push($languageRegister, $Language); }
                    }
                }
            ?>
            <table class="controlgroup" width="100%">
                    <tbody>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?></td>
                        <td>
                            <form id="setLanguageMC" method="post" action="" enctype="multipart/form-data">
                            <select id="languageMC">
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageGerman'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageEnglish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageFrench'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageItalian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageNorwegian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguagePolish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSwedish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSpain'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSlowenian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageCzech'); ?></option>                                                                
                            </select>
                            <input type="submit" name="btLanguageMC" id="btLanguageMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                        </td>
                        <td>
                        <form id="startKalibrierungWork" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Work"><input type="submit" id="btStartKalibrierungWork" name="btStartKalibrierungWork" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationFactory'); ?>">
                        </form>
                        </td>
                    </tr>
                    <tr><td class="infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?></td>
                        <td>
                            <form id="setLanguageCC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <select id="languageCC" name="languageCC">
                            <?php
                                $globalSettingsFile = './globalSettings.json';
                                if(!file_exists($globalSettingsFile)){
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings = array(
                                            'languageCC' => $_REQUEST['languageCC']
                                        );                                        
                                    } else {
                                        $globalSettings = array(
                                            'languageCC' => ''
                                        );                                        
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));
                                } else {
                                    $globalSettings = json_decode(file_get_contents($globalSettingsFile));
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings->languageCC = $_REQUEST['languageCC'];
                                    } else {
                                        if(!isset($globalSettings->languageCC)) { $globalSettings->languageCC = ''; }
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));                                    
                                    
                                }
                                foreach($languageRegister AS $Sprache){
                                    if($globalSettings->languageCC == $Sprache){ $setSelected = ' selected '; } else { $setSelected = ''; }
                                    echo '<option value="'.$Sprache.'"'.$setSelected.'>'.$Sprache.'</option>';
                                }
                            ?>
                            </select>
                            <input type="submit" name="btLanguageCC" id="btLanguageCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                        </td>
                        <td>
                        <form id="startKalibrierungService" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Service"><input type="submit" id="btStartKalibrierungService" name="btStartKalibrierungService" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationService'); ?>">
                        </form>
                        </td>
                        
                    </tr>
                    </tbody>
            </table>            
            </td></tr>
        </table>

        </div>  
    </div>  
</div>
<?php } ?>
<?php if($_SESSION['rotation'] == 'landscape') { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderWLANSettings'); ?></div>        
        <table class="AVTable WLANModus">
                <tbody>            
                    <tr><td class="attributeColumn infoName">Modus</td><td class="valueColumn">
                        <?php if ($_SESSION['oldBrowser'] == true){ ?>
                        <div class="form-group radio-toggle">
                                <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="rbWLANType" id="rbWLANType1" value="Server" required>
                                            Server
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="rbWLANType" id="rbWLANType2" value="Client">
                                            Client
                                        </label>
                                </div>
                        </div>                            
                        <?php } else { ?>
                        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
                            <label class="btn active" role="button">
                                <input type="radio" name="rbWLANType" value="Server" required>Server
                            </label>
                            <label class="btn" role="button">
                                <input type="radio" name="rbWLANType" value="Client">Client
                            </label>
                        </div>                            
                        <?php } ?>    
                            
                            

                        <span id="serverType"></span>                        
                    </td></tr>
                </tbody>
        </table>
        <form id="frmServer" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreateNetwork'); ?></td><td class="valueColumn"><input type="text" name="tbCreateWLANName" id="tbCreateWLANName"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreatePassword'); ?></td><td class="valueColumn"><input type="text" name="tbCreateWLANPasswort" id="tbCreateWLANPasswort"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreateEncoding'); ?></td><td class="valueColumn">
                    <select id="sbCreateWLANType">
                        <option>WEP</option>
                        <option>WPA</option>
                        <option>WPA2</option>
                    </select>
                </td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreatePasswordType'); ?></td><td class="valueColumn">
                    <select id="sbCreateWLANPasswortType">
                        <option>ASCII</option>
                        <option>HEX</option>
                    </select>
                </td></tr>                
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btCreateWLAN" id="btCreateWLAN" value="<?php echo loadString('pageSettingsWLANCreateButtonCreate'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>

        <form id="frmClient" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANJoinNetwork'); ?></td><td class="valueColumn">
                    <select id="sbJoinWLAN">
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 1</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 2</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 3</option>
                    </select>                
                </td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANJoinNetworkPassword'); ?></td><td class="valueColumn"><input type="text" name="tbJoinWLANPasswort" id="tbJoinWLANPasswort"></td></tr>
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btJoinWLAN" id="btJoinWLAN" value="<?php echo loadString('pageSettingsWLANJoinButtonJoin'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>                                
                </tbody>
        </table>        
        </form>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderSIMCard'); ?></div>
        <form id="frmSIMCard" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardUserName'); ?></td><td class="valueColumn"><input type="text" name="tbSIMUser" id="tbSIMUser"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardPassword'); ?></td><td class="valueColumn"><input type="text" name="tbSIMPassword" id="tbSIMPassword"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardAPN'); ?></td><td class="valueColumn"><input type="text" name="tbSIMAPN" id="tbSIMAPN"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardIPAddress'); ?></td><td class="valueColumn"><input type="text" name="tbSIMIP" id="tbSIMIP"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardPort'); ?></td><td class="valueColumn"><input type="text" name="tbSIMPort" id="tbSIMPort"></td></tr>                                   
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btSIMCard" id="btSIMCard" value="<?php echo loadString('pageSettingsSIMCardButtonSave'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderUpdateLanguageCalibration'); ?></div>
        <table class="AVTable controlgroup" width="100%">
                <tbody>
                <tr><td class="attributeColumn infoName">Update <?php echo loadString('pageSettingsUpdateLanguageCalibrationMC'); ?></td>
                    <td class="valueColumn">
                            <form id="uploadMC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadMC" id="btUploadMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                    </td>
                </tr>
                <tr><td class="attributeColumn infoName">Update <?php echo loadString('pageSettingsUpdateLanguageCalibrationCC'); ?></td>
                    <td class="valueColumn">
                            <form id="uploadCC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadCC" id="btUploadCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                    </td>
                </tr>
                <?php
                    $languageRegister = array();
                    $languageBlock = json_decode(file_get_contents('./languageEditor/languages.json'));
                    foreach($languageBlock AS $Block => $Languages){
                        foreach ($Languages AS $Language => $Element){
                            if(!in_array($Language, $languageRegister)) { array_push($languageRegister, $Language); }
                        }
                    }
                ?>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?> <?php echo loadString('pageSettingsUpdateLanguageCalibrationMC'); ?></td>
                    <td class="valueColumn">
                            <form id="setLanguageMC" method="post" action="" enctype="multipart/form-data">
                            <select id="languageMC">
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageGerman'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageEnglish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageFrench'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageItalian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageNorwegian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguagePolish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSwedish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSpain'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSlowenian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageCzech'); ?></option>                                                                
                            </select>
                            <input type="submit" name="btLanguageMC" id="btLanguageMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                    </td>
                </tr><tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?> <?php echo loadString('pageSettingsUpdateLanguageCalibrationCC'); ?></td>
                    <td class="valueColumn">
                            <form id="setLanguageCC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <select id="languageCC" name="languageCC">
                            <?php
                                $globalSettingsFile = './globalSettings.json';
                                if(!file_exists($globalSettingsFile)){
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings = array(
                                            'languageCC' => $_REQUEST['languageCC']
                                        );                                        
                                    } else {
                                        $globalSettings = array(
                                            'languageCC' => ''
                                        );                                        
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));
                                } else {
                                    $globalSettings = json_decode(file_get_contents($globalSettingsFile));
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings->languageCC = $_REQUEST['languageCC'];
                                    } else {
                                        if(!isset($globalSettings->languageCC)) { $globalSettings->languageCC = ''; }
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));                                    
                                    
                                }
                                foreach($languageRegister AS $Sprache){
                                    if($globalSettings->languageCC == $Sprache){ $setSelected = ' selected '; } else { $setSelected = ''; }
                                    echo '<option value="'.$Sprache.'"'.$setSelected.'>'.$Sprache.'</option>';
                                }
                            ?>
                            </select>
                            <input type="submit" name="btLanguageCC" id="btLanguageCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                    </td>
                </tr><tr><td class="attributeColumn infoName"></td>
                    <td class="valueColumn">
                        <form id="startKalibrierungWork" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Work"><input type="submit" id="btStartKalibrierungWork" name="btStartKalibrierungWork" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationFactory'); ?>">
                        </form>                        
                    </td>
                </tr><tr><td class="attributeColumn infoName"></td>
                    <td class="valueColumn">
                        <form id="startKalibrierungService" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Service"><input type="submit" id="btStartKalibrierungService" name="btStartKalibrierungService" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationService'); ?>">
                        </form>                        
                    </td>
                </tr>
                </tbody>
        </table>
<?php } else { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderWLANSettings'); ?></div>        
        <table class="AVTable">
                <tbody>            
                    <tr><td class="attributeColumn infoName">Modus</td><td class="valueColumn">
                        <?php if ($_SESSION['oldBrowser'] == true){ ?>
                        <div class="form-group radio-toggle">
                                <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="rbWLANType" value="Server" checked>
                                            Server
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="rbWLANType" value="Client">
                                            Client
                                        </label>
                                </div>
                        </div>                            
                        <?php } else { ?>
                        <div class="btn-group btn-group-toggle form-control" data-toggle="buttons">
                            <label class="btn active" role="button">
                                <input type="radio" name="rbWLANType" value="Server" required>Server
                            </label>
                            <label class="btn" role="button">
                                <input type="radio" name="rbWLANType" value="Client">Client
                            </label>
                        </div>                            
                        <?php } ?>  
                        <span id="serverType"></span>                        
                    </td></tr>
                </tbody>
        </table>
        <form id="frmServer" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreateNetwork'); ?></td><td class="valueColumn"><input type="text" name="tbCreateWLANName" id="tbCreateWLANName"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreatePassword'); ?></td><td class="valueColumn"><input type="text" name="tbCreateWLANPasswort" id="tbCreateWLANPasswort"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreateEncoding'); ?></td><td class="valueColumn">
                    <select id="sbCreateWLANType">
                        <option>WEP</option>
                        <option>WPA</option>
                        <option>WPA2</option>
                    </select>
                </td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANCreatePasswordType'); ?></td><td class="valueColumn">
                    <select id="sbCreateWLANPasswortType">
                        <option>ASCII</option>
                        <option>HEX</option>
                    </select>
                </td></tr>                
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btCreateWLAN" id="btCreateWLAN" value="<?php echo loadString('pageSettingsWLANCreateButtonCreate'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>

        <form id="frmClient" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANJoinNetwork'); ?></td><td class="valueColumn">
                    <select id="sbJoinWLAN">
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 1</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 2</option>
                        <option><?php echo loadString('pageSettingsWLANJoinNetworkDemoName'); ?> 3</option>
                    </select>                
                </td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsWLANJoinNetworkPassword'); ?></td><td class="valueColumn"><input type="text" name="tbJoinWLANPasswort" id="tbJoinWLANPasswort"></td></tr>
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btJoinWLAN" id="btJoinWLAN" value="<?php echo loadString('pageSettingsWLANJoinButtonJoin'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>                                
                </tbody>
        </table>        
        </form>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderSIMCard'); ?></div>
        <form id="frmSIMCard" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="AVTable controlgroup">
                <tbody>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardUserName'); ?></td><td class="valueColumn"><input type="text" name="tbSIMUser" id="tbSIMUser"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardPassword'); ?></td><td class="valueColumn"><input type="text" name="tbSIMPassword" id="tbSIMPassword"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardAPN'); ?></td><td class="valueColumn"><input type="text" name="tbSIMAPN" id="tbSIMAPN"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardIPAddress'); ?></td><td class="valueColumn"><input type="text" name="tbSIMIP" id="tbSIMIP"></td></tr>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsSIMCardPort'); ?></td><td class="valueColumn"><input type="text" name="tbSIMPort" id="tbSIMPort"></td></tr>                                   
                <tr><td class="attributeColumn infoName">&nbsp;</td><td class="valueColumn"><input type="submit" name="btSIMCard" id="btSIMCard" value="<?php echo loadString('pageSettingsSIMCardButtonSave'); ?>" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>
        <div class="AVheaderBlock"><?php echo loadString('pageSettingsHeaderUpdateLanguageCalibration'); ?></div>
        <table class="AVTable controlgroup" width="100%">
                <tbody>
                <tr><td class="attributeColumn infoName">Update <?php echo loadString('pageSettingsUpdateLanguageCalibrationMC'); ?></td>
                    <td class="valueColumn">
                            <form id="uploadMC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadMC" id="btUploadMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                    </td>
                </tr>
                <tr><td class="attributeColumn infoName">Update <?php echo loadString('pageSettingsUpdateLanguageCalibrationCC'); ?></td>
                    <td class="valueColumn">
                            <form id="uploadCC" method="post" action="./lib/uploader/upload.php" enctype="multipart/form-data">
                            <input type="file" name="upl" class="ui-button ui-widget ui-corner-all"/>
                            <input type="submit" name="btUploadCC" id="btUploadCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationUpload'); ?>">
                            </form>
                    </td>
                </tr>
                <?php
                    $languageRegister = array();
                    $languageBlock = json_decode(file_get_contents('./languageEditor/languages.json'));
                    foreach($languageBlock AS $Block => $Languages){
                        foreach ($Languages AS $Language => $Element){
                            if(!in_array($Language, $languageRegister)) { array_push($languageRegister, $Language); }
                        }
                    }
                ?>
                <tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?> <?php echo loadString('pageSettingsUpdateLanguageCalibrationMC'); ?></td>
                    <td class="valueColumn">
                            <form id="setLanguageMC" method="post" action="" enctype="multipart/form-data">
                            <select id="languageMC">
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageGerman'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageEnglish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageFrench'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageItalian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageNorwegian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguagePolish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSwedish'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSpain'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageSlowenian'); ?></option>
                                <option><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguageCzech'); ?></option>                                                                
                            </select>
                            <input type="submit" name="btLanguageMC" id="btLanguageMC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                    </td>
                </tr><tr><td class="attributeColumn infoName"><?php echo loadString('pageSettingsUpdateLanguageCalibrationLanguage'); ?> <?php echo loadString('pageSettingsUpdateLanguageCalibrationCC'); ?></td>
                    <td class="valueColumn">
                            <form id="setLanguageCC" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                            <select id="languageCC" name="languageCC">
                            <?php
                                $globalSettingsFile = './globalSettings.json';
                                if(!file_exists($globalSettingsFile)){
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings = array(
                                            'languageCC' => $_REQUEST['languageCC']
                                        );                                        
                                    } else {
                                        $globalSettings = array(
                                            'languageCC' => ''
                                        );                                        
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));
                                } else {
                                    $globalSettings = json_decode(file_get_contents($globalSettingsFile));
                                    if(isset($_REQUEST['languageCC'])){
                                        $globalSettings->languageCC = $_REQUEST['languageCC'];
                                    } else {
                                        if(!isset($globalSettings->languageCC)) { $globalSettings->languageCC = ''; }
                                    }
                                    file_put_contents($globalSettingsFile, json_encode($globalSettings));                                    
                                    
                                }
                                foreach($languageRegister AS $Sprache){
                                    if($globalSettings->languageCC == $Sprache){ $setSelected = ' selected '; } else { $setSelected = ''; }
                                    echo '<option value="'.$Sprache.'"'.$setSelected.'>'.$Sprache.'</option>';
                                }
                            ?>
                            </select>
                            <input type="submit" name="btLanguageCC" id="btLanguageCC" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonSetup'); ?>">
                            </form>
                    </td>
                </tr><tr><td class="attributeColumn infoName"></td>
                    <td class="valueColumn">
                        <form id="startKalibrierungWork" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Work"><input type="submit" id="btStartKalibrierungWork" name="btStartKalibrierungWork" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationFactory'); ?>">
                        </form>                        
                    </td>
                </tr><tr><td class="attributeColumn infoName"></td>
                    <td class="valueColumn">
                        <form id="startKalibrierungService" method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="startKalibrierung" value="Service"><input type="submit" id="btStartKalibrierungService" name="btStartKalibrierungService" value="<?php echo loadString('pageSettingsUpdateLanguageCalibrationButtonStartCalibrationService'); ?>">
                        </form>                        
                    </td>
                </tr>
                </tbody>
        </table>
<?php } ?>
<!-- JavaScript Includes -->
<!--
<script src="lib/uploader/js/jquery.knob.js"></script>
-->
<!-- jQuery File Upload Dependencies -->
<!--
<script src="lib/uploader/js/jquery.ui.widget.js"></script>
<script src="lib/uploader/js/jquery.iframe-transport.js"></script>
<script src="lib/uploader/js/jquery.fileupload.js"></script>
-->

<!-- Our main JS file -->
<!--
<script src="lib/uploader/js/script.js"></script>
-->

<script type="text/javascript" language="JavaScript">
        function toggleStationForm(Station){
            switch(Station){
                case "Server":
                    $('#frmClient').hide();
                    $('#frmServer').show();
                break;
                case "Client":
                    $('#frmServer').hide();
                    $('#frmClient').show();
                break;
            }
        }
        <?php if($_SESSION['oldBrowser'] == true) { ?>
        $('.radio-toggle').toggleInput();
        $(document).ready(function(){
            $('.radio-toggle').click(function(){
                //alert($("input[name$='rbWLANType']:checked").val());
                toggleStationForm($("input[name$='rbWLANType']:checked").val());                
            });
            toggleStationForm($("input[name$='rbWLANType']:checked").val());
        });
        <?php } else { ?>
        $( ".controlgroup" ).controlgroup();
        $(".btn-group-toggle").twbsToggleButtons();
        <?php } ?>
        toggleStationForm($("input[name='rbWLANType']").val());
        $("input[name='rbWLANType']").on("click", function() {
            toggleStationForm($(this).val());
        });
        
</script>
