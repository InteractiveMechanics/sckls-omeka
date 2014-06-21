$(document).ready(function(){
    $('#homepage-slideshow-container').tinycarousel({
        animationTime: 600
    });

    // Setup sidebar classes and bind events
    $('.sidebar ul.nav > li.active').addClass('expanded');
    $('.sidebar ul.nav > li').on('click', function() {
        $('.sidebar ul.nav > li').removeClass('expanded');
        $(this).addClass('expanded');
    });
});