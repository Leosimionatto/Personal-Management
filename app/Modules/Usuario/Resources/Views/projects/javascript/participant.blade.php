<script>
    $(document).ready(function(){
        $('.cancel').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            cancelParticipationModal(id);
        });
    });

    $(document).on('click', '.confirm-cancel', function(event){
        event.preventDefault();
        event.stopPropagation();

        var id = $(this).attr('data-id');

        cancelParticipation(id);
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
</script>