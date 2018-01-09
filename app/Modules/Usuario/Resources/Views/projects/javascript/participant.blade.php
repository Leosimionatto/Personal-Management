<script>
    $(document).ready(function(){
        $('.cancel').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            cancelParticipationModal(id);
        });

        $('.add-participant').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            addParticipantModal();
        });

        $('.edit-participant').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            editParticipantModal(id);
        });
    });

    $(document).on('click', '.confirm-cancel', function(event){
        event.preventDefault();
        event.stopPropagation();

        var id = $(this).attr('data-id');

        cancelParticipation(id);
    });

    $(document).on('click', '.check-user', function(event){
        event.preventDefault();
        event.stopPropagation();

        checkUser($('.participant-email').val());
    });

    $(document).on('click', '.check-again', function(event){
        event.preventDefault();
        event.stopPropagation();

        $('.participant-email').val('');
        $('.nmusuario').html('Exemplo');
        $('.email').html('exemplo@exemplo.com.br');
        $('.documento').html('000.000.000-00');

        $('.add-participant-actions').html('<button class="confirm-button not-required check-user">Verificar existência <i class="fa fa-globe white"></i></button>');
    });

    $(document).on('click', '.confirm-participant', function(event){
        event.preventDefault();
        event.stopPropagation();

        addParticipant($('.participant-email').val());
    });

    $(document).on('click', '.confirm-changes', function(event){
        event.preventDefault();
        event.stopPropagation();

        var form = $('.edit-participant-form');
        var condition = true;

        form.find(':input').not('.not-required').each(function(){
            var value = $(this).val();

            $(this).removeClass('warning');
            $(this).parent().find('.invalid-field').remove();

            if(!value || value === ''){
                $(this).addClass('warning');
                $(this).parent().append('<p class="invalid-field">Este campo é obrigatório</p>')

                condition = false;
            }
        });

        if(condition){
            editParticipant(form.serializeArray());
        }
    });

    // Method to get Cancel Participation Modal
    function cancelParticipationModal(id)
    {
        var request = $.ajax({
            url: '{{ route('modal.cancel-participation-request') }}',
            method: 'GET',
            data: {id:id}
        });

        request
            .done(function(response){
                if(response.html){
                    var modal = $('.actual-modal');

                    modal.html(response.html);

                    modal.modal('show');
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to cancel Participation Request
    function cancelParticipation(id)
    {
        var request = $.ajax({
            url: '{{ route('project.request.cancel', $id) }}',
            method: 'POST',
            data: {id:id}
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.reload();
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to call Participant Modal
    function addParticipantModal()
    {
        var request = $.ajax({
            url: '{{ route('modal.add-participant') }}',
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                if(response.html){
                    var modal = $('.actual-modal');

                    modal.html(response.html);

                    modal.modal('show');
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to call Edit Participant Modal
    function editParticipantModal(id)
    {
        var request = $.ajax({
            url: '{{ route('modal.edit-participant') }}',
            method: 'GET',
            data: {id:id}
        });

        request
            .done(function(response){
                if(response.html){
                    var modal = $('.actual-modal');

                    modal.html(response.html);

                    modal.modal('show');
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to check if User exists by E-mail
    function checkUser(email)
    {
        var input = $('.participant-email');

        input.removeClass('warning');
        input.parent().find('.invalid-field').remove();

        var request = $.ajax({
            url: '{{ url('usuario/checar-participacao-usuario') }}',
            method: 'GET',
            data: {'email': email, 'id': '{{ $id }}'}
        });

        $('.nmusuario').html('Exemplo');
        $('.email').html('exemplo@exemplo.com.br');
        $('.documento').html('000.000.000-00');

        request
            .done(function(response){
                if(response.status === '00'){
                    $('.add-participant-actions').html(
                        '    <button class="warning-button space-right-4 not-required check-again">Buscar Novamente <i class="fa fa-remove white"></i></button>\n' +
                        '    <button class="success-button confirm-participant not-required">Confirmar <i class="fa fa-check white"></i></button>\n'
                    );

                    $('.nmusuario').html(response.user.nome);
                    $('.email').html(response.user.email);
                    $('.documento').html(response.user.documento);
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

    // Method to add an Participant by E-mail
    function addParticipant(email)
    {
        var request = $.ajax({
            url: '{{ route('project.participant.add', $id) }}',
            method: 'POST',
            data: {email:email}
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.reload();
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to edit an Participant
    function editParticipant(form)
    {
        var request = $.ajax({
            url: '{{ route('project.participant.edit', $id) }}',
            method: 'PUT',
            data: form
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.reload();
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }
</script>