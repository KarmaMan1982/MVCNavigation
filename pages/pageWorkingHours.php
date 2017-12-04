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
    #columnWorkingHours1, #columnWorkingHours2{
        width: 49%;
    }
    #columnWorkingHours3{
        width: 98%;
    }    
    .columnWorkingHours{  
        margin-right:.5%;  
        min-height:300px;  
        background:#fff;  
        float:left;  
    }  
    .columnWorkingHours .dragbox{  
        margin:5px 2px  20px;  
        background:#fff;  
        position:relative;  
        border:1px solid #ddd;  
        -moz-border-radius:5px;  
        -webkit-border-radius:5px;  
    }  
    .columnWorkingHours .dragbox h2{  
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
    .columnWorkingHours  .placeholder{  
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
    #btSetStartWorkingHours, #btSetStopWorkingHours {
        width: 100%;
    }    
</style>
<?php if($_SESSION['modus'] == 'classic') { ?>
<div class="columnWorkingHours" id="columnWorkingHours1">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageWorkingHourCountHeaderTimeInformation'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountDateTimeNow'); ?></td><td><?php echo $displayNow; ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVentil'); ?> 1</td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVentil'); ?> 2</td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVentil'); ?> 3</td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVentil'); ?> 4</td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountPump'); ?></td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountUVLamp'); ?></td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountWPT'); ?></td><td><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountCOP'); ?></td><td><?php echo loadString('pageWorkingHourCountCOPValue'); ?></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnWorkingHours" id="columnWorkingHours2">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageWorkingHourCountHeaderDeviceInformation'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountSerialMC'); ?></td><td>12345</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountSerialCC'); ?></td><td>12345</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVersionMC'); ?></td><td>1.0</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageWorkingHourCountVersionCC'); ?></td><td>2.0</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnWorkingHours" id="columnWorkingHours3">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageWorkingHourCountHeaderCurrentDisorders'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 1</td><td><button id="btConfirmError1" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 2</td><td><button id="btConfirmError2" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 3</td><td><button id="btConfirmError3" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 4</td><td><button id="btConfirmError4" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<?php } ?>
<?php if($_SESSION['rotation'] == 'landscape') { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderTimeInformation'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountDateTimeNow'); ?></td><td class="valueColumn"><?php echo $displayNow; ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 1</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 2</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 3</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 4</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountPump'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountUVLamp'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountWPT'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountCOP'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountCOPValue'); ?></td></tr>         
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderDeviceInformation'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountSerialMC'); ?></td><td class="valueColumn">12345</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountSerialCC'); ?></td><td class="valueColumn">12345</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVersionMC'); ?></td><td class="valueColumn">1.0</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVersionCC'); ?></td><td class="valueColumn">2.0</td></tr>         
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderCurrentDisorders'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 1</td><td class="valueColumn"><button id="btConfirmError1" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 2</td><td class="valueColumn"><button id="btConfirmError2" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 3</td><td class="valueColumn"><button id="btConfirmError3" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 4</td><td class="valueColumn"><button id="btConfirmError4" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>       
        </table>        
<?php } else { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderTimeInformation'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountDateTimeNow'); ?></td><td class="valueColumn"><?php echo $displayNow; ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 1</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 2</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 3</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVentil'); ?> 4</td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountPump'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountUVLamp'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountWPT'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountTimeInformationText'); ?></td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountCOP'); ?></td><td class="valueColumn"><?php echo loadString('pageWorkingHourCountCOPValue'); ?></td></tr>         
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderDeviceInformation'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountSerialMC'); ?></td><td class="valueColumn">12345</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountSerialCC'); ?></td><td class="valueColumn">12345</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVersionMC'); ?></td><td class="valueColumn">1.0</td></tr>
                <tr><td class="attributeColumn"><?php echo loadString('pageWorkingHourCountVersionCC'); ?></td><td class="valueColumn">2.0</td></tr>         
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageWorkingHourCountHeaderCurrentDisorders'); ?></div>
        <table class="AVTable">
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 1</td><td class="valueColumn"><button id="btConfirmError1" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 2</td><td class="valueColumn"><button id="btConfirmError2" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 3</td><td class="valueColumn"><button id="btConfirmError3" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>
                <tr><td class="attributeColumn infoError"><?php echo loadString('pageWorkingHourCountDisorder'); ?> 4</td><td class="valueColumn"><button id="btConfirmError4" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageWorkingHourCountNoted'); ?></button></td></tr>       
        </table>        
<?php } ?>
