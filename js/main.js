
$(function() {
    $('#slides').slidesjs({
        width: 960,
        height: 220,
        navigation: {
            active: false,
        },
        pagination: {
            active: false
        },
        effect: {
            fade: {
                speed: 1800
            }
        },
        play: {
            effect: "fade",
            auto: true
        }
    });
});