$(function(){

console.log('[SmoothScroll] Started Loading...');

var Doc = $(document),
    Navigation = $('.navbar'),
    ToTop = $('.ToTop'),
    Link = $('.linkie');

Doc.on('scroll', function(){
    if ( Doc.scrollTop() > 60 ){
        ToTop.fadeIn();
        Navigation.removeClass('navbar-custom');
        Navigation.removeClass('navbar-custom-opacity');
        Navigation.addClass('navbar-custom-solid');
    }
    else {
        ToTop.fadeOut();
        Navigation.removeClass('navbar-custom');
        Navigation.removeClass('navbar-custom-solid');
        Navigation.addClass('navbar-custom-opacity');
    }
});
  
Link.click(function(e){
    e.preventDefault();
    if(Doc.width() < 768) {
        $('body, html').animate({
            scrollTop: $(this.hash).offset().top - 320
        }, 500);
    } else {
        $('body, html').animate({
            scrollTop: $(this.hash).offset().top
        }, 500);
    }
});

   console.log('[SmoothScroll] Finisehd Loading');

});