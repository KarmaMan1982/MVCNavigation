<?php
require_once ('./lib/globalFunctions.php');
?>
<style type="text/css">
.no-close .ui-dialog-titlebar-close {
  display: none;
}    
.infoName{
  font-variant: small-caps;
}   
.columnDateClock{  
    width:49%;  
    margin-right:.5%;  
    min-height:300px;  
    background:#fff;  
    float:left;  
}  
.columnDateClock .dragbox{  
    margin:5px 2px  20px;  
    background:#fff;  
    position:relative;  
    border:1px solid #ddd;  
    -moz-border-radius:5px;  
    -webkit-border-radius:5px;  
}  
.columnDateClock .dragbox h2{  
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
.columnDateClock  .placeholder{  
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
#btSetInternetTime, #btSetManualTime {
    width: 100%;
}
</style>
<?php if($_SESSION['modus'] == 'classic') { ?>
<div class="columnDateClock" id="columnDateClock1">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageDateClockHeaderShowTime'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName"><?php echo loadString('pageDateClockMC'); ?></td><td colspan="2"><span id="statusMCTime"></span></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageDateClockCC'); ?></td><td colspan="2"><span id="statusUNIXTime"></span></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnDateClock" id="columnDateClock2">  
    <div class="dragbox" id="item1" >  
        <h2><?php echo loadString('pageDateClockHeaderSetupTime'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName"><?php echo loadString('pageDateClockInternetTime'); ?></td><td><span id="statusINTERNETTime"></span></td><td><button id="btSetInternetTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncInternetTime'); ?></button></td></tr>
                    <tr><td class="infoName"><?php echo loadString('pageDateClockManualTime'); ?></td><td><input name="tbManualTime" id="tbManualTime" type="text"></td><td><button id="btSetManualTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncManualTime'); ?></button></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<?php } ?>
<?php if($_SESSION['rotation'] == 'landscape') { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageDateClockHeaderShowTime'); ?></div>
        <table class="AVTable">
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockMC'); ?></td><td class="valueColumn" colspan="2"><span id="statusMCTime"></span></td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockCC'); ?></td><td class="valueColumn" colspan="2"><span id="statusUNIXTime"></span></td></tr>
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageDateClockHeaderSetupTime'); ?></div>
        <table class="AVTable">
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockInternetTime'); ?></td><td class="valueColumnHalf colTime"><span id="statusINTERNETTime"></span></td><td class="valueColumnHalf colButton"><button id="btSetInternetTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncInternetTime'); ?></button></td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockManualTime'); ?></td><td class="valueColumnHalf colTime"><input name="tbManualTime" id="tbManualTime" type="text"></td><td class="valueColumnHalf colButton"><button id="btSetManualTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncManualTime'); ?></button></td></tr>
        </table>  
<?php } else { ?>
        <div class="AVheaderBlock"><?php echo loadString('pageDateClockHeaderShowTime'); ?></div>
        <table class="AVTable">
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockMC'); ?></td><td class="valueColumn" colspan="2"><span id="statusMCTime"></span></td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockCC'); ?></td><td class="valueColumn" colspan="2"><span id="statusUNIXTime"></span></td></tr>
        </table>
        <div class="AVheaderBlock"><?php echo loadString('pageDateClockHeaderSetupTime'); ?></div>
        <table class="AVTable">
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockInternetTime'); ?></td><td class="valueColumnHalf colTime"><span id="statusINTERNETTime"></span></td><td class="valueColumnHalf colButton"><button id="btSetInternetTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncInternetTime'); ?></button></td></tr>
                    <tr><td class="attributeColumn infoName"><?php echo loadString('pageDateClockManualTime'); ?></td><td class="valueColumnHalf colTime"><input name="tbManualTime" id="tbManualTime" type="text"></td><td class="valueColumnHalf colButton"><button id="btSetManualTime" class="ui-button ui-widget ui-corner-all"><?php echo loadString('pageDateClockSyncManualTime'); ?></button></td></tr>
        </table>                
<?php } ?>


<script type="text/javascript" language="JavaScript">
    var today = new Date();
    var Year = today.getFullYear();
    var Month = today.getMonth()+1;
    var Day = today.getDate();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    Month = checkTime(Month);
    Day = checkTime(Day);    
    $('#tbManualTime').val(Day + "." + Month + "." + Year + " " + h + ":" + m + ":" + s);
    
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }    
   
    $.getJSON( "./lib/getLocalTimeFormat.php", function( data ) {
        $("#tbManualTime").datetimepicker(data); 
    });
    /*
    $("#tbManualTime").datetimepicker({
        firstDay: 1,
        gotoCurrent: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "dd.mm.yy"
    });
    */
    setInterval(function(){
        $.post('./scripts/updateValues.php',{
            method: 'tmUpdateTime',
            data: null
        }, function(data){
            $('#statusMCTime').html(data['statusMCTime']);            
            $('#statusUNIXTime').html(data['statusUNIXTime']);
            $('#statusINTERNETTime').html(data['statusINTERNETTime']); 
       },'json');
    },1000);
</script>