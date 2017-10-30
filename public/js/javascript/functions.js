$(window).on('load', function(){
    $('.dropdown').click(function() {
        $(this).find('.dropdown-menu').toggle();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.nicEdit-main').each(function(){
        $(this).on('focusout', function(){
            var content = $(this).text();

            $(this).parent().parent().find('textarea').text(content);
        });

        $(this).focus(function(){
            var group = $(this).parent().parent();

            $(this).parent().css('borderColor', 'rgb(204, 204, 204)');
            $(this).parent().css('borderTop', 'none');

            group.find('.invalid-field').remove();
        });
    });

    $('.ms-parent').each(function(){
        $(this).removeClass('required');
    });
});
