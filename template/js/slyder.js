var text_slide_cur=0;
function showtext_slide(){
    $('#text_slide'+(text_slide_cur+1)).css({opacity: 0}).animate({opacity: 1.0,left: "50px"}, 1000);
    setTimeout(hidetext_slide, 5000);
}
function hidetext_slide(){
    $('#text_slide'+(text_slide_cur+1)).css({opacity: 1}).animate({opacity: 0,left: "-50px"}, 1000,function(){showtext_slide();});
    text_slide_cur=(text_slide_cur+1)%5;
}
$(document).ready(function() {
        showtext_slide();
    }

)