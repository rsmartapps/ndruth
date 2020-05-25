jQuery(function($){
    $('.card.h-100.shadow > img').each(function(i) {
        img = jQuery(this);
        img.removeClass();
        img.addClass('card-img-top mh-100');
        img.removeAttr('width');
        img.removeAttr('height');
        img.removeAttr('style');
        img.removeAttr('sizes');
        img.attr('preserveaspectratio','xMidYMid slice');
        img.wrap( '<div class="d-flex align-items-center" style="height:250px"></div>' );
    });
});