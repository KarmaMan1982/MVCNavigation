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
    #columnProtocoll1, #columnProtocoll2{
        width: 49%;
    }
    #columnProtocoll3{
        width: 49%;
    }    
    .columnProtocoll{  
        margin-right:.5%;  
        min-height:300px;  
        background:#fff;  
        float:left;  
    }  
    .columnProtocoll .dragbox{  
        margin:5px 2px  20px;  
        background:#fff;  
        position:relative;  
        border:1px solid #ddd;  
        -moz-border-radius:5px;  
        -webkit-border-radius:5px;  
    }  
    .columnProtocoll .dragbox h2{  
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
    .columnProtocoll  .placeholder{  
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
    #btSetStartProtocoll, #btSetStopProtocoll {
        width: 100%;
    }    
</style>
<?php if($_SESSION['modus'] == 'classic') { ?>
<div class="columnProtocoll" id="columnProtocoll1">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageOldAlertskHeaderSystemProtocol'); ?></h2>  
        <div class="dragbox-content" >  
        <table>
        <thead>
            <tr>
                <th><?php echo loadString('pageOldAlertskTableSection'); ?></th>      <th><?php echo loadString('pageOldAlertskTableDefinition'); ?></th>                                     <th><?php echo loadString('pageOldAlertskTableDescription'); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr><td>[00]</td>           <td></td>                                               <td>Abschnitt: Allg. Steuerungs-Informationen</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-String</td>                                   <td>Steuerungstyp (KL basic oder KL plus)</td></tr>
            <tr><td>002</td>            <td>ASCII-String</td>                                   <td>8-stellige Seriennummer (z.B. 1238820)</td></tr>
            <tr><td>003</td>            <td>ASCII-String (5 Zeichen)</td>                       <td>Version der Firmware, Format "yy.kw" (z.B. 12.29)</td></tr>
            <tr><td>[01]</td>           <td></td>                                               <td>Abschnitt: Tabellen-Informationen</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-String (12 Zeichen)</td>                      <td>Aktuelle Tabelle (oder 0 Zeichen, wenn EEPROM gelöscht)</td></tr>
            <tr><td>002</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Anzahl der Startzeiten</td></tr>
            <tr><td>[01_1]</td>         <td></td>                                               <td>Unter-Abschnitt: Startzeiten</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>1. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td>::</td><td>         </td>                                                   <td></td></tr>
            <tr><td>024</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>24. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td>[01_2]</td>         <td></td>                                               <td>Unter-Abschnitt: Taktzeiten und Verbraucher</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td>T01: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td>:::</td>            <td></td>                                               <td></td></tr>            
            <tr><td>016</td>            <td>ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td>T16: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td>[02]</td>           <td></td>                                               <td>Abschnitt: Einstell-Parameter</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>SW-Jumper:
                                                                                                    D0 = Strom-Überwachung für Ventil1
                                                                                                    D1 = Strom-Überwachung für Ventil2
                                                                                                    D2 = Strom-Überwachung für Ventil3
                                                                                                    D3 = Strom-Überwachung für Ventil4
                                                                                                    D4 = Reserve
                                                                                                    D5 = Alarmsummer
                                                                                                    D6 = Externer Verdichter ?
                                                                                                    D7 = UV-Lampe: Strom-Überwachung und Schalten der Spannung                                                                                                    
                                                                                                </td></tr>

            <tr><td>002</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Verdichter-Jumper: D3...D0 = Ventil 4.... Ventil 1 (Bit = 0 -> Verdichter wird nicht geschaltet)</td></tr>
            <tr><td>003</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Temperatur 1</td></tr>
            <tr><td>004</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Temperatur 2</td></tr>
            <tr><td>005</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Temperatur 3</td></tr>
            <tr><td>006</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>UV-Lampe-Einschaltdauer</td></tr>
            <tr><td>007</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Füllstands-Grenzwert</td></tr>
            <tr><td>008</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>max. Betriebsstunden UV-Modul</td></tr>
            <tr><td>009</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Rezirkulationszeit</td></tr>
            <tr><td>010</td>            <td>ASCII-String (max. 16 Ziffern)</td>                 <td>Telefonnummer 1</td></tr>
            <tr><td>011</td>            <td>ASCII-String (max. 16 Ziffern)</td>                 <td>Telefonnummer 2</td></tr>
            <tr><td>012</td>            <td>ASCII-String (max. 16 Ziffern)</td>                 <td>Telefonnummer 3</td></tr>
            <tr><td>013</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Gesamtzahl der Zyklen [für die Ermittlung der Auslastung]</td></tr>
            <tr><td>014</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Gesamtzahl der Klärzyklen [für die Ermittlung der Auslastung]</td></tr>   
            <tr><td>015</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Warnung Überstau ab</td></tr>   
            <tr><td>016</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>interner Kalibrierungs-Wert: Druck_1 ["Luftdruck" bei Höhe_1 = 0]</td></tr>
            <tr><td>017</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>interner Kalibrierungs-Wert: Druck_2 [Druck bei Höhe_2]</td></tr>   
            <tr><td>018</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>interner Kalibrierungs-Wert: Höhe_2 [Höhe bei Druck_2]</td></tr>   
            <tr><td>019</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>interner Kalibrierungs-Wert: Offset</td></tr>
            <tr><td>020</td>            <td>ASCII-String (max. 16 Ziffern)</td>                 <td>Steuerungsname</td></tr>
            <tr><td>021</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>P-Modul-Einschaltdauer</td></tr>
            <tr><td>022</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Service-Alarm aktiv:
                                                                                                    D0 = Tageskontrolle
                                                                                                    D1 = Monatskontrolle
                                                                                                    D2 = Wartung                    
                                                                                                </td></tr>
            <tr><td>023</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Datum 1) des nächsten Wartungstermins</td></tr>
            <tr><td>024</td>            <td>ASCII-Hex (2 Zeichen)</td>                          <td>Modem-Kommunikation (ab V.12.42)
                                                                                                    01 = keine
                                                                                                    02 = SMS und CSD-Kommunikation (GSM-Mode)
                                                                                                    03 = GPRS-Kommunikation (GPRS-Mode)                    
                                                                                                </td></tr>
            <tr><td>[03]</td>           <td></td>                                               <td>Abschnitt: Logbuch (Alte Störungen)</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td>1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td>::</td>             <td></td>                                               <td></td></tr>
            <tr><td>128</td>            <td>ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td>1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td>[04]</td>           <td></td>                                               <td>Abschnitt: aktuelle Betriebsstunden (in Sekunden !)</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td>1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td>[05]</td>           <td></td>                                               <td>Abschnitt: Kalenderwochen-Archiv der Betriebsstunden</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter
            <tr><td>[05_01]</td>        <td></td>                                               <td>Unter-Abschnitt: Kalenderwoche 1 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td>002</td>            <td>ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td>1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td>::</td>             <td></td>                                               <td></td></tr>
            <tr><td>::</td>             <td></td>                                               <td></td></tr>
            <tr><td>[05_53]</td>        <td></td>                                               <td>Unter-Abschnitt: Kalenderwoche 53 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-Hex (4 Zeichen)</td>                          <td>Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td>002</td>            <td>ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td>1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td>::</td>             <td></td>                                               <td></td></tr>
            <tr><td>::</td>             <td></td>                                               <td></td></tr>
            <tr><td>[06]</td>           <td></td>                                               <td>Abschnitt: GPRS-Einstellungen (ab V.12.42)</td></tr>
            <tr><td>#</td>              <td>Zahlenwert , Zahlenwert</td>                        <td>Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td>001</td>            <td>ASCII-String (max. 16 Zeichen)</td>                 <td>Username (z.B.: eplus)</td></tr>
            <tr><td>002</td>            <td>ASCII-String (max. 16 Zeichen)</td>                 <td>Password (z.B. gprs)</td></tr>
            <tr><td>003</td>            <td>ASCII-String (max. 64 Zeichen)</td>                 <td>AccessPointName (z.B. internet.m2mplus.de)</td></tr>
            <tr><td>004</td>            <td>ASCII-String (max. 15 Zeichen)</td>                 <td>IP-Adresse (z.B. 188.174.236.244)</td></tr>
            <tr><td>005</td>            <td>ASCII-String (max. 5 Zeichen)</td>                  <td>Port-Nummer (z.B. 80)</td></tr>
        </tbody>
    </table>  
        </div>  
    </div>  
</div>
<div class="columnProtocoll" id="columnProtocoll2">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageOldAlertskHeaderAlarms'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <thead>
                    <tr>
                        <th><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th><?php echo loadString('pageOldAlertskTableDate'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <tr><td class="infoName"><?php echo loadString('pageOldAlertsPowerFail'); ?></td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageOldAlertsUVDisturbance'); ?></td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageOldAlertsOverflowWarning'); ?></td><td>12:34:34 15.11.2017</td></tr>
                <tr><td class="infoName"><?php echo loadString('pageOldAlertsBlockage'); ?></td><td>12:34:34 15.11.2017</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnProtocoll" id="columnProtocoll3">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageOldAlertskHeaderArchivedErrors'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
            <thead>
                    <tr>
                        <th><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th><?php echo loadString('pageOldAlertskTableDate'); ?></th>       <th><?php echo loadString('pageOldAlertskTableAcknowlede'); ?></th>
                    </tr>
                </thead>            
                <tbody>
                <tr><td class="infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 1</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 2</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 3</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                <tr><td class="infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 4</td><td>12:34:34 15.11.2017</td><td>13:34:34 15.11.2017</td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<?php } ?>
