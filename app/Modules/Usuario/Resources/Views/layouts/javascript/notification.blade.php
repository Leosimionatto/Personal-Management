<script>
    $(document).ready(function(){
        $('.mark-as-read').on('click', function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');
            var href = $(this).attr('data-href');

            read(href, id);
        });
    });

    // Method to mark Notification as read
    function read(href, id)
    {
        var request = $.ajax({
            url: '{{ route('notification.read') }}',
            method: 'GET',
            data: {id:id}
        });

        request
            .done(function(response){
                if(response.status === '00'){
                    if(!href){
                        window.location.reload();
                    }else{
                        window.location.href = href;
                    }
                }
            })
            .fail(function(response){
                // Do nothing
            });
    }
</script>