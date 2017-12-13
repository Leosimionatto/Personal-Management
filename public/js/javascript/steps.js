$(document).ready(function(){
    var count = 1;
    var steps = $('.steps');
    var tot_forms = steps.find('form').length;

    // Colocando as divs que conterão as ações e os títulos das etapas em seus lugares específicos
    steps.prepend('<div class="steps-titles"></div>');

    steps.find('form').each(function(){

        // Colocando o título de cada uma das etapas no header da página
        var title = $(this).find('h4').text();

        $(this).find('h4').remove();
        $('.steps-titles').append('<div class="step-title-box step-' + count + '-title">' + count + 'º - ' + title + '</div>');

        // Adicionando o menu inferior que conterá as ações da etapa
        $(this).append('<div class="actions step-actions-' + count + '"></div>');

        // Adicionando a classe que nomeia este formulário em específico
        $(this).addClass('hidden');
        $(this).addClass('step-' + count);

        // Adicionando as classes referente aos cabeçalhos
        $('.step-' + count + '-title').addClass('collapse');

        if(count === 1){
            $(this).removeClass('hidden');
            $('.step-' + count + '-title').removeClass('collapse');
        }

        // Colocar os botões de ação na div de ações
        if(count === 1){
            $('.step-actions-' + count).append('<button type="button" class="btn btn-primary next">Próxima página <i class="fa fa-arrow-right white"></i></button>');
        }else if(count > 1 && count < tot_forms){
            $('.step-actions-' + count).append('<button type="button" class="btn btn-primary previous"><i class="fa fa-arrow-left white"></i> Página anterior</button>');
            $('.step-actions-' + count).append('<button type="button" class="btn btn-primary next">Próxima página <i class="fa fa-arrow-right white"></i></button>');
        }else{
            $('.step-actions-' + count).append('<button type="button" class="btn btn-primary previous"><i class="fa fa-arrow-left white"></i> Página anterior</button>');
            $('.step-actions-' + count).append('<button type="button" class="btn btn-primary submit-form">Finalizar <i class="fa fa-arrow-right white"></i></button>');
        }

        count++;
    });

    $('.next').click(function(event){
        var parent = $(this).parent().parent();
        var actual = parent.attr('class').substring('5') * 1;
        var next = actual + 1;

        $(parent).find('.required-summernote').each(function(){
            var value = $(this).summernote('isEmpty');

            $(this).parent().find('.invalid-field').remove();
            $(this).parent().find('.note-frame').removeClass('warning');

            if(value){
                $(this).parent().find('.note-frame').addClass('warning');
                $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
            }
        });

        $(parent).find('select.required-multiple-select').each(function(){
            var value = $(this).find(':selected');
            var ms_choice = $(this).parent().find('.ms-choice');

            ms_choice.removeClass('warning');
            $(this).parent().find('.invalid-field').remove();

            if(value.length === 0){
                var condition = ms_choice.hasClass('warning');

                if(!condition){
                    ms_choice.addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                }
            }
        });

        $(parent).find('.required').each(function(){
            var value = $(this).val();

            $(this).removeClass('warning');
            $(this).parent().find('.invalid-field').remove();

            if(value === '' || value === '-1'){
                $(this).addClass('warning');
                $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
            }
        });

        if(parent.find('.warning').length > 0){
            event.preventDefault();
            event.stopPropagation();
            return false;
        }

        $('.step-' + actual + '-title').addClass('collapse');
        $('.step-' + next + '-title').removeClass('collapse');

        parent.addClass('hidden');
        $('.step-' + next).removeClass('hidden');
    });

    $('.previous').click(function(){
        var next = actual + 1;
        var parent = $(this).parent().parent();
        var actual = parent.attr('class').substring('5') * 1;
        var previous = actual - 1;

        $('.step-' + actual + '-title').addClass('collapse');
        $('.step-' + previous + '-title').removeClass('collapse');

        parent.addClass('hidden');
        $('.step-' + previous).removeClass('hidden');
    });

    $('.steps-titles').find('.step-title-box').each(function(){
        $(this).click(function(){
            var next = $(this).attr('class').split(/\s+/)[1].split('-')[1];
            var actual = $('.steps-titles').find('.step-title-box').not('.collapse').attr('class').split(/\s+/)[1].split('-')[1];
            var form = $('.step-' + actual);

            if(next > actual){
                $(form).find('.required-summernote').each(function(){
                    var value = $(this).summernote('isEmpty');

                    $(this).parent().find('.invalid-field').remove();
                    $(this).parent().find('.note-frame').removeClass('warning');

                    if(value){
                        $(this).parent().find('.note-frame').addClass('warning');
                        $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                    }
                });

                $(form).find('select.required-multiple-select').each(function(){
                    var value = $(this).find(':selected');
                    var ms_choice = $(this).parent().find('.ms-choice');

                    ms_choice.removeClass('warning');
                    $(this).parent().find('.invalid-field').remove();

                    if(value.length === 0){
                        var condition = ms_choice.hasClass('warning');

                        if(!condition){
                            ms_choice.addClass('warning');
                            $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                        }
                    }
                });

                $(form).find('.required').each(function(){
                    var value = $(this).val();

                    $(this).removeClass('warning');
                    $(this).parent().find('.invalid-field').remove();

                    if(value === '' || value === '-1'){
                        $(this).addClass('warning');
                        $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                    }
                });

                if(form.find('.warning').length > 0){
                    event.preventDefault();
                    event.stopPropagation();
                    return false;
                }

                $('.step-' + actual + '-title').addClass('collapse');
                $('.step-' + next + '-title').removeClass('collapse');

                form.addClass('hidden');
                $('.step-' + next).removeClass('hidden');

            }else if(actual > next){
                $('.step-' + actual + '-title').addClass('collapse');
                $('.step-' + next + '-title').removeClass('collapse');

                form.addClass('hidden');
                $('.step-' + next).removeClass('hidden');
            }
        });
    });

    steps.find(':input').each(function(){
        $(this).focus(function(){
            var group = $(this).parent();

            $(this).removeClass('warning');
            group.find('.invalid-field').remove();
        });
    });
});

function ajax_request(url, form, callback)
{
    var list = $('.insert-errors');

    call_ajax(form, function(result){
        var post = $.extend({}, result);

        $.ajax({
            url: url,
            method: 'POST',
            data: post,
            success: function(data){
                if(data.status === '00'){
                    callback(data);
                }

                if(data.status === '01'){
                    list.empty();

                    list.append('<li>' + data.message + '</li>');

                    $('.insert-errors-alert').show();
                }
            },
            error: function(response){
                if(response && response.responseJSON.errors){
                    list.empty();

                    var errors = $.map(response.responseJSON.errors, function(value, index) {
                        return [value];
                    });

                    if(errors instanceof Array){
                        $.each(errors, function(index, value){
                            list.append('<li>' + value + '</li>');
                        });
                    }

                    $('.insert-errors-alert').show();
                }
            }
        });
    })
}

function call_ajax(form, cb)
{
    var post = [];

    form.forEach(function(data){
        data.forEach(function(subform){
            if(subform.name && subform.value){
                post[subform.name] = subform.value;
            }else{
                var i = 0;
                if(subform && subform.length > 0){
                    subform.forEach(function(value){
                        if(!(post[value.name] instanceof Array)){
                            post[value.name] = [];
                        }

                        post[value.name][i] = value.value;
                        i++;
                    });
                }
            }
        });
    });

    cb(post);
}