<?php if($_SESSION['rotation'] == 'landscape') { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderAlarms'); ?></div>
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th class="valueColumn"><?php echo loadString('pageOldAlertskTableDate'); ?></th>
                    </tr>
                </thead>
                <tbody>            
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsPowerFail'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsUVDisturbance'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsOverflowWarning'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsBlockage'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                </tbody>
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderArchivedErrors'); ?></div>        
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th class="valueColumnHalf"><?php echo loadString('pageOldAlertskTableDate'); ?></th>       <th class="valueColumnHalf"><?php echo loadString('pageOldAlertskTableAcknowlede'); ?></th>
                    </tr>
                </thead>
                <tbody>            
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 1</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 2</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 3</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 4</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                </tbody>
        </table>        
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderSystemProtocol'); ?></div>        
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableSection'); ?></th>      <th class="valueColumn" colspan="2"><?php echo loadString('pageOldAlertskTableDefinition'); ?></th>                             
                    </tr>
                </thead>
                <tbody>            
            <tr><td class="attributeColumn infoName">[00]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Allg. Steuerungs-Informationen</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String</td>                                   <td class="valueColumnHalf">Steuerungstyp (KL basic oder KL plus)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-String</td>                                   <td class="valueColumnHalf">8-stellige Seriennummer (z.B. 1238820)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-String (5 Zeichen)</td>                       <td class="valueColumnHalf">Version der Firmware, Format "yy.kw" (z.B. 12.29)</td></tr>
            <tr><td class="attributeColumn infoName">[01]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Tabellen-Informationen</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String (12 Zeichen)</td>                      <td class="valueColumnHalf">Aktuelle Tabelle (oder 0 Zeichen, wenn EEPROM gelöscht)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Anzahl der Startzeiten</td></tr>
            <tr><td class="attributeColumn infoName">[01_1]</td>         <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Startzeiten</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">1. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf">         </td>                                                   <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">024</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">24. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td class="attributeColumn infoName">[01_2]</td>         <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Taktzeiten und Verbraucher</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td class="valueColumnHalf">T01: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td class="attributeColumn infoName">:::</td>            <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>            
            <tr><td class="attributeColumn infoName">016</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td class="valueColumnHalf">T16: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td class="attributeColumn infoName">[02]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Einstell-Parameter</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">SW-Jumper:
                                                                                                    D0 = Strom-Überwachung für Ventil1
                                                                                                    D1 = Strom-Überwachung für Ventil2
                                                                                                    D2 = Strom-Überwachung für Ventil3
                                                                                                    D3 = Strom-Überwachung für Ventil4
                                                                                                    D4 = Reserve
                                                                                                    D5 = Alarmsummer
                                                                                                    D6 = Externer Verdichter ?
                                                                                                    D7 = UV-Lampe: Strom-Überwachung und Schalten der Spannung                                                                                                    
                                                                                                </td></tr>

            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Verdichter-Jumper: D3...D0 = Ventil 4.... Ventil 1 (Bit = 0 -> Verdichter wird nicht geschaltet)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 1</td></tr>
            <tr><td class="attributeColumn infoName">004</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 2</td></tr>
            <tr><td class="attributeColumn infoName">005</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 3</td></tr>
            <tr><td class="attributeColumn infoName">006</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">UV-Lampe-Einschaltdauer</td></tr>
            <tr><td class="attributeColumn infoName">007</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Füllstands-Grenzwert</td></tr>
            <tr><td class="attributeColumn infoName">008</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">max. Betriebsstunden UV-Modul</td></tr>
            <tr><td class="attributeColumn infoName">009</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Rezirkulationszeit</td></tr>
            <tr><td class="attributeColumn infoName">010</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 1</td></tr>
            <tr><td class="attributeColumn infoName">011</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 2</td></tr>
            <tr><td class="attributeColumn infoName">012</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 3</td></tr>
            <tr><td class="attributeColumn infoName">013</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Gesamtzahl der Zyklen [für die Ermittlung der Auslastung]</td></tr>
            <tr><td class="attributeColumn infoName">014</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Gesamtzahl der Klärzyklen [für die Ermittlung der Auslastung]</td></tr>   
            <tr><td class="attributeColumn infoName">015</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Warnung Überstau ab</td></tr>   
            <tr><td class="attributeColumn infoName">016</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Druck_1 ["Luftdruck" bei Höhe_1 = 0]</td></tr>
            <tr><td class="attributeColumn infoName">017</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Druck_2 [Druck bei Höhe_2]</td></tr>   
            <tr><td class="attributeColumn infoName">018</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Höhe_2 [Höhe bei Druck_2]</td></tr>   
            <tr><td class="attributeColumn infoName">019</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Offset</td></tr>
            <tr><td class="attributeColumn infoName">020</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Steuerungsname</td></tr>
            <tr><td class="attributeColumn infoName">021</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">P-Modul-Einschaltdauer</td></tr>
            <tr><td class="attributeColumn infoName">022</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Service-Alarm aktiv:
                                                                                                    D0 = Tageskontrolle
                                                                                                    D1 = Monatskontrolle
                                                                                                    D2 = Wartung                    
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">023</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum 1) des nächsten Wartungstermins</td></tr>
            <tr><td class="attributeColumn infoName">024</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Modem-Kommunikation (ab V.12.42)
                                                                                                    01 = keine
                                                                                                    02 = SMS und CSD-Kommunikation (GSM-Mode)
                                                                                                    03 = GPRS-Kommunikation (GPRS-Mode)                    
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[03]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Logbuch (Alte Störungen)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">128</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[04]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: aktuelle Betriebsstunden (in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[05]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Kalenderwochen-Archiv der Betriebsstunden</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter
            <tr><td class="attributeColumn infoName">[05_01]</td>        <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Kalenderwoche 1 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">[05_53]</td>        <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Kalenderwoche 53 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">[06]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: GPRS-Einstellungen (ab V.12.42)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Zeichen)</td>                 <td class="valueColumnHalf">Username (z.B.: eplus)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Zeichen)</td>                 <td class="valueColumnHalf">Password (z.B. gprs)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-String (max. 64 Zeichen)</td>                 <td class="valueColumnHalf">AccessPointName (z.B. internet.m2mplus.de)</td></tr>
            <tr><td class="attributeColumn infoName">004</td>            <td class="valueColumnHalf">ASCII-String (max. 15 Zeichen)</td>                 <td class="valueColumnHalf">IP-Adresse (z.B. 188.174.236.244)</td></tr>
            <tr><td class="attributeColumn infoName">005</td>            <td class="valueColumnHalf">ASCII-String (max. 5 Zeichen)</td>                  <td class="valueColumnHalf">Port-Nummer (z.B. 80)</td></tr>
                </tbody>
        </table>  
