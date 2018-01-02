<script>
    $(document).ready(function(){
        $('.read').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            read(id);
        });

        $('.delete').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr('data-id');

            remove(id);
        });

        $('.mark-all-as-read').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            markAll();
        });

        $('.delete-all').click(function(event){
            event.preventDefault();
            event.stopPropagation();

            deleteAll();
        });
    });

    function read(id){
        var request = $.ajax({
            url: '{{ route('notification.read') }}',
            method: 'GET',
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

    function remove(id){
        var request = $.ajax({
            url: '{{ route('notification.delete') }}',
            method: 'GET',
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

    function deleteAll(){
        var request = $.ajax({
            url: '{{ route('notification.delete-all') }}',
            method: 'GET',
            data: {}
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

    function markAll(){
        var request = $.ajax({
            url: '{{ route('notification.mark-all-as-read') }}',
            method: 'GET',
            data: {}
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