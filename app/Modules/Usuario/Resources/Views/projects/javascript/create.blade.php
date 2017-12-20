<script>
    $(document).ready(function(){
        var steps = $('.steps');
        var url = steps.attr('data-href');
        var participants = {};

        $('.submit-form').click(function(){
            steps.find('.required').each(function(){
                var value = $(this).val();

                $(this).parent().find('.invalid-field').remove();

                if(value === '' || value === null){
                    $(this).removeClass('warning').addClass('warning');
                    $(this).parent().append('<p class="invalid-field" style="display:table-row">Este campo é obrigatório!</p>');
                }
            });
;
            if(Object.keys(participants).length !== 0){
                var div = $('#participantes');

                div.removeClass('warning');
                div.parent().find('.invalid-field').remove();
            }

            if(steps.find('.warning').length === 0){
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

                ajax_request(url, form, function(response){
                    if(response.status === '00'){
                        window.location.href = '{{ url('usuario/projeto') }}' + '/' + response.id;
                    }
                });
            }
        });

        $('.add-participant').on('click', function(e){
            e.preventDefault();
            e.stopPropagation();

            checkUser($('.participant').val());
        });

        $('#tecnologias').multipleSelect({
            'placeholder':'Tecnologias a serem utilizadas',
            'width':'100%'
        });

        $('.ms-parent').focusin(function(){
            $(this).find('.ms-choice').removeClass('warning');
            $(this).parent().find('.invalid-field').remove();
        });

        // Method to check if User exists by Email
        function checkUser(email)
        {
            var request = $.ajax({
                url: '{{ url('usuario/checar-email-usuario') }}',
                method: 'GET',
                data: {'email': email}
            });

            request
                .done(function(response){
                    console.log(response);
                })
                .fail(function(response){
                    console.log(response);
                });
        }
    });
</script>
