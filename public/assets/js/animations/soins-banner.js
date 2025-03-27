$(document).ready(function() {

    $('.spa-banner-soin').addClass('visible');

    $('.service-soin-image').each(function(index) {
        var delay =0.2 *(index+1);
        $(this).css({
            'animation-delay': delay + 's',
            'opacity': '1',
            'transform': 'translateY(0)'
        });
    });
});