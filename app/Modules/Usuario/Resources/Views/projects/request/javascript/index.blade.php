<script>
    $(document).ready(function(){
        $('.edit').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            editParticipationModal(id);
        });

        $('.cancel').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            cancelParticipationModal(id);
        });
    });

    $(document).on('click', '.confirm', function(event){
        event.preventDefault();
        event.stopPropagation();

        var form = $('.edit-participation-form');

        var condition = true;

        form.find(':input').not('.not-required').each(function(){
            var value = $(this).val();

            $(this).removeClass('warning');
            $(this).parent().find('.invalid-field').remove();

            if(!value || value === ''){
                $(this).addClass('warning');
                $(this).parent().append('<p class="invalid-field">Este campo é obrigatório</p>');

                condition = false;
            }
        });

        if(!condition){
            return false;
        }

        editParticipation(form.serializeArray());
    });

    $(document).on('click', '.confirm-cancel', function(event){
        event.preventDefault();
        event.stopPropagation();

        var id = $(this).attr('data-id');

        cancelParticipation(id);
    });

    // Method to get Edit Participation Modal
    function editParticipationModal(id)
    {
        var request = $.ajax({
            url: '{{ route('modal.edit-participation-request') }}',
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

    // Method to edit Participation Request
    function editParticipation(form)
    {
        var request = $.ajax({
            url: '{{ route('project.request.edit', $id) }}',
            method: 'POST',
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
</script>