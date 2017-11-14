<style type="text/css">
.no-close .ui-dialog-titlebar-close {
  display: none;
}    
.infoName{
  font-variant: small-caps;
}   
.columnHoliday{  
    width:49%;  
    margin-right:.5%;  
    min-height:300px;  
    background:#fff;  
    float:left;  
}  
.columnHoliday .dragbox{  
    margin:5px 2px  20px;  
    background:#fff;  
    position:relative;  
    border:1px solid #ddd;  
    -moz-border-radius:5px;  
    -webkit-border-radius:5px;  
}  
.columnHoliday .dragbox h2{  
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
.columnHoliday  .placeholder{  
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
#btSetStartHoliday, #btSetStopHoliday {
    width: 100%;
}
</style>

<div class="columnHoliday" id="columnHoliday1">  
    <div class="dragbox" id="item1" >  
        <h2>Ferien-Zyklus anzeigen</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName">Ferien Start</td><td><span id="statusHolidayStart"></span></td></tr>
                    <tr><td class="infoName">Ferien Stop</td><td><span id="statusHolidayStop"></span></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>
<div class="columnHoliday" id="columnHoliday2">  
    <div class="dragbox" id="item1" >  
        <h2>Ferien-Zyklus einstellen</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName">Ferien Start einstellen</td><td><input name="tbStartHoliday" id="tbStartHoliday" type="text"></td><td><button id="btSetStartHoliday" class="ui-button ui-widget ui-corner-all">Startpunkt festlegen</button></td></tr>
                    <tr><td class="infoName">Ferien Stop einstellen</td><td><input name="tbStopHoliday" id="tbStopHoliday" type="text"></td><td><button id="btSetStopHoliday" class="ui-button ui-widget ui-corner-all">Endpunkt festlegen</button></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
</div>


<script type="text/javascript" language="JavaScript">
    if (!Date.now) {
      Date.now = function now() {
        return new Date().getTime();
      };
    }
    
    var today = new Date();
    var Year = today.getFullYear();
    var Month = today.getMonth()+1;
    //console.log('Monat: ' + Month);
    var Day = today.getDate();
    //console.log('Tag: ' + Day);
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    Month = checkTime(Month);
    Day = checkTime(Day);
    var strHeute = Day + "." + Month + "." + Year + " " + h + ":" + m + ":" + s;
    //console.log('Heute: ' + strHeute);
    $('#tbStartHoliday').val(strHeute);
    $('#tbStopHoliday').val(strHeute);
    $('#statusHolidayStart').html(strHeute);
    $('#statusHolidayStop').html(strHeute);
    
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }    

    $("#tbStartHoliday").datetimepicker({
        firstDay: 1,
        gotoCurrent: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "dd.mm.yy"
    });
    $("#tbStopHoliday").datetimepicker({
        firstDay: 1,
        gotoCurrent: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "dd.mm.yy"
    });
    
    $.post('./scripts/updateValues.php',{
        method: 'tmUpdateHoliday',
        data: null
    }, function(data){
        $('#tbStartHoliday').val(data['startHoliday']);
        $('#tbStopHoliday').val(data['stopHoliday']);
    },'json');
    
    setInterval(function(){
        $.post('./scripts/updateValues.php',{
            method: 'tmUpdateHoliday',
            data: null
        }, function(data){
            $('#statusHolidayStart').html(data['startHoliday']);
            $('#statusHolidayStop').html(data['stopHoliday']);
       },'json');
    },1000);
    
    $('#btSetStartHoliday').click(function(){
        var FerienStatus = {
            startHoliday: $('#tbStartHoliday').val(),
            stopHoliday: $('#tbStopHoliday').val()
        };        
        $.post('./scripts/updateValues.php',{
            method: 'btSetStartHoliday',
            data: FerienStatus
        }, function(data){
            $('#statusHolidayStart').html(data['startHoliday']);
            $('#statusHolidayStop').html(data['stopHoliday']);
       },'json');        
    });
    $('#btSetStopHoliday').click(function(){
        var FerienStatus = {
            startHoliday: $('#tbStartHoliday').val(),
            stopHoliday: $('#tbStopHoliday').val()
        };        
        $.post('./scripts/updateValues.php',{
            method: 'btSetStopHoliday',
            data: FerienStatus
        }, function(data){
            $('#statusHolidayStart').html(data['startHoliday']);
            $('#statusHolidayStop').html(data['stopHoliday']);
       },'json');        
    });    
</script>