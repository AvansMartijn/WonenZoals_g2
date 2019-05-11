$(function () {
    let Collapsed = true;

    $(window).on('resize', function() {
        let Width = $(window).width();

        if (Width > 955) {
            $('.AppNav').css({"left" : "0px","transition":"left .5s"});
            $('.HamburgerMenu > a').css({"top" : "15px", "transistion": "top .5s"})
            Collapsed = false;
        }
    });

    $('.HamburgerMenu > a').on('click', function() {

        if (!Collapsed) {
            $('.AppNav').css({"left" : "-100%","transition":"left .5s"});
            $('.HamburgerMenu > a').css({"top" : "60px", "transistion": "top .2s"})
            Collapsed = true;
        } else if (Collapsed) {
            $('.AppNav').css({"left" : "0px","transition":"left .5s"});
            $('.HamburgerMenu > a').css({"top" : "15px", "transistion": "top .5s"})
            Collapsed = false;
        }
    });
});