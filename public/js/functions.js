$(document).ready(function() {

    $('.seo-main-open').click(function(event) {
        event.preventDefault()
        $('.seo-main').toggleClass('hide');
        //$('.seo-main').slideToggle('slow');
        if ($('.seo-main').hasClass('hide')) {
			$('.seo-main-open').html('Читать далее');
		} else {
			$('.seo-main-open').html('Скрыть');
		}
		return false;
    });





});
