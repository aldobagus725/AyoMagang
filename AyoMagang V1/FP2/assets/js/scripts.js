jQuery(document).ready(function() { 
    $(window).scroll(function() {
        if ($(document).scrollTop() > 500) {
            $(".navbar-no-bg").css("background", "#444");
        } else {
            $(".navbar-no-bg").css("background", "rgba(0, 0, 0, 0.2)");
        }
    });
    new WOW().init();
});