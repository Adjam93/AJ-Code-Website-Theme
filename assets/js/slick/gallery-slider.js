jQuery( document ).ready( function( $ ) {

   //Slick Slider settings
    $( '.gallery-img' ).slick( {
        arrows: true,
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<button class="slider-btn slide-arrow prev-arrow"><span class="left-arr">&#8592;</span></button>',
        nextArrow: '<button class=" slider-btn slide-arrow next-arrow"><span class="right-arr">&#8594;</span></button>',
        lazyLoad: 'ondemand',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });

    //Slick Slider lightbox
    $( '.gallery-img' ).slickLightbox( {
        src: 'data-src',
        itemSelector: '.item img',
        lazy: true,
        background: 'rgba(0, 0, 0, 0.92)'
    } );

} );