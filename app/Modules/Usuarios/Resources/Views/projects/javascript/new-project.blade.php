<script>
    $(window).on('load', function(){
        var url = $('.steps').attr('data-href');

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
                    form[index] = $(this).find(':input').not('#tecnologias').serializeArray();
                });

                var values = $('#tecnologias').multipleSelect('getSelects', 'array');
                var select = [];

                $.each(values, function(index, value){
                    select[index] = {name:'tecnologias', value:value};
                });

                form[0].push(select);

                ajax_request(url, form);
            }
        });

        function ajax_request(url, form)
        {
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
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
                error: function(response){
                    // Do nothing
                }
            });
        }

        $('#tecnologias').multipleSelect({
            'placeholder':'Tecnologias a serem utilizadas',
            'width':'100%'
        });

        $('.ms-parent').removeClass('required');

        $('.ms-parent').focusin(function(){
            $(this).removeClass('warning');
            $(this).parent().find('.invalid-field').remove();
        });
    });
</script>