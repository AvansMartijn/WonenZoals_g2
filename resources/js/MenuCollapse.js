$(function () {
    let Collapsed = true;

    $('.HamburgerMenu > a').on('click', function() {

        if (!Collapsed) {
            $('.AppNav').css({"left" : "-100%","transition":"left .5s"}); 
            Collapsed = true;
        } else if (Collapsed) {
            $('.AppNav').css({"left" : "0px","transition":"left .5s"});
            Collapsed = false;
        }
    });
});