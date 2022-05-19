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

    $(document).on('change', '#checkbox_all', function(event) {
        if($(this).prop('checked')) {
            $('input.checkbox_img').prop('checked', true);
        } else {
            $('input.checkbox_img').prop('checked', false);
        }
    })

    $(document).on('submit', '.form-save-parser-wallpapers', function(event) {
        event.preventDefault();

        let url = $('#form_save_parser_wallpapers').attr('action');
        let token = $('input[name="_token"]').val();
        let response_json = $('input[name="response_json"]').val();
        let category_id = $('select[name="category_id"]').val();
        let image_ids = [];

        $('input.checkbox_img:checked').each(function() {
            image_ids.push($(this).val());
        })

        $.ajax({
            headers: {'X-CSRF-TOKEN': token},
            type: 'POST',
            url: url,
            data: {
                response_json: response_json,
                category_id: category_id,
                image_ids: image_ids
            },
            success: function(res) {
                console.log(res);
            }
        })
    })



});
