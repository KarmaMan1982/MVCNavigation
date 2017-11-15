<?php
    $now   = new DateTime;
    $displayNow = $now->format('H:i:s d.m.Y');
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
<div class="columnWorkingHours" id="columnWorkingHours1">  
    <div class="dragbox" id="item1" >  
        <h2>Systemzeit-Informationen</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoName">Aktuelle Uhrzeit</td><td><?php echo $displayNow; ?></td></tr>
                <tr><td class="infoName">Ventil 1</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Ventil 2</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Ventil 3</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Ventil 4</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Dosierpumpen (vormals Phosphat-Pumpen)</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">UV-Lampe</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Arbeitsphase-Restzeit</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
                <tr><td class="infoName">Aktueller Betriebsvorgang</td><td>Pumpen</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnWorkingHours" id="columnWorkingHours2">  
    <div class="dragbox" id="item1" >  
        <h2>Geräte-Informationen</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoName">Seriennummer Mikrocontroller</td><td>12345</td></tr>
                <tr><td class="infoName">Seriennummer Kommunikationsmodul</td><td>12345</td></tr>
                <tr><td class="infoName">Version Mikrocontroller</td><td>1.0</td></tr>
                <tr><td class="infoName">Version Kommunikationsmodul</td><td>2.0</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnWorkingHours" id="columnWorkingHours3">  
    <div class="dragbox" id="item1" >  
        <h2>Aktuelle Störungen</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                <tr><td class="infoError">Störung 1</td><td><button id="btConfirmError1" class="ui-button ui-widget ui-corner-all">Zur Kenntnis genommen</button></td></tr>
                <tr><td class="infoError">Störung 2</td><td><button id="btConfirmError2" class="ui-button ui-widget ui-corner-all">Zur Kenntnis genommen</button></td></tr>
                <tr><td class="infoError">Störung 3</td><td><button id="btConfirmError3" class="ui-button ui-widget ui-corner-all">Zur Kenntnis genommen</button></td></tr>
                <tr><td class="infoError">Störung 4</td><td><button id="btConfirmError4" class="ui-button ui-widget ui-corner-all">Zur Kenntnis genommen</button></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>