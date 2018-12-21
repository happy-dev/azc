jQuery( document ).ready(function() {

    console.log( "ready!" );

    jQuery('.enter-button').click(function() {
        jQuery('.home-content').addClass("clicked");
    });

});