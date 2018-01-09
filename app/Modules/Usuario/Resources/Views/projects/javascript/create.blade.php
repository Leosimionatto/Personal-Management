<script>
    var participants = [];

    $(document).ready(function(){
        var steps = $('.steps');
        var url = steps.attr('data-href');

        // Div who has the list of participants
        var list = $('.participants-list');

        // Input to add participants
        var input = $('#participantes');

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
                    form[index] = $(this).find(':input').not('#tecnologias').not('#participantes').serializeArray();
                });

                var values = $('#tecnologias').multipleSelect('getSelects', 'array');
                var select = [];

                $.each(values, function(index, value){
                    select[index] = {name:'tecnologias', value:value};
                });

                form[0].push(select);
                form[0].push(participants);

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

        // Method to add an Participant
        function newParticipant(email)
        {
            var exists = participants.filter(function(element){
                return element.value === email;
            });

            input.parent().find('.invalid-field').remove();

            if(exists.length === 0){
                participants.push({name:'participantes', value:email});

                list.append('<li><b>E-mail:</b> ' + email + ' <a href="" data-email="' + email + '" class="space-left-6 remove-participant">Remover participante</a></li>');
            }else{
                input.addClass('warning');
                input.parent().append('<p class="invalid-field" style="display:table-row">Este participante já foi adicionado.</p>');
            }
        }

        // Method to check if User exists by Email
        function checkUser(email)
        {
            input.removeClass('warning');
            input.parent().find('.invalid-field').remove();

            var request = $.ajax({
                url: '{{ url('usuario/checar-email-usuario') }}',
                method: 'GET',
                data: {'email': email}
            });

            request
                .done(function(response){
                    if(response.status === '00'){
                        newParticipant(email);
                    }
                    if(response.status === '01'){
                        input.addClass('warning');
                        input.parent().append('<p class="invalid-field" style="display:table-row">' + response.message + '</p>');
                    }
                })
                .fail(function(response){
                    //Do nothing
                });
        }
    });

    $(document).on('click', '.remove-participant', function(e){
        e.preventDefault();
        e.stopPropagation();

        var key = $(this).attr('data-email');

        $(this).parent().remove();

        participants = participants.filter(function(element){
            return element.value !== key;
        });
    });
</script>
