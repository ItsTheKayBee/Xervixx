$('.emi_tracker').ready(function() {
    $('.emi_tracker').animate({
        scrollLeft: $('.upnext').offset().left
    }, 1000, function() {
    });
});