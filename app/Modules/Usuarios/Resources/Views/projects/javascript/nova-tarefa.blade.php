<script>
    $(window).on('load', function(){
        var i = 1;
        var url = $('.steps').attr('data-href');
        var steps = [];

        $('.add-step').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var step_information = [];

            $('.step-information').find(':input').not('button').each(function(){
                var value = $(this).val();
                var nicEditCheck = $(this).parent().find('.nicEdit-main');

                if(!value){
                    step_information = [];

                    if(nicEditCheck.length > 0){
                        nicEditCheck.parent().css('border', '0');
                        nicEditCheck.parent().css('border', '1px solid #c44d58');
                    }else{
                        var hasClass = $(this).hasClass('warning');

                        if(!hasClass){
                            $(this).addClass('warning');
                        }
                    }

                    $(this).parent().find('.invalid-field').remove();
                    $(this).parent().append('<p class="invalid-field">Preencha este campo para prosseguir!</p>');

                    if(i >= 1){
                        i--;
                    }
                }else{
                    var array = {name: $(this).attr('name'), value: $(this).val()};

                    step_information.push(array);
                }
            });

            if(step_information.length > 0){
                steps.push(step_information);

                var step_name = $('.step-information').find('#nome').val();

                var table_cell = '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + step_name + '</td>' +
                    '<td><a href="" class="edit-step"><i class="fa fa-edit"></i></a></td>' +
                    '<td><a href="" class="delete-step"><i class="fa fa-remove"></i></a></td>' +
                    '</tr>';

                if(i === 1){
                    $('.steps-list').html(table_cell);
                }else{
                    $('.steps-list').append(table_cell);
                }
            }

            i++;
        });

        $('.submit-form').click(function(){
            var validation = $('.submit-form').parent().parent();

            validation.find('.required').each(function(){

                $(this).parent().find('.invalid-field').remove();

                if($(this).val() == '' || $(this).val() == null){
                    $(this).removeClass('warning').addClass('warning');
                    $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');
                }
            });

            if(validation.find('.warning').length === 0){
                var form = [];

                $('.steps').find('form').each(function(index){
                    form[index] = $(this).serializeArray();
                });

                ajax_request(url, form);
            }
        });

        function ajax_request(url, form)
        {
            $.ajax({
                url: url,
                method: 'POST',
                data: {'form': form},
                success: function(data){
                    if(data.status === '00'){
                        window.location.reload();
                    }
                    if(data.error){
                        $('.insert-errors').empty();

                        if(data.error instanceof Array){
                            $.each(data.error, function(index, value){
                                $('.insert-errors').append('<li>' + value + '</li>');
                            });
                        }else{
                            $('.insert-errors').append('<li>' + data.error + '</li>');
                        }

                        $('.insert-errors-alert').show();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });
</script>