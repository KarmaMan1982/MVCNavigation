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
.dragbox h2 .configure{  
    font-size:11px; font-weight:normal;  
    margin-right:30px; float:rightright;  
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
        <h2>Motor-Stauts</h2>  
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
        <h2><span class="configure" ><a href="#" >Configure</a></span>Handle 2</h2>  
        <div class="dragbox-content" >  
            <!-- Panel Content Here -->  
        </div>  
    </div>  
    <div class="dragbox" id="item3" >  
        <h2>Handle 3</h2>  
        <div class="dragbox-content" >  
            <!-- Panel Content Here -->  
        </div>  
    </div>  
</div>  
<div class="column" id="column2" >  
    <div class="dragbox" id="item4" >  
        <h2>Sensoren</h2>  
        <div class="dragbox-content" >  
            <table>
                <tbody>
                    <tr><td class="infoName">Temperatursensor Platine</td><td class="colValue">70</td><td class="colUnit">Grad</td></tr>
                    <tr><td class="infoName">Temperatursensor Extern</td><td class="colValue">40</td><td class="colUnit">Grad</td></tr>
                    <tr><td class="infoName">Drucksensor 1</td><td class="colValue">5</td><td class="colUnit">Bar</td></tr>
                    <tr><td class="infoName">Drucksensor 2</td><td class="colValue">15</td><td class="colUnit">Bar</td></tr>
                </tbody>    
            </table>
        </div>  
    </div>  
    <div class="dragbox" id="item5" >  
        <h2>Handle 5</h2>  
        <div class="dragbox-content" >  
            <!--Panel Content Here-->   
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
</script>