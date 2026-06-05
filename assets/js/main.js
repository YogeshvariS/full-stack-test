$(document).ready(function () {

    function initializeSliders() {

        $('.content-slider').slick({
            arrows: false,
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

        $('.prev-arrow').click(function () {
            $('.content-slider').slick('slickPrev');
        });

        $('.next-arrow').click(function () {
            $('.content-slider').slick('slickNext');
        });

    }

    function loadSlides(categoryId) {

        // Destroy existing sliders if initialized

        if ($('.content-slider').hasClass('slick-initialized')) {
            $('.content-slider').slick('unslick');
        }

        if ($('.image-slider').hasClass('slick-initialized')) {
            $('.image-slider').slick('unslick');
        }

        // Empty sliders

        $('.content-slider').html('');
        $('.image-slider').html('');

        // Loop through hidden data

        $('.slide-data').each(function () {

            let slideCategory = $(this).data('category');

            if (slideCategory == categoryId) {

                let title = $(this).data('title');
                let description = $(this).data('description');
                let image = window.location.origin + '/full-stack-test/' + $(this).data('image');
                // Content slide

                $('.content-slider').append(`

                    <div class="slide-item">

                        <h2>${title}</h2>

                        <p>${description}</p>

                    </div>

                `);

                // Image slide

                $('.image-slider').append(`

                    <div class="image-item">

                        <img src="${image}" alt="">

                    </div>

                `);
            }

        });

        // Reinitialize sliders

        initializeSliders();
    }

    // Load first category by default

    let firstCategory = $('.tab-btn.active').data('category');

    loadSlides(firstCategory);

    // Tab click

    $('.tab-btn').click(function () {

        $('.tab-btn').removeClass('active');

        $(this).addClass('active');

        let categoryId = $(this).data('category');

        loadSlides(categoryId);

    });

    function loadMobileSliders() {

        $('.mobile-slider').each(function () {

            let categoryId = $(this).data('category');

            let slider = $(this);

            slider.html('');

            $('.slide-data').each(function () {

                let slideCategory = $(this).data('category');

                if (slideCategory == categoryId) {

                    let title = $(this).data('title');
                    let description = $(this).data('description');
                    let image = window.location.origin + '/full-stack-test/' + $(this).data('image');
                    slider.append(`

                        <div class="mobile-slide">

                            <div
                                class="mobile-slide-bg"

                                style="background-image: url('${image}');"
                            >

                                <div class="mobile-overlay">

                                    <h2>${title}</h2>

                                    <p>${description}</p>

                                </div>

                            </div>

                        </div>

                    `);
                }

            });

            slider.slick({
                arrows: false,
                dots: true,
                infinite: false
            });

        });

    }

    loadMobileSliders();   
    $('#mobileAccordion').on('shown.bs.collapse', function () {

        $('.mobile-slider').slick('setPosition');

    }); 

});