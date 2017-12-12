var startOrientation = null;
var currentOrientaion = null;

function changeLayout(rotatePage){
    //var currentLocation = window.location.href;
    //window.location = currentLocation + '?width='+window.innerWidth+'&height='+window.innerHeight;
    var currentResolution = {
        width: window.innerWidth,
        height: window.innerHeight,
        rotate: rotatePage
    };
    //console.log(currentResolution);
        $.post('./scripts/updateValues.php',{
            method: 'windowChangeLayout',
            data: currentResolution
        }, function(data){
            if(data.input.height == data.session.screen_height && data.input.width == data.session.screen_width){
                window.location.reload(true);
            }
        },'json');    
}

function readDeviceOrientation() {                 		
    if (Math.abs(window.orientation) === 90) {
        // Landscape
        //document.getElementById("orientation").innerHTML = "LANDSCAPE";
        changeLayout(true);
    } else {
    	// Portrait
    	//document.getElementById("orientation").innerHTML = "PORTRAIT";
        changeLayout(true);
    }
}

function resizeDevice(e){
    
    var deviceWidth=window.outerWidth;
    var deviceHeight=window.outerHeight;
    if(deviceWidth >= deviceHeight){
        //currentOrientaion = 'landscape';
        if('landscape' != startOrientation){ changeLayout(false); }
        //console.log('landscape' + 'StartOrientation' + startOrientation);
    } else {
        //currentOrientaion = 'portrait';
        if('portrait' != startOrientation){ changeLayout(false); }        
        //console.log('portrait' + 'StartOrientation' + startOrientation);
    }
}

window.onorientationchange = readDeviceOrientation;
window.onresize = resizeDevice;

$(document).ready(function() {
    var deviceWidth=window.outerWidth;
    var deviceHeight=window.outerHeight;
    if(deviceWidth >= deviceHeight){
        startOrientation = 'landscape';
    } else {
        startOrientation = 'portrait';
    }
    //console.log(window.location.href);
    $('.editText').width(104);
    $("#basic_example_1").datetimepicker();
});