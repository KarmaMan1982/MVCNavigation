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
    #columnSettings1, #columnSettings2{
        width: 49%;
    }
    #columnSettings3{
        width: 49%;
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



<div class="columnSettings" id="columnSettings1">  
    <div class="dragbox" id="item1" >  
        <h2>WLAN-Einstellungen</h2>  
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
                <tr><td class="infoName">Netzwerk erstellen</td><td><input type="text" name="tbCreateWLANName" id="tbCreateWLANName"></td></tr>
                <tr><td class="infoName">Passwort</td><td><input type="text" name="tbCreateWLANPasswort" id="tbCreateWLANPasswort"></td></tr>
                <tr><td class="infoName">Verschlüsselung</td><td>
                    <select id="sbCreateWLANType">
                        <option>WEP</option>
                        <option>WPA</option>
                        <option>WPA2</option>
                    </select>
                </td></tr>
                <tr><td class="infoName">Passwort-Typ</td><td>
                    <select id="sbCreateWLANPasswortType">
                        <option>ASCII</option>
                        <option>HEX</option>
                    </select>
                </td></tr>                
                <tr><td colspan="2"><input type="submit" name="btCreateWLAN" id="btCreateWLAN" value="Erstellen" class="ui-button ui-widget ui-corner-all"></td></tr>
                </tbody>
        </table>         
        </form>

        <form id="frmClient" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="controlgroup">
                <tbody>
                <tr><td class="infoName">Netzwerk beitreten</td><td>
                    <select id="sbJoinWLAN">
                        <option>Netzwerk 1</option>
                        <option>Netzwerk 2</option>
                        <option>Netzwerk 3</option>
                    </select>                
                </td></tr>
                <tr><td class="infoName">Passwort</td><td><input type="text" name="tbJoinWLANPasswort" id="tbJoinWLANPasswort"></td></tr>
                <tr><td colspan="2"><input type="submit" name="btJoinWLAN" id="btJoinWLAN" value="Beitreten" class="ui-button ui-widget ui-corner-all"></td></tr>                                
                </tbody>
        </table>        
        </form>

        </div>  
    </div>  
</div>
<div class="columnSettings" id="columnSettings2">  
    <div class="dragbox" id="item1" >  
        <h2>Alarme</h2>  
        <div class="dragbox-content" >  
            <table>
                <thead>
                    <tr>
                        <th>Text</th>      <th>Datum</th>
                    </tr>
                </thead>
                <tbody>
                <tr><td class="infoName">Stromausfall</td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName">UV Störung</td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName">Warnung Überstau</td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName">Verstopfung</td><td>12:34:34 15.11.2017</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnSettings" id="columnSettings3">  
    <div class="dragbox" id="item1" >  
        <h2>Archivierte Störungen</h2>  
        <div class="dragbox-content" >  
            <table>
            <thead>
                    <tr>
                        <th>Text</th>      <th>Datum</th>       <th>Quitiert</th>
                    </tr>
                </thead>            
                <tbody>
                <tr><td class="infoError">Störung 1</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError">Störung 2</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError">Störung 3</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError">Störung 4</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>

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

        $( ".controlgroup" ).controlgroup();
        $(".btn-group-toggle").twbsToggleButtons();
        toggleStationForm($("input[name='rbWLANType']").val());
        $("input[name='rbWLANType']").on("click", function() {
            toggleStationForm($(this).val());
        });        
</script>
