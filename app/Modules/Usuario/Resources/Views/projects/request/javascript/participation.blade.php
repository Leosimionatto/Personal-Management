<script>
    $(document).ready(function(){
        $('.call-confirm-modal').on('click', function(event){
            event.preventDefault();

            var condition = $('.accept:checked').length > 0;

            if(condition){
                call_confirm_modal();
            }
        });
    });

    // Method to call and get Confirm Modal
    function call_confirm_modal()
    {
        var request = $.ajax({
            url: '{{ route('modal.confirm') }}',
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
</script>