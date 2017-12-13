$( document ).ready(function() {
    $('input[type="text"]').addClass('standardTextField');
    $('select').selectmenu({
        width: 225
    });
    $('.editText').width(108);
    var textStyle = {
        borderStyle: 'solid',
        borderWidth: '1px'
    }
    $('.editText').css(textStyle);
    $(':submit').addClass('ui-button ui-widget ui-corner-all');
});