<?php } else { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderAlarms'); ?></div>
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th class="valueColumn"><?php echo loadString('pageOldAlertskTableDate'); ?></th>
                    </tr>
                </thead>
                <tbody>            
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsPowerFail'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsUVDisturbance'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsOverflowWarning'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageOldAlertsBlockage'); ?></td><td class="valueColumn">12:34:34 15.11.2017</td></tr>
                </tbody>
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderArchivedErrors'); ?></div>        
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableText'); ?></th>      <th class="valueColumnHalf"><?php echo loadString('pageOldAlertskTableDate'); ?></th>       <th class="valueColumnHalf"><?php echo loadString('pageOldAlertskTableAcknowlede'); ?></th>
                    </tr>
                </thead>
                <tbody>            
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 1</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 2</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 3</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                    <tr><td class="attributeColumn infoError"><?php echo loadString('pageOldAlertsDisorder'); ?> 4</td><td class="valueColumnHalf">12:34:34 15.11.2017</td><td class="valueColumnHalf">13:34:34 15.11.2017</td></tr>
                </tbody>
        </table>        
        <div class="AVheaderBlock"><?php echo loadString('pageOldAlertskHeaderSystemProtocol'); ?></div>        
        <table class="AVTable">
                <thead>
                    <tr>
                        <th class="attributeColumn infoName"><?php echo loadString('pageOldAlertskTableSection'); ?></th>      <th class="valueColumn" colspan="2"><?php echo loadString('pageOldAlertskTableDefinition'); ?></th>                             
                    </tr>
                </thead>
                <tbody>            
            <tr><td class="attributeColumn infoName">[00]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Allg. Steuerungs-Informationen</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String</td>                                   <td class="valueColumnHalf">Steuerungstyp (KL basic oder KL plus)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-String</td>                                   <td class="valueColumnHalf">8-stellige Seriennummer (z.B. 1238820)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-String (5 Zeichen)</td>                       <td class="valueColumnHalf">Version der Firmware, Format "yy.kw" (z.B. 12.29)</td></tr>
            <tr><td class="attributeColumn infoName">[01]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Tabellen-Informationen</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String (12 Zeichen)</td>                      <td class="valueColumnHalf">Aktuelle Tabelle (oder 0 Zeichen, wenn EEPROM gelöscht)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Anzahl der Startzeiten</td></tr>
            <tr><td class="attributeColumn infoName">[01_1]</td>         <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Startzeiten</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">1. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf">         </td>                                                   <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">024</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">24. Startzeit: H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten</td></tr>
            <tr><td class="attributeColumn infoName">[01_2]</td>         <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Taktzeiten und Verbraucher</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td class="valueColumnHalf">T01: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td class="attributeColumn infoName">:::</td>            <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>            
            <tr><td class="attributeColumn infoName">016</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen), ASCII-Hex (2 Zeichen)</td>   <td class="valueColumnHalf">T16: 1. Zeitdauer, 2. Verbraucher (D7...D0 = x, x, x, x, V4, V3, V2, V1)</td></tr>
            <tr><td class="attributeColumn infoName">[02]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Einstell-Parameter</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">SW-Jumper:
                                                                                                    D0 = Strom-Überwachung für Ventil1
                                                                                                    D1 = Strom-Überwachung für Ventil2
                                                                                                    D2 = Strom-Überwachung für Ventil3
                                                                                                    D3 = Strom-Überwachung für Ventil4
                                                                                                    D4 = Reserve
                                                                                                    D5 = Alarmsummer
                                                                                                    D6 = Externer Verdichter ?
                                                                                                    D7 = UV-Lampe: Strom-Überwachung und Schalten der Spannung                                                                                                    
                                                                                                </td></tr>

            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Verdichter-Jumper: D3...D0 = Ventil 4.... Ventil 1 (Bit = 0 -> Verdichter wird nicht geschaltet)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 1</td></tr>
            <tr><td class="attributeColumn infoName">004</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 2</td></tr>
            <tr><td class="attributeColumn infoName">005</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Temperatur 3</td></tr>
            <tr><td class="attributeColumn infoName">006</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">UV-Lampe-Einschaltdauer</td></tr>
            <tr><td class="attributeColumn infoName">007</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Füllstands-Grenzwert</td></tr>
            <tr><td class="attributeColumn infoName">008</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">max. Betriebsstunden UV-Modul</td></tr>
            <tr><td class="attributeColumn infoName">009</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Rezirkulationszeit</td></tr>
            <tr><td class="attributeColumn infoName">010</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 1</td></tr>
            <tr><td class="attributeColumn infoName">011</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 2</td></tr>
            <tr><td class="attributeColumn infoName">012</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Telefonnummer 3</td></tr>
            <tr><td class="attributeColumn infoName">013</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Gesamtzahl der Zyklen [für die Ermittlung der Auslastung]</td></tr>
            <tr><td class="attributeColumn infoName">014</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Gesamtzahl der Klärzyklen [für die Ermittlung der Auslastung]</td></tr>   
            <tr><td class="attributeColumn infoName">015</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Warnung Überstau ab</td></tr>   
            <tr><td class="attributeColumn infoName">016</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Druck_1 ["Luftdruck" bei Höhe_1 = 0]</td></tr>
            <tr><td class="attributeColumn infoName">017</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Druck_2 [Druck bei Höhe_2]</td></tr>   
            <tr><td class="attributeColumn infoName">018</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Höhe_2 [Höhe bei Druck_2]</td></tr>   
            <tr><td class="attributeColumn infoName">019</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">interner Kalibrierungs-Wert: Offset</td></tr>
            <tr><td class="attributeColumn infoName">020</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Ziffern)</td>                 <td class="valueColumnHalf">Steuerungsname</td></tr>
            <tr><td class="attributeColumn infoName">021</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">P-Modul-Einschaltdauer</td></tr>
            <tr><td class="attributeColumn infoName">022</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Service-Alarm aktiv:
                                                                                                    D0 = Tageskontrolle
                                                                                                    D1 = Monatskontrolle
                                                                                                    D2 = Wartung                    
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">023</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum 1) des nächsten Wartungstermins</td></tr>
            <tr><td class="attributeColumn infoName">024</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen)</td>                          <td class="valueColumnHalf">Modem-Kommunikation (ab V.12.42)
                                                                                                    01 = keine
                                                                                                    02 = SMS und CSD-Kommunikation (GSM-Mode)
                                                                                                    03 = GPRS-Kommunikation (GPRS-Mode)                    
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[03]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Logbuch (Alte Störungen)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">128</td>            <td class="valueColumnHalf">ASCII-Hex (2 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (4 Zeichen),
                                            ASCII-Hex (2 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Fehlernummer (siehe Kap. 4.4.1.2 "Fehler-Nummern")
                                                                                                    2. Datum (siehe Kap. 4.4.1.1 "Datums-Format")
                                                                                                    3. H-Teil des Wortes -> Stunden / L-Teil des Wortes -> Minuten
                                                                                                    4. Sekunden
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[04]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: aktuelle Betriebsstunden (in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">[05]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: Kalenderwochen-Archiv der Betriebsstunden</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter
            <tr><td class="attributeColumn infoName">[05_01]</td>        <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Kalenderwoche 1 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">[05_53]</td>        <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Unter-Abschnitt: Kalenderwoche 53 (Betriebsstunden in Sekunden !)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-Hex (4 Zeichen)</td>                          <td class="valueColumnHalf">Datum (siehe Kap. 4.4.1.1 "Datums-Format") Aus diesem abgespeicherten Datum lässt sich das zu dieser Kalenderwoche zugehörige Jahr ermitteln.</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen),
                                            ASCII-Hex (8 Zeichen)
                                        </td>                                                   <td class="valueColumnHalf">1. Ventil 1
                                                                                                    2. Ventil 2
                                                                                                    3. Ventil 3
                                                                                                    4. Ventil 4
                                                                                                    5. Verdichter
                                                                                                    6. UV-Modul
                                                                                                    7. Phosphatpumpe                                            
                                                                                                </td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">::</td>             <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf"></td></tr>
            <tr><td class="attributeColumn infoName">[06]</td>           <td class="valueColumnHalf"></td>                                               <td class="valueColumnHalf">Abschnitt: GPRS-Einstellungen (ab V.12.42)</td></tr>
            <tr><td class="attributeColumn infoName">#</td>              <td class="valueColumnHalf">Zahlenwert , Zahlenwert</td>                        <td class="valueColumnHalf">Anzahl der Unterabschnitte, Anzahl der folgenden Schlüsselwörter</td></tr>
            <tr><td class="attributeColumn infoName">001</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Zeichen)</td>                 <td class="valueColumnHalf">Username (z.B.: eplus)</td></tr>
            <tr><td class="attributeColumn infoName">002</td>            <td class="valueColumnHalf">ASCII-String (max. 16 Zeichen)</td>                 <td class="valueColumnHalf">Password (z.B. gprs)</td></tr>
            <tr><td class="attributeColumn infoName">003</td>            <td class="valueColumnHalf">ASCII-String (max. 64 Zeichen)</td>                 <td class="valueColumnHalf">AccessPointName (z.B. internet.m2mplus.de)</td></tr>
            <tr><td class="attributeColumn infoName">004</td>            <td class="valueColumnHalf">ASCII-String (max. 15 Zeichen)</td>                 <td class="valueColumnHalf">IP-Adresse (z.B. 188.174.236.244)</td></tr>
            <tr><td class="attributeColumn infoName">005</td>            <td class="valueColumnHalf">ASCII-String (max. 5 Zeichen)</td>                  <td class="valueColumnHalf">Port-Nummer (z.B. 80)</td></tr>
                </tbody>
        </table>  
<?php } ?>
