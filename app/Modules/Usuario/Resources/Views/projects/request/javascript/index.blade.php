<script>
    $(document).ready(function(){
        $('.edit').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            participationModal(id);
        });
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
</script>