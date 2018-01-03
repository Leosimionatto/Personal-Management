<script>
    $(document).ready(function(){
        $('.edit').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            participationModal(id);
        });
    });

    $(document).on('click', '.confirm', function(event){
        event.preventDefault();
        event.stopPropagation();

        var form = $('.edit-participation-form');

        var condition = true;

        form.find(':input').not('button').each(function(){
            var value = $(this).val();

            $(this).parent().find('.invalid-field').remove();
            $(this).removeClass('warning');

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

    function participationModal(id)
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
</script>