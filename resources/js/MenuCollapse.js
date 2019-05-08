$(function () {
    let Collapsed = false;

    $('.BackHeader > h3').on('click', function() {

        if (!Collapsed) {
            $('.AppNav').toggle();
            $('.Content').css({"width" : "100%", "left" : "0px"})
            Collapsed = true;
        } else if (Collapsed) {
            $('.AppNav').toggle();
            $('.Content').css({"width" : "calc(100% - 280px)", "left" : "280px"})
            Collapsed = false;
        }
    });
});