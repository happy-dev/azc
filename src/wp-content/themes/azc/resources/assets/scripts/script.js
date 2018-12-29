jQuery( document ).ready(function() {

    console.log( "ready!" );

    jQuery('.enter-button').click(function() {
        jQuery('.home-content').addClass("clicked");
		setTimeout(()=>jQuery('.enter-button a').attr("href", "azc"));
    });
});