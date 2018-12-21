
jQuery( document ).ready(function() {
    console.log( "ready!" );

    jQuery('.enter-button').click(function() {
        $('.home-content').addClass("clicked");
    });

});