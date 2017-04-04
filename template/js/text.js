$(window).ready(function () {
    $("#greeting").fadeIn('slow');
    setTimeout("$('#enjoy').fadeIn('slow');", 4000);
});

$(function () {
    $(' #info ').textillate({
        in: {
            effect: 'bounceInLeft'
        }
    });
})

$(window).ready(function () {
    $("#logotip").fadeIn('slow');
    $("#recordings").fadeIn('slow');
    $("#show1").fadeIn('slow');
    $("#show2").fadeIn('slow');
    $("#show3").fadeIn('slow');
    $("#show4").fadeIn('slow');
});
