<?php
    function createUpdateButton($buttonID){
        echo '<span class="update"><a href="#" id="'.$buttonID.'"><img src="./img/refresh.png"></a></span>';
    }
?>
<style type="text/css">
.no-close .ui-dialog-titlebar-close {
  display: none;
}    
    
    .infoName{
        font-variant: small-caps;
    }
    .motorOpen{
        color: #45930b;
        font-weight: bold;
    }
    .motorClose{
        color: #9e0505;
        font-weight: bold;
    }
    
    .colValue {
        text-align: right;
    }
    
    
    
.column{  
    width:49%;  
    margin-right:.5%;  
    min-height:300px;  
    background:#fff;  
    float:left;  
}  
.column .dragbox{  
    margin:5px 2px  20px;  
    background:#fff;  
    position:relative;  
    border:1px solid #ddd;  
    -moz-border-radius:5px;  
    -webkit-border-radius:5px;  
}  
.column .dragbox h2{  
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
.column  .placeholder{  
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
</style>


<!--
<table>
    <thead>
        <tr><th colspan="2">Motor-Stauts</th></tr>
    </thead>
    <tbody>
        <tr><td class="infoName">Schrittmotor 1</td><td><span id="statusMotor1" class="motorOpen">Offen</span></td></tr>
        <tr><td class="infoName">Schrittmotor 2</td><td><span id="statusMotor2" class="motorClose">Geschlossen</span></td></tr>
        <tr><td class="infoName">Schrittmotor 3</td><td><span id="statusMotor3" class="motorOpen">Offen</span></td></tr>
        <tr><td class="infoName">Schrittmotor 4</td><td><span id="statusMotor4" class="motorClose">Geschlossen</span></td></tr>
    </tbody>
</table>
<table>
    <thead>
        <tr><th colspan="2">Sensoren</th></tr>
    </thead>
    <tbody>
        <tr><td class="infoName">Temperatursensor Platine</td><td class="colValue">70</td><td class="colUnit">Grad</td></tr>
        <tr><td class="infoName">Temperatursensor Extern</td><td class="colValue">40</td><td class="colUnit">Grad</td></tr>
        <tr><td class="infoName">Drucksensor 1</td><td class="colValue">5</td><td class="colUnit">Bar</td></tr>
        <tr><td class="infoName">Drucksensor 2</td><td class="colValue">15</td><td class="colUnit">Bar</td></tr>
    </tbody>    
</table>
-->
<div class="column" id="column1">  
    <div class="dragbox" id="item1" >  
        <h2>Motor-Stauts <?php createUpdateButton('btUpdateMotor'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName">Schrittmotor 1</td><td><span id="statusMotor1" class="motorOpen">Offen</span></td></tr>
                    <tr><td class="infoName">Schrittmotor 2</td><td><span id="statusMotor2" class="motorClose">Geschlossen</span></td></tr>
                    <tr><td class="infoName">Schrittmotor 3</td><td><span id="statusMotor3" class="motorOpen">Offen</span></td></tr>
                    <tr><td class="infoName">Schrittmotor 4</td><td><span id="statusMotor4" class="motorClose">Geschlossen</span></td></tr>
                </tbody>
            </table>   
        </div>  
    </div>  
    <div class="dragbox" id="item2" >  
        <h2>Eingänge <?php createUpdateButton('btUpdateInput'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td id="nameInput1" class="infoName">potentialfreier Kontakt</td><td id="valueInput1" class="colValue">belegt</td></tr>
                    <tr><td id="nameInput2" class="infoName">frei Wählbarer Eingang</td><td id="valueInput2" class="colValue">nicht belegt</td></tr>
                    <tr><td id="nameInput3" class="infoName">Schützüberwachung 1</td><td id="valueInput3" class="colValue">Schütz geschaltet</td></tr>
                    <tr><td id="nameInput4" class="infoName">Schützüberwachung 2</td><td id="valueInput4" class="colValue">Verdichter angeschlossen</td></tr>
                    <tr><td id="nameInput5" class="infoName">Schwimmer-Schalter 1</td><td id="valueInput5" class="colValue">An</td></tr>
                    <tr><td id="nameInput6" class="infoName">Schwimmer-Schalter 2</td><td id="valueInput6" class="colValue">Aus</td></tr>
                    <tr><td id="nameInput7" class="infoName">Schwimmer-Schalter 3</td><td id="valueInput7" class="colValue">An</td></tr>                    
                </tbody>    
            </table>
        </div>  
    </div>
</div>  
<div class="column" id="column2" >  
    <div class="dragbox" id="item4" >  
        <h2>Sensoren <?php createUpdateButton('btUpdateSensor'); ?></h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td id="nameSensor1" class="infoName">Temperatursensor Platine</td><td id="valueSensor1" class="colValue">70</td><td id="unitSensor1" class="colUnit">Grad</td></tr>
                    <tr><td id="nameSensor2" class="infoName">Temperatursensor Extern</td><td id="valueSensor2" class="colValue">40</td><td id="unitSensor2" class="colUnit">Grad</td></tr>
                    <tr><td id="nameSensor3" class="infoName">Drucksensor 1</td><td id="valueSensor3" class="colValue">5</td><td id="unitSensor3" class="colUnit">Bar</td></tr>
                    <tr><td id="nameSensor4" class="infoName">Drucksensor 2</td><td id="valueSensor4" class="colValue">15</td><td id="unitSensor4" class="colUnit">Bar</td></tr>
                </tbody>    
            </table>
        </div>  
    </div>
</div> 


<script type="text/javascript" language="JavaScript">
    $('.column').sortable({  
        connectWith: '.column',  
        handle: 'h2',  
        cursor: 'move',  
        placeholder: 'placeholder',  
        forcePlaceholderSize: true,  
        opacity: 0.4,  
    })  
    .disableSelection();
    
    $('#btUpdateMotor').click(function(){
        var MotorStatus = {
            statusMotor1: $('#statusMotor1').html(),
            statusMotor2: $('#statusMotor2').html(),
            statusMotor3: $('#statusMotor3').html(),
            statusMotor4: $('#statusMotor4').html()
        };
        $.post('./scripts/updateValues.php',{
            method: 'btUpdateMotor',
            data: MotorStatus
        }, function(data){
            //console.log(data);
            for(Motor in data){
                $('#'+data[Motor].Name).html(data[Motor].Wert);
                $('#'+data[Motor].Name).attr('class',data[Motor].Class);                
            }
        },'json');
       //console.log(MotorStatus);
    });
    
    $('#btUpdateSensor').click(function(){
        var SensorStatus = [{
            nameSensor1: $('#nameSensor1').html(),
            valueSensor1: $('#valueSensor1').html(),
            unitSensor1: $('#unitSensor1').html()
        },{
            nameSensor2: $('#nameSensor2').html(),
            valueSensor2: $('#valueSensor2').html(),
            unitSensor2: $('#unitSensor2').html()            
        },{
            nameSensor3: $('#nameSensor3').html(),
            valueSensor3: $('#valueSensor3').html(),
            unitSensor3: $('#unitSensor3').html()            
        },{
            nameSensor4: $('#nameSensor4').html(),
            valueSensor4: $('#valueSensor4').html(),
            unitSensor4: $('#unitSensor4').html()            
        }];
        $.post('./scripts/updateValues.php',{
            method: 'btUpdateSensor',
            data: SensorStatus
        }, function(data){
            for(Sensor in data){
                for(Attribut in data[Sensor]){
                    var Element = Attribut;
                    var Wert = data[Sensor][Attribut];
                    //console.log('Element: ' + Element + ' Wert: ' + Wert);
                    $('#'+Element).html(Wert);
                }            
            }
        },'json');
    });    
    
    $('#btUpdateInput').click(function(){
        var InputStatus = [{
            nameInput1: $('#nameInput1').html(),
            valueInput1: $('#valueInput1').html()
        },{
            nameInput2: $('#nameInput2').html(),
            valueInput2: $('#valueInput2').html()
        },{
            nameInput3: $('#nameInput3').html(),
            valueInput3: $('#valueInput3').html()
        },{
            nameInput4: $('#nameInput4').html(),
            valueInput4: $('#valueInput4').html()
        },{
            nameInput5: $('#nameInput5').html(),
            valueInput5: $('#valueInput5').html()
        },{
            nameInput6: $('#nameInput6').html(),
            valueInput6: $('#valueInput6').html()
        },{
            nameInput7: $('#nameInput7').html(),
            valueInput7: $('#valueInput7').html()
        }];
        $.post('./scripts/updateValues.php',{
            method: 'btUpdateInput',
            data: InputStatus
        }, function(data){
            for(Sensor in data){
                for(Attribut in data[Sensor]){
                    var Element = Attribut;
                    var Wert = data[Sensor][Attribut];
                    //console.log('Element: ' + Element + ' Wert: ' + Wert);
                    $('#'+Element).html(Wert);
                }            
            }
        },'json');
    });        
</script>