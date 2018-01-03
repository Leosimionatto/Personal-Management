$(document).ready(function(){
    var dropdown_menu = $('.dropdown-menu');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.ms-parent').each(function(){
        $(this).removeClass('required');
    });

    $('.summernote').summernote({
        height: 180,
        focus: true,
        resize:false,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']]
        ],
        disableResizeEditor: true
    });

    $('.note-editor').on('click', function(){
        $(this).removeClass('warning');
        $(this).parent().find('.invalid-field').remove();
    });

    $('.dropdown').click(function() {
        $(this).find('.dropdown-menu').toggle();
    });

    dropdown_menu.on('click', function (event){
        if(!event.target.parentNode.href && !event.target.parentNode.parentNode.href){
            event.preventDefault();
            event.stopPropagation();

            return false;
        }
    });

    $('body').on('click', function(e){
        if(!dropdown_menu.is(e.target) && dropdown_menu.has(e.target).length === 0 && !$('.open-notifications').is(e.target)){
            dropdown_menu.hide();
        }
    });

    $('.overflow-auto').on('mousewheel DOMMouseScroll', function (e) {
        var e0 = e.originalEvent;
        var delta = e0.wheelDelta || -e0.detail;

        this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
        e.preventDefault();
    });
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
