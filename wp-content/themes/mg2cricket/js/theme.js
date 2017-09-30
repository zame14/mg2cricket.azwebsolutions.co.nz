jQuery(function($) {
    var $ = jQuery;
    //setHomeBannerHeight();
    $(window).resize(function() {
        //setHomeBannerHeight();
    });
});
function setHomeBannerHeight() {
    var $ = jQuery;
    var screenW = $(document).width();
    //if(screenW > 767) {
    var screenH = $(window).height();
    $(".hp-banner").css('height', screenH);
    //}
}