(function ($) {
    'use strict';
    $(window).on('load', function () {
        $('#preloader').delay(1000).fadeOut('slow');
        $('#preloader').delay(1000).css({
            'overflow': 'visible'
        });
        setTimeout(function () {
            $('#course_app').removeClass('d-none');
        },1000);
    });
})(jQuery);
const particles = Particles.init({
    selector: ".background_preloader",
    color: ["#03dac6", "#ff0266", "#000000"],
    // connectParticles: true,
    responsive: [
        {
            breakpoint: 768,
            options: {
                color: ["#faebd7", "#03dac6", "#ff0266"],
                maxParticles: 60,
                connectParticles: false,
            },
        },
    ],
});


