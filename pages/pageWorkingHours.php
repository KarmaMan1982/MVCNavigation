<?php
    $now   = new DateTime;
    $displayNow = $now->format('H:i:s d.m.Y');
?>
<style type="text/css">
    .infoName{
        font-variant: small-caps;
    }
</style>
<table>
    <thead>
        <tr><th colspan="2">Systemzeit-Informationen</th></tr>
    </thead>
    <tbody>
        <tr><td class="infoName">Aktuelle Uhrzeit</td><td><?php echo $displayNow; ?></td></tr>
        <tr><td class="infoName">Ventil 1</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
        <tr><td class="infoName">Ventil 2</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
        <tr><td class="infoName">Ventil 3</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
        <tr><td class="infoName">Ventil 4</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
        <tr><td class="infoName">Dosierpumpen (vormals Phosphat-Pumpen)</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>
        <tr><td class="infoName">UV-Lampe</td><td>wahlweise Gesamt-Minuten oder umgerechnet in "Tage - Stunden:Minuten:Sekunden"</td></tr>        
    </tbody>
</table>