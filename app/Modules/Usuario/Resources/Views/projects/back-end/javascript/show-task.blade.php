<script>
    var actions_hide = {
        1: [5, 6],
        2: [2, 5, 6],
        3: [3],
        5: [2, 5, 6],
        6: [5, 6]
    };

    $(document).ready(function(){
        var stepobj = JSON.parse('{!! json_encode($task->steps()->first()) !!}');

        $('.step-information').on('click', function(){
            var data = {
                id: $(this).attr('data-id'),
                name: $(this).attr('data-name')
            };

            step(data);
        });

        $('.update-situation').each(function(){
            $(this).on('click', function(event){
                event.preventDefault();

                var idetapa = $(this).attr('data-id');
                var idsituacao = $(this).attr('data-code');

                editStepModal(idetapa, idsituacao);
            });
        });

        $('.create-comment').on('click', function(event){
            event.preventDefault();

            var idetapa = $(this).attr('data-id');

            createCommentModal(idetapa);
        });

        $('.update-time-spent').on('click', function(event){
            event.preventDefault();

            var idetapa = $(this).attr('data-id');

            updateTimeSpentModal(idetapa);
        });

        step({id: stepobj.id, name: stepobj.nmetapa});
    });

    $(document).on('click', '.confirm-status-update', function(event){
        event.preventDefault();
        event.stopPropagation();

        var form = $(this).closest('form').serializeArray();

        updateStepStatus(form);
    });

    $(document).on('click', '.submit-comment', function(event){
        event.preventDefault();
        event.stopPropagation();

        var form = $('.create-comment-form');
        var condition = true;

        form.find('.required-summernote').each(function(){
            var value = $(this).summernote('isEmpty');

            $(this).parent().find('.invalid-field').remove();
            $(this).parent().find('.note-frame').removeClass('warning');

            if(value){
                $(this).parent().find('.note-frame').addClass('warning');
                $(this).parent().append('<p class="invalid-field">Este campo é obrigatório!</p>');

                condition = false;
            }
        });

        if(condition){
            addComment(form.serializeArray());
        }
    });

    // Method to get Step Information by passed id
    function step(data){
        $('.step-name').html(data.name);

        var request = $.ajax({
            url: '{{ url('usuario/ajax/etapa') }}' + '/' + data.id,
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                $('.action').each(function(){
                    $(this).show();
                });

                actions_hide[response.code].forEach(function(value){
                    $('.action[data-code="' + value + '"]').hide();
                });

                $('.step-explanation').html(response.html);
            })
            .fail(function(response){
                // Do nothing
            });

        updateActionsId(data.id);
    }

    // Method to update actual step id in actions
    function updateActionsId(id)
    {
        $('.action').each(function(){
            $(this).attr('data-id', id);
        });
    }

    // Method to get edit step Modal
    function editStepModal(idetapa, idsituacao){
        var request = $.ajax({
            url: '{{ url('usuario/ajax/etapa') }}' + '/' + idetapa + '/editar',
            method: 'GET',
            data: {situacao: idsituacao}
        });

        request
            .done(function(response){
                var modal = $('.actual-modal');

                modal.html(response.html);

                modal.modal('show');
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to get update Time Spent Modal
    function updateTimeSpentModal(idetapa, idsituacao){
        var request = $.ajax({
            url: '{{ url('usuario/ajax/etapa') }}' + '/' + idetapa + '/tempo/adicionar',
            method: 'GET',
            data: {situacao: idsituacao}
        });

        request
            .done(function(response){
                var modal = $('.actual-modal');

                modal.html(response.html);

                modal.modal('show');
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to get edit step Modal
    function createCommentModal(idetapa){
        var request = $.ajax({
            url: '{{ url('usuario/ajax/etapa/') }}' + '/' + idetapa + '/comentario/adicionar',
            method: 'GET',
            data: {}
        });

        request
            .done(function(response){
                var modal = $('.actual-modal');

                modal.html(response.html);

                modal.modal('show');
            })
            .fail(function(response){
                // Do nothing
            });
    }

    function addComment(form)
    {
        var request = $.ajax({
            url: '{{ route('step.comment.create') }}',
            method: 'POST',
            data: form
        });

        $('.create-comment-error').empty();

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.reload();
                }

                if(typeof response === 'object' && response.message){
                    var error = $('.create-comment-error');

                    error.append('<li class="invalid-field">' + response.message + '</li>');

                    error.show();

                    error.fadeOut(6000);
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }

    // Method to update Step Status
    function updateStepStatus(form)
    {
        var request = $.ajax({
            url: '{{ url('usuario/etapa/status/atualizar') }}',
            method: 'PUT',
            data: {idsituacao: form[1].value, idetapa: form[0].value}
        });

        $('.error').empty();

        request
            .done(function(response){
                if(response.status === '00'){
                    window.location.reload();
                }

                if(typeof response === 'object' && response.message){
                    var error = $('.error');

                    error.append('<li class="invalid-field">' + response.message + '</li>');

                    error.show();

                    error.fadeOut(6000);
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }
</script>