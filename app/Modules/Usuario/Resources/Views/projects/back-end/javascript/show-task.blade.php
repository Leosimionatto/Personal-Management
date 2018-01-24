<script>
    $(document).ready(function(){
        var stepobj = JSON.parse('{!! json_encode($task->steps()->where('idsituacao', '=', 1)->orWhere('idsituacao', '=', 2)->first()) !!}');

        $('.task-step').on('click', function(){
            var data = {
                id: $(this).attr('data-id'),
                name: $(this).attr('data-name')
            };

            step(data);
        });

        $('.action').each(function(){
            $(this).on('click', function(event){
                event.preventDefault();

                var id = $(this).attr('data-id');

                editStep(id);
            });
        });

        step({id: stepobj.id, name: stepobj.nmetapa});
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
    function editStep(id){
        var request = $.ajax({
            url: '{{ url('usuario/ajax/etapa/editar') }}' + '/' + id,
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
</script>