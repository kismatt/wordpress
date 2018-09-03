jQuery(document).ready(function(){
    jQuery(".menu-button").click(function(){
        jQuery(".overlay").fadeToggle(400);
       jQuery(this).toggleClass('btn-open').toggleClass('change');
    });
});