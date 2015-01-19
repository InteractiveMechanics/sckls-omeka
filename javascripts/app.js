$(document).ready(function(){
    $('.search-overlay-button').on('click', function(){
        $('#search-overlay').fadeToggle(400);
    });
    $('input[name="search-type"]').on('click', function(){
        var type = $(this).attr('id');
        if (type === 'search-library'){
            $('#search-library-container').removeClass('hidden');
            $('#search-omeka-container').addClass('hidden');
            $('.gsc-input').attr('placeholder', 'Search all sites');
        } else if (type === 'search-omeka'){
            $('#search-library-container').addClass('hidden');
            $('#search-omeka-container').removeClass('hidden');
        }
    });
    $('#search-overlay').on('click', '.close', function(){
        $('#search-overlay').fadeToggle(400); 
    });
    $('input.gsc-input').attr('placeholder', 'Search all sites');

    $('.items-list').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        touchMove: true,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 660,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    $("#image-gallery").lightGallery({
        mode:"fade",
        lang: { allPhotos: 'All files' }
    });

    $('.link-to-exhibit').each(function() {
        var html = $(this);
        $(this).prev().append(html);
    });

    $('.navbar .navbar-nav').find('a[href*="http://"]').attr('target','_blank');
});