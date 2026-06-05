$(document).ready(function () {

    function initializeSliders() {

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
                let image = $(this).data('image');

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

});