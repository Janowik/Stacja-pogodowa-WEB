<!--Przewijanie-->
$(document).ready(function () {
    $('.slide-section').click(function(f){
        var link = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(link).offset().top
        }, 700);
        f.preventDefault();
    });
});
