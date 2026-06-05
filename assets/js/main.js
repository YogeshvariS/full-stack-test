$(document).ready(function () {

    $('.content-slider').slick({
        arrows: true,
        fade: true,
        infinite: false,
        asNavFor: '.image-slider'
    });

    $('.image-slider').slick({
        arrows: false,
        fade: true,
        infinite: false,
        asNavFor: '.content-slider'
    });

});